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
            $data['kotak_kaca'] = $this->info_m->t_kotak('Kaca');
            $data['kotak_kayu'] = $this->info_m->t_kotak('Kayu');
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
            $data['total_admin'] = $this->info_m->total_admin();
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
    public function ubah_user($id)
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');
        $id = decrypt_url($id);

        if (isset($sesi_username)) {
            $data['username'] = $sesi_username;
            $data['nama'] = $sesi_nama;
            $data['jabatan'] = $jabatan;
            $data['title'] = 'Yayasan Al kayis || Users';
            $data['crumb'] = 'Edit User';
            $data['user'] = $this->crud_m->get_row(['id_user' => $id], 'user');
            $this->template->load('mainpage', 'form_edit_user', $data);
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
    public function update_user()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');

        if (isset($sesi_username)) {
            $id_user = $this->input->post('id_user');
            $username = $this->input->post('username');
            $nama = htmlspecialchars($this->input->post('nama'));
            $no_hp = htmlspecialchars($this->input->post('no_hp'));
            $jabatan = htmlspecialchars($this->input->post('jabatan'));
            $password = htmlspecialchars($this->input->post('password'));
            $pass_sha = sha1($password);
            $update = [
                'pass_sha' => $pass_sha,
                'password' => $password,
                'nama' => $nama,
                'no_hp' => $no_hp,
                'jabatan' => $jabatan,
                'status' => 1,
            ];
            $this->crud_m->update_data(['id_user' => $id_user], $update, 'user');

            $this->session->set_flashdata('pesan', '
            <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fa fa-check"></i> Data User : ' . $username . ' telah di update</h6>
            </div>
            ');
            redirect('mydashboard/data_user');
        } else {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fa fa-exclamation-triangle"></i> Silahkan Login Dahulu..!</h6>
            </div>
            ');
            redirect('auth');
        }
    }
    public function delete_user($id, $username)
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');

        if (isset($sesi_username)) {
            $id_user = decrypt_url($id);
            $username = decrypt_url($username);
            $this->crud_m->hapus_data(['id_user' => $id_user], 'user');

            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fa fa-check"></i> Data User : ' . $username . ' telah di Hapus</h6>
            </div>
            ');
            redirect('mydashboard/data_user');
        } else {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fa fa-exclamation-triangle"></i> Silahkan Login Dahulu..!</h6>
            </div>
            ');
            redirect('auth');
        }
    }
    public function laporan_keuangan()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');

        if (isset($sesi_username)) {
            $data['username'] = $sesi_username;
            $data['nama'] = $sesi_nama;
            $data['jabatan'] = $jabatan;
            $data['title'] = 'Yayasan Al kayis || Laporan Keuangan';
            $data['crumb'] = 'Laporan Keuangan';
            // cek operan Tanggal dari form
            if ($this->input->post('fromdate')) {
                $from = $this->input->post('fromdate');
                $end = $this->input->post('enddate');
            } else {
                $from = Date('Y-m-01');
                $end = Date('Y-m-d');
            }
            $data['periode'] = date("d M Y", strtotime($from)) . ' s/d ' . date("d M Y", strtotime($end));
            $data['from_tgl'] =  $from;
            $data['end_tgl'] =  $end;
            // filtering data
            // Last Saldo
            $data['saldo_last'] = $this->info_m->saldo_kas_last($from);
            // pendapatan
            $data['kotak_kaca'] = $this->info_m->post_kotak_income(1, 'Kaca', $from, $end);
            $data['kotak_kayu'] = $this->info_m->post_kotak_income(1, 'kayu', $from, $end);
            $data['infaq'] = $this->info_m->post_income(2, $from, $end);
            $data['zakat'] = $this->info_m->post_income(3, $from, $end);
            $data['sumbangan'] = $this->info_m->post_income(4, $from, $end);
            $data['majalah'] = $this->info_m->post_income(10, $from, $end);
            $data['ota_khusus'] = $this->info_m->post_income(11, $from, $end);
            $data['ota_umum'] = $this->info_m->post_income(12, $from, $end);
            $data['csr'] = $this->info_m->post_income(13, $from, $end);
            $data['qurban'] = $this->info_m->post_income(14, $from, $end);
            $data['anak_yatim'] = $this->info_m->post_income(15, $from, $end);
            $data['bantuan_pembangunan'] = $this->info_m->post_income(16, $from, $end);

            $data['debet'] = $data['saldo_last'] + $data['kotak_kaca'] + $data['kotak_kayu']
                + $data['infaq'] + $data['zakat'] + $data['sumbangan']
                + $data['majalah'] + $data['ota_khusus'] + $data['ota_umum']
                + $data['csr'] + $data['qurban'] + $data['anak_yatim'] + $data['bantuan_pembangunan'];

            // pengeluaran
            $data['operasional'] = $this->info_m->post_pengeluaran(5, $from, $end);
            $data['listrik'] = $this->info_m->post_pengeluaran(6, $from, $end);
            $data['pemeliharaan'] = $this->info_m->post_pengeluaran(7, $from, $end);
            $data['peralatan'] = $this->info_m->post_pengeluaran(8, $from, $end);
            $data['lain'] = $this->info_m->post_pengeluaran(9, $from, $end);
            $data['setoran_yayasan'] = $this->info_m->post_pengeluaran(17, $from, $end);
            $data['mukafaah'] = $this->info_m->post_pengeluaran(18, $from, $end);
            $data['santunan'] = $this->info_m->post_pengeluaran(19, $from, $end);
            $data['setoran_ota_k'] = $this->info_m->post_pengeluaran(20, $from, $end);
            $data['setoran_ota_u'] = $this->info_m->post_pengeluaran(21, $from, $end);
            $data['setoran_csr'] = $this->info_m->post_pengeluaran(22, $from, $end);
            $data['biaya_bangunan'] = $this->info_m->post_pengeluaran(23, $from, $end);


            $data['kredit'] = $data['operasional'] + $data['listrik']
                + $data['pemeliharaan'] + $data['peralatan'] + $data['lain']
                + $data['setoran_yayasan'] + $data['mukafaah'] + $data['santunan']
                + $data['setoran_ota_k'] + $data['setoran_ota_u'] + $data['setoran_csr'] + $data['biaya_bangunan'];
            // saldo Akhir
            $data['saldo_akhir'] = $data['debet'] - $data['kredit'];
            $this->template->load('mainpage', 'laporan', $data);
        } else {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fa fa-exclamation-triangle"></i> Silahkan Login Dahulu..!</h6>
            </div>
            ');
            redirect('auth');
        }
    }

    public function print_laporan($from, $end)
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');

        if (isset($sesi_username)) {
            $data['username'] = $sesi_username;
            $data['nama'] = $sesi_nama;
            $data['jabatan'] = $jabatan;
            $data['title'] = 'Yayasan Al kayis || Laporan Keuangan';
            $data['crumb'] = 'Laporan Keuangan';
            // cek operan Tanggal dari form
            if ($this->input->post('fromdate')) {
                $from = $this->input->post('fromdate');
                $end = $this->input->post('enddate');
            } else {
                $from = Date('Y-m-01');
                $end = Date('Y-m-d');
            }
            $data['periode'] = date("d M Y", strtotime($from)) . ' s/d ' . date("d M Y", strtotime($end));
            // filtering data
            // Last Saldo
            $data['saldo_last'] = $this->info_m->saldo_kas_last($from);
            // pendapatan
            $data['kotak_kaca'] = $this->info_m->post_kotak_income(1, 'Kaca', $from, $end);
            $data['kotak_kayu'] = $this->info_m->post_kotak_income(1, 'kayu', $from, $end);
            $data['infaq'] = $this->info_m->post_income(2, $from, $end);
            $data['zakat'] = $this->info_m->post_income(3, $from, $end);
            $data['sumbangan'] = $this->info_m->post_income(4, $from, $end);
            $data['majalah'] = $this->info_m->post_income(10, $from, $end);
            $data['ota_khusus'] = $this->info_m->post_income(11, $from, $end);
            $data['ota_umum'] = $this->info_m->post_income(12, $from, $end);
            $data['csr'] = $this->info_m->post_income(13, $from, $end);
            $data['qurban'] = $this->info_m->post_income(14, $from, $end);
            $data['anak_yatim'] = $this->info_m->post_income(15, $from, $end);
            $data['bantuan_pembangunan'] = $this->info_m->post_income(16, $from, $end);

            $data['debet'] = $data['saldo_last'] + $data['kotak_kaca'] + $data['kotak_kayu']
                + $data['infaq'] + $data['zakat'] + $data['sumbangan']
                + $data['majalah'] + $data['ota_khusus'] + $data['ota_umum']
                + $data['csr'] + $data['qurban'] + $data['anak_yatim'] + $data['bantuan_pembangunan'];

            // pengeluaran
            $data['operasional'] = $this->info_m->post_pengeluaran(5, $from, $end);
            $data['listrik'] = $this->info_m->post_pengeluaran(6, $from, $end);
            $data['pemeliharaan'] = $this->info_m->post_pengeluaran(7, $from, $end);
            $data['peralatan'] = $this->info_m->post_pengeluaran(8, $from, $end);
            $data['lain'] = $this->info_m->post_pengeluaran(9, $from, $end);
            $data['setoran_yayasan'] = $this->info_m->post_pengeluaran(17, $from, $end);
            $data['mukafaah'] = $this->info_m->post_pengeluaran(18, $from, $end);
            $data['santunan'] = $this->info_m->post_pengeluaran(19, $from, $end);
            $data['setoran_ota_k'] = $this->info_m->post_pengeluaran(20, $from, $end);
            $data['setoran_ota_u'] = $this->info_m->post_pengeluaran(21, $from, $end);
            $data['setoran_csr'] = $this->info_m->post_pengeluaran(22, $from, $end);
            $data['biaya_bangunan'] = $this->info_m->post_pengeluaran(23, $from, $end);


            $data['kredit'] = $data['operasional'] + $data['listrik']
                + $data['pemeliharaan'] + $data['peralatan'] + $data['lain']
                + $data['setoran_yayasan'] + $data['mukafaah'] + $data['santunan']
                + $data['setoran_ota_k'] + $data['setoran_ota_u'] + $data['setoran_csr'] + $data['biaya_bangunan'];
            // saldo Akhir
            $data['saldo_akhir'] = $data['debet'] - $data['kredit'];
            $this->load->view('print_laporan', $data);
        } else {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fa fa-exclamation-triangle"></i> Silahkan Login Dahulu..!</h6>
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
            // $this->load->view('scaning', $data);

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
            $data_post = $this->crud_m->get_row(['post_kode' => $kode_post], 'post');
            $data['post'] = $data_post->post_name;

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
    public function tambah_user()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');

        if (isset($sesi_username)) {

            $nama = htmlspecialchars($this->input->post('nama'));
            $no_hp = htmlspecialchars($this->input->post('no_hp'));
            $jabatan = htmlspecialchars($this->input->post('jabatan'));
            $username = htmlspecialchars($this->input->post('username'));
            $password = htmlspecialchars($this->input->post('password'));
            $pass_sha = sha1($password);
            $user = $this->crud_m->get_row(['username' => $username], 'user');
            if ($user) {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h6><i class="icon fa fa-times"></i>Gagal !. Username : ' . $username . ' Sudah digunakan, ganti username baru </h6>
                </div>
                ');
                redirect('mydashboard/data_user');
            } else {
                $input = [
                    'username' => $username,
                    'pass_sha' => $pass_sha,
                    'password' => $password,
                    'nama' => $nama,
                    'no_hp' => $no_hp,
                    'jabatan' => $jabatan,
                    'status' => 1,
                ];
                $this->crud_m->input_data($input, 'user');

                $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h6><i class="icon fa fa-check"></i>User Baru : ' . $username . ' Berhasil Tambahkan</h6>
                </div>
                ');
                redirect('mydashboard/data_user');
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
}

/* End of file Dashboard.php */