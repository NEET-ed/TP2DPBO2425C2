
import java.util.Map;
import java.text.DecimalFormat;
// Class Level 1: BarangElektronik
class BarangElektronik {
    protected int id;
    protected String nama;
    protected String merek;
    protected double harga;

    public BarangElektronik(int id, String nama, String merek, double harga) {
        this.id = id;
        this.nama = nama;
        this.merek = merek;
        this.harga = harga;
    }

    // Getters
    public int getId() { return id; }
    public String getNama() { return nama; }
    public String getMerek() { return merek; }
    public double getHarga() { return harga; }

    // Setters
    public void setNama(String nama) { this.nama = nama; }
    public void setMerek(String merek) { this.merek = merek; }
    public void setHarga(double harga) { this.harga = harga; }

    public void display(Map<String, Integer> colWidths) {
        DecimalFormat df = new DecimalFormat("#.00");
        String formattedHarga = df.format(getHarga());
        System.out.printf("| %-" + colWidths.get("ID") + "s | %-" + colWidths.get("Nama") + "s | %-" + colWidths.get("Merek") + "s | %-" + colWidths.get("Harga") + "s |",  getId(), getNama(), getMerek(), formattedHarga);
    }
}
