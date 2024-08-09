<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MediaController;

// Route to the homepage
Route::get('/', function () {
    return view('welcome');  // الواجهة الرئيسية
});

// Routes for Posts
Route::resource('posts', PostController::class); 
// هذا الكود ينشئ جميع المسارات الأساسية للمنشورات (index, create, store, show, edit, update, destroy)

// Routes for Comments
Route::resource('comments', CommentController::class)->except(['create', 'edit']); 
// الكود هذا ينشئ مسارات للتعليقات، ولكن بدون create و edit لأننا نفترض أن هذه العمليات ستكون داخل واجهة المنشورات

// Routes for Media
Route::resource('media', MediaController::class); 
// مسارات CRUD للوسائط

// Authentication routes
Auth::routes(); // هذا الكود يقوم بتحميل جميع مسارات المصادقة (تسجيل الدخول، تسجيل الخروج، التسجيل، إلخ)

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
// الصفحة الرئيسية بعد تسجيل الدخول

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
