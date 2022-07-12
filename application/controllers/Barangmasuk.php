<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangmasuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barangmasuk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Daftar Barang Masuk";

        //library pagination
        $this->load->library('pagination');
        
        $config['base_url'] = 'http://localhost/inventaris/Barangmasuk/index';
        $config['total_rows'] = $this->Barangmasuk_model->countAllBarangmasuk();
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
        $data['barangmasuk'] = $this->Barangmasuk_model->getBarangmasuk($config['per_page'], $data['start']);
        if ($this->input->post('keyword')) {
            $data['barangmasuk'] = $this->Barangmasuk_model->CariDataBarangmasuk();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('barangmasuk/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Tambah Data Barang Masuk";

        $this->form_validation->set_rules('id_barang_masuk', 'Kode Masuk', 'required');
        $this->form_validation->set_rules('id_user', 'Kode User', 'required');
        $this->form_validation->set_rules('id_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('jumlah_masuk', 'Jumlah Barang Masuk', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Barang Masuk', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('barangmasuk/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Barang_model->TambahDataBarangmasuk();
            $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
            redirect('http://localhost/inventaris/Barangmasuk');
        }
    }

    public function hapus($id)
    {
        $this->Barangmasuk_model->hapusDataBarangmasuk($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('http://localhost/inventaris/Barangmasuk');
    }
    public function detail($id)
    {
        $data['judul'] = "Detail Barang Masuk";
        $data['barangmasuk'] = $this->Barangmasuk_model->getBarangmasukById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('barangmasuk/detail', $data);
        $this->load->view('templates/footer');
    }
    public function ubah($id)
    {
        $data['judul'] = "Ubah Data Barangmasuk";
        $data['barangmasuk'] = $this->Barangmasuk_model->getBarangmasukById($id);
        $this->form_validation->set_rules('id_barang_masuk', 'Kode Masuk', 'required');
        $this->form_validation->set_rules('id_user', 'Kode User', 'required');
        $this->form_validation->set_rules('id_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('jumlah_masuk', 'Jumlah Barang Masuk', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Barang Masuk', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('barangmasuk/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Barang_model->ubahDataBarangmasuk();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('http://localhost/inventaris/Barangmasuk');
        }
    }
}
