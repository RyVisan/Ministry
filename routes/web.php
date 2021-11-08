<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ImageSlideController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OtherController;
use App\Http\Controllers\FrontendController;

Route::group(['middleware'=>['checkLogin','timeRestrict']], function(){
//Route::middleware(['timeRestrict'])->group(function(){
    //start menu
    Route::get('/menu', [MenuController::class, 'Index'])->name('menu.index');
    Route::get('/menu/create', [MenuController::class, 'Create'])->name('menu.create');
    Route::post('/menu/save', [MenuController::class, 'Save'])->name('menu.save');
    Route::get('/menu/delete/{id}', [MenuController::class, 'Delete'])->name('menu.delete');
    Route::get('/menu/edit/{id}', [MenuController::class, 'Edit'])->name('menu.edit');
    Route::post('/menu/update/{id}', [MenuController::class, 'Update'])->name('menu.update');
    //end menu

    //start sub menu
    Route::get('/sub_menu', [SubmenuController::class, 'Index'])->name('sub_menu.index');
    Route::get('/sub_menu/create', [SubmenuController::class, 'Create'])->name('sub_menu.create');
    Route::post('/sub_menu/save', [SubmenuController::class, 'Save'])->name('sub_menu.save');
    Route::get('/sub_menu/delete/{id}', [SubmenuController::class, 'Delete'])->name('sub_menu.delete');
    Route::get('/sub_menu/edit/{id}', [SubmenuController::class, 'Edit'])->name('sub_menu.edit');
    Route::post('/sub_menu/update/{id}', [SubmenuController::class, 'Update'])->name('sub_menu.update');
    //end sub menu

    //start document
    Route::get('/admin', [DocumentController::class, 'Index'])->name('document.index');
    Route::get('/document/create', [DocumentController::class, 'Create'])->name('document.create');
    Route::post('/document/save', [DocumentController::class, 'Save'])->name('document.save');
    Route::get('/document/delete/{id}', [DocumentController::class, 'Delete'])->name('document.delete');
    Route::get('/document/edit/{id}', [DocumentController::class, 'Edit'])->name('document.edit');
    Route::post('/document/update/{id}', [DocumentController::class, 'Update'])->name('document.update');
    Route::get('get/submenu/menu/{id}',[DocumentController::class,'getSubmenu']);
    //end document

    //start image
    Route::get('/img_slide', [ImageSlideController::class, 'Index'])->name('img_slide.index');
    Route::get('/img_slide/create', [ImageSlideController::class, 'Create'])->name('img_slide.create');
    Route::post('/img_slide/save', [ImageSlideController::class, 'Save'])->name('img_slide.save');
    Route::get('/img_slide/delete/{id}', [ImageSlideController::class, 'Delete'])->name('img_slide.delete');
    Route::get('/img_slide/edit/{id}', [ImageSlideController::class, 'Edit'])->name('img_slide.edit');
    Route::post('/img_slide/update/{id}', [ImageSlideController::class, 'Update'])->name('img_slide.update');
    //end image

    //start role
    Route::get('/role', [RoleController::class, 'Index'])->name('role.index');
    Route::get('/role/create', [RoleController::class, 'Create'])->name('role.create');
    Route::post('/role/save', [RoleController::class, 'Save'])->name('role.save');
    Route::get('/role/delete/{id}', [RoleController::class, 'Delete'])->name('role.delete');
    Route::get('/role/edit/{id}', [RoleController::class, 'Edit'])->name('role.edit');
    Route::post('/role/update/{id}', [RoleController::class, 'Update'])->name('role.update');
    //end role

    //start user
    Route::get('/user', [UserController::class, 'Index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'Create'])->name('user.create');
    Route::post('/user/save', [UserController::class, 'Save'])->name('user.save');
    Route::get('/user/delete/{id}', [UserController::class, 'Delete'])->name('user.delete');
    Route::get('/user/edit/{id}', [UserController::class, 'Edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'Update'])->name('user.update');
    //end user

    //start user
    Route::get('/other', [OtherController::class, 'Index'])->name('other.index');
    Route::get('/other/create', [OtherController::class, 'Create'])->name('other.create');
    Route::post('/other/save', [OtherController::class, 'Save'])->name('other.save');
    Route::get('/other/delete/{id}', [OtherController::class, 'Delete'])->name('other.delete');
    Route::delete('/other/delete_img/{id}', [OtherController::class, 'Delete_img'])->name('other.delete_img');
    Route::get('/other/edit/{id}', [OtherController::class, 'Edit'])->name('other.edit');
    Route::post('/other/update/{id}', [OtherController::class, 'Update'])->name('other.update');
    //end user

    //start frontend
    Route::get('/', [FrontendController::class, 'Index'])->name('index.index');
    Route::get('/view/{id}', [FrontendController::class, 'View'])->name('view');
    Route::get('/user/logout', [FrontendController::class, 'Logout'])->name('user.logout');
    Route::get('/link/{id}/{mode}', [FrontendController::class, 'Post'])->name('link');
    //end frontend
});

//start login
Route::get('/user/login', [UserController::class, 'Login'])->name('user.login');
Route::post('/user/check', [UserController::class, 'Check'])->name('user.check');
Route::get('/user/logout', [UserController::class, 'Logout'])->name('user.logout');
//end login

//Auth::routes();



