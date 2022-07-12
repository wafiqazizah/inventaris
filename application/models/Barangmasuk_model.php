<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangmasuk_model extends CI_Model
{

    public function getAllBarangmasuk()
    {
        return $this->db->get('barangmasuk')->result_array();
    }

    public function getBarangmasuk($limit, $start){
        return $this->db->get('barangmasuk', $limit, $start)->result_array();
    }

    public function countAllBarangmasuk(){
        return $this->db->get('barangmasuk')->num_rows();
    }

    public function tambahDataBarangmasuk()
    {
        $data = array(
            'id_barang_masuk' => $this->input->post('id_barang_masuk', true),
            'id_user' => $this->input->post('id_user', true),
            'id_barang' => $this->input->post('id_barang', true),
            'jumlah_masuk' => $this->input->post('jumlah_masuk', true),
            'tanggal_masuk' => $this->input->post('tanggal_masuk', true)
        );
        $this->db->insert('barangmasuk', $data);
    }

    public function hapusDataBarangmasuk($id)
    {
        $this->db->where('id_barang_masuk', $id);
        $this->db->delete('barangmasuk');
    }
    public function getBarangmasukById($id)
    {
        return $this->db->get_where('barangmasuk', ['id_barang_masuk' => $id])->row_array();
    }
    public function ubahDataBarangmasuk()
    {
        $data = array(
            'id_barang_masuk' => $this->input->post('id_barang_masuk', true),
            'id_user' => $this->input->post('id_user', true),
            'id_barang' => $this->input->post('id_barang', true),
            'jumlah_masuk' => $this->input->post('jumlah_masuk', true),
            'tanggal_masuk' => $this->input->post('tanggal_masuk', true)
        );

        $this->db->where('id_barang_masuk', $this->input->post('id_barang_masuk'));
        $this->db->update('barangmasuk', $data);
    }

    public function cariDataBarangmasuk()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->or_like('id_user', $keyword);
        $this->db->or_like('id_barang', $keyword);
        $this->db->or_like('jumlah_masuk', $keyword);
        $this->db->or_like('tanggal_masuk', $keyword);
        return $this->db->get('barangmasuk')->result_array();
    }
}
