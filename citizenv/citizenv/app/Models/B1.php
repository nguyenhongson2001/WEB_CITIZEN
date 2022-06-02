<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class B1 extends Model
{
    use HasFactory;

    protected $table = 'b1';
    public $timestamps = false;
    protected $keyType = 'string';

    private $cityCode;
    private $districtCode;
    private $communeCode;

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

    public function getName($username) {
        $this->extractCode($username);
        return $this::select('communeName')
            ->where(['cityCode'=>$this->cityCode, 'districtCode'=>$this->districtCode, 'communeCode'=>$this->communeCode])
            ->get()[0]->communeName;
    }

    public function getFullAddress($username) {
        $this->extractCode($username);
        return $this::join('a2', ['b1.cityCode'=>'a2.cityCode'])
            ->join('a3', ['b1.cityCode'=>'a3.cityCode', 'b1.districtCode'=>'a3.districtCode'])
            ->select('b1.communeName as commune', 'a2.cityName as city', 'a3.districtName as district')
            ->where(['b1.cityCode'=>$this->cityCode, 'b1.districtCode'=>$this->districtCode, 'b1.communeCode'=>$this->communeCode])
            ->get()[0];
    }

    public function is_validcode($inCode)
    {
        $result = sizeof($this::select('id')->where('villageCode', $inCode)->get());

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
        $temp->communeCode = $newcode;
        $temp->save();
        return true;
    }

    public function code_is_exist($id) {

        $result = $this::select('communeCode as codecomunne')->where('id', $id)->get()[0]->codecomunne;
        
        if ($result != null) {
            return true;
        }
        return false;
    }

    public function createusername($selectedUnitID) {
        $citycode = $this::select('cityCode as codecity')->where('id', $selectedUnitID)->get()[0]->codecity;
        $districtcode = $this::select('districtCode as codedistrict')->where('id', $selectedUnitID)->get()[0]->codedistrict;
        $communecode = $this::select('communeCode as codecommune')->where('id', $selectedUnitID)->get()[0]->codecommune;
        return $citycode . $districtcode . $communecode;
    }

    public function getNameList() {
        $cityCode = substr(Auth::id(), 0, 2);
        $districtCode = substr(Auth::id(), 2, 2);
        return $this::select('communeName AS name', 'id', 'communeCode as code')->where(['cityCode'=>$cityCode, 'districtCode'=>$districtCode])->get();
    }

    //Lấy danh sách tên xã/tổ dân phố theo ID quận/huyện xác định
    public function getNameListIn($districtID) {
        return $this::join('a3', ['a3.districtCode'=>'b1.districtCode'])->select('b1.communeName as name', 'b1.id')->where('a3.id', $districtID)->get();
    }

    private function extractCode($code) {
        $this->cityCode = substr($code, 0, 2);
        $this->districtCode = substr($code, 2, 2);
        $this->communeCode = substr($code, 4, 2);
    }

    public function getOwn($code) {
        $this->extractCode($code);

        return $this::join('b2', ['b2.cityCode'=>'b1.cityCode', 'b2.districtCode'=>'b1.districtCode', 'b2.communeCode'=>'b1.code'])
        // ->join('a2', 'a3.cityCode', '=', 'a2.cityCode')
        ->select('b2.name')
        ->where (['b1.cityCode'=>$this->cityCode, 'b1.districtCode'=>$this->districtCode, 'b1.code'=>$this->communeCode])
        ->get();
    }
}
