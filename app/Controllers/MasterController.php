<?php

namespace App\Controllers;

use App\Models\League_session_model;
use App\Models\Players_category_model;
use App\Models\Sports_model;
use App\Models\Sports_subcategory_model;
use App\Models\Teams_model;

class MasterController extends BaseController
{
    public function sports_category()
    {
        $sports_model = new Sports_model();
        $data = ['title' => 'Sports'];
        if ($this->request->is('get')) {
            $data['sports'] = $sports_model->get();
            return view('admin/master/sports-category',$data);
        }else if ($this->request->is('post')) {
            $sportsPhoto = $this->request->getFile('sports_category_image');
            if ($sportsPhoto->isValid() && ! $sportsPhoto->hasMoved()) {
                $sportsPhotoImageName = rand(0,9999) . $sportsPhoto->getRandomName();
                $sportsPhoto->move(ROOTPATH . 'public/assets/images/sports', $sportsPhotoImageName);
            } else {
                $sportsPhotoImageName = "";
            }

            $sportsWhite = $this->request->getFile('sports_category_white_image');
            if ($sportsWhite->isValid() && ! $sportsWhite->hasMoved()) {
                $sportsWhiteImageName = 'w'.rand(0,9999) . $sportsWhite->getRandomName();
                $sportsWhite->move(ROOTPATH . 'public/assets/images/sports', $sportsWhiteImageName);
            } else {
                $sportsWhiteImageName = "";
            }

            $data = [
                'name' => $this->request->getPost('sports_category_name'),
                'sports_image' => $sportsPhotoImageName,
                'sports_image_category' => $sportsWhiteImageName,
                'description' => $this->request->getPost('sports_category_description'),
                'status' => $this->request->getPost('sports_category_status')
            ];
            $result = $sports_model->add($data);
            if ($result === true) {
                return redirect()->to('admin/sports-category')->with('status','<div class="alert alert-success" role="alert"> Data Add Successful </div>');
            } else {
                return redirect()->to('admin/sports-category')->with('status','<div class="alert alert-danger" role="alert"> '.$result.' </div>');
            }
        }
    }

    public function sports_subcategory()
    {
        $sports_subcategory_model = new Sports_subcategory_model();
        $sports_model = new Sports_model();
        $data = ['title' => 'Sports Sub Category'];
        if ($this->request->is('get')) {
            $data['sports'] = $sports_model->get();
            $data['sports_subcat'] = $sports_subcategory_model->get();
            return view('admin/master/sports-subcategory',$data);
        }else if ($this->request->is('post')) {
            
            $data = [
                'sports_id' => $this->request->getPost('sports_category_name'),
                'sub_category_name' => $this->request->getPost('sports_sub_category_name'),
                'status' => $this->request->getPost('sports_category_status')
            ];
            $result = $sports_subcategory_model->add($data);
            if ($result === true) {
                return redirect()->to('admin/sports-subcategory')->with('status','<div class="alert alert-success" role="alert"> Data Add Successful </div>');
            } else {
                return redirect()->to('admin/sports-subcategory')->with('status','<div class="alert alert-danger" role="alert"> '.$result.' </div>');
            }
        }
    }

    public function league_session()
    {
        $league_session_model = new League_session_model();
        $data = ['title' => 'League Session'];
        if ($this->request->is('get')) {
            $data['league_session'] = $league_session_model->get();
            return view('admin/master/league-session', $data);
        } else if ($this->request->is('post')) {
            $data = [
                'league_name' => $this->request->getPost('league_session_name'),
                'notes' => $this->request->getPost('league_session_notes'),
                'status' => $this->request->getPost('status') 
            ];
            $result = $league_session_model->add($data);
            if ($result === true) {
                return redirect()->to('admin/league-session')->with('status', '<div class="alert alert-success" role="alert"> Data Add Successful </div>');
            } else {
                return redirect()->to('admin/league-session')->with('status', '<div class="alert alert-danger" role="alert"> ' . $result . ' </div>');
            }
        }
    }

    public function teams()
    {
        $teams_model = new Teams_model();
        $data = ['title' => 'Teams'];
        if ($this->request->is('get')) {
            $data['teams'] = $teams_model->get();
            return view('admin/master/teams', $data);
        } else if ($this->request->is('post')) {
            $logo = $this->request->getFile('team_logo');
            if ($logo->isValid() && ! $logo->hasMoved()) {
                $logoImageName = rand(0, 9999) . $logo->getRandomName();
                $logo->move(ROOTPATH . 'public/assets/images/teams', $logoImageName);
            } else {
                $logoImageName = "";
            }
            $data = [
                'name' => $this->request->getPost('team_name'),
                'logo' => $logoImageName,
                'status' => $this->request->getPost('status')
            ];
            $result = $teams_model->add($data);
            if ($result === true) {
                return redirect()->to('admin/teams')->with('status', '<div class="alert alert-success" role="alert"> Data Add Successful </div>');
            } else {
                return redirect()->to('admin/teams')->with('status', '<div class="alert alert-danger" role="alert"> ' . $result . ' </div>');
            }
        }
    }

    public function players_category()
    {
        $sports_model = new Sports_model();
        $players_category_model = new Players_category_model();
        $data = ['title' => 'Players Category'];
        if ($this->request->is('get')) {
            $data['players'] = $players_category_model->get();
            $data['sports'] = $sports_model->get();
            return view('admin/master/players-category', $data);
        } else if ($this->request->is('post')) {
            $data = [
                'sports_id' => $this->request->getPost('sports_category'),
                'name' => $this->request->getPost('player_category'),
            ];
            $result = $players_category_model->add($data);
            if ($result === true) {
                return redirect()->to('admin/players-category')->with('status', '<div class="alert alert-success" role="alert"> Data Add Successful </div>');
            } else {
                return redirect()->to('admin/players-category')->with('status', '<div class="alert alert-danger" role="alert"> ' . $result . ' </div>');
            }
        }
    }

}
