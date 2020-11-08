<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function kotak_amal()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');
        if (isset($sesi_username)) {

            $kode = $this->input->post('kode_kotak');
            $donatur = htmlspecialchars($this->input->post('donatur'));
            $dana = $this->input->post('dana');
            $dana = preg_replace("/[^0-9]/", "", $dana);
            $tgl = date('Y-m-d');
            $input = [
                'kode_trx' => time(),
                'tanggal' => $tgl,
                'post_kode' => 1,
                'post' => 'Kotak Amal ( No Kotak : ' . $kode . ' )',
                'debet' => $dana,
                'donatur' => $donatur,
                'kode_kotak' => $kode,
                'username' => $sesi_username,
                'nama_petugas' => $sesi_nama
            ];
            $this->crud_m->input_data($input, 'kas');
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fa fa-check"></i> Data Berhasil Di input</h6>
            </div>
            ');
            redirect('mydashboard/data_input');
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
    public function manual_kotak()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');
        if (isset($sesi_username)) {

            $kode = $this->input->post('kode_kotak');
            $dana = htmlspecialchars($this->input->post('dana'));
            $dana = preg_replace("/[^0-9]/", "", $dana);
            $tgl = date('Y-m-d');
            $kotak = $this->crud_m->get_row(['kode_kotak' => $kode], 'kotak');
            $nama_donatur = $kotak->nama_donatur;
            $tipe = $kotak->tipe;
            $input = [
                'kode_trx' => time(),
                'tanggal' => $tgl,
                'post_kode' => 1,
                'post' => 'Kotak ' . $tipe . ' ( No Kotak : ' . $kode . ' )',
                'debet' => $dana,
                'donatur' => $nama_donatur,
                'kode_kotak' => $kode,
                'username' => $sesi_username,
                'nama_petugas' => $sesi_nama,
                'tipe_kotak' => $kotak->tipe
            ];
            $this->crud_m->input_data($input, 'kas');
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fa fa-check"></i> Data Berhasil Di input</h6>
            </div>
            ');
            redirect('mydashboard/data_input');
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
    public function edit_dana_kotak()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');
        if (isset($sesi_username)) {

            $id = $this->input->post('id');
            $dana = htmlspecialchars($this->input->post('dana'));
            $dana = preg_replace("/[^0-9]/", "", $dana);
            $update = [
                'debet' => $dana
            ];
            $this->crud_m->update_data(['id' => $id], $update, 'kas');
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fa fa-check"></i> Ubah Data Berhasil</h6>
            </div>
            ');
            redirect('mydashboard/data_input');
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
    public function hapus_transaksi($id)
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');
        if (isset($sesi_username)) {

            $id = decrypt_url($id);
            $this->crud_m->hapus_data(['id' => $id], 'kas');
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fa fa-check"></i> Hapus Data Berhasil</h6>
            </div>
            ');
            redirect('mydashboard/data_input');
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
    public function input_kas()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');
        if (isset($sesi_username)) {

            $transaksi = $this->input->post('transaksi');
            $kategori = $this->input->post('kategori');
            $nominal = $this->input->post('nominal');
            $nominal = preg_replace("/[^0-9]/", "", $nominal);
            $uraian = htmlspecialchars($this->input->post('uraian'));
            $trx = time();
            $tanggal = date('Y-m-d');
            if ($transaksi == 'pemasukan') {
                switch ($kategori) {
                    case "infaq":
                        $post_kode = 2;
                        $post = 'Terima Infaq ' . $uraian;
                        break;
                    case "zakat":
                        $post_kode = 3;
                        $post = 'Terima Zakat ' . $uraian;
                        break;
                    case "sumbangan":
                        $post_kode = 4;
                        $post = 'Terima Sumbangan ' . $uraian;
                        break;
                }
                $input = [
                    'kode_trx' => $trx,
                    'tanggal' => $tanggal,
                    'post_kode' => $post_kode,
                    'post' => $post,
                    'debet' => $nominal,
                    'uraian' => $uraian,
                ];
            }

            if ($transaksi == 'pengeluaran') {
                switch ($kategori) {
                    case "operational":
                        $post_kode = 5;
                        $post = 'Biaya Operational ' . $uraian;
                        break;
                    case "listrik":
                        $post_kode = 6;
                        $post = 'Bayar Listrik / Air ' . $uraian;
                        break;
                    case "pemeliharaan":
                        $post_kode = 7;
                        $post = 'Biaya Pemeliharaan ' . $uraian;
                        break;
                    case "peralatan":
                        $post_kode = 8;
                        $post = 'Pembelian Peralatan ' . $uraian;
                        break;
                    case "lain":
                        $post_kode = 9;
                        $post = 'Biaya Lain ' . $uraian;
                        break;
                }
                $input = [
                    'kode_trx' => $trx,
                    'tanggal' => $tanggal,
                    'post_kode' => $post_kode,
                    'post' => $post,
                    'kredit' => $nominal,
                    'uraian' => $uraian,
                ];
            }

            $this->crud_m->input_data($input, 'kas');

            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fa fa-check"></i> Data Berhasil di input</h6>
            </div>
            ');
            redirect('mydashboard/buku_kas');
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
    public function ubah_kas()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');
        if (isset($sesi_username)) {

            $id_kas = $this->input->post('id_kas');
            $trx = $this->input->post('trx');
            $transaksi = $this->input->post('transaksi');
            $post_kategori = $this->input->post('kategori');
            $nominal = $this->input->post('nominal');
            $nominal = preg_replace("/[^0-9]/", "", $nominal);
            $uraian = htmlspecialchars($this->input->post('uraian'));

            if ($transaksi == 'pemasukan') {
                switch ($post_kategori) {
                    case "1":
                        $post = 'Kotak Amal ' . $uraian;
                        break;
                    case "2":
                        $post = 'Terima Infaq ' . $uraian;
                        break;
                    case "3":
                        $post = 'Terima Zakat ' . $uraian;
                        break;
                    case "4":
                        $post = 'Terima Sumbangan ' . $uraian;
                        break;
                }
                $input = [
                    'kode_trx' => $trx,
                    'post_kode' => $post_kategori,
                    'post' => $post,
                    'debet' => $nominal,
                    'uraian' => $uraian,
                ];
            }

            if ($transaksi == 'pengeluaran') {
                switch ($post_kategori) {
                    case "5":
                        $post = 'Biaya Operational ' . $uraian;
                        break;
                    case "6":
                        $post = 'Bayar Listrik / Air ' . $uraian;
                        break;
                    case "7":
                        $post = 'Biaya Pemeliharaan ' . $uraian;
                        break;
                    case "8":
                        $post = 'Pembelian Peralatan ' . $uraian;
                        break;
                    case "9":
                        $post = 'Biaya Lain ' . $uraian;
                        break;
                }
                $input = [
                    'kode_trx' => $trx,
                    'post_kode' => $post_kategori,
                    'post' => $post,
                    'kredit' => $nominal,
                    'uraian' => $uraian,
                ];
            }
            echo '<pre>';
            print_r($input);
            echo '<pre>';
            echo '<ln>';
            $this->crud_m->update_data(['id' => $id_kas], $input, 'kas');

            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fa fa-check"></i> Data TRX : ' . $trx . ' Berhasil di Ubah</h6>
            </div>
            ');
            redirect('mydashboard/buku_kas');
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

    public function hapus_kas($id, $trx)
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');
        if (isset($sesi_username)) {
            $id = decrypt_url($id);
            $trx = decrypt_url($trx);
            $this->crud_m->hapus_data(['id' => $id], 'kas');
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fa fa-check"></i> Data TRX : ' . $trx . 'Berhasil di Hapus</h6>
            </div>
            ');
            redirect('mydashboard/buku_kas');
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
    public function reseting()
    {
        $sesi_username = $this->session->userdata('username');
        $sesi_nama = $this->session->userdata('nama');
        $jabatan = $this->session->userdata('jabatan');
        if (isset($sesi_username) and $jabatan == 'Admin') {
            $password = htmlspecialchars($this->input->post('password'));
            $pass_sha = sha1($password);
            $cek = $this->crud_m->get_row(['pass_sha' => $pass_sha, 'username' => $sesi_username], 'user');
            if ($cek) {
                $kas = $this->crud_m->lihat_data('kas');
                foreach ($kas as $row) {
                    $id = $row['id'];
                    $this->crud_m->hapus_data(['id' => $id], 'kas');
                }
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h6><i class="icon fa fa-check"></i> Seluruh Transaksi KAS Berhasil di Hapus dari Database</h6>
                </div>
                ');
                redirect('mydashboard/beranda_admin');
            } else {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h6><i class="icon fa fa-check"></i>Gagal Reset, Password Tidak Cocok</h6>
                </div>
                ');
                redirect('mydashboard/beranda_admin');
            }
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
}

/* End of file Controllername.php */