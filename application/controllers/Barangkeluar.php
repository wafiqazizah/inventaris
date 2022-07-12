<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangkeluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barangkeluar_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Daftar Barang Keluar";

        //library pagination
        $this->load->library('pagination');
        
        $config['base_url'] = 'http://localhost/inventaris/Barangkeluar/index';
        $config['total_rows'] = $this->Barangkeluar_model->countAllBarangkeluar();
        $config['per_page']  = 5;

        //styling
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        //initialiaze
        $this->pagination->initialize($config);
        $data['start']=$this->uri->segment(3);
        $data['barangkeluar'] = $this->Barangkeluar_model->getBarangkeluar($config['per_page'], $data['start']);
        if ($this->input->post('keyword')) {
            $data['barangkeluar'] = $this->Barangkeluar_model->CariDataBarangkeluar();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('barangkeluar/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Tambah Data Barang Keluar";

        $this->form_validation->set_rules('id_barang_keluar', 'Kode Keluar', 'required');
        $this->form_validation->set_rules('id_user', 'Kode User', 'required');
        $this->form_validation->set_rules('id_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('id_supplier', 'Kode supplier', 'required');
        $this->form_validation->set_rules('jumlah_keluar', 'Jumlah Barang Keluar', 'required');
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal Barang Keluar', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('barangkeluar/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Barang_model->TambahDataBarangkeluar();
            $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
            redirect('http://localhost/inventaris/Barangkeluar');
        }
    }

    public function hapus($id)
    {
        $this->Barangkeluar_model->hapusDataBarangkeluar($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('http://localhost/inventaris/Barangkeluar');
    }
    public function detail($id)
    {
        $data['judul'] = "Detail Barang Keluar";
        $data['barangkeluar'] = $this->Barangkeluar_model->getBarangkeluarById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('barangkeluar/detail', $data);
        $this->load->view('templates/footer');
    }
    public function ubah($id)
    {
        $data['judul'] = "Ubah Data Barangkeluar";
        $data['barangkeluar'] = $this->Barangkeluar_model->getBarangkeluarById($id);
        $this->form_validation->set_rules('id_barang_keluar', 'Kode Keluar', 'required');
        $this->form_validation->set_rules('id_user', 'Kode User', 'required');
        $this->form_validation->set_rules('id_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('id_supplier', 'Kode Supplier', 'required');
        $this->form_validation->set_rules('jumlah_keluar', 'Jumlah Barang Keluar', 'required');
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal Barang Keluar', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('barangkeluar/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Barang_model->ubahDataBarangkeluar();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('http://localhost/inventaris/Barangkeluar');
        }
    }
}
