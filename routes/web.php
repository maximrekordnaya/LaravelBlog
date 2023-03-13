<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::group(['namespace'=>'App\Http\Controllers\Main'], function (){
//    Route::get('/', IndexController::class);
//});
//
//Route::group(['namespace'=>'App\Http\Controllers\Admin', 'prefix'=>'admin'], function (){
//    Route::group(['namespace'=>'Main'], function (){
//        Route::get('/', App\Http\Controllers\Admin\Main\IndexController::class);
//    });
//});

//Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
//    Route::get('/', 'IndexController')->name('main.index');
//
//});
Route::get('/', function (){
    return redirect()->route('post.index');
});

Route::group(['namespace' => 'App\Http\Controllers\Post', 'prefix'=>'posts'], function () {
    Route::get('/', 'IndexController')->name('post.index');
    Route::get('/{post}', 'ShowController')->name('post.show');

    Route::group(['namespace'=>'Comment', 'prefix'=>'{post}/comments'], function (){
        Route::post('/', 'StoreController')->name('post.comment.store');
    });

    Route::group(['namespace'=>'Like', 'prefix'=>'{post}/like'], function (){
        Route::post('/', 'StoreController')->name('post.like.store');
    });

});

Route::group(['namespace' => 'App\Http\Controllers\Category', 'prefix' => 'category'], function () {
    Route::group(['namespace' => 'Post', 'prefix' => '{category}/posts'], function (){
        Route::get('/', 'IndexController')->name('category.post.index');
    });

});


Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix' => 'personal', 'middleware'=>['auth','verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('personal.main.index');
    });
    Route::group(['namespace' => 'Liked', 'prefix'=>'liked'], function () {
        Route::get('/', 'IndexController')->name('personal.liked.index');
        Route::delete('/delete/{post}', 'DestroyController')->name('personal.liked.destroy');
    });
    Route::group(['namespace' => 'Comment', 'prefix'=>'comment'], function () {
        Route::get('/', 'IndexController')->name('personal.comment.index');
        Route::get('/edit/{comment}', 'EditController')->name('personal.comment.edit');
        Route::patch('/{comment}', 'UpdateController')->name('personal.comment.update');
        Route::delete('/{comment}', 'DestroyController')->name('personal.comment.destroy');

    });
});

//Route::group(['namespace' => 'App\Http\Controllers\Admin\Main', 'prefix' => 'admin'], function () {
//    Route::get('/', 'IndexController')->name('index');
//});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware'=>['auth','verified', 'admin']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });

    Route::group(['namespace' => 'Post', 'prefix'=>'posts'], function () {
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::post('/', 'StoreController')->name('admin.post.store');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/edit/{post}', 'EditController')->name('admin.post.edit');
        Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/{post}', 'DestroyController')->name('admin.post.destroy');
    });

    Route::group(['namespace' => 'Category', 'prefix'=>'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/edit/{category}', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DestroyController')->name('admin.category.destroy');
    });

    Route::group(['namespace' => 'Tag', 'prefix'=>'tags'], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/edit/{tag}', 'EditController')->name('admin.tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DestroyController')->name('admin.tag.destroy');
    });

    Route::group(['namespace' => 'User', 'prefix'=>'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/edit/{user}', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DestroyController')->name('admin.user.destroy');
    });

});



Auth::routes(['verify'=>true]);



