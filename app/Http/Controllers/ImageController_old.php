<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Image;
use File;

class ImageController extends Controller
{
    public function upload(Request $request)
    //====画像ファイルをS3へアップロードする====
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

        //アップロード画像リサイズ
        $resized_img = Image::make($file)
            ->resize(300, null, function ($constraint){
                $constraint->aspectRatio();
            });

        //ディレクトリ名と、ファイル名のパスが返却される
        //$path = Storage::disk('s3')->putFile('/', $file, 'public');
        //リサイズ後の画像をアップロード
        $path = Storage::disk('s3')->put('/', (string)$resized_img, 'public');
        //アップロード先のファイルパス（URLを取得）を取得
        $url = Storage::disk('s3')->url($path);

        // DBへの情報保存
        $post = new Post;
        $post->image_title = $request->image_file_name;
        $post->image_url = $url;
        $post->save();

        //AWSへ格納済みの画像一覧URL取得
        $disk = Storage::disk('s3');
        $files = $disk->files('');
        $file_url = array();
        for ($i = 0; $i < count($files); $i++)  {
            $file_url[$i] = $disk->url($file);
        }

        return view('disp', compact('file_url'));
    }

    public function index()
    // AWSの画像一覧表示
    {
        $disk = Storage::disk('s3');
        $files = $disk->files('');
        return view('disp', compact('files'));
    }

    public function delete ($filename)
    //　選択画像のS3のファイル削除後、一覧画面へリダイレクト
    {
        $disk = Storage::disk('s3');
        $disk->delete($filename);
        return redirect()->action('ImageController@index');
    }
}
