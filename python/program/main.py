from BarangElektronik import BarangElektronik
from BarangPremium import BarangPremium
from BarangEdisiTerbatas import BarangEdisiTerbatas

# Fungsi helper tetap di file main karena mereka tidak terkait langsung dengan kelas
def calculate_column_widths(data_list):
    widths = {
        'ID': len('ID'),
        'Nama': len('Nama'),
        'Merek': len('Merek'),
        'Harga': len('Harga'),
        'Material': len('Material'),
        'Fitur Eksklusif': len('Fitur Eksklusif'),
        'Nomor Seri': len('Nomor Seri'),
        'Jumlah Produksi': len('Jumlah Produksi')
    }

    for item in data_list:
        widths['ID'] = max(widths['ID'], len(str(item.get_id())))
        widths['Nama'] = max(widths['Nama'], len(item.get_nama()))
        widths['Merek'] = max(widths['Merek'], len(item.get_merek()))
        widths['Harga'] = max(widths['Harga'], len(f"{item.get_harga():.2f}"))
        
        if isinstance(item, BarangPremium):
            widths['Material'] = max(widths['Material'], len(item.get_material()))
            widths['Fitur Eksklusif'] = max(widths['Fitur Eksklusif'], len(item.get_fitur_eksklusif()))
            
            if isinstance(item, BarangEdisiTerbatas):
                widths['Nomor Seri'] = max(widths['Nomor Seri'], len(item.get_nomor_seri()))
                widths['Jumlah Produksi'] = max(widths['Jumlah Produksi'], len(str(item.get_jumlah_produksi())))
    return widths

def print_line(col_widths):
    line = ""
    for width in col_widths.values():
        line += "+" + "=" * (width + 2)
    line += "+"
    print(line)

def show_header(col_widths):
    print_line(col_widths)
    header_str = f"| {'ID':<{col_widths['ID']}} | {'Nama':<{col_widths['Nama']}} | {'Merek':<{col_widths['Merek']}} | {'Harga':<{col_widths['Harga']}} | {'Material':<{col_widths['Material']}} | {'Fitur Eksklusif':<{col_widths['Fitur Eksklusif']}} | {'Nomor Seri':<{col_widths['Nomor Seri']}} | {'Jumlah Produksi':<{col_widths['Jumlah Produksi']}} |"
    print(header_str)
    print_line(col_widths)

def show_data(data_list):
    col_widths = calculate_column_widths(data_list)
    show_header(col_widths)
    for item in data_list:
        print(item.display(col_widths))
    print_line(col_widths)

def add_barang(data_list):
    print("Tambah Barang Edisi Terbatas")
    try:
        id = int(input("ID: "))
        nama = input("Nama: ")
        merek = input("Merek: ")
        harga = float(input("Harga: "))
        material = input("Material: ")
        fitur_eksklusif = input("Fitur Eksklusif: ")
        nomor_seri = input("Nomor Seri: ")
        jumlah_produksi = int(input("Jumlah Produksi: "))
        
        new_item = BarangEdisiTerbatas(id, "", "", 0.0, "", "", "", 0)
        new_item.set_nama(nama)
        new_item.set_merek(merek)
        new_item.set_harga(harga)
        new_item.set_material(material)
        new_item.set_fitur_eksklusif(fitur_eksklusif)
        new_item.set_nomor_seri(nomor_seri)
        new_item.set_jumlah_produksi(jumlah_produksi)
        
        data_list.append(new_item)
        print("Data berhasil ditambahkan!")
    except ValueError:
        print("Input tidak valid. Harap masukkan nilai yang benar.")

def main():
    barang_list = [
        BarangEdisiTerbatas(1, "Smartphone Limited", "Samsung", 15000000.00, "Titanium", "Kamera 200MP", "S001", 500),
        BarangEdisiTerbatas(2, "Gaming Laptop Pro", "ASUS", 25000000.00, "Aluminium", "RTX 4090", "A002", 100),
        BarangEdisiTerbatas(3, "Smartwatch Elite", "Apple", 8000000.00, "Sapphire Glass", "ECG Sensor", "P003", 250),
        BarangEdisiTerbatas(4, "Headphone Custom", "Sony", 5000000.00, "Kulit Asli", "Noise Cancelling Pro", "H004", 300),
        BarangEdisiTerbatas(5, "Drone Pro", "DJI", 12000000.00, "Carbon Fiber", "Otonom Terbang", "D005", 150)
    ]

    while True:
        print("\n--- Toko Elektronik Multilevel Inheritance Python ---")
        print("1. Tampilkan Semua Barang")
        print("2. Tambah Barang Baru")
        print("3. Keluar")
        choice = input("Pilih menu: ")

        if choice == '1':
            show_data(barang_list)
        elif choice == '2':
            add_barang(barang_list)
        elif choice == '3':
            print("Terima kasih!")
            break
        else:
            print("Pilihan tidak valid.")

if __name__ == "__main__":
    main()