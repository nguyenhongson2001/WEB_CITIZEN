<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\A2;
use App\Models\A3;
use App\Models\B1;
use App\Models\B2;

class HomeController extends Controller
{
    public function index() {   
        $model = $this->setUnderModel();
        $underlist = $model->getNameList();
        return view('content.home', ["underList"=>$underlist, 'name'=>session('name')]);
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
