<?php 
class tbl_adminberita extends CI_Model {
        
        public $id_admin = NULL;
        public $judul = NULL;
        public $foto = NULL;
        public $isi = NULL;
        public $waktu_post = NULL;
        public $username = NULL;

        function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

        function loadBerita()
        {
                $query = $this->db->query("SELECT * from tbl_adminberita order by waktu_post desc");
                return $query->result();
        }

        function saveBerita() {
                return $this->db->query("insert into tbl_adminberita(judul, foto, isi, username) values('$this->judul', '$this->foto', '$this->isi', '$this->username')");
        }

        function cariBerita($id) {
                $query = $this->db->query("SELECT * from tbl_adminberita where id_admin = ". $id);
                return $query->row();
        }
}