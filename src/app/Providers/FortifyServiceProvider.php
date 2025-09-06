<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        |--------------------------------------------------------------------------
        | 登録ビュー
        |--------------------------------------------------------------------------
        */
        Fortify::registerView(function () {
            return view('auth.register'); // Blade ファイル
        });

        /*
        |--------------------------------------------------------------------------
        | ログインビュー
        |--------------------------------------------------------------------------
        */
        Fortify::loginView(function () {
            return view('auth.login'); // Blade ファイル
        });

        /*
        |--------------------------------------------------------------------------
        | パスワードリセットビュー（任意）
        |--------------------------------------------------------------------------
        */
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });

        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', ['request' => $request]);
        });

        /*
        |--------------------------------------------------------------------------
        | ユーザー作成
        |--------------------------------------------------------------------------
        | Fortify 1.19 以降は Closure ではなくクラス名文字列を指定
        */
        Fortify::createUsersUsing(CreateNewUser::class);

        /*
        |--------------------------------------------------------------------------
        | パスワード更新やプロフィール更新などは
        | それぞれの Action クラスで定義済み（デフォルトで publish 済み）
        |--------------------------------------------------------------------------
        */
    }
}
