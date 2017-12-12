<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('tbl_user');
		$this->load->model('tbl_kategori');
		$this->load->model('tbl_thread');
	}

	public function search($hal='')
	{
		$this->load->view('header');
		$this->load->view('home', array("ygdicari"=>$this->input->get('cari'), "hal"=>$hal));
		$this->load->view('footer');
	}
	public function login($par = '')
	{
		if ($this->session->has_userdata('username')){
			redirect("/");
		}else {
			$data['status'] = $par;
			$this->load->view('user/login', $data);
		}
	}

	public function doLogin()
	{
		$this->load->model('tbl_user');
		$hasil=$this->tbl_user->loginUser($this->input->post("username"), $this->input->post("password"));
		if (empty($hasil)) {
			redirect("/login/gagal");
		} else{
			$this->session->set_userdata("username", $hasil->username);
			$this->session->set_userdata("nama", $hasil->nama);
			$this->session->set_userdata("email", $hasil->email);
			$this->session->set_userdata("login", true);
			redirect("/");
		}
	
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/'); 
	}

	function daftar()
	{
		$this->load->view('user/daftar');
	}

	function doDaftar()
	{
		$this->tbl_user->username = $this->input->post('username');
		$this->tbl_user->nama = $this->input->post('nama');
		$this->tbl_user->email = $this->input->post('email');
		$this->tbl_user->password = $this->input->post('password');

		if (!is_null($this->tbl_user->userAda($this->tbl_user->username))) {
			echo "<h2>Username sudah dipakai, coba yang lain.</h2>";
			echo "<p>Klik <a href='javascript:history.back()'>disini</a> untuk kembali</p>";
			exit;
		}
		if(!is_null($this->tbl_user->emailAda($this->tbl_user->email))) {
			echo "<h2>Email sudah dipakai, coba yang lain.</h2>";
			echo "<p>Klik <a href='javascript:history.back()'>disini</a> untuk kembali</p>";
			exit;
		}

		if($this->tbl_user->tambahUser()) {
			$this->session->set_userdata("username", $this->tbl_user->username);
			$this->session->set_userdata("nama", $this->tbl_user->nama);
			$this->session->set_userdata("email", $this->tbl_user->email);
			$this->session->set_userdata("login", true);
			echo "<h1>Pendaftaran berhasil, klik <a href='/'>disini</a> untuk melanjutkan</h1>";
		}

	}
	public function artikel($id)
	{
		$this->load->view('artikel', array('id'=>$id));
	}
	public function tambah_rating()
	{
		$this->load->model('tbl_rating');
		$this->db->where(['username'=> $this->session->userdata('username'),
						'id_thread'=> $this->input->get('id_kul')]);
		$rating = $this->db->get('tbl_rating')->row();
		// var_dump($this->db->count_all_results());
		$this->tbl_rating->id_thread = $this->input->get('id_kul');
		$this->tbl_rating->username = $this->session->userdata('username');
		$this->tbl_rating->jumlah_rating = $this->input->get('tambah');
		if(!is_null($rating)) {
			$this->tbl_rating->updateRating($rating->id_rating, $this->input->get('tambah'));
		} else {
			$this->tbl_rating->simpanRating();
		}
		redirect('artikel/'.$this->input->get('id_kul'));
	}
	public function kirimkomentar()
	{
		$data = [
			'isi' => $this->input->post('komentar'),
			'id_thread'=>$this->input->post('id_thread'),
			'username'=>$this->session->userdata('username')
		];
		$this->db->insert("tbl_komentar", $data);
		redirect('/artikel/'.$data['id_thread']);
	}
	public function hapuskomentar() {
		$id = $this->input->get('id');
		$this->db->where('id_komentar', $id);
		$this->db->delete('tbl_komentar');
		redirect('/artikel/'.$this->input->get('artikel'));
	}
	function tambahThread() {
		$data['kategori'] = $this->tbl_kategori->loadKategori();
		$this->load->view('user/tambah-thread', $data);
	}
	public function pengumuman($id)
	{
		$this->load->view('user/pengumuman', array('id'=>$id));
	}
	function simpanThread() {
		$this->tbl_thread->judul = $this->input->post('judul');
		$this->tbl_thread->isi = $this->input->post('isi');
		$this->tbl_thread->id_kategori = $this->input->post('kategori');
		$this->tbl_thread->username = $this->session->userdata("username");
		$this->tbl_thread->daerah = $this->input->post('daerah');
		$id = $this->tbl_thread->saveThread();
		if ($id == 0) {
			echo "<script> alert('Data gagal dimasukan'); history.back()</script>";
			exit;
		}

		if (!empty($_FILES['foto']['name'])) {
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 2000;
			$config['file_name']			= $id.".jpg";
			
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto'))
			{
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
				exit;
			}
			$namafile = $id.".jpg";
			$this->db->query("update `tbl thread` set foto = '$namafile' where id_thread=$id");
		}
		redirect("/".$this->session->userdata('username'));
	}

	function detail($id) {
		$data['thread'] = $this->tbl_thread->cariThread($id);
		$this->load->view('detail', $data);
	}
	function editprofil() {
		$this->load->view('user/edit-profil');
	}
	function editfoto() {
		$this->load->view('user/edit-foto');
	}
	function updatefoto() {
		if (!empty($_FILES['foto']['name'])) {
			$config['upload_path']          = './pp/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['overwrite']			= true;
	        $config['max_size']             = 2000;
	        $config['file_name']			= $this->session->userdata('username').".jpg";
	        
	        $this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto'))
	        {
	            $error = array('error' => $this->upload->display_errors());
	            var_dump($error);
	            exit;
	        }
	        $this->db->query("update user set foto = '".$config['file_name']."' where username='".$this->session->userdata('username')."'");
    	}
		redirect("/".$this->session->userdata('username'));
	}
	function lihatProfil($username) {
		$user = $this->db->query("SELECT * FROM user WHERE username='".$username."'")->row();
		if(!$user) {
			show_404();
		} else {
			$data['username'] = $username;
			$data['title'] = "Profil ".$username;
			$data['user'] = $user;
			$this->load->view('user/user', $data);
		}
	}
	function updateprofil()
	{
		$nama = $this->input->post('nama');
		$bio = $this->input->post('bio');
		$update = $this->db->query("UPDATE user SET nama='$nama', bio='$bio' WHERE username='{$this->session->userdata('username')}'");
		if($update) {
			redirect("/".$this->session->userdata('username'));
		}
	}
	function editThread($id) {
		$data['id'] = $id;
		$data['title'] = "Edit thread user";
		$this->load->view('user/edit-thread', $data);
	}
	function updateThread() {
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$id_kategori = $this->input->post('kategori');
		$id = $this->input->post('id_thread');
		$daerah = $this->input->post('daerah');

		if(!$this->db->query("UPDATE `tbl thread` SET judul='$judul', isi='$isi', id_kategori='$id_kategori', daerah='$daerah' WHERE id_thread='$id'")) {
			echo "Gagal mengupdate data";
		}

		if (!empty($_FILES['foto']['name'])) {
			$config['upload_path']          = './uploads/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 2000;
	        $config['file_name']			= $id;
	        
	        $this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto'))
	        {
	            $error = array('error' => $this->upload->display_errors());
	            var_dump($error);
	            exit;
	        }
	        $namafile = $id.".jpg";
	        $this->db->query("update `tbl thread` set foto = '$namafile' where id_thread=$id");
    	}
		redirect("/".$this->session->userdata('username'));
	}
	function hapusThread($id) {
		$hapus = $this->db->query("DELETE FROM `tbl thread` WHERE id_thread='$id'");
		if(!$hapus) {
			echo "gagal mengahpus data!";
			exit;
		}
		redirect("/".$this->session->userdata('username'));
	}
	function cekUser()
	{
		$username = $this->input->get('username');
		$this->db->where('username', $username);
		$hasil = $this->db->count_all_results('user');
		if ($hasil > 0) {
			echo '1';
		} else {
			var_dump($hasil);
		}
	}
	function cekEmailUser()
	{
		$email = $this->input->get('email');
		$this->db->where('email', $username);
		$hasil = $this->db->count_all_results('user');
		if ($hasil > 0) {
			echo '1';
		} else {
			var_dump($hasil);
		}
	}
}