<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\LoginController;
use App\Http\Controllers\Web\AccountController;
use App\Http\Controllers\Web\CountyController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\FacilityController;
use App\Http\Controllers\Web\QueryCategoryController;
use App\Http\Controllers\Web\QueryController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\RoleController;
use App\Http\Controllers\Web\MenuGroupController;
use App\Http\Controllers\Web\MenuController;
use App\Http\Controllers\Web\MenuRoleController;
use App\Http\Controllers\Web\SubCountyController;

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
Route::group(['middleware' => ['usersession', 'useraccess']], function () {

    /*Account Routes*/

    Route::get('/profile', [AccountController::class, 'displayProfileView']);
    Route::post('/update-profile', [AccountController::class, 'updateProfile']);
    Route::post('/change-password', [AccountController::class, 'changePassword']);
    Route::get('/logout', [AccountController::class, 'logout']);

    /*County Routes*/

    Route::get('/county', [CountyController::class, 'displayCountyTableView']);
    Route::get('/county/new', [CountyController::class, 'displayNewCountyView']);
    Route::post('/county/save', [CountyController::class, 'saveCounty']);
    Route::get('/county/view/{id}', [CountyController::class, 'displayCountyView']);
    Route::post('/county/update/{id}', [CountyController::class, 'updateCounty']);
    Route::get('/county/delete/{id}', [CountyController::class, 'deleteCounty']);

    /*SubCounty Routes*/

    Route::get('/subcounty', [SubCountyController::class, 'displaySubCountyTableView']);
    Route::get('/subcounty/new', [SubCountyController::class, 'displayNewSubCountyView']);
    Route::post('/subcounty/save', [SubCountyController::class, 'saveSubCounty']);
    Route::get('/subcounty/view/{id}', [SubCountyController::class, 'displaySubCountyView']);
    Route::post('/subcounty/update/{id}', [SubCountyController::class, 'updateSubCounty']);
    Route::get('/subcounty/delete/{id}', [SubCountyController::class, 'deleteSubCounty']);

    /*Facility Routes*/

    Route::get('/facility', [FacilityController::class, 'displayFacilityTableView']);
    Route::get('/facility/new', [FacilityController::class, 'displayNewFacilityView']);
    Route::post('/facility/save', [FacilityController::class, 'saveFacility']);
    Route::get('/facility/view/{id}', [FacilityController::class, 'displayFacilityView']);
    Route::post('/facility/update/{id}', [FacilityController::class, 'updateFacility']);
    Route::get('/facility/delete/{id}', [FacilityController::class, 'deleteFacility']);

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

    /*Role Routes*/

    Route::get('/role', [RoleController::class, 'displayRoleTableView']);
    Route::get('/role/new', [RoleController::class, 'displayNewRoleView']);
    Route::post('/role/save', [RoleController::class, 'saveRole']);
    Route::get('/role/view/{id}', [RoleController::class, 'displayRoleView']);
    Route::post('/role/update/{id}', [RoleController::class, 'updateRole']);
    Route::get('/role/delete/{id}', [RoleController::class, 'deleteRole']);


    /*MenuGroup Routes*/

    Route::get('/menugroup', [MenuGroupController::class, 'displayMenuGroupTableView']);
    Route::get('/menugroup/new', [MenuGroupController::class, 'displayNewMenuGroupView']);
    Route::post('/menugroup/save', [MenuGroupController::class, 'saveMenuGroup']);
    Route::get('/menugroup/view/{id}', [MenuGroupController::class, 'displayMenuGroupView']);
    Route::post('/menugroup/update/{id}', [MenuGroupController::class, 'updateMenuGroup']);
    Route::get('/menugroup/delete/{id}', [MenuGroupController::class, 'deleteMenuGroup']);

    /*Menu Routes*/

    Route::get('/menu', [MenuController::class, 'displayMenuTableView']);
    Route::get('/menu/new', [MenuController::class, 'displayNewMenuView']);
    Route::post('/menu/save', [MenuController::class, 'saveMenu']);
    Route::get('/menu/view/{id}', [MenuController::class, 'displayMenuView']);
    Route::post('/menu/update/{id}', [MenuController::class, 'updateMenu']);
    Route::get('/menu/delete/{id}', [MenuController::class, 'deleteMenu']);

    /*MenuRole Routes*/

    Route::get('/menurole', [MenuRoleController::class, 'displayMenuRoleTableView']);
    Route::get('/menurole/new', [MenuRoleController::class, 'displayNewMenuRoleView']);
    Route::post('/menurole/save', [MenuRoleController::class, 'saveMenuRole']);
    Route::get('/menurole/view/{id}', [MenuRoleController::class, 'displayMenuRoleView']);
    Route::post('/menurole/update/{id}', [MenuRoleController::class, 'updateMenuRole']);
    Route::get('/menurole/delete/{id}', [MenuRoleController::class, 'deleteMenuRole']);

    /*Dashboard Routes*/

    Route::get('/dashboard/{category}', [DashboardController::class, 'displayDashboardView']);
    Route::post('/dashboard/filter', [DashboardController::class, 'displayDashboardFilterView']);
});
