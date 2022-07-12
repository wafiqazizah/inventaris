<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = "Daftar Jenis";

        //library pagination
        $this->load->library('pagination');
        
        $config['base_url'] = 'http://localhost/inventaris/Jenis/index';
        $config['total_rows'] = $this->Jenis_model->countAllJenis();
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
        $data['jenis'] = $this->Jenis_model->getJenis($config['per_page'], $data['start']);
        if ($this->input->post('keyword')) {
            $data['jenis'] = $this->Jenis_model->CariDataJenis();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('jenis/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Tambah Data Jenis";

        $this->form_validation->set_rules('id_jenis', 'Kode Jenis', 'required');
        $this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('jenis/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Jenis_model->TambahDataJenis();
            $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
            redirect('http://localhost/inventaris/Jenis');
        }
    }

    public function hapus($id)
    {
        $this->Jenis_model->hapusDataJenis($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('http://localhost/inventaris/Jenis');
    }
    public function detail($id)
    {
        $data['judul'] = "Detail Jenis";
        $data['jenis'] = $this->Jenis_model->getJenisById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('jenis/detail', $data);
        $this->load->view('templates/footer');
    }
    public function ubah($id)
    {
        $data['judul'] = "Ubah Data Jenis";
        $data['jenis'] = $this->Jenis_model->getJenisById($id);
        $this->form_validation->set_rules('id_jenis', 'Kode Jenis', 'required');
        $this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('jenis/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Jenis_model->ubahDataJenis();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('http://localhost/inventaris/Jenis');
        }
    }
}
