<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangkeluar_model extends CI_Model
{

    public function getAllBarangkeluar()
    {
        return $this->db->get('barangkeluar')->result_array();
    }

    public function getBarangkeluar($limit, $start){
        return $this->db->get('barangkeluar', $limit, $start)->result_array();
    }

    public function countAllBarangkeluar(){
        return $this->db->get('barangkeluar')->num_rows();
    }

    public function tambahDataBarangkeluar()
    {
        $data = array(
            'id_barang_keluar' => $this->input->post('id_barang_keluar', true),
            'id_user' => $this->input->post('id_user', true),
            'id_barang' => $this->input->post('id_barang', true),
            'jumlah_keluar' => $this->input->post('jumlah_keluar', true),
            'tanggal_keluar' => $this->input->post('tanggal_keluar', true)
        );
        $this->db->insert('barangkeluar', $data);
    }

    public function hapusDataBarangkeluar($id)
    {
        $this->db->where('id_barang_keluar', $id);
        $this->db->delete('barangkeluar');
    }
    public function getBarangkeluarById($id)
    {
        return $this->db->get_where('barangkeluar', ['id_barang_keluar' => $id])->row_array();
    }
    public function ubahDataBarangkeluar()
    {
        $data = array(
            'id_barang_keluar' => $this->input->post('id_barang_keluar', true),
            'id_user' => $this->input->post('id_user', true),
            'id_barang' => $this->input->post('id_barang', true),
            'jumlah_keluar' => $this->input->post('jumlah_keluar', true),
            'tanggal_keluar' => $this->input->post('tanggal_keluar', true)
        );

        $this->db->where('id_barang_keluar', $this->input->post('id_barang_keluar'));
        $this->db->update('barangkeluar', $data);
    }

    public function cariDataBarangkeluar()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->or_like('id_user', $keyword);
        $this->db->or_like('id_barang', $keyword);
        $this->db->or_like('jumlah_keluar', $keyword);
        $this->db->or_like('tanggal_keluar', $keyword);
        return $this->db->get('barangkeluar')->result_array();
    }
}
