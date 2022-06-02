<?php

namespace App\Models;

use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\This;

class A2 extends Model
{
    use HasFactory;

    protected $table = 'a2';
    protected $keyType = 'string';
    public $timestamps = false;

    public function getCityCodeFromId($id) {
        return $this::select('cityCode')
            ->where('id', $id)
            ->get()[0]->cityCode;
    }

    public static function getName($username) {
        return A2::select('cityName')->where('cityCode', $username)->get()[0]->cityName;
    }

    //Kiem tra code cần gán đã tồn tại chưa
    public function is_validcode($inCode)
    {
        $result = sizeof($this::select('id')->where('cityCode', $inCode)->get());
        if ($result != 0) {
            return false;
        }
        return true;
    }

    //Lưu mã code
    public function saveNewCode($id, $newcode) {
        if ($this->code_is_exist($id)) {
            return false;
        }

        if (!$this->is_validcode($newcode)) {
            return false;
        }

        $temp = $this::find($id);
        $temp->cityCode = $newcode;
        $temp->save();
        return true;
    }

    //Kiem tra xem khu vuc voi id duoc cho da duoc gan ma chua
    public function code_is_exist($id) {
        $result = $this::select('cityCode as cCode')->where('id', $id)->get()[0]->cCode;

        if ($result != null) {
            return true;
        }
        return false;
    }
    
    public function createusername($selectedUnitID) {
        $result = $this::select('cityCode')->where('id', $selectedUnitID)->get();
        return $result[0]->cityCode;
    }

    //Lay ra id (STT) duoc luu trong DB tuong ung voi cityCode (tuong duong id khi dang nhap)
    private function getIdFromCityCode() {
        return $this->select('id')->where('cityCode', Auth::id())->get()[0]->id;
    }

    //Lay tat ca danh sach thanh pho
    public function getNameList() {
        return $this::select('cityName AS name', 'id', 'cityCode as code')->get();
    }

    //Lay ra danh sach thanh pho chua duoc gan ma (code)
    public function getCityCodeNull() {
        return $this::select('cityName')->where('cityCode', NULL)->get();
    }

    //xac dinh moi quan he 1-n giua a2 va a3
    public function hasdistricts() {
        return $this->hasMany(A3::class, 'cityCode', 'cityCode');
    }
  
    //Lay ra cac quan/huyen truc thuoc 
    // public function getOwnDistrict() {
    //     $id = $this->getIdFromCityCode();
    //     return $this->find($id)->hasdistricts;
    // }
}
