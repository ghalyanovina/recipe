<?php 

class tbl_admin extends CI_Model {

        public $username;
        public $password;
        public $foto;
        

        function __construct()
        {
                parent::__construct();
                $this->load->database();
        }
        
        function loginAdmin($username , $password)
        {
                $password = md5($password);
                $query = $this->db->query("SELECT * FROM TBL_ADMIN where USERNAME='$username'and PASSWORD='$password'");
                return $query->row();
        }

        function userAda($username) {
                $query = $this->db->query("SELECT USERNAME from TBL_ADMIN where USERNAME='$username'");
                return $query->row();
        }

        function cobaAmbilData() {
                $query = $this->db->query('SELECT * FROM TBL_ADMIN');
                return $query->result();
        }

}