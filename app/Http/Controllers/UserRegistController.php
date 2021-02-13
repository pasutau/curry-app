<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class UserRegistController extends Controller
{
    public function register(Request $request)
    //ユーザ登録処理
    {
        //登録情報に対してのバリデーション
        $validator = Validator::make($request->all(), [
            'email' =>  'required|max:255',
            'name' => 'required|max:255',
            'password' => 'required|max:255',
            'password-confirm' => 'required|max:255',
        ]);
        //バリデーション違反があった場合のエラー処理
        if($validator->fails()){
            return back()->withInput()->withErros($validator);
        }

        //入力値の受け取り
        $email = $request->get('email');
        $name = $request->get('name');
        $password = $request->get('password');
        $password_confirm = $request->get('password-confirm');

    }
}
