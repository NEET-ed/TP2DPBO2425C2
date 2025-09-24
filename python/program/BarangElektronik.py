# Class Level 1: BarangElektronik

class BarangElektronik:
    def __init__(self, id, nama, merek, harga):
        self.id = id
        self.nama = nama
        self.merek = merek
        self.harga = harga

    def get_id(self):
        return self.id
    def get_nama(self):
        return self.nama
    def get_merek(self):
        return self.merek
    def get_harga(self):
        return self.harga
    
    def set_nama(self, nama):
        self.nama = nama
    def set_merek(self, merek):
        self.merek = merek
    def set_harga(self, harga):
        self.harga = harga

    def display(self, col_widths):
        return f"| {self.get_id():<{col_widths['ID']}} | {self.get_nama():<{col_widths['Nama']}} | {self.get_merek():<{col_widths['Merek']}} | {self.get_harga():<{col_widths['Harga']}.2f} |"