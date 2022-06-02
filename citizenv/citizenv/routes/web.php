<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;
use \App\Http\Controllers\Content\HomeController;
use \App\Http\Controllers\Admin\Users\LogoutController;
use \App\Http\Controllers\Content\ListController;
use \App\Http\Controllers\Content\AnalysisController;
use \App\Http\Controllers\Content\PersonController;
use \App\Http\Controllers\Content\CodeController;
use \App\Http\Controllers\Content\AccountController;
use \App\Http\Controllers\Content\PasswordController;
use \App\Http\Controllers\Content\ImportController;
use App\Models\A2;
use App\Models\A3;
use App\Models\B1;
use App\Models\B2;
use App\Models\Citizen;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'store']);
Route::get('/login', [LoginController::class, 'store']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function () {
    // Route::get('/', [HomeController::class, 'index']);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/analysis', [AnalysisController::class, 'index']);

    Route::get('/persondetail', [PersonController::class, 'getPersondetail']);

    Route::post('/createaccount/username', [AccountController::class, 'createUsername']);
    Route::post('/saveaccount', [AccountController::class, 'saveAccount']);
    Route::post('/savecode', [CodeController::class, 'saveCode']);
    Route::post('/saveperson', [ImportController::class, 'savePerson']);
    Route::post('/B2/getcodefromid', [CodeController::class, 'getCodeFromId']);

    Route::get('/citizensList', [ListController::class, 'peopleList']);
    Route::get('/getlistname', [ListController::class, 'getNameList']);
    Route::get('/searchlist', [ListController::class, 'getCitizens']);
    Route::get('/generateCode', [CodeController::class, 'index']);
    Route::get('/checkexist', [CodeController::class, 'checkExistCode']);
    Route::get('/checkvalidcode', [CodeController::class, 'checkvalidcode']);
    Route::get('/create', [AccountController::class, 'index']);
    Route::get('/changepassword', [PasswordController::class, 'index']);
    Route::get('/import', [ImportController::class, 'index']);
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});


//test
Route::get('/a2', function () {
    $tempvillageid = '1';
    $tempcommuneid = '1';
    $tempdistrictid = '1';
    $tempcityid = '1';

    
    // $model = new Citizen();

    // $tempcitycode = '';
    // $tempdistrictcode = '';
    // $tempcommunecode = '';
    // $tempvillagecode = '';

    // if ($tempvillageid !== '') {
        $b2 = new B2();

        $tempcitycode = $b2->getCityCodeFromId($tempvillageid);
        $tempdistrictcode = $b2->getDistrictCodeFromId($tempvillageid);
        $tempcommunecode = $b2->getCommuneCodeFromId($tempvillageid);
        $tempvillagecode = $b2->getCodeFromId($tempvillageid);

        echo $tempcitycode;
    // }

    // else if ($tempcommuneid !== '') {
    //     $b1 = new B1();

    //     $tempcitycode = $b1->getCityCodeFromId($tempcommuneid);
    //     $tempdistrictcode = $b1->getDistrictCodeFromId($tempcommuneid);
    //     $tempcommunecode = $b1->getCommuneCodeFromId($tempcommuneid);
    // }

    

    // else if ($tempdistrictid !== '') {
    //     $a3 = new A3();

    //     $tempcitycode = $a3->getCityCodeFromId($tempdistrictid);
    //     $tempdistrictcode = $a3->getDistrictCodeFromId($tempdistrictid);
    // }

    // else if ($tempcityid !== '') {
    //     $a2 = new A2();

    //     $tempcitycode = $a2->getCityCodeFromId($tempcityid);
    // }

    // $name = 'abc';
    // $id = '1236';
    // $dob = '2012-02-02';
    // $gender = 'Nữ';
    // $job = 'sinh viên';
    // $tongiao = 'không';
    // $culturelevel = 'đại học';
    // $cityCode = '01';
    // $districtCode = '02';
    // $communeCode = '02';
    // $villageCode = '01';

    // //$model->saveNewCitizen($$tempcitycode, $tempdistrictcode, $tempcommunecode, $tempvillagecode);
    // $model->name = $name;
    // $model->ID = $id;
    // $model->gender = $gender;
    // $model->dateOfBirth = $dob;
    // $model->job = $job;
    // $model->tongiao = $tongiao;
    // $model->cultureLevel= $culturelevel;
    // $model->cityCode = $cityCode;
    // $model->districtCode = $districtCode;
    // $model->communeCode = $communeCode;
    // $model->villageCode = $villageCode;
    // $model->tempCityCode = $tempcitycode;
    // $model->tempDistrictCode = $tempdistrictcode;
    // $model->tempCommuneCode = $tempcommunecode;
    // $model->tempVillageCode = $tempvillagecode;

    // $model->save();
    
    // Citizen::updateOrCreate(['ID'=>$id], 
    //     ['ID'=>$id, 'job'=>$job, 'name'=>$name, 'gender'=>$gender, 'dateOfBirth'=>$dob, 'tongiao'=>$tongiao, 'culturelevel'=>$culturelevel, 
    //     'cityCode'=>$cityCode, 'districtCode'=>$districtCode, 'communeCode'=>$communeCode, 'villageCode'=>$villageCode,
    //     'tempCityCode'=>$tempcitycode, 'tempDistrictCode'=>$tempdistrictcode, 'tempCommuneCode'=>$tempcommunecode, 'tempVillageCode'=>$tempvillagecode]);
    // echo Citizen::find(3);
});


