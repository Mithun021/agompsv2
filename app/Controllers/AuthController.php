<?php

namespace App\Controllers;

use App\Models\Customer_detail_model;

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
            session()->remove(['otp', 'participant_email']);
            // session()->start();
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
                return redirect()->to('verify')->with('status', '<div class="alert alert-success" role="alert">OTP sent to your email.</div>');
            } else {
                return redirect()->to('signup')->with('status', '<div class="alert alert-warning" role="alert">Failed to send OTP.</div>');
            }
        }
    }
    public function verify()
    {
        $data = ['title' => 'Verify'];
        if ($this->request->is('get')) {
            return view('auth/verify',$data);
        }else if ($this->request->is('post')) {
            $otpInput = $this->request->getPost('verify_otp');
            $otpSession = session()->get('otp');
            $email = session()->get('participant_email');
            if ($otpInput == $otpSession) {
                $customer_detail_model = new Customer_detail_model();
                $user = $customer_detail_model->where('email', $email)->first();
                if (!$user) {
                    $newUserId = $customer_detail_model->generateUserId();
                    $customer_detail_model->save(['user_id' => $newUserId,'email' => $email]);
                    // Set Session & Cookies
                    session()->set(['isLoggedIn' => true, 'customer_email' => $email]);
                    $response = service('response');
                    $response->setCookie('user_email', $email, 86400); // 1-day cookie
                    return redirect()->to('/')->with('loginsuccess', 'Login Successful');
                }else{
                    return redirect()->to('user-register')->with('status', '<div class="alert alert-danger" role="alert">Account Already Exist...!</div>');
                }
            }else{
                return redirect()->to('verify')->with('status', '<div class="alert alert-danger" role="alert">Invalid OTP</div>');
            }
        }
    }
}
