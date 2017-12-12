<?php 
class tbl_rating extends CI_Model {

    public $id_thread;
    public $username;
    public $jumlah_rating;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	function simpanRating() 
	{
		$this->db->insert("tbl_rating", $this);
   	}
   	function updateRating($id_rating, $jumlah_rating) {
   		$this->db->where('id_rating', $id_rating);
      $array = [
        'jumlah_rating'=>$jumlah_rating
      ];
		$this->db->update('tbl_rating', $array);
   	}
}