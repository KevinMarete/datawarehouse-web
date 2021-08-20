<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CountyController;
use App\Http\Controllers\Api\FacilityController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\MenuGroupController;
use App\Http\Controllers\Api\MenuRoleController;
use App\Http\Controllers\Api\QueryCategoryController;
use App\Http\Controllers\Api\QueryController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\SubCountyController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\VisitController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::group(['middleware' => ['json.response', 'cors']], function () {

    //Public endpoints
    Route::get('/unauthorized', [AuthController::class, 'unauthorized'])->name('unauthorized');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/forgotpasswordemail', [AuthController::class, 'forgotpasswordemail'])->name('forgotpasswordemail');

    //Private endpoints
    Route::middleware('auth:api')->group(function () {
        Route::post('/changepassword', [AuthController::class, 'changepassword'])->name('changepassword');
        Route::get('/me', [AuthController::class, 'viewprofile'])->name('me');
        Route::put('/profile', [AuthController::class, 'updateprofile'])->name('profile');
        Route::post('/add-user', [AuthController::class, 'addUser'])->name('adduser');
        Route::post('/add-user-email', [AuthController::class, 'addUserEmail'])->name('adduseremail');
        Route::post('/activate', [AuthController::class, 'activate'])->name('activate');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::resources([
            'county' => CountyController::class,
            'facility' => FacilityController::class,
            'menu' => MenuController::class,
            'menugroup' => MenuGroupController::class,
            'menurole' => MenuRoleController::class,
            'query' => QueryController::class,
            'querycategory' => QueryCategoryController::class,
            'role' => RoleController::class,
            'subcounty' => SubCountyController::class,
            'user' => UserController::class,
        ]);
        Route::get('/role/{id}/menus', [RoleController::class, 'getRoleMenus'])->name('getrolemenus');

        Route::post('/query/run', [QueryController::class, 'runQuery'])->name('runquery');

        Route::post('/patient/on-art/current/agegroup', [PatientController::class, 'getCurrentOnArtPatientTotalsByAgeGroup']);
        Route::post('/patient/on-art/current/agegroup-gender', [PatientController::class, 'getCurrentOnArtPatientTotalsByAgeGroupGender']);
        Route::post('/patient/on-art/current/prop', [PatientController::class, 'getCurrentOnArtPatientProportionsByAgeGroupGender']);
        Route::post('/patient/on-art/new/agegroup', [PatientController::class, 'getNewOnArtPatientTotalsByAgeGroup']);
        Route::post('/patient/on-art/new/agegroup-gender', [PatientController::class, 'getNewOnArtPatientTotalsByAgeGroupGender']);

        Route::post('/patient/on-care/current/agegroup', [PatientController::class, 'getCurrentOnCarePatientTotalsByAgeGroup']);
        Route::post('/patient/on-care/current/agegroup-gender', [PatientController::class, 'getCurrentOnCarePatientTotalsByAgeGroupGender']);
        Route::post('/patient/on-care/new/agegroup', [PatientController::class, 'getNewOnCarePatientTotalsByAgeGroup']);
        Route::post('/patient/on-care/new/agegroup-gender', [PatientController::class, 'getNewOnCarePatientTotalsByAgeGroupGender']);

        Route::post('/patient/tested/positive/gender', [PatientController::class, 'getTestedPostivePatientTotalsByGender']);
        Route::post('/patient/tested/positive/agegroup-gender', [PatientController::class, 'getTestedPostivePatientTotalsByAgeGroupGender']);

        Route::post('/visit/on-mmd/agegroup-gender', [VisitController::class, 'getOnMultiMonthDispensingTotalsByAgeGroupGender']);
    });
});
