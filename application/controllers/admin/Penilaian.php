<?php

defined('BASEPATH') || exit('No direct script access allowed');

class Penilaian extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Mod_karyawan');
        $this->load->model('Mod_promethee');
    }

    function index(){
        $nik_karyawan = $this->session->userdata('ses_nik_karyawan');  
        $hak_akses = $this->session->userdata('ses_akses');  

        if($nik_karyawan != null && $hak_akses == 'Admin'){
            $data['data_rekap'] = $this->Mod_promethee->get_all_rekap_bulan_ini()->row_array();
            $data['pageTitle'] = "Penilaian";
            $this->load->view("backend/admin/penilaian/body",$data);
        }
        else{ 
            redirect('login');
        }  
    }

    function load_data_penilaian(){
        $data['data_kriteria'] = $this->Mod_promethee->get_all_kriteria()->result_array();
        $data['data_nilai'] = $this->Mod_promethee->get_all_penilaian_bulan_ini()->result_array();
        $this->load->view('backend/admin/penilaian/load_data_penilaian', $data);
    }

    function form_penilaian(){
		$data['karyawan'] = $this->Mod_karyawan->get_all_karyawan();
		$data['kriteria'] = $this->Mod_promethee->get_all_kriteria();
		$data['subkriteria'] = $this->Mod_promethee->get_all_subkriteria();
		$this->load->view("backend/admin/penilaian/form_penilaian", $data);
    }

    function simpan_penilaian(){ 
        $nik_karyawan = $this->input->post('nik_karyawan');
        $tanggal_penilaian = date("Y-m-d H:m:s");
        
        $cek_penilaian = $this->Mod_promethee->cek_tanggal_penilaian($nik_karyawan);
        if($cek_penilaian->num_rows() > 0){
            echo "Data sudah sudah dimasukan bulan ini!";
        }else{
            echo 1;   
                    
            $data  = array(   
                'nik_karyawan'              => $nik_karyawan,    
                'tanggal_penilaian'         => $tanggal_penilaian,   
                'k1_penilaian'              => $this->input->post('k1_penilaian'),  
                'k2_penilaian'              => $this->input->post('k2_penilaian'),  
                'k3_penilaian'              => $this->input->post('k3_penilaian'),  
                'k4_penilaian'              => $this->input->post('k4_penilaian'),   
            );
            $this->Mod_promethee->insert_penilaian($data);    

        }
    
    }

    function simpan_rekap(){ 
        $kode_rekap =  "RKP-".date("YmdHms");
        //INSERT DATA REKAP
        $data  = array(   
            'kode_rekap'            => $kode_rekap,    
            'tanggal_rekap'         => date("Y-m-d H:m:s"),   
            'keterangan_rekap'      => $this->input->post('keterangan_rekap'),   
            'verifikasi_rekap'      => "Belum Diverifikasi",
        );
        $this->Mod_promethee->insert_rekap($data);  


        //PROMTHEE
        $data_kriteria = $this->Mod_promethee->get_all_kriteria()->result_array();
        $data_nilai = $this->Mod_promethee->get_all_penilaian_bulan_ini()->result_array();

        //DEVIASI
        $i = 0;
        $arr = array(count($data_nilai));
        foreach ($data_nilai as $da) {
            
            $j = 0;
            $arr[$i] = array(count($data_nilai));
            foreach ($data_nilai as $db) {
                if ($da['nama_karyawan'] !== $db['nama_karyawan']) {
                    $sum_IP = 0.0;
                    $q = 2;
                    foreach ($data_kriteria as $dk) {
                        $IP = 0.0; //Index Preferensi
                        $P = 0.0; //Preferensi

                        $n1 = $da[$dk['penilaian_kriteria']];
                        $n2 = $db[$dk['penilaian_kriteria']];
                        $d = abs(floatval($n1) - floatval($n2));
                        $bobot = floatval($dk['bobot_kriteria']);

                        if($n1 < $n2) {
                            $P = 0;
                        } else {
                            if ($d == 0) {
                                $P = 0;
                            }
                            if ($d > 0) {
                                $P = 1/4;
                            }
                            if ($d < 0) {
                                $P = 0;
                            }
                        }
                        
                        $IP += $P * $bobot;
                        $sum_IP += $IP;
                    }
                    $arr[$i][$j] = $sum_IP;
                } else {
                    $arr[$i][$j] = 0;
                }
                $j++;
            }
            $i++;
        }



		//LEAVING FLOW ENTRING FLOW
        $leaving_flow = array();
        $entering_flow = array();
        $sum_row = array();
        $sum_column = array();
        for ($n = 0; $n < count($arr); $n++) {
            $sum_a = 0;
            $sum_b = 0;
    
            for ($m = 0; $m < count($arr[$n]); $m++) {
                $sum_a += $arr[$n][$m];
                $sum_b += $arr[$m][$n];
            }

            $kriteria = round((1 / (count($data_kriteria) - 1)),2); //0.33

            $sum_row[$n] = $sum_a;
            $sum_column[$n] = $sum_b;										
            $leaving_flow[$n] = $kriteria * $sum_a;
            $entering_flow[$n] = $kriteria * $sum_b;
                    
                

        }	

        //MENCARI NETFLOW          
        $net_flow = null;
        for ($h = 0; $h < count($leaving_flow); $h++) {
            $n = $leaving_flow[$h] - $entering_flow[$h];
            $net_flow[] = array("kode_penilaian" => $data_nilai[$h]["kode_penilaian"], "netflow" => $n, "leavingflow" => $leaving_flow[$h], "enteringflow" => $entering_flow[$h]);
        }
        
        array_multisort(array_map(function ($element) {
            return $element['netflow'];
        }, $net_flow), SORT_DESC, $net_flow);
        foreach ($net_flow as $i => $net) {
            
            //UPDATE DATA PENILAIAN
            $kode_penilaian = $net['kode_penilaian'];

            $data = array(
                'kode_rekap'            => $kode_rekap,
                'kode_penilaian'        => $net['kode_penilaian'],
                'lf_penilaian'          => $net['leavingflow'],
                'ef_penilaian'          => $net['enteringflow'],
                'nf_penilaian'          => $net['netflow'],
                'ranking_penilaian'     => $i + 1
            );
            
            $this->Mod_promethee->update_penilaian($kode_penilaian, $data); 
            
        } 
        
        echo 1;   
    }

    function hapus_penilaian(){
        $kode_penilaian = $this->input->post('kode_penilaian');
        $this->Mod_promethee->delete_penilaian($kode_penilaian);
    } 

}
