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

        if($nik_karyawan != null && $hak_akses == 'Admin'){
            $data['pageTitle'] = "Karyawan";
            $this->load->view("backend/admin/karyawan/body",$data);
        }
        else{ 
            redirect('login');
        }  
    }

    function load_data_admin(){
        $data['admin'] = $this->Mod_karyawan->get_all_karyawan();
        $this->load->view('backend/admin/karyawan/load_admin', $data);
    }

    function load_data_sales(){
        $data['sales'] = $this->Mod_karyawan->get_all_karyawan();
        $this->load->view('backend/admin/karyawan/load_sales', $data);
    }

    function load_data_pimpinan(){
        $data['pimpinan'] = $this->Mod_karyawan->get_all_karyawan();
        $this->load->view('backend/admin/karyawan/load_pimpinan', $data);
    }
    
    function form_tambah_karyawan(){
        $this->load->view("backend/admin/karyawan/form_tambah_karyawan", NULL);
    }

    function form_edit_karyawan(){
        $nik_karyawan = $this->input->post('nik_karyawan');
		$data['edit'] = $this->Mod_karyawan->get_karyawan($nik_karyawan)->row_array();
		$this->load->view("backend/admin/karyawan/form_edit_karyawan", $data);
    }

    function tambah_edit_karyawan(){ 
        $jenis = $this->input->post('jenis');
        $nik_karyawan = $this->input->post('nik_karyawan');
        $username_karyawan_baru = $this->input->post('username_karyawan_baru');
        $username_karyawan_lama = $this->input->post('username_karyawan_lama');

        $config['upload_path'] = './assets/img/karyawan/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['image_library'] = 'gd2';
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 500;

        $this->upload->initialize($config);
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $cek_nip = $this->Mod_karyawan->get_karyawan($nik_karyawan);
        $cek_username = $this->Mod_karyawan->get_username_karyawan($username_karyawan_baru);

        if($jenis == "Tambah"){

            if($cek_nip->num_rows() > 0){
                echo "NIP sudak ada..!!";
            }
            elseif($cek_username->num_rows() > 0){
                echo "Username sudah ada..!!";
            }
            else{
                echo 1;   

                if($this->upload->do_upload('file')){  
                    $data = array('upload_data' => $this->upload->data());
                    $foto_karyawan = $data['upload_data']['file_name'];
                }else{
                    $foto_karyawan = NULL;  
                }
                       
                $data  = array(
                    'nik_karyawan'          => $this->input->post('nik_karyawan'),
                    'level_karyawan'        => $this->input->post('level_karyawan'),
                    'nama_karyawan'         => $this->input->post('nama_karyawan'),
                    'alamat_karyawan'       => $this->input->post('alamat_karyawan'),
                    'kontak_karyawan'       => $this->input->post('kontak_karyawan'),
                    'foto_karyawan'         => $foto_karyawan,
                    'username_karyawan'     => $this->input->post('username_karyawan_baru'),
                    'password_karyawan'     => $this->input->post('password_karyawan')             
                );
                $this->Mod_karyawan->insert_karyawan($data);                   
            }
        }
        
        elseif($jenis == "Edit"){

            if($username_karyawan_lama == $username_karyawan_baru){
                echo 1;         
                    
                if($this->upload->do_upload('file')){      
                    $foto_karyawan_lama = $this->input->post('foto_karyawan_lama'); 
                    if($foto_karyawan_lama != NULL){  
                        unlink('assets/img/karyawan/'.$foto_karyawan_lama);
                    }

                    $data = array('upload_data' => $this->upload->data());
                    $foto_karyawan = $data['upload_data']['file_name'];
                }else{
                    $foto_karyawan = $this->input->post('foto_karyawan_lama');
                }

                $data  = array(
                    'nik_karyawan'          => $this->input->post('nik_karyawan'),
                    'level_karyawan'        => $this->input->post('level_karyawan'),
                    'nama_karyawan'         => $this->input->post('nama_karyawan'),
                    'alamat_karyawan'       => $this->input->post('alamat_karyawan'),
                    'kontak_karyawan'       => $this->input->post('kontak_karyawan'),
                    'foto_karyawan'         => $foto_karyawan,
                    'username_karyawan'     => $this->input->post('username_karyawan_baru'),
                    'password_karyawan'     => $this->input->post('password_karyawan')             
                );
                
                $this->Mod_karyawan->update_karyawan($nik_karyawan, $data);             
            }
            else{
                if($cek_username->num_rows() > 0){
                    echo "Username sudah ada..!!";
                }
                else{
                    echo 1;
                    
                    if($this->upload->do_upload('file')){      
                        $foto_karyawan_lama = $this->input->post('foto_karyawan_lama');  
                        if($foto_karyawan_lama != NULL){  
                            unlink('assets/img/karyawan/'.$foto_karyawan_lama);
                        }

                        $data = array('upload_data' => $this->upload->data());
                        $foto_karyawan = $data['upload_data']['file_name'];
                    }else{
                        $foto_karyawan = $this->input->post('foto_karyawan_lama');
                    }
                    
                    $data  = array(
                        'nik_karyawan'          => $this->input->post('nik_karyawan'),
                        'level_karyawan'        => $this->input->post('level_karyawan'),
                        'nama_karyawan'         => $this->input->post('nama_karyawan'),
                        'alamat_karyawan'       => $this->input->post('alamat_karyawan'),
                        'kontak_karyawan'       => $this->input->post('kontak_karyawan'),
                        'foto_karyawan'         => $foto_karyawan,
                        'username_karyawan'     => $this->input->post('username_karyawan_baru'),
                        'password_karyawan'     => $this->input->post('password_karyawan')             
                    );

                    $this->Mod_karyawan->update_karyawan($nik_karyawan, $data); 
                }
            }
        }
    }

    function hapus_karyawan(){
        $nik_karyawan = $this->input->post('nik_karyawan');
        $g = $this->Mod_karyawan->get_karyawan($nik_karyawan)->row_array();
        unlink('assets/img/karyawan/'.$g['foto_karyawan']);
        $this->Mod_karyawan->delete_karyawan($nik_karyawan);
    } 


    function data_penialaian_sales($nik_sales){
        $nik_karyawan = $this->session->userdata('ses_nik_karyawan');  
        $hak_akses = $this->session->userdata('ses_akses');  

        if($nik_karyawan != null && $hak_akses == 'Admin'){

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
            $this->load->view("backend/admin/karyawan/body_data_penilaian_sales",$data);
        }
        else{ 
            redirect('login');
        }  
    }


    function print($nik_sales){
        $nik_karyawan = $this->session->userdata('ses_nik_karyawan');  
        $hak_akses = $this->session->userdata('ses_akses');  

        if($nik_karyawan != null && $hak_akses == 'Admin'){

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
            $this->load->view("backend/admin/karyawan/body_print",$data);
        }
        else{ 
            redirect('login');
        }  
    }


}
