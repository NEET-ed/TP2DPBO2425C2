<?php
require_once 'BarangPremium.php';

// Class Level 3: BarangEdisiTerbatas
class BarangEdisiTerbatas extends BarangPremium {
    private $nomorSeri;
    private $jumlahProduksi;

    public function __construct($id, $nama, $merek, $harga, $fotoProduk, $material, $fiturEksklusif, $nomorSeri, $jumlahProduksi) {
        parent::__construct($id, $nama, $merek, $harga, $fotoProduk, $material, $fiturEksklusif);
        $this->nomorSeri = $nomorSeri;
        $this->jumlahProduksi = $jumlahProduksi;
    }

    // Getters
    public function getNomorSeri() { return $this->nomorSeri; }
    public function getJumlahProduksi() { return $this->jumlahProduksi; }
    
    // Setters
    public function setNomorSeri($seri) { $this->nomorSeri = $seri; }
    public function setJumlahProduksi($jumlah) { $this->jumlahProduksi = $jumlah; }

    public function __destruct() {
        parent::__destruct();
    }
}
?>