<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
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
			$this->load->view('dashboard');
		}
	}

	public function buku(){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{
			$data['buku'] = $this->Mymodel->Getbuku();
			$this->load->view('form_table_buku',$data);
		}
		
	}

	public function member(){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{
			$data['member'] = $this->Mymodel->Getmember();
			$this->load->view('form_table_member',$data);
		}
		
	}

	public function peminjaman(){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{
			$data['peminjaman'] = $this->Mymodel->Getpeminjaman();
			$data['buku'] = $this->Mymodel->Getbuku();
			$data['member'] = $this->Mymodel->Getmember();
			$this->load->view('form_table_peminjaman',$data);
		}
		
	}
	public function add_buku(){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{
			
			$this->load->view('form_add_buku');
		}
		
	}

	public function add_member(){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{
			
			$this->load->view('form_add_member');
		}
		
	}

	public function add_peminjaman(){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{
			
			$this->load->view('form_add_peminjaman');
		}
		
	}

	public function insert_buku(){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{
			$kode_buku = $_POST['kode_buku'];
			$judul = $_POST['judul'];
			$pengarang = $_POST['pengarang'];
			$keterangan = $_POST['keterangan'];
			$jumlah_buku = $_POST['jumlah_buku'];
			$insert = array(
				'kode_buku' => $kode_buku,
				'judul' => $judul,
				'pengarang' => $pengarang,
				'keterangan' => $keterangan,
				'jumlah_buku' => $jumlah_buku,
			);

			$res = $this->Mymodel->Insert('buku',$insert);
			if($res >=1){
			
				redirect('admin/buku');
			}
		}
	}

	public function insert_peminjaman(){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{
			$no_peminjaman = $_POST['no_peminjaman'];
			$tgl_pinjam = $_POST['tgl_pinjam'];
			$tgl_kembali = $_POST['tgl_kembali'];
			$no_member = $_POST['no_member'];
			$kode_buku = $_POST['kode_buku'];
			$insert = array(
				'no_peminjaman' => $no_peminjaman,
				'tgl_pinjam' => $tgl_pinjam,
				'tgl_kembali' => $tgl_kembali,
				'no_member' => $no_member,
				'kode_buku' => $kode_buku,
			);

			$res = $this->Mymodel->Insert('peminjaman',$insert);
			if($res >=1){
			
				redirect('admin/peminjaman');
			}
		}
	}


	public function insert_member(){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{
			$no_member = $_POST['no_member'];
			$nama_member = $_POST['nama_member'];
			$alamat = $_POST['alamat'];
			$no_hp = $_POST['no_hp'];
			
			$insert = array(
				'no_member' => $no_member,
				'nama_member' => $nama_member,
				'alamat' => $alamat,
				'no_hp' => $no_hp,
			);

			$res = $this->Mymodel->Insert('member',$insert);
			if($res >=1){
			
				redirect('admin/member');
			}
		}
	}


	public function delete_buku($kode_buku){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');	
		}else{

			$where = array('kode_buku' => $kode_buku);
			$res = $this->Mymodel->delete('buku',$where);
			if($res>=1){
				redirect('admin/buku');
			}
		}

	}

	public function delete_member($no_member){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');	
		}else{

			$where = array('no_member' => $no_member);
			$res = $this->Mymodel->delete('member',$where);
			if($res>=1){
				redirect('admin/member');
			}
		}

	}

	public function delete_peminjaman($no_peminjaman){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');	
		}else{

			$where = array('no_peminjaman' => $no_peminjaman);
			$res = $this->Mymodel->delete('peminjaman',$where);
			if($res>=1){
				redirect('admin/peminjaman');
			}
		}

	}

	public function edit_buku($kode_buku){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{	
			$data['buku'] = $this->Mymodel->Getbuku("where kode_buku = '$kode_buku' ");
			$this->load->view('form_edit_buku',$data);
		}
	}

	public function edit_member($no_member){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{	
			$data['member'] = $this->Mymodel->Getmember("where no_member = '$no_member' ");
			$this->load->view('form_edit_member',$data);
		}
	}

	public function edit_peminjaman($no_peminjaman){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{	
			$data['peminjaman'] = $this->Mymodel->Getpeminjaman("where no_peminjaman = '$no_peminjaman' ");
			$this->load->view('form_edit_peminjaman',$data);
		}
	}

	public function update_buku(){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{
			$kode_buku = $_POST['kode_buku'];
			$judul = $_POST['judul'];
			$pengarang = $_POST['pengarang'];
			$keterangan = $_POST['keterangan'];
			$jumlah_buku = $_POST['jumlah_buku'];


			$update = array(
				'kode_buku' => $kode_buku,
				'judul' => $judul,
				'pengarang' => $pengarang,
				'keterangan' => $keterangan,
				'jumlah_buku' => $jumlah_buku,
			);
			
			$where = array('kode_buku' => $kode_buku);
			$res = $this->Mymodel->update('buku',$update,$where);
			if($res >=1){
				redirect('admin/buku');
			}
		}
	}

	public function update_member(){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{
			$no_member = $_POST['no_member'];
			$nama_member = $_POST['nama_member'];
			$alamat = $_POST['alamat'];
			$no_hp = $_POST['no_hp'];
			

			$update = array(
				'no_member' => $no_member,
				'nama_member' => $nama_member,
				'alamat' => $alamat,
				'no_hp' => $no_hp,
			);
			
			$where = array('no_member' => $no_member);
			$res = $this->Mymodel->update('member',$update,$where);
			if($res >=1){
				redirect('admin/member');
			}
		}
	}

	public function update_peminjaman(){
		if($this->session->userdata('status') != "login"){
			redirect('Auth');
		}else{
			$no_peminjaman = $_POST['no_peminjaman'];
			$tgl_pinjam = $_POST['tgl_pinjam'];
			$tgl_kembali = $_POST['tgl_kembali'];
			$no_member = $_POST['no_member'];
			$kode_buku = $_POST['kode_buku'];
			
			$update = array(
				'no_peminjaman' => $no_peminjaman,
				'tgl_pinjam' => $tgl_pinjam,
				'tgl_kembali' => $tgl_kembali,
				'no_member' => $no_member,
				'kode_buku' => $kode_buku,
					
			);
			
			$where = array('no_peminjaman' => $no_peminjaman);
			$res = $this->Mymodel->update('peminjaman',$update,$where);
			if($res >=1){
				redirect('admin/peminjaman');
			}
		}
	}

}
