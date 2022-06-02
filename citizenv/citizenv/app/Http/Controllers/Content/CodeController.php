<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\A2;
use App\Models\A3;
use App\Models\B1;
use App\Models\B2;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function index() {
        echo 'Generate Code';
    }

    //Dung cho TK B1
    public function getCodeFromId(Request $request) {
        $request->validate(['id'=>'required']);
        $model = new B2();
        return $model->getCodeFromId($request->id);
    }

    //Kiem tra khu vuc da duoc gan ma hay chua
    public function checkExistCode(Request $request) {
        $model = $this->setUnderModel();

        $checkresult = $model->code_is_exist($request->selectedid);

        if ($checkresult) {
            echo "Khu vực bạn chọn đã được gán mã";
            return;
        }

        echo '';
    }


    //Kiem tra ma co trung lap hay khong
    public function checkvalidcode(Request $request) {
        $model = $this->setUnderModel();

        $checkresult = $model->is_validcode($request->inCode);

        if (!$checkresult) {
            echo 'Mã vừa nhập đã tồn tại. Vui lòng chọn mã khác.';
            return;
        }
        echo '';
    }

    //Luu ma vao DB
    public function saveCode(Request $request) { 
        $model = $this->setUnderModel();

        if($model->saveNewCode($request->selectedid, $request->newcode)) {
            echo "1Cập nhật thành công.";
            return;
        }

        else {
            echo "0Cập nhật không thành công. Kiểm tra lại khu vực được chon hoặc mã vừa nhập đã tồn tại";
        }
    }

    private function setUnderModel() {
        if (session('under') == 'A2') {
            return new A2();
        }
        if (session('under') == 'A3') {
            return new A3();
        }
        if (session('under') == 'B1') {
            return new B1();
        }
        if (session('under') == 'B2') {
            return new B2();
        }
    }
}
