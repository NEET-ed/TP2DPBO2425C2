
# Class Level 2: BarangPremium
from BarangElektronik import BarangElektronik

class BarangPremium(BarangElektronik):
    def __init__(self, id, nama, merek, harga, material, fitur_eksklusif):
        super().__init__(id, nama, merek, harga)
        self.material = material
        self.fitur_eksklusif = fitur_eksklusif

    def get_material(self):
        return self.material
    def get_fitur_eksklusif(self):
        return self.fitur_eksklusif

    def set_material(self, material):
        self.material = material
    def set_fitur_eksklusif(self, fitur_eksklusif):
        self.fitur_eksklusif = fitur_eksklusif

    def display(self, col_widths):
        return f"{super().display(col_widths)} {self.get_material():<{col_widths['Material']}} | {self.get_fitur_eksklusif():<{col_widths['Fitur Eksklusif']}} |"