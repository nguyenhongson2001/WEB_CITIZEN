<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\A2;
use App\Models\A3;
use App\Models\B1;
use App\Models\B2;
use App\Models\Citizen;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function index() {
        echo 'import data';
    }

    public function savePerson(Request $request) {
        $request->validate(['id'=>'unique', 'name' => 'required', 'gender'=>'required', 'villageCode'=>'required', 'dob'=>'required', 'job'=>'required', 'tongiao'=>'required', 'culturelevel'=>'required']);

        $model = new Citizen();

        $tempcitycode = '';
        $tempdistrictcode = '';
        $tempcommunecode = '';
        $tempvillagecode = '';

        if ($request->tempvillageid !== null) {
            $b2 = new B2();

            $tempcitycode = $b2->getCityCodeFromId($request->tempvillageid);
            $tempdistrictcode = $b2->getDistrictCodeFromId($request->tempvillageid);
            $tempcommunecode = $b2->getCommuneCodeFromId($request->tempvillageid);
            $tempvillagecode = $b2->getCodeFromId($request->tempvillageid);
        }

        if ($request->tempcommuneid !== null) {
            $b1 = new B1();

            $tempcitycode = $b1->getCityCodeFromId($request->tempcommuneid);
            $tempdistrictcode = $b1->getDistrictCodeFromId($request->tempcommuneid);
            $tempcommunecode = $b1->getCommuneCodeFromId($request->tempcommuneid);
        }

        if ($request->tempdistrictid !== null) {
            $a3 = new A3();

            $tempcitycode = $a3->getCityCodeFromId($request->tempdistrictid);
            $tempdistrictcode = $a3->getDistrictCodeFromId($request->tempdistrictid);
        }

        if ($request->tempcityid !== null) {
            $a2 = new A2();

            $tempcitycode = $a2->getCityCodeFromId($request->tempcityid);
        }

        //$model->saveNewCitizen($request, $tempcitycode, $tempdistrictcode, $tempcommunecode, $tempvillagecode);
        $model->name = $request->name;
        $model->ID = $request->id;
        $model->gender = $request->gender;
        $model->dateOfBirth = $request->dob;
        $model->job = $request->job;
        $model->tongiao = $request->tongiao;
        $model->cultureLevel= $request->culturelevel;
        $model->cityCode = $request->cityCode;
        $model->districtCode = $request->districtCode;
        $model->communeCode = $request->communeCode;
        $model->villageCode = $request->villageCode;
        $model->tempCityCode = $tempcitycode;
        $model->tempDistrictCode = $tempdistrictcode;
        $model->tempCommuneCode = $tempcommunecode;
        $model->tempVillageCode = $tempvillagecode;

        $model->save();

        return 'Lưu thông tin thành công';
    }
}
