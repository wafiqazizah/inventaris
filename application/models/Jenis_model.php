<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_model extends CI_Model
{

    public function getAllJenis()
    {
        return $this->db->get('jenis')->result_array();
    }

    public function getJenis($limit, $start){
        return $this->db->get('jenis', $limit, $start)->result_array();
    }

    public function countAllJenis(){
        return $this->db->get('jenis')->num_rows();
    }

    public function tambahDataJenis()
    {
        $data = array(
            'id_jenis' => $this->input->post('id_jenis', true),
            'nama_jenis' => $this->input->post('nama_jenis', true),
        );
        $this->db->insert('jenis', $data);
    }

    public function hapusDataJenis($id)
    {
        $this->db->where('id_jenis', $id);
        $this->db->delete('jenis');
    }
    public function getJenisById($id)
    {
        return $this->db->get_where('jenis', ['id_jenis' => $id])->row_array();
    }
    public function ubahDataJenis()
    {
        $data = array(
            'id_jenis' => $this->input->post('id_jenis', true),
            'nama_jenis' => $this->input->post('nama_jenis', true),
        );

        $this->db->where('id_jenis', $this->input->post('id_jenis'));
        $this->db->update('jenis', $data);
    }

    public function cariDataJenis()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->or_like('nama_jenis', $keyword);
        $this->db->or_like('id_jenis', $keyword);
        return $this->db->get('jenis')->result_array();
    }
}
