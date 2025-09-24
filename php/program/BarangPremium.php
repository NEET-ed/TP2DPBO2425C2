<?php
require_once 'BarangElektronik.php';

// Class Level 2: BarangPremium
class BarangPremium extends BarangElektronik {
    private $material;
    private $fiturEksklusif;

    public function __construct($id, $nama, $merek, $harga, $fotoProduk, $material, $fiturEksklusif) {
        parent::__construct($id, $nama, $merek, $harga, $fotoProduk);
        $this->material = $material;
        $this->fiturEksklusif = $fiturEksklusif;
    }
    
    // Getters
    public function getMaterial() { return $this->material; }
    public function getFiturEksklusif() { return $this->fiturEksklusif; }
    
    // Setters
    public function setMaterial($material) { $this->material = $material; }
    public function setFiturEksklusif($fitur) { $this->fiturEksklusif = $fitur; }

    public function __destruct() {
        parent::__destruct();
    }
}
?>