<?php 
defined('BASEPATH') || exit('No direct script access allowed');

class Siswa extends CI_Controller {

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
            $data['pageTitle'] = "Siswa";
            $this->load->view("backend/kepala_sekolah/siswa/body",$data);
        }
        else{ 
            redirect('login');
        }  
    }

    function load_data_siswa(){
        $data['siswa'] = $this->Mod_siswa->get_all_siswa();
        $this->load->view('backend/kepala_sekolah/siswa/load_siswa', $data);
    }

    function detail_rekap_siswa($nisn_siswa){
        $nip_pegawai = $this->session->userdata('ses_nip_pegawai');  
        $hak_akses = $this->session->userdata('ses_akses');  

        if($nip_pegawai != null && $hak_akses == 'Kepala Sekolah'){
            $data['data_siswa'] = $this->Mod_siswa->get_siswa($nisn_siswa)->row_array();
            $data['rekap'] = $this->Mod_profile_match->get_all_rekap();
            $data['tmp'] = $this->Mod_siswa->get_item_tanggungan($nisn_siswa);

            foreach($this->Mod_profile_match->get_all_rekap()->result() as $row) {
                if($row->nisn_siswa == $nisn_siswa){
                    $profil_match[] = $row->profil_match_rekap;
                    $tanggal_rekap[] = $row->tanggal_rekap;
                }
            }
            if (!isset($profil_match)){$profil_match = NULL;}
            if (!isset($tanggal_rekap)){$tanggal_rekap = NULL;}

            $data['profil_match'] = json_encode($profil_match);
            $data['tanggal_rekap'] = json_encode($tanggal_rekap);

            $this->load->view("backend/kepala_sekolah/siswa/body_detail_rekap_siswa", $data);
        }
        else{ 
            redirect('login');
        }  
    }
}
