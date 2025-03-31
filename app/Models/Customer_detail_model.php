<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class Customer_detail_model extends Model
    {
        protected $table         = 'customers_detail';
        protected $primaryKey = 'id';
        protected $allowedFields = ['name','email','phone_number','dob'];

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
                $result = $this->findAll();
            }
            return $result;
        }
        
    }
?>