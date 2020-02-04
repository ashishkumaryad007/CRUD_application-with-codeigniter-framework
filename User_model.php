<?php
    class User_model extends CI_model
    {
        function create($formArray){
            $this->db->insert('Ashish_User1',$formArray);// Insert into Ashish_User1(name,email) values (?,?);

        }

        function all(){
            $query=$this->db->get("training.Ashish_User1"); // this query fetch data from table diectly
            return $query->result();

        }
        function getUser($userId){
            $this->db->where("id",$userId);
            return $user= $this->db->get("training.Ashish_User1")->row_array();

        }
        function updateUser($userId,$formArray){
            $this->db->where('id',$userId);
            $this->db->update("training.Ashish_User1",$formArray); 

        }
        function deleteUser($userId){
            $this->db->where('id',$userId);
            $this->db->delete("training.Ashish_User1"); 

        }

    }

?>
