<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Info_m extends CI_Model
{

    public function kotak_daily($petugas)
    {
        $date = date("Y-m-d");
        $query1 = "SELECT COUNT(id) AS total 
        FROM kas  WHERE post_kode =1 
        AND tanggal >= '$date' ";
        $row1 = $this->db->query($query1)->row_array();
        return $total = $row1['total'];
    }
    public function total_kotak()
    {
        $query1 = "SELECT COUNT(id_kotak) AS total  FROM kotak   ";
        $row1 = $this->db->query($query1)->row_array();
        return $total = $row1['total'];
    }
    public function total_petugas()
    {
        $query1 = "SELECT COUNT(id_user) AS total  FROM user WHERE jabatan='Petugas' ";
        $row1 = $this->db->query($query1)->row_array();
        return $total = $row1['total'];
    }
    public function total_admin()
    {
        $query1 = "SELECT COUNT(id_user) AS total  FROM user WHERE jabatan='Admin' ";
        $row1 = $this->db->query($query1)->row_array();
        return $total = $row1['total'];
    }
    public function dana_daily($petugas)
    {
        $date = date("Y-m-d");
        $query1 = "SELECT SUM(debet) AS total 
        FROM kas  WHERE post_kode =1 
        AND tanggal >= '$date' AND username = '$petugas'";
        $row1 = $this->db->query($query1)->row_array();
        return $total = $row1['total'];
    }
    public function income()
    {
        $m = date("m");
        $y = date("Y");
        $query1 = "SELECT SUM(debet) AS total 
        FROM kas WHERE YEAR(tanggal) =$y AND MONTH(tanggal) =$m";
        $row1 = $this->db->query($query1)->row_array();
        return $total = $row1['total'];
    }
    public function expediture()
    {
        $m = date("m");
        $y = date("Y");
        $query1 = "SELECT SUM(kredit) AS total 
        FROM kas WHERE YEAR(tanggal) =$y AND MONTH(tanggal) =$m";
        $row1 = $this->db->query($query1)->row_array();
        return $total = $row1['total'];
    }
    public function saldo_kas()
    {
        //debet
        $query1 = "SELECT SUM(debet) AS total  FROM kas ";
        $row1 = $this->db->query($query1)->row_array();
        $debet = $row1['total'];
        //kredit
        $query2 = "SELECT SUM(kredit) AS total  FROM kas ";
        $row2 = $this->db->query($query2)->row_array();
        $kredit = $row2['total'];
        return $saldo = $debet - $kredit;
    }


    public function post_income($kode, $fromdate, $enddate)
    {
        $date = date("Y-m-d");
        $query1 = "SELECT SUM(debet) AS total 
        FROM kas  WHERE post_kode = $kode
        AND tanggal >= '$fromdate' AND tanggal<= '$enddate'";
        $row1 = $this->db->query($query1)->row_array();
        return $total = $row1['total'];
    }
    public function post_pengeluaran($kode, $fromdate, $enddate)
    {
        $date = date("Y-m-d");
        $query1 = "SELECT SUM(kredit) AS total 
        FROM kas  WHERE post_kode = $kode
        AND tanggal >= '$fromdate' AND tanggal<= '$enddate'";
        $row1 = $this->db->query($query1)->row_array();
        return $total = $row1['total'];
    }
    public function saldo_kas_last($fromdate)
    {
        //debet
        $query1 = "SELECT SUM(debet) AS debet 
        FROM kas WHERE tanggal < '$fromdate'";
        $row1 = $this->db->query($query1)->row_array();
        $debet = $row1['debet'];
        //kredit
        $query2 = "SELECT SUM(kredit) AS kredit 
        FROM kas WHERE tanggal < '$fromdate'";
        $row2 = $this->db->query($query2)->row_array();
        $kredit = $row2['kredit'];
        // saldo
        return $result = $debet - $kredit;
    }

}

/* End of file Info_m.php */