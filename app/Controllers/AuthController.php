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
            $email = $this->request->getPost('email_address');
            // Generate OTP
            $otp = rand(0,999999);
            session()->set('otp', $otp);
            session()->set('participant_email', $email);

            $email = \Config\Services::email();

            // Set SMTP configuration (if not configured globally)
            $email->setFrom('contact@agomps.com', 'Agomps');
            $email->setTo($email);
            $email->setSubject('Your OTP Code');
            $emailTemplate = view('email_template/otp', [
                'otp' => $otp
            ]);
            $email->setMessage($emailTemplate);
            $email->setMailType('html');
            if ($email->send()) {
                return redirect()->to('verify')->with('message', 'OTP sent to your email.');
            } else {
                return redirect()->to('signup')->with('error', 'Failed to send OTP.');
            }
        }
    }
    public function verify()
    {
        $data = ['title' => 'Verify'];
        return view('auth/verify',$data);
    }
}
