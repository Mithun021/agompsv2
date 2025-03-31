<?php

namespace App\Controllers;

use App\Models\Tournament_model;

class FrontController extends BaseController
{
    public function userlogin()
    {
        $data = ['title' => 'User Login'];
        return view('user-login',$data);
    }

    public function userRegister()
    {
        $data = ['title' => 'User Register'];
        return view('user-register',$data);
    }

    public function tournaments()
    {
        $data = ['title' => 'All Tournament'];
        return view('tournaments',$data);
    }

    public function tournament_details($id)
    {
        $tournament_model = new Tournament_model();
        $data = ['title' => 'All Tournament','tournament_id' => $id];
        $data['tournament'] = $tournament_model->get($id);
        return view('tournament-details',$data);
    }

}