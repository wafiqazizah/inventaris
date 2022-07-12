<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function getUser($limit, $start){
        return $this->db->get('user', $limit, $start)->result_array();
    }

    public function countAllUser(){
        return $this->db->get('user')->num_rows();
    }

    public function tambahDataUser()
    {
        $data = array(
            'id_user' => $this->input->post('id_user', true),
            'nama' => $this->input->post('nama', true),
            'username' => $this->input->post('username', true),
            'no_telp' => $this->input->post('no_telp', true),
            'email' => $this->input->post('email', true),
            'password' => $this->input->post('password', true),
            'role' => $this->input->post('role', true),
        );
        $this->db->insert('user', $data);
    }

    public function hapusDataUser($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }
    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }
    public function ubahDataUser()
    {
        $data = array(
            'nama' => $this->input->post('nama', true),
            'username' => $this->input->post('username', true),
            'no_telp' => $this->input->post('no_telp', true),
            'email' => $this->input->post('email', true),
            'role' => $this->input->post('role', true),
        );

        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }

    public function cariDataUser()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('id_user', $keyword);
        return $this->db->get('user')->result_array();
    }
}
