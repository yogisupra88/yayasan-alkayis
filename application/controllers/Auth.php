<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('auth_m');
    }


    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Username Harus di isi..!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password Harus di isi..!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            // validasi sukses
            $this->_login();
        }
    }
    public function _login()
    {

        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars($this->input->post('password'));

        $pass_sha = sha1($password);
        $where = array('username' => $username);
        $cekuser = $this->auth_m->cek_user($where, 'user'); // cek data user dari model => table admin
        // cek data user admin
        if ($cekuser) {
            $password_user = $cekuser['pass_sha'];
            if ($password_user == $pass_sha) {
                $data = [
                    'username' => $cekuser['username'],
                    'nama' => $cekuser['nama'],
                    'jabatan' => $cekuser['jabatan'],
                ];
                $this->session->set_userdata($data);
                if ($cekuser['jabatan'] == 'Admin') {
                    redirect('mydashboard/beranda_admin');
                } else {
                    redirect('mydashboard/beranda_petugas');
                }
            } else {
                $this->session->set_flashdata('pesan', 'Salah Isi Password');
                redirect('auth');
            }
        } else {

            $this->session->set_flashdata('pesan', 'Username Tidak Ada');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('jabatan');
        $this->session->set_flashdata('pesan', 'Anda Sudah logout');
        redirect('auth');
    }
}

/* End of file Controllername.php */