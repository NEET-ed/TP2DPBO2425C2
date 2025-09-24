
import java.util.Map;
import java.text.DecimalFormat;
// Class Level 3: BarangEdisiTerbatas
class BarangEdisiTerbatas extends BarangPremium {
    private String nomorSeri;
    private int jumlahProduksi;

    public BarangEdisiTerbatas(int id, String nama, String merek, double harga, String material, String fiturEksklusif, String nomorSeri, int jumlahProduksi) {
        super(id, nama, merek, harga, material, fiturEksklusif);
        this.nomorSeri = nomorSeri;
        this.jumlahProduksi = jumlahProduksi;
    }

    // Getters
    public String getNomorSeri() { return nomorSeri; }
    public int getJumlahProduksi() { return jumlahProduksi; }

    // Setters
    public void setNomorSeri(String nomorSeri) { this.nomorSeri = nomorSeri; }
    public void setJumlahProduksi(int jumlahProduksi) { this.jumlahProduksi = jumlahProduksi; }

    // fungsi di override biar display ga tumpang tindih
    @Override
    public void display(Map<String, Integer> colWidths) {
        super.display(colWidths);
        System.out.printf(" %-" + colWidths.get("Nomor Seri") + "s | %-" + colWidths.get("Jumlah Produksi") + "s |\n",  getNomorSeri(), getJumlahProduksi());
    }
}