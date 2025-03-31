<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = ['title' => 'Agomps India'];
        return view('index',$data);
    }
}
