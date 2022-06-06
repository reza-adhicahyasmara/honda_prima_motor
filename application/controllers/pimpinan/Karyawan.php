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

    function load_data_admin(){
        $data['admin'] = $this->Mod_karyawan->get_all_karyawan();
        $this->load->view('backend/pimpinan/karyawan/load_admin', $data);
    }

    function load_data_sales(){
        $data['sales'] = $this->Mod_karyawan->get_all_karyawan();
        $this->load->view('backend/pimpinan/karyawan/load_sales', $data);
    }

    function load_data_pimpinan(){
        $data['pimpinan'] = $this->Mod_karyawan->get_all_karyawan();
        $this->load->view('backend/pimpinan/karyawan/load_pimpinan', $data);
    }

    function data_penialaian_sales($nik_sales){
        $nik_karyawan = $this->session->userdata('ses_nik_karyawan');  
        $hak_akses = $this->session->userdata('ses_akses');  

        if($nik_karyawan != null && $hak_akses == 'Pimpinan'){

            foreach($this->Mod_promethee->get_all_penilaian()->result() as $row) {
                if($row->nik_karyawan == $nik_sales){
                    $nf_penilaian[] = $row->nf_penilaian;
                    $tanggal_penilaian[] = $row->tanggal_penilaian;
                }
            }
            if (!isset($nf_penilaian)){$nf_penilaian = NULL;}
            if (!isset($tanggal_penilaian)){$tanggal_penilaian = NULL;}

            $data['nf_penilaian'] = json_encode($nf_penilaian);
            $data['tanggal_penilaian'] = json_encode($tanggal_penilaian);

            $data['data_karyawan'] = $this->Mod_karyawan->get_karyawan($nik_sales)->row_array();
            $data['data_kriteria'] = $this->Mod_promethee->get_all_kriteria()->result_array();
            $data['data_nilai'] = $this->Mod_promethee->get_all_penilaian()->result_array();

            $data['pageTitle'] = "Data Penilaia Sales";
            $this->load->view("backend/pimpinan/karyawan/body_data_penilaian_sales",$data);
        }
        else{ 
            redirect('login');
        }  
    }
    

}
