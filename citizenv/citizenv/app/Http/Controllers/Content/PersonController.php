<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\Citizen;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index() {
        echo "this is personal infor";
    }

    public function getPersondetail(Request $request) {
        $model = new Citizen();
        $detail = $model->getPersonDetail($request->STT);
        return view('content.persondetail', ['detail'=>$detail]);
    }
}
