<?php
// Class Level 1: BarangElektronik
class BarangElektronik {
    private $id;
    private $nama;
    private $merek;
    private $harga;
    private $fotoProduk;

    public function __construct($id, $nama, $merek, $harga, $fotoProduk) {
        $this->id = $id;
        $this->nama = $nama;
        $this->merek = $merek;
        $this->harga = $harga;
        $this->fotoProduk = $fotoProduk;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getNama() { return $this->nama; }
    public function getMerek() { return $this->merek; }
    public function getHarga() { return $this->harga; }
    public function getFotoProduk() { return $this->fotoProduk; }
    
    // Setters
    public function setNama($nama) { $this->nama = $nama; }
    public function setMerek($merek) { $this->merek = $merek; }
    public function setHarga($harga) { $this->harga = $harga; }
    public function setFotoProduk($path) { $this->fotoProduk = $path; }

    public function __destruct() {
    }
}
?>