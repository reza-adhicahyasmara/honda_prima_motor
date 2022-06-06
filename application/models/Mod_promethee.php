<?php 
defined('BASEPATH') || exit('No direct script access allowed');

class Mod_promethee extends CI_Model {
    function get_all_kriteria(){ 
        $this->db->select('kriteria.*');
        $this->db->from('kriteria');
        $this->db->order_by('kriteria.kode_kriteria ASC');
        return $this->db->get(); 
    }

    function get_all_subkriteria(){ 
        $this->db->select('subkriteria.*, kriteria.*');
        $this->db->from('subkriteria');
        $this->db->join('kriteria', 'kriteria.kode_kriteria = subkriteria.kode_kriteria', 'left');
        $this->db->order_by('subkriteria.kode_subkriteria ASC');
        return $this->db->get(); 
    }



    //PENILAIAN
    function get_all_penilaian(){ 
        $this->db->select('penilaian.*, karyawan.*');
        $this->db->from('penilaian');
        $this->db->join('karyawan', 'karyawan.nik_karyawan = penilaian.nik_karyawan', 'left');
        $this->db->order_by('penilaian.tanggal_penilaian ASC');
        return $this->db->get(); 
    }
    
    function get_all_penilaian_peringkat($kode_rekap){ 
        $this->db->select('penilaian.*, karyawan.*');
        $this->db->from('penilaian');
        $this->db->join('karyawan', 'karyawan.nik_karyawan = penilaian.nik_karyawan', 'left');
        $this->db->where('penilaian.kode_rekap', $kode_rekap);
        $this->db->order_by('penilaian.ranking_penilaian ASC');
        return $this->db->get(); 
    }

    function get_all_penilaian_bulan_ini(){ 
        $this->db->select('penilaian.*, karyawan.*');
        $this->db->from('penilaian');
        $this->db->join('karyawan', 'karyawan.nik_karyawan = penilaian.nik_karyawan', 'left');
        $this->db->where('YEAR(tanggal_penilaian) = YEAR(CURDATE())');
        $this->db->where('MONTH(tanggal_penilaian) = MONTH(CURDATE())');
        $this->db->order_by('penilaian.tanggal_penilaian ASC');
        return $this->db->get(); 
    }

    function get_penilaian($kode_penilaian){ 
        $this->db->select('penilaian.*, karyawan.*');
        $this->db->from('penilaian');
        $this->db->join('karyawan', 'karyawan.nik_karyawan = penilaian.nik_karyawan', 'left');
        $this->db->where('penilaian.kode_penilaian', $kode_penilaian);
        return $this->db->get(); 
    }

    function cek_tanggal_penilaian($nik_karyawan){ 
        $this->db->where('nik_karyawan', $nik_karyawan);
        $this->db->where('YEAR(tanggal_penilaian) = YEAR(CURDATE())');
        $this->db->where('MONTH(tanggal_penilaian) = MONTH(CURDATE())');
        return $this->db->get('penilaian'); 
    }

    function insert_penilaian($data){
        $this->db->insert('penilaian', $data);
    }

    function update_penilaian($kode_penilaian, $data){
        $this->db->where('kode_penilaian', $kode_penilaian);
		$this->db->update('penilaian', $data);
    }

    function delete_penilaian($kode_penilaian){
        $this->db->where('kode_penilaian', $kode_penilaian);
        $this->db->delete('penilaian');
    }




    //REKAP

    function get_all_rekap(){ 
        $this->db->select('rekap.*');
        $this->db->from('rekap');
        $this->db->order_by('rekap.tanggal_rekap ASC');
        return $this->db->get(); 
    }

    function get_all_rekap_bulan_ini(){ 
        $this->db->select('rekap.*');
        $this->db->from('rekap');
        $this->db->where('YEAR(tanggal_rekap) = YEAR(CURDATE())');
        $this->db->where('MONTH(tanggal_rekap) = MONTH(CURDATE())');
        $this->db->order_by('rekap.tanggal_rekap ASC');
        return $this->db->get(); 
    }

    function get_rekap($kode_rekap){ 
        $this->db->select('rekap.*, penilaian.*');
        $this->db->from('rekap');
        $this->db->join('penilaian', 'penilaian.kode_rekap = rekap.kode_rekap', 'left');
        $this->db->where('rekap.kode_rekap', $kode_rekap);
        return $this->db->get(); 
    }

    function insert_rekap($data){
        $this->db->insert('rekap', $data);
    }


}