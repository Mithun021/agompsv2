<?php

namespace App\Controllers;

use App\Models\Sponsor_category_model;
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

    public function privacy_policy()
    {
        $data = ['title' => 'Privacy Policy'];
        return view('legal/privacy-policy',$data);
    }
    public function term_condition()
    {
        $data = ['title' => 'Term & Condition'];
        return view('legal/term-condition',$data);
    }
    public function refund()
    {
        $data = ['title' => 'Refund Policy'];
        return view('legal/refund',$data);
    }

    public function contact()
    {
        $data = ['title' => 'Contact Us'];
        return view('legal/contact',$data);
    }
    
    public function sponsor(){
        $sponsor_category_model = new Sponsor_category_model();
        $data = ['title' => 'Sponsor','sponsor_category' => $sponsor_category_model->findAll()];
        return view('sponsor/sponsor',$data);
    }

}