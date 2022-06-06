<?php 
defined('BASEPATH') || exit('No direct script access allowed');

class Mod_karyawan extends CI_Model {

    function get_all_karyawan(){ 
        $this->db->order_by('nama_karyawan ASC');
        return $this->db->get('karyawan'); 
    }

    function get_karyawan($nik_karyawan){
        $this->db->where('nik_karyawan', $nik_karyawan);
        $this->db->order_by('nama_karyawan ASC');
        return $this->db->get('karyawan');
    }
    
    function get_username_karyawan($username_karyawan){
        $this->db->where('username_karyawan', $username_karyawan);
        return $this->db->get('karyawan');
    }
    
    function get_kontak_karyawan($kontak_karyawan){
        $this->db->where('kontak_karyawan', $kontak_karyawan);
        return $this->db->get('karyawan');
    }

    function insert_karyawan($data){
        $this->db->insert('karyawan', $data);
    }

    function update_karyawan($nik_karyawan, $data){
        $this->db->where('nik_karyawan', $nik_karyawan);
		$this->db->update('karyawan', $data);
    }

    function delete_karyawan($nik_karyawan){
        $this->db->where('nik_karyawan', $nik_karyawan);
        $this->db->delete('karyawan');
    }

    function auth_karyawan($username_karyawan, $password_karyawan){
        $this->db->where('username_karyawan ', $username_karyawan);
        $this->db->where('password_karyawan ', $password_karyawan);
        return $this->db->get('karyawan');
    }
}