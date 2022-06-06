<?php 
defined('BASEPATH') || exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mod_karyawan');
        $this->load->model('Mod_promethee');
    }

    function index(){
        $nik_karyawan = $this->session->userdata('ses_nik_karyawan');  
        $hak_akses = $this->session->userdata('ses_akses');  

        if($nik_karyawan != null && $hak_akses == 'Pimpinan'){
            $data['sales'] = $this->Mod_promethee->get_all_penilaian_sales()->result();
            foreach($this->Mod_promethee->get_all_penilaian_sales()->result() as $row) {
                $netflow[] = $row->netflow;
                $nama_karyawan[] = $row->nama_karyawan;
            }

            if (!isset($netflow)){$netflow = NULL;}
            if (!isset($nama_karyawan)){$nama_karyawan = NULL;}

            $data['netflow'] = json_encode($netflow);
            $data['nama_karyawan'] = json_encode($nama_karyawan);

            $data['kriteria'] = $this->Mod_promethee->get_all_kriteria()->result();
            $data['subkriteria'] = $this->Mod_promethee->get_all_subkriteria()->result();

            $data['pageTitle'] = "Dashboard";
            $this->load->view("backend/pimpinan/dashboard/body",$data);
        }
        else{ 
            redirect('login');
        }  
    }
}