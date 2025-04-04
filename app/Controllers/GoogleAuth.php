<?php
namespace App\Controllers;

use App\Models\Customer_detail_model;
use Google_Client;
use Google\Service\Oauth2 as Google_Service_Oauth2;

class GoogleAuth extends BaseController
{
    public function google_login()
    {
        $client = new Google_Client();
        $client->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(getenv('REDIRECT_URL'));
        $client->addScope("email");
        $client->addScope("profile");

        return redirect()->to($client->createAuthUrl());
    }

    public function callback()
    {
        $client = new Google_Client();
        $client->setClientId(getenv('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(getenv('REDIRECT_URL'));
        $client->addScope("email");
        $client->addScope("profile");

        if ($this->request->getGet('code')) {
            $token = $client->fetchAccessTokenWithAuthCode($this->request->getGet('code'));

            if (isset($token['error'])) {
                return redirect()->to('/')->with('error', 'Failed to authenticate.');
            }

            $client->setAccessToken($token);

            $googleService = new Google_Service_Oauth2($client);
            $userData = $googleService->userinfo->get();

            $customerModel = new Customer_detail_model();
            $existingUser = $customerModel->where('email', $userData->email)->first();

            if ($existingUser) {
                session()->set([
                    'user_id'   => $existingUser['user_id'],
                    'email'     => $existingUser['email'],
                    'logged_in' => true
                ]);
            } else {
                $newUserId = $customerModel->generateUserId();
                $customerModel->insert([
                    'user_id' => $newUserId,
                    'email'   => $userData->email
                ]);

                session()->set([
                    'user_id'   => $newUserId,
                    'email'     => $userData->email,
                    'logged_in' => true
                ]);
            }

            return redirect()->to('/dashboard');
        }

        return redirect()->to('/')->with('error', 'No authorization code provided.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
