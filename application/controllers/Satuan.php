<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Satuan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Daftar Satuan";

        //library pagination
        $this->load->library('pagination');
        
        $config['base_url'] = 'http://localhost/inventaris/Satuan/index';
        $config['total_rows'] = $this->Satuan_model->countAllSatuan();
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
        $data['satuan'] = $this->Satuan_model->getSatuan($config['per_page'], $data['start']);
        if ($this->input->post('keyword')) {
            $data['satuan'] = $this->Satuan_model->CariDataSatuan();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('satuan/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Tambah Data Satuan";

        $this->form_validation->set_rules('id_satuan', 'Kode Satuan', 'required');
        $this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('satuan/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Satuan_model->TambahDataSatuan();
            $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
            redirect('http://localhost/inventaris/Satuan');
        }
    }

    public function hapus($id)
    {
        $this->Satuan_model->hapusDataSatuan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('http://localhost/inventaris/Satuan');
    }
    public function detail($id)
    {
        $data['judul'] = "Detail Satuan";
        $data['satuan'] = $this->Satuan_model->getSatuanById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('satuan/detail', $data);
        $this->load->view('templates/footer');
    }
    public function ubah($id)
    {
        $data['judul'] = "Ubah Data Satuan";
        $data['satuan'] = $this->Satuan_model->getSatuanById($id);
        $this->form_validation->set_rules('id_satuan', 'Kode Satuan', 'required');
        $this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('satuan/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Satuan_model->ubahDataSatuan();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('http://localhost/inventaris/Satuan');
        }
    }
}
