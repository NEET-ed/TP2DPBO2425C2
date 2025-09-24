
// Class Level 3: BarangEdisiTerbatas
class BarangEdisiTerbatas : public BarangPremium {
private:
    string nomorSeri;
    int jumlahProduksi;

public:
    BarangEdisiTerbatas(int id, string nama, string merek, double harga, string material, string fiturEksklusif, string nomorSeri, int jumlahProduksi)
        : BarangPremium(id, nama, merek, harga, material, fiturEksklusif), nomorSeri(nomorSeri), jumlahProduksi(jumlahProduksi) {}
    
    ~BarangEdisiTerbatas() override {
    }

    string getNomorSeri() const { return nomorSeri; }
    int getJumlahProduksi() const { return jumlahProduksi; }

    void setNomorSeri(const string& seri) { this->nomorSeri = seri; }
    void setJumlahProduksi(int jumlah) { this->jumlahProduksi = jumlah; }

    void display(const map<string, int>& colWidths) const override {
        BarangPremium::display(colWidths);
        cout << setw(colWidths.at("Nomor Seri")) << left << getNomorSeri() << " | "
             << setw(colWidths.at("Jumlah Produksi")) << left << getJumlahProduksi() << " | " << endl;
    }
};
