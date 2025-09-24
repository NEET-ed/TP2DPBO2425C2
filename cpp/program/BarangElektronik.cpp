// Class Level 1: BarangElektronik
class BarangElektronik {
protected:
    int id;
    string nama;
    string merek;
    double harga;

public:
    BarangElektronik(int id, string nama, string merek, double harga)
        : id(id), nama(nama), merek(merek), harga(harga) {}
    
    virtual ~BarangElektronik() {
    }

    int getId() const { return id; }
    string getNama() const { return nama; }
    string getMerek() const { return merek; }
    double getHarga() const { return harga; }

    void setNama(const string& nama) { this->nama = nama; }
    void setMerek(const string& merek) { this->merek = merek; }
    void setHarga(double harga) { this->harga = harga; }

    virtual void display(const map<string, int>& colWidths) const {
        cout << "|" << setw(colWidths.at("ID")) << left << getId() << " | "
             << setw(colWidths.at("Nama")) << left << getNama() << " | "
             << setw(colWidths.at("Merek")) << left << getMerek() << " | "
             << setw(colWidths.at("Harga")) << left << fixed << setprecision(2) << getHarga() << " | ";
    }
};
