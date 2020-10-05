<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kotak_amal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->sesi_username = $this->session->userdata('username');
        $this->sesi_nama = $this->session->userdata('nama');
        $this->jabatan = $this->session->userdata('jabatan');
    }
    public function add_kotak()
    {
        if (isset($this->sesi_username)) {
            $nama = htmlspecialchars($this->input->post('donatur'));
            $alamat = htmlspecialchars($this->input->post('alamat'));
            $time = time();
            $input = [
                'time' => $time,
                'nama_donatur' => $nama,
                'alamat' => $alamat,
            ];
            $this->crud_m->input_data($input, 'kotak');
            $kotak = $this->crud_m->get_row(['time' => $time], 'kotak');
            $kode_kotak = 'alkayis-' . $kotak->id_kotak;

            $update = [
                'kode_kotak' => $kode_kotak,
                'foto_qr' => $kode_kotak . '.png',
            ];
            $this->crud_m->update_data(['time' => $time], $update, 'kotak');
            // create QR
            $this->qr_code->create_qr($kode_kotak);

            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fa fa-check"></i> Kotak Baru Berhasil Di input</h6>
            </div>
            ');
            redirect('mydashboard/data_kotak');
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
    public function edit_kotak()
    {
        if (isset($this->sesi_username)) {
            $id_kotak = $this->input->post('id_kotak');
            $donatur = htmlspecialchars($this->input->post('donatur'));
            $alamat = htmlspecialchars($this->input->post('alamat'));
            $input = [
                'nama_donatur' => $donatur,
                'alamat' => $alamat
            ];
            $this->crud_m->update_data(['id_kotak' => $id_kotak], $input, 'kotak');
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fa fa-check"></i> Kotak alkayis-' . $id_kotak . ' Berhasil Di Ubah</h6>
            </div>
            ');
            redirect('mydashboard/data_kotak');
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
    public function hapus_kotak($id_kotak)
    {
        if (isset($this->sesi_username)) {
            $id_kotak = decrypt_url($id_kotak);
            $donatur = htmlspecialchars($this->input->post('donatur'));
            $alamat = htmlspecialchars($this->input->post('alamat'));

            $this->crud_m->hapus_data(['id_kotak' => $id_kotak], 'kotak');

            $this->session->set_flashdata('pesan', '
            <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h6><i class="icon fa fa-check"></i> Kotak alkayis-' . $id_kotak . ' Berhasil Di Hapus</h6>
            </div>
            ');
            redirect('mydashboard/data_kotak');
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