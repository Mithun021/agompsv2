<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Apply_spondor_model extends Model
    {
        protected $table         = 'applied_sponsor_detail';
        protected $primaryKey = 'id';
        protected $allowedFields = ['customer_id','sponsor_package_id','firm_name','firm_type','firm_logo','customer_name','phone_number','email_id','state','city','pincode','aadhar_no','pan_no','sponsor_amount'];

        public function add($data, $id = null) {
            if ($id != null) {
                $result = $this->update($id, $data);
                return $result ? true : 'Data not updated: Update failed.';
            } else {
                $result = $this->insert($data);
                return $result ? true : 'Data not inserted: Insertion failed.';
            }
        }

        public function get($id = null){
            if($id != null){
                $result = $this->where('id',$id)->first();
            }else{
                $result = $this->orderBy('sponsor_name','asc')->findAll();
            }
            return $result;
        }
        public function getByCategory($id){
            return $this->where('sponsor_name',$id)->findAll();
        }
    }
?>