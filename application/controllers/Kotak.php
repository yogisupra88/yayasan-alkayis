<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kotak extends CI_Controller
{

    public function input_dana()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');

        if (isset($sesi_username)) {
            $kode = $this->input->post('kode_kotak');
            $kotak = $this->crud_m->get_row(['kode_kotak' => $kode], 'kotak'); // cek data user dari model => table admin
            if ($kotak) {
                $data['kode_kotak'] = $kotak->kode_kotak;
                $data['donatur'] = $kotak->nama_donatur;
                $data['alamat'] = $kotak->alamat;
                $data['username'] = $sesi_username;
                $data['nama'] = $sesi_nama;
                $data['jabatan'] = $jabatan;
                $data['title'] = 'Yayasan Al kayis || form Kotak Amal';
                $data['crumb'] = 'Form Input Dana';

                $this->template->load('mainpage', 'input_dana_kotak', $data);
            } else {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h6><i class="icon fas fa-exclamation-triangle"></i> Data Tidak Terdeteksi !</h6>
                </div>
                ');
                redirect('mydashboard/scaning_form');
            }
        } else {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fas fa-exclamation-triangle"></i> Silahkan Login Dahulu..!</h6>
            </div>
            ');
            redirect('auth');
        }
    }
    public function manual_form()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');

        if (isset($sesi_username)) {
            $data['jabatan'] = $jabatan;
            $data['username'] = $sesi_username;
            $data['nama'] = $sesi_nama;

            $data['title'] = 'Yayasan Al kayis || form Kotak Amal';
            $data['crumb'] = 'Form Input Dana';
            $data['kotak'] = $this->crud_m->lihat_data('kotak');
            $this->template->load('mainpage', 'manual_input_dana', $data);
        } else {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fas fa-exclamation-triangle"></i> Silahkan Login Dahulu..!</h6>
            </div>
            ');
            redirect('auth');
        }
    }
    public function print_kotak($id)
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');

        if (isset($sesi_username)) {
            $id = decrypt_url($id);
            $kotak = $this->crud_m->get_row(['id_kotak' => $id], 'kotak');
            $data['kode_kotak'] = $kotak->kode_kotak;
            $data['donatur'] = $kotak->nama_donatur;
            $data['alamat'] = $kotak->alamat;
            $data['foto_qr'] = $kotak->foto_qr;
            $this->load->view('print_kotak', $data);
        } else {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fas fa-exclamation-triangle"></i> Silahkan Login Dahulu..!</h6>
            </div>
            ');
            redirect('auth');
        }
    }
    public function print_all()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');

        if (isset($sesi_username)) {
            $data['kotak'] = $this->crud_m->lihat_data('kotak');
            $this->load->view('print_kotak_all', $data);
        } else {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fas fa-exclamation-triangle"></i> Silahkan Login Dahulu..!</h6>
            </div>
            ');
            redirect('auth');
        }
    }
}

/* End of file Controllername.php */