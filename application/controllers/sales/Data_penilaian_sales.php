<?php 
defined('BASEPATH') || exit('No direct script access allowed');

class Data_penilaian_sales extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Mod_karyawan');
        $this->load->model('Mod_promethee');
    }

    function index(){
        $nik_karyawan = $this->session->userdata('ses_nik_karyawan');  
        $hak_akses = $this->session->userdata('ses_akses');  

        if($nik_karyawan != null && $hak_akses == 'Sales'){

            foreach($this->Mod_promethee->get_all_penilaian()->result() as $row) {
                if($row->nik_karyawan == $nik_karyawan){
                    $nf_penilaian[] = $row->nf_penilaian;
                    $tanggal_penilaian[] = $row->tanggal_penilaian;
                }
            }
            if (!isset($nf_penilaian)){$nf_penilaian = NULL;}
            if (!isset($tanggal_penilaian)){$tanggal_penilaian = NULL;}

            $data['nf_penilaian'] = json_encode($nf_penilaian);
            $data['tanggal_penilaian'] = json_encode($tanggal_penilaian);

            $data['data_karyawan'] = $this->Mod_karyawan->get_karyawan($nik_karyawan)->row_array();
            $data['data_kriteria'] = $this->Mod_promethee->get_all_kriteria()->result_array();
            $data['data_nilai'] = $this->Mod_promethee->get_all_penilaian()->result_array();

            $data['pageTitle'] = "Data Penilaia Sales";
            $this->load->view("backend/sales/data_penilaian_sales/body",$data);
        }
        else{ 
            redirect('login');
        }  
    }
    

}
