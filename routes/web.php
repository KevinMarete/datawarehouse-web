<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\LoginController;
use App\Http\Controllers\Web\AccountController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\QueryCategoryController;
use App\Http\Controllers\Web\QueryController;
use App\Http\Controllers\Web\UserController;

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

/*Auth Routes*/

Route::get('/', [LoginController::class, 'displayLoginView']);
Route::get('/login', [LoginController::class, 'displayLoginView']);
Route::post('/authenticate', [LoginController::class, 'authenticateAccount']);
Route::get('/forgot-password', [LoginController::class, 'displayForgotPasswordView']);
Route::post('/reset-account', [LoginController::class, 'resetAccount']);

//Private routes
Route::group(['middleware' => ['usersession']], function () {

    /*Account Routes*/

    Route::get('/profile', [AccountController::class, 'displayProfileView']);
    Route::post('/update-profile', [AccountController::class, 'updateProfile']);
    Route::post('/change-password', [AccountController::class, 'changePassword']);
    Route::get('/logout', [AccountController::class, 'logout']);

    /*QueryCategory Routes*/

    Route::get('/querycategory', [QueryCategoryController::class, 'displayQueryCategoryTableView']);
    Route::get('/querycategory/new', [QueryCategoryController::class, 'displayNewQueryCategoryView']);
    Route::post('/querycategory/save', [QueryCategoryController::class, 'saveQueryCategory']);
    Route::get('/querycategory/view/{id}', [QueryCategoryController::class, 'displayQueryCategoryView']);
    Route::post('/querycategory/update/{id}', [QueryCategoryController::class, 'updateQueryCategory']);
    Route::get('/querycategory/delete/{id}', [QueryCategoryController::class, 'deleteQueryCategory']);

    /*Query Routes*/

    Route::get('/query', [QueryController::class, 'displayQueryTableView']);
    Route::get('/query/new', [QueryController::class, 'displayNewQueryView']);
    Route::post('/query/save', [QueryController::class, 'saveQuery']);
    Route::get('/query/view/{id}', [QueryController::class, 'displayQueryView']);
    Route::post('/query/update/{id}', [QueryController::class, 'updateQuery']);
    Route::get('/query/delete/{id}', [QueryController::class, 'deleteQuery']);
    Route::get('/query/executor', [QueryController::class, 'displayQueryExecutorView']);
    Route::post('/query/run', [QueryController::class, 'runQuery']);

    /*User Routes*/

    Route::get('/user', [UserController::class, 'displayUserTableView']);
    Route::get('/user/new', [UserController::class, 'displayNewUserView']);
    Route::post('/user/save', [UserController::class, 'saveUser']);
    Route::get('/user/view/{id}', [UserController::class, 'displayUserView']);
    Route::post('/user/update/{id}', [UserController::class, 'updateUser']);
    Route::get('/user/delete/{id}', [UserController::class, 'deleteUser']);

    /*Dashboard Routes*/

    Route::get('/dashboard', [DashboardController::class, 'displayHomeView']);
});
