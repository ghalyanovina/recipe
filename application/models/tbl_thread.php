<?php 
class tbl_thread extends CI_Model {
        
        public $id_thread = NULL;
        public $judul = NULL;
        public $foto = NULL;
        public $isi = NULL;
        public $waktu_post = NULL;
        public $id_kategori = NULL;
        public $username = NULL;
        public $daerah = NULL;

        function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

        function loadThread()
        {
                $query = $this->db->query("SELECT t.id_thread AS id_thread, t.judul AS judul, t.foto AS foto, t.isi AS isi, t.waktu_post AS waktu_post, k.kategori AS kategori, u.nama AS penulis from `tbl thread` as t LEFT JOIN `tbl kategori` AS k ON t.id_kategori=k.id_kategori LEFT JOIN user AS u ON u.username=t.username order by waktu_post desc");
                return $query->result();
        }

        function saveThread() {
                $this->db->query("insert into `tbl thread`(judul, foto, isi, id_kategori, username, daerah) values('$this->judul', '$this->foto', '$this->isi', '$this->id_kategori', '$this->username', '$this->daerah')");
                return $this->db->insert_id();
        }

        function cariThread($id) {
                $query = $this->db->query("SELECT * from `tbl thread` where id_thread = ". $id);
                return $query->row();
        }
}