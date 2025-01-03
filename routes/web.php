<?php

use App\Livewire\Auth\Signin;
use App\Livewire\Auth\Signup;
use App\Livewire\Todo\AddTodo;
use App\Livewire\Todo\EditTodo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/sign-in', Signin::class)->name('sign_in');

Route::get('/sign-up', Signup::class)->name('sign_up');

Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('add-new-todo', AddTodo::class)->name('add-todo');
    Route::get('edit-todo/{todo}', EditTodo::class)->name('edit-todo');

    Route::get('/logout', function () {
        Auth::logout();
        return to_route('sign_in')->with('success', 'Logout Successful');
    })->name('logout');
});