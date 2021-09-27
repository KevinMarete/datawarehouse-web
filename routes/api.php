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
        Route::post('/pmtct/cascades/10-14/category', [PmtctController::class, 'getPmtctCascades10to14ByCategory']);
        Route::post('/pmtct/cascades/15-19/category', [PmtctController::class, 'getPmtctCascades15to19ByCategory']);
        Route::post('/pmtct/cascades/20-24/category', [PmtctController::class, 'getPmtctCascades20to24ByCategory']);
        Route::post('/pmtct/cascades/15-24/category', [PmtctController::class, 'getPmtctCascades15to24ByCategory']);
        Route::post('/pmtct/cascades/over25/category', [PmtctController::class, 'getPmtctCascadesOver25ByCategory']);
        Route::post('/pmtct/cascades/totals/category', [PmtctController::class, 'getPmtctCascadesTotalsByCategory']);
        Route::post('/pmtct/cascades/by12months/category', [PmtctController::class, 'getPmtctCascades12MonthsByCategory']);
        Route::post('/pmtct/cascades/atSample/category', [PmtctController::class, 'getPmtctCascadesAtSampleByCategory']);
        Route::post('/pmtct/hca/12months/category', [PmtctController::class, 'getPmtctHca12MonthsByCategory']);
        Route::post('/pmtct/hca/24months/category', [PmtctController::class, 'getPmtctHca24MonthsByCategory']);
        Route::post('/pmtct/hca/dead/category', [PmtctController::class, 'getPmtctHcaDeadByCategory']);

        /*Screening and Testing*/
        Route::post('/patient/tested/positive/gender', [PatientController::class, 'getTestedPostivePatientTotalsByGender']);
        Route::post('/patient/tested/positive/agegroup-gender', [PatientController::class, 'getTestedPostivePatientTotalsByAgeGroupGender']);

        Route::post('/testing/hiv/children/category', [TestController::class, 'getHivTestingChildrenByCategory']);
        Route::post('/testing/hiv/adolescents/category', [TestController::class, 'getHivTestingAdolescentsByCategory']);
        Route::post('/testing/hiv/youths/category', [TestController::class, 'getHivTestingYouthsByCategory']);
        Route::post('/testing/hiv/adults/category', [TestController::class, 'getHivTestingAdultsByCategory']);
        Route::post('/testing/hiv/totals/category', [TestController::class, 'getHivTestingTotalsByCategory']);
        Route::post('/testing/hiv/overall/category', [TestController::class, 'getHivTestingOverallByCategory']);
        Route::post('/testing/hiv+/overall/category', [TestController::class, 'getHivTestingPositiveOverallByCategory']);
        Route::post('/testing/hiv/totals/agegrouplarge', [TestController::class, 'getHivTestingTotalsByAgeGroupLarge']);
        Route::post('/testing/hiv+/totals/agegrouplarge', [TestController::class, 'getHivTestingPositiveTotalsByAgeGroupLarge']);
        Route::post('/testing/linked/totals/agegrouplarge', [TestController::class, 'getHivTestingPositiveLinkedTotalsByAgeGroupLarge']);
        Route::post('/testing/hiv/males/agegrouplarge', [TestController::class, 'getHivTestingMalesByAgeGroupLarge']);
        Route::post('/testing/hiv+/males/agegrouplarge', [TestController::class, 'getHivTestingPositiveMalesByAgeGroupLarge']);
        Route::post('/testing/linked/males/agegrouplarge', [TestController::class, 'getHivTestingPositiveLinkedMalesByAgeGroupLarge']);
        Route::post('/testing/hiv/females/agegrouplarge', [TestController::class, 'getHivTestingFemalesByAgeGroupLarge']);
        Route::post('/testing/hiv+/females/agegrouplarge', [TestController::class, 'getHivTestingPositiveFemalesByAgeGroupLarge']);
        Route::post('/testing/linked/females/agegrouplarge', [TestController::class, 'getHivTestingPositiveLinkedFemalesByAgeGroupLarge']);
        Route::post('/testing/hiv/modalities/testing/category', [TestController::class, 'getHivTestingModalitiesByCategory']);
        Route::post('/testing/hiv+/modalities/testing/category', [TestController::class, 'getHivTestingPositiveModalitiesByCategory']);
        Route::post('/testing/hiv/modalities/datim/category', [TestController::class, 'getHivTestingDatimModalitiesByCategory']);
        Route::post('/testing/hiv+/modalities/datim/category', [TestController::class, 'getHivTestingPositiveDatimModalitiesByCategory']);


        /*TB Prevention and Treatment*/
        Route::post('/tb/cascades/totals/category', [TbController::class, 'getTbCascadesTotalsByCategory']);
        Route::post('/tb/cascades/testing-points/category', [TbController::class, 'getTbCascadesTestingPointsByCategory']);
        Route::post('/tb/cascades/children/category', [TbController::class, 'getTbCascadesChildrenByCategory']);
        Route::post('/tb/cascades/adults/category', [TbController::class, 'getTbCascadesAdultsByCategory']);
        Route::post('/tb/cascades/females/category', [TbController::class, 'getTbCascadesFemalesByCategory']);
        Route::post('/tb/cascades/males/category', [TbController::class, 'getTbCascadesMalesByCategory']);
        Route::post('/tb/outcomes/totals/category', [TbController::class, 'getTbTotalsOutcomesByCategory']);
        Route::post('/tb/outcomes/children/category', [TbController::class, 'getTbChildrenOutcomesByCategory']);
        Route::post('/tb/outcomes/adults/category', [TbController::class, 'getTbAdultsOutcomesByCategory']);
        Route::post('/tb/outcomes/females/category', [TbController::class, 'getTbFemalesOutcomesByCategory']);
        Route::post('/tb/outcomes/males/category', [TbController::class, 'getTbMalesOutcomesByCategory']);
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

        /*Program Management*/
        Route::post('program/cost/sub-county/category', [ProgramController::class, 'getProgramCostSubCountyByCategory']);
        Route::post('program/cost/program-area/category', [ProgramController::class, 'getProgramCostProgramAreaByCategory']);
        Route::post('program/cost/funding-stream/category', [ProgramController::class, 'getProgramCostFundingStreamByCategory']);
        Route::post('program/cost/expenditure-analysis/category', [ProgramController::class, 'getProgramCostExpenditureAnalysisByCategory']);
    });
});
