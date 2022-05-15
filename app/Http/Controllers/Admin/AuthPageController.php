<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class AuthPageController extends Controller
{
    //
    public function index (){
        return view('login');
    }

    public function login(Request $request)
    {
        # code...
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        
        if (!auth()->attempt(['email'=> $data['email'], 'password' => $data['password']])) {
            # code...
            return back();
        }else {
            # code...
            return redirect(route('front.homepage'));
        }
    }
    public function logout()
    {
        # code...
        auth()->logout();
        return redirect(route('front.homepage'));
    }

    public function signUpView (){
        return view('signUp');
    }

    public function signUp(Request $request)
    {
        # code...
        $data = $request->validate([
            'name' => 'required',
            'lName' => 'required',
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        $users['users'] = user::select('email')
        ->get();
        $valid = " ";
        foreach ($users as $key => $value) {
            for ($i=0; $i < count($value); $i++) {
                echo $value[$i]['email'] .'<br>';
                if ($request->email == $value[$i]['email']) {
                    $valid = "not";
                }
            }
        }
        if ($valid == "not") {
            # code...
            setcookie('mail', 'error', time()+8);
            return back();
        }elseif (strlen($request->password) <= 6) {
            setcookie('pass', 'error', time()+8);
            return back();
        }else {
            User::create($data);
            return redirect(route('front.homepage'));
        }
    }

    public function redirect ()
    {
        # code...

        return Socialite::driver('facebook')->redirect();
    }

    public function callback ()
    {
        # code...

        return Socialite::driver('facebook')->redirect();
    }
}
