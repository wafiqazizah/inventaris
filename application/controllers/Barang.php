<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Daftar Barang";

        //library pagination
        $this->load->library('pagination');
        
        $config['base_url'] = 'http://localhost/inventaris/Barang/index';
        $config['total_rows'] = $this->Barang_model->countAllBarang();
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
        $data['barang'] = $this->Barang_model->getBarang($config['per_page'], $data['start']);
        if ($this->input->post('keyword')) {
            $data['barang'] = $this->Barang_model->CariDataBarang();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('barang/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Tambah Data Barang";

        $this->form_validation->set_rules('id_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('id_jenis', 'Kode Jenis', 'required|numeric');
        $this->form_validation->set_rules('id_satuan', 'Kode Satuan', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('barang/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Barang_model->tambahDataBarang();
            $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
            redirect('http://localhost/inventaris/Barang');
        }
    }

    public function hapus($id)
    {
        $this->Barang_model->hapusDataBarang($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('http://localhost/inventaris/Barang');
    }
    public function detail($id)
    {
        $data['judul'] = "Detail Barang";
        $data['barang'] = $this->Barang_model->getBarangById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('barang/detail', $data);
        $this->load->view('templates/footer');
    }
    public function ubah($id)
    {
        $data['judul'] = "Ubah Data Barang";
        $data['barang'] = $this->Barang_model->getBarangById($id);
        $this->form_validation->set_rules('id_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('id_jenis', 'Kode Jenis', 'required|numeric');
        $this->form_validation->set_rules('id_satuan', 'Kode Satuan', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('barang/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Barang_model->ubahDataBarang();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('http://localhost/inventaris/Barang');
        }
    }
}
