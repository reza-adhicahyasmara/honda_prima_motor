<?php 
defined('BASEPATH') || exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mod_pegawai');
        $this->load->model('Mod_profile_match');
        $this->load->model('Mod_siswa');
    }

    function index(){
        $nip_pegawai = $this->session->userdata('ses_nip_pegawai');  
        $hak_akses = $this->session->userdata('ses_akses');  

        if($nip_pegawai != null && $hak_akses == 'Kepala Sekolah'){
            //LOAD 1
            $jumlah_siswa = 0;
            foreach($this->Mod_siswa->get_all_siswa()->result() as $row) {
                $jumlah_siswa += 1;
            }
            $data ['jumlah_siswa'] = $jumlah_siswa; 

            //LOAD 2
            $kelayakan_rekap = 0;
            $dana_rekap = 0;
            foreach($this->Mod_profile_match->get_all_rekap()->result() as $row) {
                if($row->kelayakan_rekap == "Diterima"){
                    $kelayakan_rekap += 1;
                    $dana_rekap += $row->dana_rekap;
                }
            }
            $data ['kelayakan_rekap'] = $kelayakan_rekap; 
            $data ['dana_rekap'] = $dana_rekap; 

            //LOAD 3
            $rekap_smt = 0;
            foreach($this->Mod_profile_match->get_all_rekap_smt()->result() as $row) {
                $rekap_smt += 1;
                $siswa_kls7_rekap_smt[] = $row->siswa_kls7_rekap_smt;
                $siswa_kls8_rekap_smt[] = $row->siswa_kls8_rekap_smt;
                $siswa_kls9_rekap_smt[] = $row->siswa_kls9_rekap_smt;
                $dana_bantuan_rekap_smt[] = $row->dana_bantuan_rekap_smt;
                $tanggal_rekap_smt[] = $row->tanggal_rekap_smt;
            }

            if (!isset($siswa_kls7_rekap_smt)){$siswa_kls7_rekap_smt = NULL;}
            if (!isset($siswa_kls8_rekap_smt)){$siswa_kls8_rekap_smt = NULL;}
            if (!isset($siswa_kls9_rekap_smt)){$siswa_kls9_rekap_smt = NULL;}
            if (!isset($dana_bantuan_rekap_smt)){$dana_bantuan_rekap_smt = NULL;}
            if (!isset($tanggal_rekap_smt)){$tanggal_rekap_smt = NULL;}

            $data['siswa_kls7_rekap_smt'] = json_encode($siswa_kls7_rekap_smt);
            $data['siswa_kls8_rekap_smt'] = json_encode($siswa_kls8_rekap_smt);
            $data['siswa_kls9_rekap_smt'] = json_encode($siswa_kls9_rekap_smt);
            $data['dana_bantuan_rekap_smt'] = json_encode($dana_bantuan_rekap_smt);
            $data['tanggal_rekap_smt'] = json_encode($tanggal_rekap_smt);
            $data ['rekap_smt'] = $rekap_smt; 

            $data['kriteria'] = $this->Mod_profile_match->get_kriteria();
            $data['rank'] = $this->Mod_profile_match->get_all_kriteria();
            $data['bobot'] = $this->Mod_profile_match->get_all_bobot();

            $data['pageTitle'] = "Dashboard";
            $this->load->view("backend/kepala_sekolah/dashboard/body",$data);
        }
        else{ 
            redirect('login');
        }  
    }
}