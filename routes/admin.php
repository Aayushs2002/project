<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\NewsController;
use Illuminate\Support\Facades\Route;



Route::get("/login", [AuthController::class, "index"])->name("admin.login");

Route::post("/login/store", [AuthController::class, "login"])->name("admin.login.store");

Route::resource('category', CategoryController::class);
Route::resource('news', NewsController::class);
Route::resource('user', ManageUserController::class);
