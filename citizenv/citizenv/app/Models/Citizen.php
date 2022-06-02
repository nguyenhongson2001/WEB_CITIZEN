<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Citizen extends Model
{
    use HasFactory;

    protected $table = 'citizen';
    public $timestamps = false;

    protected $fillable = [
            'name' ,
            'ID',
            'gender',
            'dateOfBirth',
            'job',
            'tongiao',
            'cultureLevel',
            'cityCode',
            'districtCode',
            'communeCode',
            'villageCode',
            'tempCityCode', 
            'tempDistrictCode',
            'tempCommuneCode', 
            'tempVillageCode'
    ];

    public function getCitizensInVillage($villageID = "") {
        if ($villageID !== "") {
            return $this->join('b2', ['b2.cityCode'=>'citizen.cityCode', 
                                    'b2.districtCode'=>'citizen.districtCode',
                                    'b2.communeCode'=>'citizen.communeCode',
                                    'b2.villageCode'=>'citizen.villageCode'])
                        ->select('citizen.STT as stt', 'citizen.name as name', 'citizen.dateOfBirth as dob', 'citizen.gender as gender', 'citizen.job as job')
                        ->where('b2.id', $villageID)->get();
        }
    }

    public function getCitizensInCommune($communeID = "") {
        if ($communeID !== "") {
            return $this->join('b1', ['b1.cityCode'=>'citizen.cityCode', 
                                    'b1.districtCode'=>'citizen.districtCode',
                                    'b1.communeCode'=>'citizen.communeCode'])
                        ->select('citizen.STT as stt', 'citizen.name as name', 'citizen.dateOfBirth as dob', 'citizen.gender as gender', 'citizen.job as job')
                        ->where('b1.id', $communeID)->get();
        }

        else {
            $cityCode = substr(Auth::id(), 0, 2);
            $districtCode = substr(Auth::id(), 2, 2);
            $communeCode = substr(Auth::id(), 4, 2);

            return $this->select('citizen.STT as stt', 'citizen.name as name', 'citizen.dateOfBirth as dob', 'citizen.gender as gender', 'citizen.job as job')
                        ->where(['cityCode'=>$cityCode,
                        'districtCode'=>$districtCode,
                        'communeCode'=>$communeCode])->get();
        }
    }

    public function getCitizensInDistrict($districtID = "") {
        if ($districtID !== "") {
            return $this->join('a3', ['a3.cityCode'=>'citizen.cityCode', 
                                    'a3.districtCode'=>'citizen.districtCode'])
                        ->select('citizen.STT as stt', 'citizen.name as name', 'citizen.dateOfBirth as dob', 'citizen.gender as gender', 'citizen.job as job')
                        ->where('a3.id', $districtID)->get();
        }

        else {
            $cityCode = substr(Auth::id(), 0, 2);
            $districtCode = substr(Auth::id(), 2, 2);

            return $this->select('citizen.STT as stt', 'citizen.name as name', 'citizen.dateOfBirth as dob', 'citizen.gender as gender', 'citizen.job as job')
                        ->where(['cityCode'=>$cityCode,
                        'districtCode'=>$districtCode])->get();
        }
    }

    public function getCitizensInCity($cityID = "") {
        if ($cityID !== "") {
            return $this->join('a2', ['a2.cityCode'=>'citizen.cityCode'])
                        ->select('citizen.STT as stt', 'citizen.name as name', 'citizen.dateOfBirth as dob', 'citizen.gender as gender', 'citizen.job as job')
                        ->where('a2.id', $cityID)->get();
        }

        else {
            $cityCode = substr(Auth::id(), 0, 2);

            return $this->select('citizen.STT as stt', 'citizen.name as name', 'citizen.dateOfBirth as dob', 'citizen.gender as gender', 'citizen.job as job')
                        ->where(['cityCode'=>$cityCode])->get();
        }
    }

    public function getAllCitizens() {
        return $this->select('citizen.STT as stt', 'citizen.name as name', 'citizen.dateOfBirth as dob', 'citizen.gender as gender', 'citizen.job as job')->get();
    }

    public function getPersonDetail($stt) {
        $result = Citizen::leftJoin('b2', ['b2.villageCode'=>'citizen.villageCode', 'b2.communeCode'=>'citizen.communeCode', 'b2.districtCode'=>'citizen.districtCode', 'b2.cityCode'=>'citizen.cityCode'])
        ->leftJoin('b1', ['b1.communeCode'=>'citizen.communeCode', 'b1.districtCode'=>'citizen.districtCode', 'b1.cityCode'=>'citizen.cityCode'])
        ->leftJoin('a3', ['a3.districtCode'=>'citizen.districtCode', 'a3.cityCode'=>'citizen.cityCode'])
        ->leftJoin('a2', ['a2.cityCode'=>'citizen.cityCode'])
        ->select('citizen.name as name', 'citizen.gender as gender', 'citizen.dateOfBirth as dob', 'citizen.ID as id', 'citizen.tongiao as tongiao', 'citizen.cultureLevel as culturelevel', 'citizen.job as job', 'b2.villageName as village', 'b1.communeName as commune', 'a3.districtName as district', 'a2.cityName as city')
        ->where('citizen.STT', $stt)
        ->get()[0];

        $temp = Citizen::leftJoin('b2', ['b2.villageCode'=>'citizen.tempVillageCode', 'b2.communeCode'=>'citizen.tempCommuneCode', 'b2.districtCode'=>'citizen.tempDistrictCode', 'b2.cityCode'=>'citizen.tempCityCode'])
        ->leftJoin('b1', ['b1.communeCode'=>'citizen.tempCommuneCode', 'b1.districtCode'=>'citizen.tempDistrictCode', 'b1.cityCode'=>'citizen.tempCityCode'])
        ->leftJoin('a3', ['a3.districtCode'=>'citizen.tempDistrictCode', 'a3.cityCode'=>'citizen.tempCityCode'])
        ->leftJoin('a2', ['a2.cityCode'=>'citizen.tempCityCode'])
        ->select('b2.villageName as tempvillage', 'b1.communeName as tempcommune', 'a3.districtName as tempdistrict', 'a2.cityName as tempcity')
        ->where('citizen.STT', $stt)
        ->get()[0];

        $result->setAttribute('tempvillage', $temp->tempvillage);
        $result->setAttribute('tempcommune', $temp->tempcommune);
        $result->setAttribute('tempdistrict', $temp->tempdistrict);
        $result->setAttribute('tempcity', $temp->tempcity);
        
        return $result;
    }

    // public function saveNewCitizen($request, $tempcitycode, $tempdistrictcode, $tempcommunecode, $tempvillagecode) {

    //     // $this::create([
    //         $this->name = $request->name;
    //         'ID'=> $request->id,
    //         'gender'=>$request->gender,
    //         'dateOfBirth'=>$request->dob,
    //         'job'=>$request->job,
    //         'tongiao'=>$request->tongiao,
    //         'cultureLevel'=>$request->culturelevel,
    //         'cityCode'=>$request->cityCode,
    //         'districtCode'=>$request->districtCode,
    //         'communeCode'=>$request->communeCode,
    //         'villageCode'=>$request->villageCode,
    //         'tempCityCode'=>$tempcitycode, 
    //         'tempDistrictCode'=>$tempdistrictcode,
    //         'tempCommuneCode'=>$tempcommunecode, 
    //         'tempVillageCode'=>$tempvillagecode
    //     //]);
    // }

    // public function getNumberPeople($cityCode = '', $districtCode = '' , $communeCode = '', $villageCode = '') {
    //     if ($cityCode != '') {
    //         if ($districtCode != '') {
    //             if ($communeCode != '') {
    //                 if ($villageCode != '') {
    //                     return $this::select('id')
    //                     ->where(['cityCode'=>$cityCode, 'districtCode'=>$districtCode, 'communeCode'=>$communeCode, 'villageCode'=>$villageCode])->count();
    //                 }
    //             }
    //         }
    //     }
    // }

    // public function getNumberPeopleCity() {
    //     echo $this::select('ID')
    //     ->where('cityCode', '01')->count();
    // }
}
