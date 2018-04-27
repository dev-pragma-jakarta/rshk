<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kewarganegaraan extends CI_Model {

 public function __construct() {
        parent::__construct();
    }

    // fungsi tampil semua
    public function get_all($params) {
        $sql = "SELECT id_kewarganegaraan, nama_kewarganegaraan, deskripsi, created_at, created_by 
                FROM m_kewarganegaraan 
                WHERE nama_kewarganegaraan LIKE ?";
        $query = $this->db->query($sql,$params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        } else {
            $result = array();
        }
        return $result;
    }

   	// tambah
    public function get_add($params) {
        return $this->db->insert('m_kewarganegaraan', $params);
    }

    // detail data
    public function get_detail_data($params) {
        $sql = "SELECT *
                FROM m_kewarganegaraan 
                WHERE id_kewarganegaraan = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // ubah
    public function get_edit($params, $where) {
        return $this->db->update('m_kewarganegaraan', $params, $where);
    }
    

    // delete
    public function get_delete($where){
        return $this->db->delete('m_kewarganegaraan', $where);
    }

}