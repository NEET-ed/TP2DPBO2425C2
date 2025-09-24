#include <bits/stdc++.h>

using namespace std;

#include "BarangElektronik.cpp"
#include "BarangPremium.cpp"
#include "BarangEdisiTerbatas.cpp"

map<string, int> calculateColumnWidths(const vector<BarangElektronik*>& list) {
    map<string, int> widths;
    widths["ID"] = 2; // "ID".length() + padding
    widths["Nama"] = 4;
    widths["Merek"] = 5;
    widths["Harga"] = 5;
    widths["Material"] = 8;
    widths["Fitur Eksklusif"] = 15;
    widths["Nomor Seri"] = 10;
    widths["Jumlah Produksi"] = 15;

    for (const auto& item : list) {
        widths["ID"] = max(widths["ID"], (int)to_string(item->getId()).length());
        widths["Nama"] = max(widths["Nama"], (int)item->getNama().length());
        widths["Merek"] = max(widths["Merek"], (int)item->getMerek().length());
        widths["Harga"] = max(widths["Harga"], (int)to_string(item->getHarga()).length() + 3);
        
        const BarangPremium* premium = dynamic_cast<const BarangPremium*>(item);
        if (premium) {
            widths["Material"] = max(widths["Material"], (int)premium->getMaterial().length());
            widths["Fitur Eksklusif"] = max(widths["Fitur Eksklusif"], (int)premium->getFiturEksklusif().length());
            
            const BarangEdisiTerbatas* limited = dynamic_cast<const BarangEdisiTerbatas*>(item);
            if (limited) {
                widths["Nomor Seri"] = max(widths["Nomor Seri"], (int)limited->getNomorSeri().length());
                widths["Jumlah Produksi"] = max(widths["Jumlah Produksi"], (int)to_string(limited->getJumlahProduksi()).length());
            }
        }
    }
    return widths;
}

void printLine(const map<string, int>& colWidths) {
    string line = "";
    for(const auto& pair : colWidths) {
        line += string(pair.second + 3, '=');
    }
    cout << line << endl;
}

void showHeader(const map<string, int>& colWidths) {
    printLine(colWidths);
    cout << setw(colWidths.at("ID")) << left << "|ID" << " | "
         << setw(colWidths.at("Nama")) << left << "Nama" << " | "
         << setw(colWidths.at("Merek")) << left << "Merek" << " | "
         << setw(colWidths.at("Harga")) << left << "Harga" << " | "
         << setw(colWidths.at("Material")) << left << "Material" << " | "
         << setw(colWidths.at("Fitur Eksklusif")) << left << "Fitur Eksklusif" << " | "
         << setw(colWidths.at("Nomor Seri")) << left << "Nomor Seri" << " | "
         << setw(colWidths.at("Jumlah Produksi")) << left << "Jumlah Produksi" << " | " << endl;
    printLine(colWidths);
}

void showData(const vector<BarangElektronik*>& list) {
    map<string, int> colWidths = calculateColumnWidths(list);
    showHeader(colWidths);
    for (const auto& item : list) {
        item->display(colWidths);
    }
    printLine(colWidths);
}

void addBarang(vector<BarangElektronik*>& list) {
    int id, jumlahProduksi;
    double harga;
    string nama, merek, material, fitur, seri;
    
    cout << "Tambah Barang Edisi Terbatas" << endl;
    cout << "ID: "; cin >> id;
    cin.ignore();
    cout << "Nama: "; getline(cin, nama);
    cout << "Merek: "; getline(cin, merek);
    cout << "Harga: "; cin >> harga;
    cin.ignore();
    cout << "Material: "; getline(cin, material);
    cout << "Fitur Eksklusif: "; getline(cin, fitur);
    cout << "Nomor Seri: "; getline(cin, seri);
    cout << "Jumlah Produksi: "; cin >> jumlahProduksi;
    cin.ignore();

    auto new_item = new BarangEdisiTerbatas(id, "", "", 0.0, "", "", "", 0);
    new_item->setNama(nama);
    new_item->setMerek(merek);
    new_item->setHarga(harga);
    new_item->setMaterial(material);
    new_item->setFiturEksklusif(fitur);
    new_item->setNomorSeri(seri);
    new_item->setJumlahProduksi(jumlahProduksi);

    list.push_back(new_item);
    cout << "Data berhasil ditambahkan!" << endl;
}

int main() {
    vector<BarangElektronik*> barangList;

    barangList.push_back(new BarangEdisiTerbatas(1, "Smartphone Limited", "Samsung", 15000000.00, "Titanium", "Kamera 200MP", "S001", 500));
    barangList.push_back(new BarangEdisiTerbatas(2, "Gaming Laptop Pro", "ASUS", 25000000.00, "Aluminium", "RTX 4090", "A002", 100));
    barangList.push_back(new BarangEdisiTerbatas(3, "Smartwatch Elite", "Apple", 8000000.00, "Sapphire Glass", "ECG Sensor", "P003", 250));
    barangList.push_back(new BarangEdisiTerbatas(4, "Headphone Custom", "Sony", 5000000.00, "Kulit Asli", "Noise Cancelling Pro", "H004", 300));
    barangList.push_back(new BarangEdisiTerbatas(5, "Drone Pro", "DJI", 12000000.00, "Carbon Fiber", "Otonom Terbang", "D005", 150));

    int choice;
    do {
        cout << "\n--- Toko Elektronik Multilevel Inheritance C++ ---" << endl;
        cout << "1. Tampilkan Semua Barang" << endl;
        cout << "2. Tambah Barang Baru" << endl;
        cout << "3. Keluar" << endl;
        cout << "Pilih menu: ";
        cin >> choice;

        switch (choice) {
            case 1:
                showData(barangList);
                break;
            case 2:
                addBarang(barangList);
                break;
            case 3:
                cout << "Terima kasih!" << endl;
                break;
            default:
                cout << "Pilihan tidak valid." << endl;
                break;
        }
    } while (choice != 3);

    for (const auto& item : barangList) {
        delete item;
    }

    return 0;
}