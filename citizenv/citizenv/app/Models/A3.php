<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\B1;
use Illuminate\Support\Facades\Auth;

class A3 extends Model
{
    use HasFactory;

    private $cityCode;
    private $districtCode;

    protected $table = 'a3';
    public $timestamps = false;
    protected $keyType = 'string';

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

    public function getName($username) {
        $this->extractCode($username);
        return $this::select('districtName')
            ->where(['cityCode'=>$this->cityCode, 'districtCode'=>$this->districtCode])
            ->get()[0]->districtName;
    }

    public function getFullAddess($username) {
        $this->extractCode($username);
        return $this::join('a2', ['a3.cityCode'=>'a2.cityCode'])
            ->select('a2.cityName as city', 'a3.districtName as district')
            ->where(['a3.cityCode'=>$this->cityCode, 'a3.districtCode'=>$this->districtCode])
            ->get()[0];
    }

    public function is_validcode($inCode)
    {
        $result = sizeof($this::select('id')->where('districtCode', $inCode)->get());

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
        $temp->districtCode = $newcode;
        $temp->save();
        return true;
    }

    public function code_is_exist($id) {
        $result = $this::select('districtCode as dCode')->where('id', $id)->get()[0]->dCode;;

        if ($result != null) {
            return true;
        }
        return false;
    }

    public function createusername($selectedUnitID) {
        $citycode = $this::select('cityCode AS city')->where('id', $selectedUnitID)->get()[0]->city;
        
        $districtcode = $this::select('districtCode AS district')->where('id', $selectedUnitID)->get()[0]->district;
        echo $citycode . $districtcode;
    }

    //Lấy danh sách tên quận/huyện theo mã thành phố của người đăng nhập
    public function getNameList() {
        $cityCode = substr(Auth::id(), 0, 2);
        return $this::select('districtName AS name', 'id', 'districtCode as code')->where('cityCode', $cityCode)->get();
    }

    //Lấy danh sách tên quận/huyện theo mã thành phố xác định
    public function getNameListIn($cityID) {
        return $this::join('a2', ['a2.cityCode'=>'a3.cityCode'])->select('a3.districtName as name', 'a3.id')->where('a2.id', $cityID)->get();
    }

    private function extractCode($code) {
        $this->cityCode = substr($code, 0, 2);
        $this->districtCode = substr($code, 2, 2);
    }

    public function getOwn($code) {
        $this->extractCode($code);

        return $this::join('b1', ['b1.cityCode'=>'a3.cityCode', 'b1.districtCode'=>'a3.districtCode'])
        // ->join('a2', 'a3.cityCode', '=', 'a2.cityCode')
        ->select('b1.name')
        ->where (['a3.cityCode'=>$this->cityCode, 'a3.districtCode'=>$this->districtCode])
        ->get();
    }

    
}
