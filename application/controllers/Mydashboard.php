<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mydashboard extends CI_Controller
{

    public function beranda_admin()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');

        if (isset($sesi_username)) {
            $data['username'] = $sesi_username;
            $data['nama'] = $sesi_nama;
            $data['jabatan'] = $jabatan;
            $data['title'] = 'Yayasan Al kayis || Beranda';
            $data['crumb'] = 'Beranda';
            $data['total_kotak'] = $this->info_m->total_kotak();
            $data['income'] = $this->info_m->income();
            $data['saldo_kas'] = $this->info_m->saldo_kas();
            $data['total_petugas'] = $this->info_m->total_petugas();
            $date = date("Y-m-d");
            $where_data = [
                'debet >' => 0,
                'tanggal ' =>  $date
            ];
            $data['data_income'] = $this->crud_m->get_data($where_data, 'kas');

            $this->template->load('mainpage', 'beranda_admin', $data);
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
    public function data_kotak()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');

        if (isset($sesi_username)) {
            $data['username'] = $sesi_username;
            $data['nama'] = $sesi_nama;
            $data['jabatan'] = $jabatan;
            $data['title'] = 'Yayasan Al kayis || Data Kotak';
            $data['crumb'] = 'Kotak';
            $data['kotak'] = $this->crud_m->lihat_data('kotak');
            $data['total_kotak'] = $this->info_m->total_kotak();
            $this->template->load('mainpage', 'data_kotak', $data);
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
    public function buku_kas()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');

        if (isset($sesi_username)) {
            $data['username'] = $sesi_username;
            $data['nama'] = $sesi_nama;
            $data['jabatan'] = $jabatan;
            $data['title'] = 'Yayasan Al kayis || Buku Kas';
            $data['crumb'] = 'Buku Kas';
            $data['kotak'] = $this->crud_m->lihat_data('kotak');
            $data['saldo_kas'] = $this->info_m->saldo_kas();
            $data['kas'] = $this->crud_m->lihat_data_sort('kas', 'kode_trx', 'desc');
            // $data['kas'] = $this->crud_m->lihat_data('kas');

            $data['income'] = $this->info_m->income(); // bulan ini
            $data['pengeluaran'] = $this->info_m->expediture(); // bulan ini

            $this->template->load('mainpage', 'buku_kas', $data);
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
    public function data_user()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');

        if (isset($sesi_username)) {
            $data['username'] = $sesi_username;
            $data['nama'] = $sesi_nama;
            $data['jabatan'] = $jabatan;
            $data['title'] = 'Yayasan Al kayis || Users';
            $data['crumb'] = 'User';
            $data['total_petugas'] = $this->info_m->total_petugas();
            $data['total_admin'] = $this->info_m->total_petugas();
            $data['user'] = $this->crud_m->lihat_data('user');
            $this->template->load('mainpage', 'data_user', $data);
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



    public function beranda_petugas()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');

        if (isset($sesi_username)) {
            $data['username'] = $sesi_username;
            $data['nama'] = $sesi_nama;
            $data['jabatan'] = $jabatan;
            $data['title'] = 'Yayasan Al kayis || Beranda';
            $data['crumb'] = 'Beranda';
            $data['kotak'] = $this->info_m->kotak_daily($sesi_username);
            $data['dana'] = $this->info_m->dana_daily($sesi_username);
            $this->template->load('mainpage', 'beranda_petugas', $data);
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
    public function scaning_form()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');

        if (isset($sesi_username)) {
            $data['username'] = $sesi_username;
            $data['nama'] = $sesi_nama;
            $data['jabatan'] = $jabatan;
            $data['title'] = 'Yayasan Al kayis || Scanning Kotak Amal';
            $data['crumb'] = 'Scanning';

            $this->template->load('mainpage', 'scaning', $data);
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
            $data['username'] = $sesi_username;
            $data['nama'] = $sesi_nama;
            $data['jabatan'] = $jabatan;
            $data['title'] = 'Yayasan Al kayis || Scanning Kotak Amal';
            $data['crumb'] = 'Scanning';

            $this->template->load('mainpage', 'scaning', $data);
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
    public function data_input()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');

        if (isset($sesi_username)) {
            $data['username'] = $sesi_username;
            $data['nama'] = $sesi_nama;
            $data['jabatan'] = $jabatan;
            $data['title'] = 'Yayasan Al kayis || Data Kotak Amal';
            $data['crumb'] = 'Data input Kotak Amal';
            $tanggal = date("Y-m-d");
            $data['data_kotak'] = $this->crud_m->get_data(['username' => $sesi_username, 'tanggal' => $tanggal], 'kas');

            $this->template->load('mainpage', 'data_dana_kotak', $data);
            // $this->load->view('table', $data, FALSE);

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
    public function myprofile()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');

        if (isset($sesi_username)) {
            $data['username'] = $sesi_username;
            $data['nama'] = $sesi_nama;
            $data['jabatan'] = $jabatan;
            $data['title'] = 'Yayasan Al kayis || Data Kotak Amal';
            $data['crumb'] = 'Data input Kotak Amal';
            $tanggal = date("Y-m-d");
            $profile = $this->crud_m->get_row(['username' => $sesi_username,], 'user');
            $data['no_hp'] = $profile->no_hp;
            $data['password'] = $profile->password;
            $this->template->load('mainpage', 'profile', $data);
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
    public function ubah_profile()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');

        if (isset($sesi_username)) {

            $nama = htmlspecialchars($this->input->post('nama'));
            $no_hp = htmlspecialchars($this->input->post('no_hp'));
            $password = htmlspecialchars($this->input->post('password'));
            $pass_sha = sha1($password);
            $update = [
                'nama' => $nama,
                'no_hp' => $no_hp,
                'password' => $password,
                'pass_sha' => $pass_sha
            ];
            $this->crud_m->update_data(['username' => $sesi_username], $update, 'user');
            $this->session->set_userdata(['nama' => $nama]);

            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fa fa-check"></i>Simpan data Berhasil</h6>
            </div>
            ');

            redirect('mydashboard/myprofile');
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
    public function edit_form_kas($id)
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');

        if (isset($sesi_username)) {
            $data['username'] = $sesi_username;
            $data['nama'] = $sesi_nama;
            $data['jabatan'] = $jabatan;
            $data['title'] = 'Yayasan Al kayis || Buku Kas';
            $data['crumb'] = 'Edit Kas';
            $id = decrypt_url($id);
            $kas = $this->crud_m->get_row(['id' => $id], 'kas');
            $data['kas'] = $kas;
            $kode_post = $kas->post_kode;
            $data['kode_post'] = $kode_post;
            switch ($kode_post) {
                case "1":
                    $post = 'kotak Amal';
                    break;
                case "2":
                    $post = 'infaq';
                    break;
                case "3":
                    $post = 'Zakat';
                    break;
                case "4":
                    $post = 'Sumbangan';
                    break;
                case "5":
                    $post = 'Biaya Operational';
                    break;
                case "6":
                    $post = 'Biaya Listrik / Air';
                    break;
                case "7":
                    $post = 'Biaya Pemeliharaan';
                    break;
                case "8":
                    $post = 'Beli Peralatan';
                    break;
                case "9":
                    $post = 'Biaya Lain';
                    break;
            }
            $data['post'] = $post;

            $this->template->load('mainpage', 'edit_kas', $data);
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

/* End of file Dashboard.php */