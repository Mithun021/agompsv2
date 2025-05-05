<?php
namespace App\Controllers;
class SponsorController extends BaseController
{
    public function create_sponsor(){
        $data = ['title' => 'Sponsor'];
        if ($this->request->is('get')) {
            return view('admin/sponsor/create-sponsor',$data);
        }else if ($this->request->is('post')) {
        }
    }

    public function applied_sponsor_list(){
        $data = ['title' => 'Sponsor Applied List'];
        if ($this->request->is('get')) {
            return view('admin/sponsor/applied-sponsor-list',$data);
        }else if ($this->request->is('post')) {
        }
    }

    public function sponsor_category(){
        $data = ['title' => 'Sponsor Category'];
        if ($this->request->is('get')) {
            return view('admin/sponsor/sponsor-category',$data);
        }else if ($this->request->is('post')) {
        }
    }
}