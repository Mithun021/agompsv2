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
            $emailAddress = $this->request->getPost('email_address'); // Store the user's email correctly
            // Generate OTP
            $otp = rand(100000, 999999); // Ensure OTP is 6 digits
            session()->set('otp', $otp);
            session()->set('participant_email', $emailAddress);

            $emailService = \Config\Services::email(); // Change variable name to avoid conflict

            // Set SMTP configuration (if not configured globally)
            $emailService->setFrom('contact@agomps.com', 'Agomps');
            $emailService->setTo($emailAddress);
            $emailService->setSubject('Your OTP Code');
            $emailTemplate = view('email_template/otp', ['otp' => $otp]);
            $emailService->setMessage($emailTemplate);
            $emailService->setMailType('html');

            if ($emailService->send()) {
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
