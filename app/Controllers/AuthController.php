<?php

namespace App\Controllers;

use App\Models\Customer_detail_model;

class AuthController extends BaseController
{
    public function userlogin()
    {
        $data = ['title' => 'User Login'];
        if ($this->request->is('get')) {
            $customerAcId = $this->request->getCookie('customer_ac_id'); // Fetch cookie correctly

            if (!empty($customerAcId)) {
                return redirect()->to('/');
            }
            return view('auth/user-login',$data);
        }
        
    }

    public function userRegister()
    {
        $data = ['title' => 'User Register'];
        if ($this->request->is('get')) {
            return view('auth/user-register',$data);
        }else if ($this->request->is('post')) {
            // session()->destroy();
            session()->remove(['isLoggedIn','otp', 'participant_email']);
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
    public function verify(){
        $data = ['title' => 'Verify'];
        
        // Check if it is a GET request
        if ($this->request->is('get')) {
            return view('auth/verify', $data);
        }

        // Handle POST request for OTP verification
        if ($this->request->is('post')) {
            $otpInput = $this->request->getPost('verify_otp');
            $otpSession = session()->get('otp');
            $email = session()->get('participant_email');
            
            // Validate OTP
            if ($otpInput == $otpSession) {
                // Check if the user already exists in the database
                $customerDetailModel = new Customer_detail_model();
                $user = $customerDetailModel->where('email', $email)->first();

                if (!$user) {
                    // Generate new User ID and save user
                    $newUserId = $customerDetailModel->generateUserId();
                    $customerDetailModel->save(['user_id' => $newUserId, 'email' => $email]);

                    // Set session data
                    session()->set([
                        'isLoggedIn' => true,
                        'customer_email' => $email,
                        'customer_ac_id' => $newUserId
                    ]);

                    // Set cookies for 7 days (604800 seconds)
                    $response = service('response');
                    $response->setCookie('isLoggedIn', '1', 604800);
                    $response->setCookie('user_email', $email, 604800);
                    $response->setCookie('customer_ac_id', (string) $newUserId, 604800);

                    return redirect()->to('/')->with('loginsuccess', 'Login Successful');
                } else {
                    // If user already exists, reset session and cookies
                    session()->remove(['isLoggedIn', 'otp', 'participant_email']);

                    $response = service('response');
                    $response->setCookie('isLoggedIn', '', time() - 3600); // Expire cookies
                    $response->setCookie('user_email', '', time() - 3600);
                    $response->setCookie('customer_ac_id', '', time() - 3600);

                    return redirect()->to('user-register')->with('status', '<div class="alert alert-danger" role="alert">Account Already Exists...!</div>');
                }
            } else {
                return redirect()->to('verify')->with('status', '<div class="alert alert-danger" role="alert">Invalid OTP</div>');
            }
        }
    }

    public function user_kyc(){
        if ($this->request->is('get')) {
            return view('auth/user-kyc');
        }else if ($this->request->is('post')) {
            echo "ok";
        }
    }


    public function logout(){
        $session = session();
        session_unset();
        session_destroy();
        return redirect()->to(base_url('/'));
    }
}
