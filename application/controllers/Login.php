<?php 
defined('BASEPATH') || exit('No direct script access allowed');

class Login extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model(array('Mod_karyawan')); 
         
    }

    public function index(){   
        $this->load->view('backend/login'); 
    }
    
    public function proses(){   
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $auth_karyawan = $this->Mod_karyawan->auth_karyawan($username, $password);

        if($auth_karyawan->num_rows() > 0){
            $data=$auth_karyawan->row_array();
            $this->session->set_userdata('masuk',TRUE);
            $this->session->set_userdata('ses_akses',$data['level_karyawan']);
            $this->session->set_userdata('ses_nik_karyawan',$data['nik_karyawan']);
            $this->session->set_userdata('ses_nama_karyawan',$data['nama_karyawan']);
            $this->session->set_userdata('ses_alamat_karyawan',$data['alamat_karyawan']);
            $this->session->set_userdata('ses_kontak_karyawan',$data['kontak_karyawan']);
            $this->session->set_userdata('ses_username_karyawan',$data['username_karyawan']);
            $this->session->set_userdata('ses_password_karyawan',$data['password_karyawan']);
            $this->session->set_userdata('ses_foto_karyawan',$data['foto_karyawan']);
       
            if($data['level_karyawan']=='Admin'){
                echo "admin/dashboard";
            }
            elseif($data['level_karyawan']=='Sales'){ 
                echo "sales/dashboard";
            }
            elseif($data['level_karyawan']=='Pimpinan'){ 
                echo "pimpinan/dashboard";
            }  
        }
        else{
            echo 1;
        }
    } 
    
	
    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

}