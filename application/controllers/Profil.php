<?php 
defined('BASEPATH') || exit('No direct script access allowed');

class Profil extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Mod_karyawan');
        $this->load->model('Mod_promethee');
    }

    function index(){
        $nik_karyawan = $this->session->userdata('ses_nik_karyawan');   
        $hak_akses = $this->session->userdata('ses_akses');  

        if($nik_karyawan != null && $hak_akses == 'Admin' || $nik_karyawan != null && $hak_akses == 'Sales' || $nik_karyawan != null && $hak_akses == 'Pimpinan'){
            $data['pageTitle'] = "Profil";
 
		    $data['edit'] = $this->Mod_karyawan->get_karyawan($nik_karyawan)->row_array();

            $this->load->view("backend/profil/body_profil",$data);
        } 
        else{ 
            redirect('login');
        }   
    }

    function ganti_password(){
        $nik_karyawan = $this->session->userdata('ses_nik_karyawan');   
        $hak_akses = $this->session->userdata('ses_akses');  

        if($nik_karyawan != null && $hak_akses == 'Admin' || $nik_karyawan != null && $hak_akses == 'Sales' || $nik_karyawan != null && $hak_akses == 'Pimpinan'){
            $data['pageTitle'] = "Ganti Password";
 
		    $data['edit'] = $this->Mod_karyawan->get_karyawan($nik_karyawan)->row_array();

            $this->load->view("backend/profil/body_password",$data);
        }  
        else{ 
            redirect('login');
        }   
    }

    function edit_karyawan(){
        $nik_karyawan = $this->input->post('nik_karyawan');
        $nama_karyawan = $this->input->post('nama_karyawan');
        $alamat_karyawan = $this->input->post('alamat_karyawan');
        $kontak_karyawan = $this->input->post('kontak_karyawan');
        $username_karyawan_lama = $this->input->post('username_karyawan_lama');
        $username_karyawan_baru = $this->input->post('username_karyawan_baru');
    
        $config['upload_path'] = './assets/img/karyawan/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['image_library'] = 'gd2';
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 500;

        $this->upload->initialize($config);
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $cek_username = $this->Mod_karyawan->get_username_karyawan($username_karyawan_baru);
                  
        if($username_karyawan_baru != $username_karyawan_lama){
            if($cek_username->num_rows() > 0){
                echo "Username sudah terdaftar..!!";
            }else{
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
                    'nik_karyawan'          => $nik_karyawan,
                    'nama_karyawan'         => $nama_karyawan,
                    'alamat_karyawan'       => $alamat_karyawan,
                    'kontak_karyawan'       => $kontak_karyawan,
                    'username_karyawan'     => $username_karyawan_baru,
                    'foto_karyawan'         => $foto_karyawan
                );
                $this->Mod_karyawan->update_karyawan($nik_karyawan, $data); 
            }
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
                'nik_karyawan'          => $nik_karyawan,
                'nama_karyawan'         => $nama_karyawan,
                'alamat_karyawan'       => $alamat_karyawan,
                'kontak_karyawan'       => $kontak_karyawan,
                'username_karyawan'     => $username_karyawan_baru,
                'foto_karyawan'         => $foto_karyawan
            );
            $this->Mod_karyawan->update_karyawan($nik_karyawan, $data);   
        }     
    }
    
    function reset_password(){
        $username = $this->session->userdata('ses_username_karyawan');  
        $nik_karyawan = $this->input->post('nik_karyawan');
        $password = $this->input->post('password_lama');
        $password_baru_1 = $this->input->post('password_baru_1');
        $password_baru_2 = $this->input->post('password_baru_2');

        $cek_password = $this->Mod_karyawan->auth_karyawan($username, $password);
        if($cek_password->num_rows() > 0){

            echo 1;
            $save  = array(
                'username_karyawan'         => $username,
                'password_karyawan'         => $password_baru_2
            );    
            $this->Mod_karyawan->update_karyawan($nik_karyawan, $save);

        } else {
            
            echo "Password lama salah..!";
        }
    }

}