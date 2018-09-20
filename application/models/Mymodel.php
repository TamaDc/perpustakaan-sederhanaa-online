<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mymodel extends CI_Model {

	public function Getbuku($where="" ){
		 $data = $this->db->query('select * from buku '.$where);
		 return $data->result_array();
	}
	public function Getmember($where="" ){
		 $data = $this->db->query('select * from member '.$where);
		 return $data->result_array();
	}
	public function Getpeminjaman($where="" ){
		 $data = $this->db->query('select * from peminjaman '.$where);
		 return $data->result_array();
	}

	function Getakses($table,$where){		
		return $this->db->get_where($table,$where);
	}

	public function Insert($tablename,$data){
		$data = $this->db->insert($tablename,$data);
		return $data;
	}

	public function Delete($tablename,$where){
		$data = $this->db->delete($tablename,$where);
		return $data;
	}

	public function Update($tablename,$data,$where){
		$data = $this->db->update($tablename,$data,$where);
		return $data;
	}

	 function auth_akses($username,$password){
        $query=$this->db->query("SELECT * FROM akses WHERE username='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
     function auth_member($username,$password){
        $query=$this->db->query("SELECT * FROM member WHERE no_member='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
}