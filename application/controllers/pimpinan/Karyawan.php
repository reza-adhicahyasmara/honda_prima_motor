<?php 
defined('BASEPATH') || exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Mod_karyawan');
        $this->load->model('Mod_promethee');
    }

    function index(){
        $nik_karyawan = $this->session->userdata('ses_nik_karyawan');  
        $hak_akses = $this->session->userdata('ses_akses');  

        if($nik_karyawan != null && $hak_akses == 'Pimpinan'){
            $data['pageTitle'] = "Karyawan";
            $this->load->view("backend/pimpinan/karyawan/body",$data);
        }
        else{ 
            redirect('login');
        }  
    }

    function load_data_karyawan(){
        $data['karyawan'] = $this->Mod_karyawan->get_all_karyawan();
        $this->load->view('backend/pimpinan/karyawan/load_karyawan', $data);
    }
    

}
