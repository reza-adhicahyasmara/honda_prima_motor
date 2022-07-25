<?php 
defined('BASEPATH') || exit('No direct script access allowed');

class Rekap extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Mod_karyawan');
        $this->load->model('Mod_promethee');
    }

    function index(){
        $nik_karyawan = $this->session->userdata('ses_nik_karyawan');  
        $hak_akses = $this->session->userdata('ses_akses');  

        if($nik_karyawan != null && $hak_akses == 'Pimpinan'){
            $data['rekap'] = $this->Mod_promethee->get_all_rekap();
            $data['pageTitle'] = "Rekap";
            $this->load->view("backend/pimpinan/rekap/body",$data);
        }
        else{ 
            redirect('login');
        }  
    }

    function detail_rekap($kode_rekap){
        $nik_karyawan = $this->session->userdata('ses_nik_karyawan');  
        $hak_akses = $this->session->userdata('ses_akses');  

        if($nik_karyawan != null && $hak_akses == 'Pimpinan'){
            $data['rekap'] = $this->Mod_promethee->get_rekap($kode_rekap)->row_array();
            $data['data_kriteria'] = $this->Mod_promethee->get_all_kriteria()->result_array();
            $data['data_nilai'] = $this->Mod_promethee->get_all_penilaian_peringkat($kode_rekap)->result_array();
            $data['pageTitle'] = "Detail Rekap";
            $this->load->view("backend/pimpinan/rekap/body_detail",$data);
        }
        else{ 
            redirect('login');
        }  
    }

    function verifikasi(){
        $kode_rekap = $this->input->post('kode_rekap');
        $data  = array(
            'kode_rekap'        => $kode_rekap,
            'verifikasi_rekap'  => "Sudah Diverifikasi"           
        );
        
        $this->Mod_promethee->update_rekap($kode_rekap, $data);   
    }


}
