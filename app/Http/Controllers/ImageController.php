<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Validator;

class ImageController extends Controller
{
    public function upload(Request $request)
    // 画像ファイルをS3へアップロードする
    {
        //upload画像に対してのバリデーション
        $validator = Validator::make($request->all(), [
            'file' => 'required|max:10240|mimes:jpeg,gif,png',
            'image_file_name' => 'required|max:191'
        ]);
        //バリデーション違反があった場合のエラー処理
        if($validator->fails()){
            return back()->withInput()->withErros($validator);
        }

        $file = $request->file('file');

        // //アップロード画像リサイズ
        // $resized_img = Image::make($file)
        //     ->resize(300, null, function ($constraint){
        //         $constraint->aspectRatio();
        //     });

        //ディレクトリ名と、ファイル名のパスが返却される
        $path = Storage::disk('s3')->putFile('/', $file, 'public');
        //アップロード先のファイルパス（URLを取得）を取得
        $url = Storage::disk('s3')->url($path);

        // DBへの情報保存
        $post = new Post;
        $post->image_title = $request->image_file_name;
        $post->image_url = $url;
        $post->save();

        // //AWSへ格納済みの画像一覧URL取得
        // $disk = Storage::disk('s3');
        // $files = $disk->files('');
        // $file_url = array();
        // for ($i = 0; $i < count($files); $i++)  {
        //     $file_url[$i] = $disk->url($files[$i]);

        // }
        //DBから登録済みの画像タイトルを取得
        $posts = DB::table('posts');
        $image_title = $posts->orderBy('image_url')->pluck('image_title')->toArray();//投稿画像タイトルの取得
        $disk = Storage::disk('s3');
        $files = $disk->files('');
        $file_url = array();
        for ($i = 0; $i < count($files); $i++)  {
            $file_url[$i] = $disk->url($files[$i]);

        }
        return view('disp', compact('file_url','image_title'));
    }

    public function index()
    {
        //DBから登録済みの画像タイトルを取得
        $posts = DB::table('posts');
        $image_title = $posts->orderBy('image_url')->pluck('image_title')->toArray();//投稿画像タイトルの取得
        $disk = Storage::disk('s3');
        $files = $disk->files('');
        $file_url = array();
        for ($i = 0; $i < count($files); $i++)  {
            $file_url[$i] = $disk->url($files[$i]);

        }
         return view('disp', compact('file_url','image_title'));
    }

    public function delete ($filename)
    //　選択画像のS3のファイル削除後、一覧画面へリダイレクト
    {
        $disk = Storage::disk('s3');
        $disk->delete($filename);
        return redirect()->action('ImageController@index');
    }
}
