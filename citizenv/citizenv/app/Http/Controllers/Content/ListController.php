<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\A2;
use App\Models\A3;
use App\Models\B1;
use App\Models\B2;
use App\Models\Citizen;

class ListController extends Controller
{
    private function cityList() {
        $cities = new A2();
        $cities = $cities->getCityList();
        
        for ($i = 0; $i < sizeof($cities); $i++) {
            echo $cities[$i]->cityName1 . '<br>';
        }
        // return view('content.citylist', ["cities"=>$cities]);
    }

    private function getDistrictsNameList($cityID) {    
        $a3 = new A3();
        return $a3->getNameListIn($cityID);
    }

    private function getCommunesNameList($districtID) {
        $b1 = new B1();
        return $b1->getNameListIn($districtID);
    }

    private function getVillagesNameList($communeID) {
        $b2 = new B2();
        return $b2->getNameListIn($communeID);   
    }

    public function getNameList(Request $request) {
        $data = [];

        if ($request->atlevel === 'district') {
            $data = $this->getDistrictsNameList($request->cityID);
        }

        if ($request->atlevel === 'commune') {
            $data = $this->getCommunesNameList($request->districtID);
        }

        if ($request->atlevel === 'village') {
            $data = $this->getVillagesNameList($request->communeID);
        }

        return view('content.namelist', ['list'=>$data]);
    }

    public function getCitizens(Request $request) {
        $model = new Citizen();

        $results = [];

            if ($request->level === 'city' || $request->level === 'allcity') {
                // echo 'city here';
                $results = $model->getCitizensInCity($request->keyID);
            }

            else if ($request->level === 'district' || $request->level === 'alldistrict') {
                // echo 'district here';
                $results = $model->getCitizensInDistrict($request->keyID);
            }

            else if ($request->level === 'commune' || $request->level === 'allcommune') {
                $results = $model->getCitizensInCommune($request->keyID);
            }

            else if ($request->level === 'village') {
                $results = $model->getCitizensInVillage($request->keyID);
            }

            else if ($request->level === 'all') {
                $results = $model->getAllCitizens();
            }

            else {
                return;
            }

        if (sizeof($results) === 0) {
            return 0;
        }
        return view('content.searchlist', ['searchresults'=>$results]);
    }

}
