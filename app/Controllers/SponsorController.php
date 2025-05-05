<?php
namespace App\Controllers;

use App\Models\Sponsor_category_model;

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
        $sponsor_category_model = new Sponsor_category_model();
        $data = ['title' => 'Sponsor Category'];
        if ($this->request->is('get')) {
            $data['category'] = $sponsor_category_model->get();
            return view('admin/sponsor/sponsor-category',$data);
        }else if ($this->request->is('post')) {
            $data =[
                'sponsor_categpry' => $this->request->getPost('sponsor_categpry')
            ];
            $result = $sponsor_category_model->add($data);
            if ($result === true) {
                return redirect()->to('admin/sponsor-category')->with('status','<div class="alert alert-success" role="alert"> Data Add Successful </div>');
            } else {
                return redirect()->to('admin/sponsor-category')->with('status','<div class="alert alert-danger" role="alert"> '.$result.' </div>');
            }
        }
    }

    public function edit_sponsor_category($id){
        $sponsor_category_model = new Sponsor_category_model();
        $data = ['title' => 'Sponsor Category','sponsor_id' => $id];
        if ($this->request->is('get')) {
            $data['category'] = $sponsor_category_model->get();
            $data['category_detail'] = $sponsor_category_model->get($id);
            return view('admin/sponsor/edit-sponsor-category',$data);
        }else if ($this->request->is('post')) {
            $data =[
                'sponsor_categpry' => $this->request->getPost('sponsor_categpry')
            ];
            $result = $sponsor_category_model->add($data,$id);
            if ($result === true) {
                return redirect()->to('admin/sponsor-category/'.$id)->with('status','<div class="alert alert-success" role="alert"> Data Add Successful </div>');
            } else {
                return redirect()->to('admin/sponsor-category/'.$id)->with('status','<div class="alert alert-danger" role="alert"> '.$result.' </div>');
            }
        }
    }

}