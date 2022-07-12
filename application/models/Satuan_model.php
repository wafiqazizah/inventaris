<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan_model extends CI_Model
{

    public function getAllSatuan()
    {
        return $this->db->get('satuan')->result_array();
    }

    public function getSatuan($limit, $start){
        return $this->db->get('satuan', $limit, $start)->result_array();
    }

    public function countAllSatuan(){
        return $this->db->get('satuan')->num_rows();
    }

    public function tambahDataSatuan()
    {
        $data = array(
            'id_satuan' => $this->input->post('id_satuan', true),
            'nama_satuan' => $this->input->post('nama_satuan', true),
        );
        $this->db->insert('satuan', $data);
    }

    public function hapusDataSatuan($id)
    {
        $this->db->where('id_satuan', $id);
        $this->db->delete('satuan');
    }
    public function getSatuanById($id)
    {
        return $this->db->get_where('satuan', ['id_satuan' => $id])->row_array();
    }
    public function ubahDataSatuan()
    {
        $data = array(
            'id_satuan' => $this->input->post('id_satuan', true),
            'nama_satuan' => $this->input->post('nama_satuan', true),
        );

        $this->db->where('id_satuan', $this->input->post('id_satuan'));
        $this->db->update('satuan', $data);
    }

    public function cariDataSatuan()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->or_like('nama_satuan', $keyword);
        $this->db->or_like('id_satuan', $keyword);
        return $this->db->get('satuan')->result_array();
    }
}
