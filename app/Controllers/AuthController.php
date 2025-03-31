<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function userlogin()
    {
        $data = ['title' => 'User Login'];
        if ($this->request->is('get')) {
            return view('auth/user-login',$data);
        }
        
    }

    public function userRegister()
    {
        $data = ['title' => 'User Register'];
        if ($this->request->is('get')) {
            return view('auth/user-register',$data);
        }else if ($this->request->is('post')) {
            echo $email = $this->request->getPost('email_address');
        }
    }
    public function verify()
    {
        $data = ['title' => 'Verify'];
        return view('auth/verify',$data);
    }
}
