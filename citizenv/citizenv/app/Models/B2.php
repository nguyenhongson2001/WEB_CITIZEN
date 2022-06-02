<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class B2 extends Model
{
    use HasFactory;

    protected $table = 'b2';
    public $timestamps = false;
    protected $keyType = 'string';

    private $cityCode;
    private $districtCode;
    private $communeCode;
    private $villageCode;

    public function getCityCodeFromId($id) {
        return $this::select('cityCode')
            ->where('id', $id)
            ->get()[0]->cityCode;
    }

    public function getDistrictCodeFromId($id) {
        return $this::select('districtCode')
            ->where('id', $id)
            ->get()[0]->districtCode;
    }

    public function getCommuneCodeFromId($id) {
        return $this::select('communeCode')
            ->where('id', $id)
            ->get()[0]->communeCode;
    }

    public function getCodeFromId($id) {
        return $this::select('villageCode')
            ->where('id', $id)
            ->get()[0]->villageCode;
    }

    public function getName($username) {
        $this->extractCode($username);
        return $this::select('villageName')
            ->where(['cityCode'=>$this->cityCode, 'districtCode'=>$this->districtCode,
             'communeCode'=>$this->communeCode, 'villageCode'=>$this->villageCode])
            ->get()[0]->villageName;
    }

    public function getFullAddress($username) {
        $this->extractCode($username);
        return $this::join('a2', ['b2.cityCode'=>'a2.cityCode'])
            ->join('a3', ['b2.cityCode'=>'a3.cityCode', 'b2.districtCode'=>'a3.districtCode'])
            ->join('b1', ['b2.cityCode'=>'b1.cityCode', 'b2.districtCode'=>'b1.districtCode', 'b2.communeCode'=>'b1.communeCode'])
            ->select('b2.villageName AS village', 'b1.communeName as commune', 'a2.cityName as city', 'a3.districtName as district')
            ->where(['b2.cityCode'=>$this->cityCode, 'b2.districtCode'=>$this->districtCode, 'b2.communeCode'=>$this->communeCode, 'b2.villageCode'=>$this->villageCode])
            ->get()[0];
    }

    public function is_validcode($inCode)
    {
        $result = sizeof($this::select('id')->where('communeCode', $inCode)->get());

        if ($result != 0) {
            return false;
        }
        return true;
    }

    public function saveNewCode($id, $newcode) {
        if ($this->code_is_exist($id)) {
            return false;
        }

        if ($this->is_validcode($newcode)) {
            return false;
        }
        $temp = $this::find($id);
        $temp->villageCode = $newcode;
        $temp->save();
        return true;
    }

    public function code_is_exist($id) {

        $result = $this::select('villageCode as vCode')->where('id', $id)->get()[0]->vCode;;

        if ($result != null) {
            return true;
        }
        return false;
    }

    private function extractCode($code) {
        $this->cityCode = substr($code, 0, 2);
        $this->districtCode = substr($code, 2, 2);
        $this->communeCode = substr($code, 4, 2);
        $this->villageCode = substr($code, 6, 2);
    }

    public function createusername($selectedUnitID) {
        $citycode = $this::select('cityCode as codecity')->where('id', $selectedUnitID)->get()[0]->codecity;
        $districtcode = $this::select('districtCode as codedistrict')->where('id', $selectedUnitID)->get()[0]->codedistrict;
        $communecode = $this::select('communeCode as codecommune')->where('id', $selectedUnitID)->get()[0]->codecommune;
        $villagecode = $this::select('villageCode as villagecode')->where('id', $selectedUnitID)->get()[0]->villagecode;
        return $citycode . $districtcode . $communecode . $villagecode;
    }

    public function getNameList() {
        $cityCode = substr(Auth::id(), 0, 2);
        $districtCode = substr(Auth::id(), 2, 2);
        $communeCode = substr(Auth::id(), 4, 2);
        return $this::select('villageName AS name', 'id', 'villageCode as code')->where(['cityCode'=>$cityCode, 'districtCode'=>$districtCode, 'communeCode'=>$communeCode])->get();
    }

    //Lấy danh sách tên thôn/làng theo id xã xác định
    public function getNameListIn($communeID) {
        return $this::join('b1', ['b1.communeCode'=>'b2.communeCode'])->select('b2.villageName as name', 'b2.id')->where('b1.id', $communeID)->get();
    }
}
