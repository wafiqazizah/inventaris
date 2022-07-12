<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Daftar Supplier";

        //library pagination
        $this->load->library('pagination');
        
        $config['base_url'] = 'http://localhost/inventaris/Supplier/index';
        $config['total_rows'] = $this->Supplier_model->countAllSupplier();
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
        $data['supplier'] = $this->Supplier_model->getSupplier($config['per_page'], $data['start']);
        if ($this->input->post('keyword')) {
            $data['supplier'] = $this->Supplier_model->CariDataSupplier();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('supplier/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Tambah Data Supplier";

        $this->form_validation->set_rules('id_supplier', 'Kode Supplier', 'required');
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telepon Supplier', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat Supplier', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('supplier/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Supplier_model->tambahDataSupplier();
            $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
            redirect('http://localhost/inventaris/Supplier');
        }
    }

    public function hapus($id)
    {
        $this->Supplier_model->hapusDataSupplier($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('http://localhost/inventaris/Supplier');
    }
    public function detail($id)
    {
        $data['judul'] = "Detail Supplier";
        $data['supplier'] = $this->Supplier_model->getSupplierById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('supplier/detail', $data);
        $this->load->view('templates/footer');
    }
    public function ubah($id)
    {
        $data['judul'] = "Ubah Data Supplier";
        $data['supplier'] = $this->Supplier_model->getSupplierById($id);
        $this->form_validation->set_rules('id_supplier', 'Kode Supplier', 'required');
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telepon Supplier', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat Supplier', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('Supplier/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Supplier_model->ubahDataSupplier();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('http://localhost/inventaris/Supplier');
        }
    }
}
