<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public $data;

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('tbl_kategori');
		$this->load->model('tbl_thread');
	}

	public function index($hal='')
	{
		$this->cekLogin();
		$this->tampilkan('Home', 'home', array('hal'=>$hal));
		/*$this->load->model('tbl_admin');
		var_dump($this->tbl_admin->cobaAmbilData());*/
	}
	public function kategori($id ='', $hal='')
	{
		$kategori = $this->db->query("SELECT * FROM `tbl kategori` WHERE id_kategori='$id'")->row();
		if($kategori) {
			$namakat = $kategori->kategori;
		} else {
			$namakat = "Semua Kategori";
		}
		$data = [
			'id' => $id,
			'hal' => $hal,
			'nama_kategori' => $namakat
		];
		$this->tampilkan($data['nama_kategori'], 'kategori', $data);
	}
	
	private function cekLogin()
	{
		if($this->session->has_userdata('username')) {
			$this->data['login'] = true;
		} else {
			$this->data['login'] = false;
		}
	}
	private function tampilkan($judul = 'Food Recipe', $nama = 'home', $data = [])
	{
		$data['title'] = $judul;
		$this->load->view('header', $data);
		$this->load->view($nama);
		$this->load->view('footer');
	}
} 