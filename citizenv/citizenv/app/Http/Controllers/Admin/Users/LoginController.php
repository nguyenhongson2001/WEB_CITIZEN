<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\A2;
use App\Models\A3;
use App\Models\B1;
use App\Models\B2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return redirect()->back();
        }
        return view('users.login');
    }

    public function id() {
        return 'id';
    }

    public function store(Request $request) {
        
        $request->validate(['username' => 'required', 'password'=>'required']);

        if (Auth::attempt(['id'=>$request->username, 'password'=>$request->password])) {
            session(['userType' => $this->getTypeUser($request->username)]);
            $a2 = new A2();
            session(['allcity'=>$a2->getNameList()]);
            return redirect()->route('home');
        }
        else {
            return redirect()->back();
        }
    }

    public function getname() {
        echo session('name');
    }

    private function getTypeUser($username) {

        if (strlen($username) == 2) {
            $model = new A2();
            $name = 'Chi cục dân số Sở Y tế '. $model->getName($username);
            session(['under'=>'A3']);
            session(['name'=>$name]);
            return 'A2';
        }

        if (strlen($username) == 4) {
            $model = new A3();
            $name = 'Phòng Y tế ' . $model->getName($username);
            session(['under'=>'B1']);
            session(['name'=>$name]);
            return 'A3';
        }

        if (strlen($username) == 6) {
            $model = new B1();
            $name = 'Trạm Y tế ' . $model->getName($username);
            session(['under'=>'B2']);
            session(['name'=>$name]);
            session(['fulladdress'=>$model->getFullAddress($username)]);
            return 'B1';
        }

        if (strlen($username) == 8) {
            $model = new B2();
            $name = $model->getName($username);
            session(['name'=>$name]);
            session(['fulladdress'=>$model->getFullAddress($username)]);
            return 'B2';
        }

        session(['under'=>'A2']);
        session(['name'=>'Tổng cục Dân số Bộ Y tế']);
        return 'A1';
    }
}
