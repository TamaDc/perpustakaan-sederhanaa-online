<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	function __construct(){
		parent::__construct();		
		$this->load->model('Mymodel');
	}

	public function index(){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{
			$this->load->view('index');
		}
	}

	public function dashboard(){
		if($this->session->userdata('status') != "login"){
			redirect('auth');
		}else{
			$this->load->view('dashboard_user');
		}
	}

	public function buku(){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{
			$data['buku'] = $this->Mymodel->Getbuku();
			$this->load->view('form_table_buku_user',$data);
		}
		
	}
	
	public function peminjaman(){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{
			$username = $this->session->userdata('nama');
			//print_r($username);
			$data['peminjaman'] = $this->Mymodel->Getpeminjaman("where no_member = '$username' ");
			//$data['peminjaman'] = $this->Mymodel->Getpeminjaman();
			$data['buku'] = $this->Mymodel->Getbuku();
			$data['member'] = $this->Mymodel->Getmember();
			$this->load->view('form_table_peminjaman_user',$data);
		}
		
	}

	public function form_buku($kode_buku){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{	
			$data['buku'] = $this->Mymodel->Getbuku("where kode_buku = '$kode_buku' ");
			$this->load->view('form_pinjam_buku',$data);
		}
	}


	public function pinjam_buku(){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{
			$kode_buku = $_POST['kode_buku'];
			$judul = $_POST['judul'];
			$pengarang = $_POST['pengarang'];
			$keterangan = $_POST['keterangan'];
			$jumlah_buku = $_POST['jumlah_buku'];

			$jumlah_buku = $jumlah_buku-1;
			$tgl_pinjam = $_POST['tgl_pinjam'];
			$tgl_kembali = $_POST['tgl_kembali'];
			$no_member = $_POST['no_member'];


			$update = array(
				'kode_buku' => $kode_buku,
				'judul' => $judul,
				'pengarang' => $pengarang,
				'keterangan' => $keterangan,
				'jumlah_buku' => $jumlah_buku,
			);

			$insert = array(
				'tgl_pinjam' => $tgl_pinjam,
				'tgl_kembali' => $tgl_kembali,
				'no_member' => $no_member,
				'kode_buku' => $kode_buku,
			);

			
			$where = array('kode_buku' => $kode_buku);
			$res = $this->Mymodel->update('buku',$update,$where);
			$res1 = $this->Mymodel->insert('peminjaman',$insert);
			
			if($res >=1){
				redirect('user/peminjaman');
			}
		}
	}


}
