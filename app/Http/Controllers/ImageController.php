<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

class ImageController extends Controller
{
    public function upload(Request $request)
    /*
    // 画像ファイルをS3へアップロードする
    */
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

        //ディレクトリ名と、ファイル名のパスが返却される
        $path = Storage::disk('s3')->putFile('/', $file, 'public');
        //アップロード先のファイルパス（URLを取得）を取得
        $url = Storage::disk('s3')->url($path);

        // DBへの情報保存
        $post = new Post;
        $post->image_title = $request->image_file_name;
        $post->image_url = $url;
        Auth::user()->posts()->save($post);

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
    /*
    // S3上の画像全てを一覧表示
    */
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
        sort($file_url,SORT_STRING);

         return view('disp', compact('file_url','image_title'));

    }

    public function mypage_index()
    /*
    // ユーザが投稿した画像のみ表示する
    */
    {
        //タイトル、URLをDBから取得
        $posts = DB::table('posts');
        $user_id = Auth::id();
        $image_info = $posts->where('user_id', $user_id)->orderBy('image_url')->pluck('image_title', 'image_url')->toArray();

        return view('mypage', compact('image_info'));
    }

    public function delete(Request $request)
    /*
    //　選択画像のS3のファイル削除後、一覧画面へリダイレクト
    */
    {
        $url = $request->url;//"https://curry-image.s3.ap-northeast-1.amazonaws.com/Gbu58UwjyHnpPZQarl5NZCkAXhHgU0ddpmxiMU2M.jpg"

        //postsテーブルから対象のレコードを削除
        $posts = DB::table('posts');
        $user_id = Auth::id();
        $db_delete = $posts->where('image_url', '=', $url)->delete();

        //s3から対象のデータを削除
        $s3img_name = $url;


        $disk = Storage::disk('s3');
        $disk->delete($s3img_name);
        return redirect()->action('ImageController@mypage_index');
    }
}
