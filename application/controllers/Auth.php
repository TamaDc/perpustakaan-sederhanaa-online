<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	function __construct(){
		parent::__construct();		
		$this->load->model('Mymodel');
	}

	function index(){
		$this->load->view('index');
	}

    function registrasi(){
        $this->load->view('form_registrasi');
    }

	function auth_akses(){
		$username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
 
        $cek=$this->Mymodel->auth_akses($username,$password);
        $cek_member=$this->Mymodel->auth_member($username,$password);
        if($cek->num_rows() > 0){ //jika login sebagai dosen
                $data=$cek->row_array();
                $this->session->set_userdata('masuk',TRUE);
                if($data['level']=='1'){ //Akses admin
                    $data_session = array(
                    'nama' => $username,
                    'status' => "login"
                    );
                    
                    $this->session->set_userdata($data_session);
                    $this->session->set_userdata('login','status');
                    $this->session->set_userdata('login','1');
                    $this->session->set_userdata('ses_id',$data['nip']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    
                    redirect('admin/dashboard');
                 }
                 else if($data['level']=='2'){ //Akses admin
                    $data_session = array(
                    'nama' => $username,
                    'status' => "login"
                    );
                    
                    $this->session->set_userdata($data_session);
                    $this->session->set_userdata('login','3');
                    $this->session->set_userdata('ses_id',$data['nip']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    redirect('admin/dashboard');
                 }
                 
                 else{
                 	redirect('auth/eror');
                 }
        }else if($cek_member->num_rows() > 0){ //jika login sebagai dosen
                $data=$cek->row_array();
                $this->session->set_userdata('masuk',TRUE);
                 //Akses admin
                    $data_session = array(
                    'nama' => $username,
                    'status' => "login"
                    );
                    
                    $this->session->set_userdata($data_session);
                    $this->session->set_userdata('login','status');
                    $this->session->set_userdata('login','1');
                    $this->session->set_userdata('ses_id',$data['nip']);
                    $this->session->set_userdata('ses_nama',$data['nama']);
                    redirect('user/dashboard');
        }
        else{ //jika login sebagai mahasiswa
                   redirect('auth/eror');
        }
 
	}

	function eror(){
		$this->load->view('index');
	}

    function registrasi_member(){

        $no_member = $_POST['no_member'];
            $pass = $_POST['password'];
            $password = hash('md5', $pass);
            $nama_member = $_POST['nama_member'];
            $alamat = $_POST['alamat'];
            $no_hp = $_POST['no_hp'];
            $insert = array(
                'no_member' => $no_member,
                'password' => $password,
                'nama_member' => $nama_member,
                'alamat' => $alamat,
                'no_hp' => $no_hp,
            );

            $res = $this->Mymodel->Insert('member',$insert);
            if($res >=1){
            
                redirect('Auth/index');
            }
    }


	function logout(){
		$this->session->sess_destroy();
		redirect('auth');
	}

}
