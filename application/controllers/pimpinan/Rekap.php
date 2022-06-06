<?php 
defined('BASEPATH') || exit('No direct script access allowed');

class Rekap extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Mod_pegawai');
        $this->load->model('Mod_profile_match');
        $this->load->model('Mod_siswa');
    }

    function index(){
        $nip_pegawai = $this->session->userdata('ses_nip_pegawai');  
        $hak_akses = $this->session->userdata('ses_akses');  

        if($nip_pegawai != null && $hak_akses == 'Kepala Sekolah'){
            $data['rekap'] = $this->Mod_profile_match->get_all_rekap_smt();
            $data['pageTitle'] = "Rekap";
            $this->load->view("backend/kepala_sekolah/rekap/body",$data);
        }
        else{ 
            redirect('login');
        }  
    }

    function detail_rekap($kode_rekap_smt){
        $nip_pegawai = $this->session->userdata('ses_nip_pegawai');  
        $hak_akses = $this->session->userdata('ses_akses');  

        if($nip_pegawai != null && $hak_akses == 'Kepala Sekolah'){
            $data['rekap_smt'] = $this->Mod_profile_match->get_rekap_smt($kode_rekap_smt)->row_array();
            $data['rekap'] = $this->Mod_profile_match->get_all_rank_rekap();
            $data['pageTitle'] = "Detail Rekap";
            $this->load->view("backend/kepala_sekolah/rekap/body_detail",$data);
        }
        else{ 
            redirect('login');
        }  
    }


}
