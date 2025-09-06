<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// -----------------------------
// お問い合わせ関連
// -----------------------------
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');

Route::get('/contact/confirm', function () {
    return redirect()->route('contact.show'); // フォームに戻す
});
// 確認画面は POST でフォーム送信
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');



// 送信処理（完了画面表示）
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

// サンクスページ（GETでもアクセス可能にする場合）
Route::get('/contact/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');

// -----------------------------
// 管理者ページ（認証後のみアクセス可能）
// -----------------------------
Route::get('/admin', function () {
    return view('admin');
})->middleware('auth')->name('admin');

// -----------------------------
// 認証関連
// -----------------------------
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.show');
// POST /login は Fortify が処理するので不要

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.show');
// POST /register も Fortify が処理するので不要

// -----------------------------
// トップページ
// -----------------------------
Route::get('/', function () {
    return view('welcome');
})->name('home');
