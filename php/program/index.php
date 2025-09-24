<?php
require_once 'BarangEdisiTerbatas.php';
session_start();

// Inisialisasi data dummy jika sesi belum ada
if (!isset($_SESSION['barang_list'])) {
    $_SESSION['barang_list'] = array(
        new BarangEdisiTerbatas(1, "Smartphone Limited", "Samsung", 15000000.00, "images/smartphone.jpg", "Titanium", "Kamera 200MP", "S001", 500),
        new BarangEdisiTerbatas(2, "Gaming Laptop Pro", "ASUS", 25000000.00, "images/laptop.jpg", "Aluminium", "RTX 4090", "A002", 100),
        new BarangEdisiTerbatas(3, "Smartwatch Elite", "Apple", 8000000.00, "images/smartwatch.jpg", "Sapphire Glass", "ECG Sensor", "P003", 250),
        new BarangEdisiTerbatas(4, "Headphone Custom", "Sony", 5000000.00, "images/headphone.jpg", "Kulit Asli", "Noise Cancelling Pro", "H004", 300),
        new BarangEdisiTerbatas(5, "Drone Pro", "DJI", 12000000.00, "images/drone.jpg", "Carbon Fiber", "Otonom Terbang", "D005", 150)
    );
}

// Menangani form submission (Add Data)
// Cek apakah ada file yang diunggah dan tombol submit ditekan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto_produk'])) {
    
    // --- Bagian File Upload ---
    $upload_dir = 'images/';
    $uploaded_file = $_FILES['foto_produk'];
    $file_path = ''; // Inisialisasi path gambar

    // Cek jika tidak ada error pada proses upload
    if ($uploaded_file['error'] === UPLOAD_ERR_OK) {
        $file_name = uniqid() . '_' . basename($uploaded_file['name']); // Nama file unik
        $file_path = $upload_dir . $file_name;
        
        // Pindahkan file dari direktori sementara ke direktori tujuan
        if (move_uploaded_file($uploaded_file['tmp_name'], $file_path)) {
            // Berhasil diunggah
            echo "<p style='color:green;'>File ". htmlspecialchars($file_name) . " berhasil diupload.</p>";
        } else {
            // Gagal memindahkan file
            echo "<p style='color:red;'>Maaf, terjadi kesalahan saat mengupload file Anda.</p>";
            $file_path = ''; // Reset path jika gagal
        }
    } else {
        // Ada error saat upload file
        echo "<p style='color:red;'>Terjadi kesalahan upload: " . $uploaded_file['error'] . "</p>";
    }

    // --- Bagian Tambah Data Object ---
    // Pastikan path gambar sudah terisi
    if ($file_path != '') {
        $new_id = empty($_SESSION['barang_list']) ? 1 : end($_SESSION['barang_list'])->getId() + 1;
        
        $nama = $_POST['nama'];
        $merek = $_POST['merek'];
        $harga = floatval($_POST['harga']);
        $material = $_POST['material'];
        $fiturEksklusif = $_POST['fitur_eksklusif'];
        $nomorSeri = $_POST['nomor_seri'];
        $jumlahProduksi = intval($_POST['jumlah_produksi']);

        // Membuat objek baru dan mengisinya dengan data dari form
        $newItem = new BarangEdisiTerbatas($new_id, $nama, $merek, $harga, $file_path, $material, $fiturEksklusif, $nomorSeri, $jumlahProduksi);
        
        $_SESSION['barang_list'][] = $newItem;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Toko Elektronik Multilevel Inheritance PHP</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        .container { max-width: 1200px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1, h2 { color: #333; }
        .form-section { margin-bottom: 30px; }
        form { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; padding: 20px; border: 1px solid #ddd; border-radius: 5px; background: #f9f9f9; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        input[type="submit"] { grid-column: 1 / span 2; padding: 10px 15px; background-color: #5cb85c; color: white; border: none; cursor: pointer; border-radius: 4px; font-size: 16px; }
        input[type="submit"]:hover { background-color: #4cae4c; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; vertical-align: top; }
        th { background-color: #e9ecef; color: #333; }
        img { max-width: 80px; height: auto; display: block; margin: auto; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Toko Elektronik</h1>

        <div class="form-section">
            <h2>Tambah Barang Edisi Terbatas</h2>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="merek">Merek:</label>
                    <input type="text" id="merek" name="merek" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga:</label>
                    <input type="number" id="harga" name="harga" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="foto_produk">Foto Produk:</label>
                    <input type="file" id="foto_produk" name="foto_produk" required>
                </div>
                <div class="form-group">
                    <label for="material">Material:</label>
                    <input type="text" id="material" name="material" required>
                </div>
                <div class="form-group">
                    <label for="fitur_eksklusif">Fitur Eksklusif:</label>
                    <input type="text" id="fitur_eksklusif" name="fitur_eksklusif" required>
                </div>
                <div class="form-group">
                    <label for="nomor_seri">Nomor Seri:</label>
                    <input type="text" id="nomor_seri" name="nomor_seri" required>
                </div>
                <div class="form-group">
                    <label for="jumlah_produksi">Jumlah Produksi:</label>
                    <input type="number" id="jumlah_produksi" name="jumlah_produksi" required>
                </div>
                <input type="submit" value="Tambah Barang">
            </form>
        </div>

        <h2>Daftar Barang</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Merek</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Material</th>
                    <th>Fitur Eksklusif</th>
                    <th>Nomor Seri</th>
                    <th>Jumlah Produksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['barang_list'] as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item->getId()); ?></td>
                    <td><?php echo htmlspecialchars($item->getNama()); ?></td>
                    <td><?php echo htmlspecialchars($item->getMerek()); ?></td>
                    <td><?php echo number_format($item->getHarga(), 2, ',', '.'); ?></td>
                    <td>
                        <?php 
                        $foto_path = $item->getFotoProduk();
                        if (!empty($foto_path) && file_exists($foto_path)): 
                        ?>
                            <img src="<?php echo htmlspecialchars($foto_path); ?>" alt="Produk">
                        <?php else: ?>
                            Tidak ada foto
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($item->getMaterial()); ?></td>
                    <td><?php echo htmlspecialchars($item->getFiturEksklusif()); ?></td>
                    <td><?php echo htmlspecialchars($item->getNomorSeri()); ?></td>
                    <td><?php echo htmlspecialchars($item->getJumlahProduksi()); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>