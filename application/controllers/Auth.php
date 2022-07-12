<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); 
    }

    public function index()
    {
        $this->form_validation->set_rules('email','Alamat Email','required|trim|valid_email',[
            'required'=>'Email harus diisi',
            'valid_email'=>'Email tidak benar'
        ]);

        $this->form_validation->set_rules('password','Password','required|trim',[
            'required'=>'Password harus diisi',
        ]);

        if($this->form_validation->run()==false){
            $data['judul']='Halaman Login';
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }else{
            $this->_login();
        }

    }

    private function _login(){
        $email=htmlspecialchars($this->input->post('email',true));
        $password=$this->input->post('password',true);

        $user=$this->db->get_where('user',['email'=>$email])->row_array();

        if($user)
        {
            if($user['is_active']==1){
                if(password_verify($password,$user['password'])){
                    $data=[
                        'email'=>$user['email'],
                        'role'=>$user['role']
                    ];
    
                    $this->session->set_userdata($data);
                    redirect('http://localhost/inventaris/Barang');
                }else{
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-message" role="alert">Password Salah</div>');
                    redirect('http://localhost/inventaris/auth');
                }
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-message" role="alert">User Belum Diaktivasi</div>');
                redirect('http://localhost/inventaris/auth');
            }
        }else{
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-message" role="alert">Email Tidak Terdaftar</div>');
            redirect('http://localhost/inventaris/auth');
        }

    }

    public function registration()
    {
        $data['judul']='Registrasi';

        $this->form_validation->set_rules('nama','Nama','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',
        [
            'is_unique' => 'This email has already registered!'
        ]);

        $this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',
        [
            'matches'=>'password dont match',
            'min_length'=>'password too short!'
        ]);
    
        $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
        if($this->form_validation->run()==false)
        {
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        }
        else
        {
            $data=[
                'nama'=>htmlspecialchars($this->input->post('nama',true)),
                'username'=>htmlspecialchars($this->input->post('username',true)),
                'email'=>htmlspecialchars($this->input->post('email',true)),
                'no_telp'=>htmlspecialchars($this->input->post('no_telp',true)),
                'role'=>2,
                'password'=>password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                'created_at'=>time(),
                'foto'=>'default.jpg',
                'is_active'=>1
                
                
            ];
            $this->db->insert('user',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Berhasil Disimpan Silahkan Login 
            </div>');
            redirect('http://localhost/inventaris/auth');

        }

    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('password');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Anda Telah Logout </div>');
        redirect('http://localhost/inventaris/auth');
    }

}