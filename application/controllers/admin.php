<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->model('tbl_adminberita');
		$this->load->model('tbl_admin');
	}

	public function index()
	{
		if($this->cekLogin() == true) {
			$this->load->view('admin/dashboard');
		} else {
			redirect('/admin/login');
		}

	}
	public function kategori($id = '')
	{
		$this->load->view('admin/kategori', array('id'=>$id));
	}
	public function simpankategori()
	{
		$kategori = $this->input->post('kategori');
		$query= $this->db->query("INSERT INTO `tbl kategori`(kategori) VALUES('$kategori')");
		if ($query) {
			echo "<script>alert('Kategori berhasil di tambahkan.'); location.href='/admin/kategori'</script>";
		} else {
			echo "Ada kesalahan";
		}
	}
	public function updatekategori()
	{
		$id = $this->input->post('id');
		$kategori = $this->input->post('kategori');
		$query= $this->db->query("UPDATE `tbl kategori` SET kategori='$kategori' WHERE id_kategori = '$id'");
		if ($query) {
			echo "<script>alert('Kategori berhasil diganti.'); location.href='/admin/kategori'</script>";
		} else {
			echo "Ada kesalahan";
		}
	}
	public function hapuskategori($id)
	{
		$query = $this->db->query("DELETE FROM `tbl kategori` WHERE id_kategori='$id'");
		echo "<script>alert('Kategori berhasil dihapus.'); location.href='/admin/kategori'</script>";
	}
	public function berita($id = '')
	{
		$this->load->view('admin/berita', array('id'=>$id));
	}
	public function updateberita()
	{
		$id = $this->input->post('id');
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$foto = '';
		
		$data = [
			'JUDUL' => $judul,
			'ISI' => $isi
		];
		$this->db->where("ID_BERITA", $id);
		$this->db->update("tbl_adminberita", $data);

		if (!empty($_FILES['foto']['name'])) {
			$config['upload_path']          = './pp/';
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
			$data = [
				'FOTO' => $config['file_name']
			];
			$this->db->where("ID_BERITA", $id);
			$this->db->update("tbl_adminberita", $data);
    	}
		echo "<script>alert('Data berhasil disimpan!'); location.href='/admin/berita'</script>";

	}
	public function member()
	{
		$this->load->view("admin/member");
	}
	public function admins($id = '')
	{
		$this->load->view("admin/admins", array('id'=>$id));
	}
	public function simpanadmin()
	{
		if($this->input->post('password') == $this->input->post('password_konfirm')){
			$data = [
				'USERNAME' => $this->input->post('username'),
				'PASSWORD' => md5($this->input->post('password'))
			];
			$this->db->insert('tbl_admin', $data);
			echo "<script>alert('Admin berhasil ditambahkan!'); location.href='/admin/admins'</script>";
		} else {
			echo "<script>alert('Password tidak sama!'); location.href='/admin/admins'</script>";
		}
	}
	public function hapusadmin($id)
	{
		$this->db->delete('tbl_admin', array('username'=>$id));
		echo "<script>alert('Admin berhasil dihapus!'); location.href='/admin/admins'</script>";
	}
	function simpanBerita() {
		$data = [
			'JUDUL' => $this->input->post("judul"),
			'ISI' => $this->input->post('isi'),
			'USERNAME' => $this->session->userdata('admin')
		];
		$simpan = $this->db->insert('tbl_adminberita', $data);
		if($simpan) {
			echo "<script>alert('Data berhasil disimpan!'); location.href='/admin/berita'</script>";
		} else {
			echo "Terjadi kesalahan";
		}
	}

	public function login($par = '')
	{
		// var_dump($_SESSION);
		if ($this->session->has_userdata("admin" )== true){
			redirect("/admin");
		}else {
			$data['status'] = $par;
			$this->load->view('admin/login', $data);
		}
	}

	private function cekLogin()
	{
		if($this->session->has_userdata('admin')) {
			$login = true;
		} else {
			$login = false;
		}
		return $login;
	}

	public function doLogin()
	{
		$hasil=$this->tbl_admin->loginAdmin($this->input->post("username"), $this->input->post("password"));
		if (!$hasil) {
			redirect("/admin/login/gagal");
			// var_dump($hasil);
		} else{
			$this->session->set_userdata("admin", $hasil->USERNAME);
			redirect("/admin");
		}
	}

	public function logout()
	{
		unset($_SESSION['admin']);
		redirect('/admin/login'); 
	}
}
