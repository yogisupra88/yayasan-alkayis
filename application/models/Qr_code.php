<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Qr_code extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('path');
    }


    public function create_qr($args)
    {
        include_once(APPPATH . 'third_party/phpqrcode/qrlib.php');

        $isi_teks = $args;
        $namafile = $args . ".png";
        $quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
        $ukuran = 10; //batasan 1 paling kecil, 10 paling besar
        $padding = 2;
        $directory = 'images/qrcode/';

        QRCode::png($isi_teks, $directory . $namafile, $quality, $ukuran, $padding);
    }
}

/* End of file ModelName.php */