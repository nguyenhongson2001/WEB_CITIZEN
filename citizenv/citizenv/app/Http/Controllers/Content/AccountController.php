<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\A2;
use App\Models\A3;
use App\Models\B1;
use App\Models\B2;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index() {
        echo 'create account';
    }

    public function createUsername(Request $request) {
        $selectedUnitID = $request->selectedUnitID;
        $model = $this->setUnderModel();
        echo $model->createusername($selectedUnitID);
    }

    public function saveAccount(Request $request) {
        //Xac dinh ma quyen dua vao do dai username
        $author = 2;
        if (strlen($request->newUsername) == 8) {
            $author = 3;
        }

        User::updateOrCreate(['id'=>$request->newUsername], 
        ['id'=>$request->newUsername, 'password'=>bcrypt($request->newPass), 'author_code'=>$author]);
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
