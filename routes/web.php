<?php

use App\Http\Controllers\LinksController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/links', [LinksController::class, 'index'])->name('links');

Route::get('/', [SiteController::class, 'about'])->name('about');
Route::get('/facilities-classes', [SiteController::class, 'facilities'])->name('facilities');
Route::get('/services', [SiteController::class, 'services'])->name('services');
Route::get('/blog', [SiteController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [SiteController::class, 'article'])->name('blog.show');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::post('/contact', [SiteController::class, 'sendMessage'])->middleware('throttle:5,1')->name('contact.send');
