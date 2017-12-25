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
                $query = $this->db->query("SELECT username from USERS where username='$username'");
                return $query->row();
        }

        function emailAda($email) {
                $query = $this->db->query("SELECT email from USERS where email='$email'");
                return $query->row();
        }

        function tambahUser()
        {
                $data = [
                        'username' => $this->username,
                        'nama' => $this->nama, 
                        'email' => $this->email,
                        'password' => md5($this->password)
                ];
                return $this->db->insert('users', $data);
        }
        

}