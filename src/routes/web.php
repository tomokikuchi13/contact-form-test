<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');

Route::get('/contact/confirm', function () {
    return redirect()->route('contact.show'); 
});

Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');




Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');


Route::get('/contact/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');


Route::get('/admin', function () {
    return view('admin');
})->middleware('auth')->name('admin');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.show');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.show');


Route::get('/', function () {
    return view('welcome');
})->name('home');
