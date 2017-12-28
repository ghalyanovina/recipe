<?php 
class tbl_user extends CI_Model {

        public $username;
        public $nama;
        public $email;
        public $password;
        public $foto;
        public $bio;
        public $tgldaftar;

        function __construct()
        {
                parent::__construct();
                $this->load->database();
        }
        
        function loginUser($username , $password)
        {
                $password = md5($password);
                $query = $this->db->query("SELECT * FROM USERS where USERNAME='$username' and PASSWORD='$password'");
                return $query->row();
        }

        function userAda($username) {
                $query = $this->db->query("SELECT USERNAME from USERS where USERNAME='$username'");
                return $query->row();
        }

        function emailAda($email) {
                $query = $this->db->query("SELECT EMAIL from USERS where EMAIL='$email'");
                return $query->row();
        }

        function tambahUser()
        {
                /*$data = [
                        'USERNAME' => $this->username,
                        'NAMA' => $this->nama, 
                        'EMAIL' => $this->email,
                        'PASSWORD' => md5($this->password)
                ];*/
                $query = $this->db->query("INSERT INTO USERS (USERNAME, NAMA, EMAIL, PASSWORD) VALUES ('{$this->username}', '{$this->nama}', '{$this->email}', '{md5($this->password)}')");
                // return $this->db->insert('USERS', $data);
                return $query;
        }
        

}