<?php
namespace App\Controllers;

use Google_Client;
use Google_Service_Oauth2;
use App\Models\CustomerModel;
use CodeIgniter\Controller;

class GoogleAuth extends Controller
{
    public function login()
    {
        $googleConfig = config('Google');

        $client = new Google_Client();
        $client->setClientId($googleConfig->clientID);
        $client->setClientSecret($googleConfig->clientSecret);
        $client->setRedirectUri($googleConfig->redirectUri);
        $client->addScope("email");
        $client->addScope("profile");

        $authUrl = $client->createAuthUrl();
        return redirect()->to($authUrl);
    }

    public function callback()
    {
        $googleConfig = config('Google');
        $client = new Google_Client();
        $client->setClientId($googleConfig->clientID);
        $client->setClientSecret($googleConfig->clientSecret);
        $client->setRedirectUri($googleConfig->redirectUri);
        $client->addScope("email");
        $client->addScope("profile");

        if ($this->request->getGet('code')) {
            $token = $client->fetchAccessTokenWithAuthCode($this->request->getGet('code'));
            $client->setAccessToken($token);

            $googleService = new Google_Service_Oauth2($client);
            $userData = $googleService->userinfo->get();

            $customerModel = new CustomerModel();
            $existingUser = $customerModel->where('email', $userData->email)->first();

            if ($existingUser) {
                session()->set([
                    'user_id' => $existingUser['user_id'],
                    'email'   => $existingUser['email'],
                    'logged_in' => true
                ]);
            } else {
                $newUserId = $customerModel->generateUserId();
                $customerModel->insert([
                    'user_id' => $newUserId,
                    'email'   => $userData->email
                ]);

                session()->set([
                    'user_id' => $newUserId,
                    'email'   => $userData->email,
                    'logged_in' => true
                ]);
            }

            return redirect()->to('/dashboard');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
