<?php
    namespace App\Controllers;

use App\Models\Enroll_participant_model;
use App\Models\Enroll_tournament_model;

    class Enroll_tournamentController extends BaseController{
        public function enroll_tournament($id){
            $enroll_tournament_model = new Enroll_tournament_model();
            $enroll_participant_model = new Enroll_participant_model();
            $data = [
                'participant_id' => 1,
                'tournament_id' => $id,
                'registration_status' => 1,
                'payment_status' => 0
            ];
            $particiapnt_name = $this->request->getPost('participant_name');
            $result = $enroll_tournament_model->add($data);
            if($result === true){
                $insertId = $enroll_tournament_model->getInsertID();
                foreach ($particiapnt_name as $key => $value) {
                    if(!empty($value)){
                        $participant = [
                            'enroll_tournament_id' => $insertId,
                            'participant_name' => $value,
                            'participant_mobile' => $this->request->getPost('participant_mobile')[$key],
                            'participant_age' => $this->request->getPost('participant_age')[$key],
                            'participant_type' => $this->request->getPost('participant_type')[$key],
                        ];
                        $enroll_participant_model->insert($participant);
                    }
                }


                
                return redirect()->to('tournament-details/'.$id)->with('status', '<div class="alert alert-success" role="alert"> Thank you for registering! Your team registration has been successfully completed. You can now proceed with the payment to enroll your team in AGOMPS UPPL. </div>');
                
            }else {
                return redirect()->to('tournament-details/'.$id)->with('status', '<div class="alert alert-danger" role="alert"> ' . $result . ' </div>');
            }
        }
    }
?>