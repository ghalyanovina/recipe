<?php 
class tbl_kategori extends CI_Model {

        public $id;
        public $kategori;

        function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

        function loadKategori()
        {
                $query = $this->db->query("SELECT * FROM `tbl kategori`");
                return $query->result();
        }
        function cari($id)
        {
                $query = $this->db->query("SELECT * FROM `tbl kategori` WHERE id_kategori=".$id);
                return $query->row();
        }
}