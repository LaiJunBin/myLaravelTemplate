<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\RegisterUser;
use Hash;
Use App\Jobs\SendSignUpMailJob;

class UserController extends Controller
{
    public function index(){
        $binding = [
            'navMenu' => [
                ['url'=>'user/sign-in','title'=>'登入'],
                ['url'=>'user/sign-up','title'=>'註冊']
            ],
            'breadcrumb' =>[
                'MyHome'
            ]
        ];
        return view('user.index',$binding);
    }
    public function signUp(){
        $binding = [
            'navMenu' => [
                ['url'=>'user/sign-in','title'=>'登入'],
                ['url'=>'user/sign-up','title'=>'註冊']
            ],
            'breadcrumb' =>[
                ['url'=>'user','title'=>'MyHome'],
                '註冊'
            ]
        ];
        return view('user.signUp',$binding);
    }
    public function signUpProcess(){
        $input = request()->all();
        
        $rules = [
            'name'=>[
                'required',
                'max:10',
            ],
            'email'=>[
                'required',
                'max:150',
                'email'
            ],
            'password'=>[
                'required',
                'min:6',
                'max:191',
                'same:password_confirmation',
            ],
            'password_confirmation'=>[
                'required',
                'min:6',
                'max:191'
            ],
        ];
        
        $validator = Validator::make($input,$rules);

        if($validator->fails()){
            return redirect('/user/sign-up')->withErrors($validator)->withInput();
        }
        $input['password'] = Hash::make($input['password']);
        $input['verification'] = str_random(60);
        RegisterUser::create($input);

        $mail_binding = [
            'name' => $input['name'],
            'email' => $input['email'],
            'url' => url('user/verification/'.$input['name']."/".$input['verification'])
        ];

        SendSignUpMailJob::dispatch($mail_binding);

        return redirect('user')->with('signUp','ok');
    }

    public function signIn(){
        return 123;
    }
}