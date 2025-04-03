<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        if(session()->get('isLoggedIn')){
            echo session()->get('customer_ac_id'); die;
        }

        $data = ['title' => 'Agomps India'];
        return view('index',$data);
    }
}
