<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CervicalScreeningController;
use App\Http\Controllers\Api\CountyController;
use App\Http\Controllers\Api\FacilityController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\MenuGroupController;
use App\Http\Controllers\Api\MenuRoleController;
use App\Http\Controllers\Api\ProgramController;
use App\Http\Controllers\Api\QueryCategoryController;
use App\Http\Controllers\Api\QueryController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\SubCountyController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\CohortController;
use App\Http\Controllers\Api\IptController;
use App\Http\Controllers\Api\PmtctController;
use App\Http\Controllers\Api\TbController;
use App\Http\Controllers\Api\TestController;
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
            'program' => ProgramController::class,
            'query' => QueryController::class,
            'querycategory' => QueryCategoryController::class,
            'role' => RoleController::class,
            'subcounty' => SubCountyController::class,
            'user' => UserController::class,
        ]);
        Route::get('/role/{id}/menus', [RoleController::class, 'getRoleMenus'])->name('getrolemenus');
        Route::post('/query/run', [QueryController::class, 'runQuery'])->name('runquery');

        /*Care and Treatment*/
        Route::post('/patient/on-art/current/agegroup', [PatientController::class, 'getCurrentOnArtPatientTotalsByAgeGroup']);
        Route::post('/patient/on-art/current/agegroup-gender', [PatientController::class, 'getCurrentOnArtPatientTotalsByAgeGroupGender']);
        Route::post('/patient/on-art/current/prop', [PatientController::class, 'getCurrentOnArtPatientProportionsByAgeGroupGender']);
        Route::post('/patient/on-art/new/agegroup', [PatientController::class, 'getNewOnArtPatientTotalsByAgeGroup']);
        Route::post('/patient/on-art/new/agegroup-gender', [PatientController::class, 'getNewOnArtPatientTotalsByAgeGroupGender']);

        Route::post('/patient/on-care/current/agegroup', [PatientController::class, 'getCurrentOnCarePatientTotalsByAgeGroup']);
        Route::post('/patient/on-care/current/agegroup-gender', [PatientController::class, 'getCurrentOnCarePatientTotalsByAgeGroupGender']);
        Route::post('/patient/on-care/new/agegroup', [PatientController::class, 'getNewOnCarePatientTotalsByAgeGroup']);
        Route::post('/patient/on-care/new/agegroup-gender', [PatientController::class, 'getNewOnCarePatientTotalsByAgeGroupGender']);

        Route::post('/patient/on-art/3months/agegroup-gender', [PatientController::class, 'get3MonthsOnArtPatientTotalsByAgeGroupGender']);
        Route::post('/patient/on-art/3-5months/agegroup-gender', [PatientController::class, 'get3To5MonthsOnArtPatientTotalsByAgeGroupGender']);
        Route::post('/patient/on-art/6months/agegroup-gender', [PatientController::class, 'get6MonthsOnArtPatientTotalsByAgeGroupGender']);

        /*ART Cohort Retention*/
        Route::post('/cohort/children/category', [CohortController::class, 'getCohortChildrenByCategory']);
        Route::post('/cohort/adolescents/category', [CohortController::class, 'getCohortAdolescentsByCategory']);
        Route::post('/cohort/adults/category', [CohortController::class, 'getCohortAdultsByCategory']);
        Route::post('/cohort/totals/category', [CohortController::class, 'getCohortTotalsByCategory']);

        /*CD4 Enrollment Testing*/
        Route::post('/testing/cd4/children/category', [TestController::class, 'getCD4TestsChildrenByCategory']);
        Route::post('/testing/cd4/adolescents/category', [TestController::class, 'getCD4TestsAdolescentsByCategory']);
        Route::post('/testing/cd4/adults/category', [TestController::class, 'getCD4TestsAdultsByCategory']);
        Route::post('/testing/cd4/totals/category', [TestController::class, 'getCD4TestsTotalsByCategory']);

        /*HIV/Cervical Cancer*/
        Route::post('/screening/cervical/category', [CervicalScreeningController::class, 'getCervicalScreeningByCategory']);
        Route::post('/screening/cervical/visit-type', [CervicalScreeningController::class, 'getCervicalScreeningByVisitType']);

        /*Index Testing*/
        Route::post('/testing/index/children/category', [TestController::class, 'getIndexTestingChildrenByCategory']);
        Route::post('/testing/index/adults/category', [TestController::class, 'getIndexTestingAdultsByCategory']);
        Route::post('/testing/index/totals/category', [TestController::class, 'getIndexTestingTotalsByCategory']);
        Route::post('/testing/index/ft/category', [TestController::class, 'getIndexTestingFtByCategory']);
        Route::post('/testing/index/pns/category', [TestController::class, 'getIndexTestingPnsByCategory']);

        /*IPT Outcomes*/
        Route::post('/ipt/new/children/category', [IptController::class, 'getIptNewChildrenByCategory']);
        Route::post('/ipt/new/adults/category', [IptController::class, 'getIptNewAdultsByCategory']);
        Route::post('/ipt/new/totals/category', [IptController::class, 'getIptNewTotalsByCategory']);
        Route::post('/ipt/current/children/category', [IptController::class, 'getIptCurrentChildrenByCategory']);
        Route::post('/ipt/current/adults/category', [IptController::class, 'getIptCurrentAdultsByCategory']);
        Route::post('/ipt/current/totals/category', [IptController::class, 'getIptCurrentTotalsByCategory']);
        Route::post('/ipt/outcomes/totals/category', [IptController::class, 'getIptOutcomesTotalsByCategory']);
        Route::post('/ipt/not-completing/totals/category', [IptController::class, 'getIptNotCompletingTotalsByCategory']);
        Route::post('/ipt/outcomes/adults/category', [IptController::class, 'getIptOutcomesAdultsByCategory']);
        Route::post('/ipt/not-completing/adults/category', [IptController::class, 'getIptNotCompletingAdultsByCategory']);
        Route::post('/ipt/outcomes/children/category', [IptController::class, 'getIptOutcomesChildrenByCategory']);
        Route::post('/ipt/not-completing/children/category', [IptController::class, 'getIptNotCompletingChildrenByCategory']);

        /*Multi-Month Dispensing*/
        Route::post('/visit/on-mmd/agegroup-gender', [VisitController::class, 'getOnMultiMonthDispensingTotalsByAgeGroupGender']);
        Route::post('/visit/overall-mmd/agegroup-gender', [VisitController::class, 'getOverallMultiMonthDispensingTotalsByAgeGroupGender']);

        /*PMTCT-EID-HEI-POS-HCA*/
        Route::post('/pmtct/cascades/10-14/category', [PmtctController::class, 'getPmtctCascadesByAgeGroupGender']);
        Route::post('/pmtct/cascades/15-19/category', [PmtctController::class, 'getPmtctCascadesByAgeGroupGender']);
        Route::post('/pmtct/cascades/20-24/category', [PmtctController::class, 'getPmtctCascadesByAgeGroupGender']);
        Route::post('/pmtct/cascades/15-24/category', [PmtctController::class, 'getPmtctCascadesByAgeGroupGender']);
        Route::post('/pmtct/cascades/over25/category', [PmtctController::class, 'getPmtctCascadesByAgeGroupGender']);
        Route::post('/pmtct/cascades/totals/category', [PmtctController::class, 'getPmtctCascadesByAgeGroupGender']);
        Route::post('/pmtct/cascades/by12months/category', [PmtctController::class, 'getPmtctCascadesByAgeGroupGender']);
        Route::post('/pmtct/cascades/atSample/category', [PmtctController::class, 'getPmtctCascadesByAgeGroupGender']);
        Route::post('/pmtct/hca/12months/category', [PmtctController::class, 'getPmtctHcaByAgeGroupGender']);
        Route::post('/pmtct/hca/24months/category', [PmtctController::class, 'getPmtctHcaByAgeGroupGender']);
        Route::post('/pmtct/hca/dead/category', [PmtctController::class, 'getPmtctHcaByAgeGroupGender']);

        /*Screening and Testing*/
        Route::post('/patient/tested/positive/gender', [PatientController::class, 'getTestedPostivePatientTotalsByGender']);
        Route::post('/patient/tested/positive/agegroup-gender', [PatientController::class, 'getTestedPostivePatientTotalsByAgeGroupGender']);
        Route::post('/testing/hiv/children/agegroup', [TestController::class, 'getHivTestingChildrenByAgeGroup']);
        Route::post('/testing/hiv/adolescents/agegroup', [TestController::class, 'getHivTestingAdolescentsByAgeGroup']);
        Route::post('/testing/hiv/youths/agegroup', [TestController::class, 'getHivTestingYouthsByAgeGroup']);
        Route::post('/testing/hiv/adults/agegroup', [TestController::class, 'getHivTestingAdultsByAgeGroup']);
        Route::post('/testing/hiv/totals/agegroup', [TestController::class, 'getHivTestingTotalsByAgeGroup']);
        Route::post('/testing/hiv/overall/gender', [TestController::class, 'getHivTestingOverallByGender']);
        Route::post('/testing/hiv+/overall/gender', [TestController::class, 'getHivTestingPositiveOverallByGender']);
        Route::post('/testing/hiv/hiv+/totals', [TestController::class, 'getHivTestingPositiveTotals']);
        Route::post('/testing/hiv+/linked/totals', [TestController::class, 'getHivTestingPositiveLinkedTotals']);
        Route::post('/testing/hiv/hiv+/males', [TestController::class, 'getHivTestingPositiveMales']);
        Route::post('/testing/hiv+/linked/males', [TestController::class, 'getHivTestingPositiveLinkedMales']);
        Route::post('/testing/hiv/hiv+/females', [TestController::class, 'getHivTestingPositiveFemales']);
        Route::post('/testing/hiv+/linked/females', [TestController::class, 'getHivTestingPositiveLinkedFemales']);
        Route::post('/testing/hiv/modalities/testing', [TestController::class, 'getHivTestingModalitiesByTesting']);
        Route::post('/testing/hiv+/modalities/testing', [TestController::class, 'getHivTestingPositiveModalitiesByTesting']);
        Route::post('/testing/hiv/modalities/datim', [TestController::class, 'getHivTestingModalitiesByDatim']);
        Route::post('/testing/hiv+/modalities/datim', [TestController::class, 'getHivTestingPositiveModalitiesByDatim']);

        /*TB Prevention and Treatment*/
        Route::post('/tb/cascades/totals/overall', [TbController::class, 'getTbCascadesTotalsByOverall']);
        Route::post('/tb/cascades/testing-points/overall', [TbController::class, 'getTbCascadesTestingPointsByOverall']);
        Route::post('/tb/cascades/children/age', [TbController::class, 'getTbCascadesChildrenByAge']);
        Route::post('/tb/cascades/adults/age', [TbController::class, 'getTbCascadesAdultsByAge']);
        Route::post('/tb/cascades/children/gender', [TbController::class, 'getTbCascadesChildrenByGender']);
        Route::post('/tb/cascades/adults/gender', [TbController::class, 'getTbCascadesAdultsByGender']);
        Route::post('/tb/outcomes/overall', [TbController::class, 'getTbOutcomesByOverall']);
        Route::post('/tb/outcomes/age', [TbController::class, 'getTbOutcomesByAge']);
        Route::post('/tb/outcomes/gender', [TbController::class, 'getTbOutcomesByGender']);
        Route::post('/tb/prevention/children/category', [TbController::class, 'getTbPreventionChildrenByCategory']);
        Route::post('/tb/prevention/adults/category', [TbController::class, 'getTbPreventionAdultsByCategory']);
        Route::post('/tb/prevention/totals/category', [TbController::class, 'getTbPreventionTotalsByCategory']);
        Route::post('/tb/treatment/children/category', [TbController::class, 'getTbTreatmentChildrenByCategory']);
        Route::post('/tb/treatment/adults/category', [TbController::class, 'getTbTreatmentAdultsByCategory']);
        Route::post('/tb/treatment/totals/category', [TbController::class, 'getTbTreatmentTotalsByCategory']);
        Route::post('/tb/bacteriologic-diagnosis/children/category', [TbController::class, 'getTbBacteriologicDiagnosisChildrenByCategory']);
        Route::post('/tb/bacteriologic-diagnosis/adults/category', [TbController::class, 'getTbBacteriologicDiagnosisAdultsByCategory']);
        Route::post('/tb/bacteriologic-diagnosis/totals/category', [TbController::class, 'getTbBacteriologicDiagnosisTotalsByCategory']);

        /*Viral Load Testing*/
        Route::post('testing/vl/children/category', [TestController::class, 'getVlTestingChildrenByCategory']);
        Route::post('testing/vl/adolescents/category', [TestController::class, 'getVlTestingAdolescentsByCategory']);
    });
});
