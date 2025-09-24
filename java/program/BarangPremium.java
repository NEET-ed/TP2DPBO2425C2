
import java.util.Map;
import java.text.DecimalFormat;
// Class Level 2: BarangPremium
class BarangPremium extends BarangElektronik {
    protected String material;
    protected String fiturEksklusif;

    public BarangPremium(int id, String nama, String merek, double harga, String material, String fiturEksklusif) {
        super(id, nama, merek, harga);
        this.material = material;
        this.fiturEksklusif = fiturEksklusif;
    }

    // Getters
    public String getMaterial() { return material; }
    public String getFiturEksklusif() { return fiturEksklusif; }

    // Setters
    public void setMaterial(String material) { this.material = material; }
    public void setFiturEksklusif(String fiturEksklusif) { this.fiturEksklusif = fiturEksklusif; }

    // fungsi di override biar display ga tumpang tindih
    @Override
    public void display(Map<String, Integer> colWidths) {
        super.display(colWidths);
        System.out.printf(" %-" + colWidths.get("Material") + "s | %-" + colWidths.get("Fitur Eksklusif") + "s |", getMaterial(), getFiturEksklusif());
    }
}
