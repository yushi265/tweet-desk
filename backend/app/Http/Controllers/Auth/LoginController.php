<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    use Authenticatable;

    public function __construct()
    {
    }

    //SNS認証ページへユーザーをリダイレクト
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    //ログイン
    public function handleProviderCallback(Request $request)
    {
        //認証結果の受け取り
//        $providerUser = Socialite::driver('twitter')->user();

        //Twitterから取得したユーザー情報からユーザーIDを取得
//        $user = User::where('twitter_id', $providerUser->getId())->first();

        if (true) {
            /** @var User $user */
            $user = User::query()->create([
                'twitter_id' => null,
                'name' => 'namae',
                'email' => 'example@example.com',
            ]);
        }

        $token = $user->createToken('token');

        return ['token' => $token->plainTextToken];
    }
}