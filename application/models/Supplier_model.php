<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_Model
{

    public function getAllSupplier()
    {
        return $this->db->get('supplier')->result_array();
    }

    public function getSupplier($limit, $start){
        return $this->db->get('supplier', $limit, $start)->result_array();
    }

    public function countAllSupplier(){
        return $this->db->get('supplier')->num_rows();
    }

    public function tambahDataSupplier()
    {
        $data = array(
            'id_supplier' => $this->input->post('id_supplier', true),
            'nama_supplier' => $this->input->post('nama_supplier', true),
            'no_telp' => $this->input->post('no_telp', true),
            'alamat' => $this->input->post('alamat', true),
        );
        $this->db->insert('supplier', $data);
    }

    public function hapusDataSupplier($id)
    {
        $this->db->where('id_supplier', $id);
        $this->db->delete('supplier');
    }
    public function getSupplierById($id)
    {
        return $this->db->get_where('supplier', ['id_supplier' => $id])->row_array();
    }
    public function ubahDataSupplier()
    {
        $data = array(
            'id_supplier' => $this->input->post('id_supplier', true),
            'nama_supplier' => $this->input->post('nama_supplier', true),
            'no_telp' => $this->input->post('no_telp', true),
            'alamat' => $this->input->post('alamat', true),
        );

        $this->db->where('id_supplier', $this->input->post('id_supplier'));
        $this->db->update('supplier', $data);
    }

    public function cariDataSupplier()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->or_like('nama_supplier', $keyword);
        $this->db->or_like('id_supplier', $keyword);
        $this->db->or_like('no_telp', $keyword);
        $this->db->or_like('alamat', $keyword);
        return $this->db->get('supplier')->result_array();
    }
}
