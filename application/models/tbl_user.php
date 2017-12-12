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
                $query = $this->db->query("SELECT * FROM `user` where username='$username'and password='$password'");
                return $query->row();
        }

        function userAda($username) {
                $query = $this->db->query("SELECT username from user where username='$username'");
                return $query->row();
        }

        function emailAda($email) {
                $query = $this->db->query("SELECT email from user where email='$email'");
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
                return $this->db->insert('user', $data);
        }
        

}