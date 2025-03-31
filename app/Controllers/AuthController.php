<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function userlogin()
    {
        $data = ['title' => 'User Login'];
        return view('auth/user-login',$data);
    }

    public function userRegister()
    {
        $data = ['title' => 'User Register'];
        return view('auth/user-register',$data);
    }
}
