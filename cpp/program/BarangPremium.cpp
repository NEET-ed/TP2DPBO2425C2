
// Class Level 2: BarangPremium
class BarangPremium : public BarangElektronik {
protected:
    string material;
    string fiturEksklusif;

public:
    BarangPremium(int id, string nama, string merek, double harga, string material, string fiturEksklusif)
        : BarangElektronik(id, nama, merek, harga), material(material), fiturEksklusif(fiturEksklusif) {}

    ~BarangPremium() override {
    }

    string getMaterial() const { return material; }
    string getFiturEksklusif() const { return fiturEksklusif; }

    void setMaterial(const string& material) { this->material = material; }
    void setFiturEksklusif(const string& fitur) { this->fiturEksklusif = fitur; }

    void display(const map<string, int>& colWidths) const override {
        BarangElektronik::display(colWidths);
        cout << setw(colWidths.at("Material")) << left << getMaterial() << " | "
             << setw(colWidths.at("Fitur Eksklusif")) << left << getFiturEksklusif() << " | ";
    }
};