from BarangPremium import BarangPremium

# Class Level 3: BarangEdisiTerbatasfrom BarangPremium import BarangPremium


class BarangEdisiTerbatas(BarangPremium):
    def __init__(self, id, nama, merek, harga, material, fitur_eksklusif, nomor_seri, jumlah_produksi):
        super().__init__(id, nama, merek, harga, material, fitur_eksklusif)
        self.nomor_seri = nomor_seri
        self.jumlah_produksi = jumlah_produksi


    def get_nomor_seri(self):
        return self.nomor_seri
    def get_jumlah_produksi(self):
        return self.jumlah_produksi

    def set_nomor_seri(self, nomor_seri):
        self.nomor_seri = nomor_seri
    def set_jumlah_produksi(self, jumlah_produksi):
        self.jumlah_produksi = jumlah_produksi

    def display(self, col_widths):
        return f"{super().display(col_widths)} {self.get_nomor_seri():<{col_widths['Nomor Seri']}} | {self.get_jumlah_produksi():<{col_widths['Jumlah Produksi']}} |"