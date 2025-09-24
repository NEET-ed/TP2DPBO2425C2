import java.util.ArrayList;
import java.util.Scanner;
import java.util.Map;
import java.util.HashMap;
import java.text.DecimalFormat;


public class Main {
    private static Map<String, Integer> calculateColumnWidths(ArrayList<BarangElektronik> list) {
        Map<String, Integer> widths = new HashMap<>();
        widths.put("ID", "ID".length());
        widths.put("Nama", "Nama".length());
        widths.put("Merek", "Merek".length());
        widths.put("Harga", "Harga".length());
        widths.put("Material", "Material".length());
        widths.put("Fitur Eksklusif", "Fitur Eksklusif".length());
        widths.put("Nomor Seri", "Nomor Seri".length());
        widths.put("Jumlah Produksi", "Jumlah Produksi".length());
        
        DecimalFormat df = new DecimalFormat("#.00");

        for (BarangElektronik item : list) {
            widths.put("ID", Math.max(widths.get("ID"), String.valueOf(item.getId()).length()));
            widths.put("Nama", Math.max(widths.get("Nama"), item.getNama().length()));
            widths.put("Merek", Math.max(widths.get("Merek"), item.getMerek().length()));
            widths.put("Harga", Math.max(widths.get("Harga"), df.format(item.getHarga()).length()));

            if (item instanceof BarangPremium) {
                BarangPremium premiumItem = (BarangPremium) item;
                widths.put("Material", Math.max(widths.get("Material"), premiumItem.getMaterial().length()));
                widths.put("Fitur Eksklusif", Math.max(widths.get("Fitur Eksklusif"), premiumItem.getFiturEksklusif().length()));

                if (item instanceof BarangEdisiTerbatas) {
                    BarangEdisiTerbatas limitedItem = (BarangEdisiTerbatas) item;
                    widths.put("Nomor Seri", Math.max(widths.get("Nomor Seri"), limitedItem.getNomorSeri().length()));
                    widths.put("Jumlah Produksi", Math.max(widths.get("Jumlah Produksi"), String.valueOf(limitedItem.getJumlahProduksi()).length()));
                }
            }
        }
        return widths;
    }

    private static void printLine(Map<String, Integer> colWidths) {
        System.out.print("=");
        for(String key : colWidths.keySet()) {
            System.out.print(new String(new char[colWidths.get(key) + 2]).replace('\0', '=') + "=");
        }
        System.out.println();
    }

    private static void showHeader(Map<String, Integer> colWidths) {
        printLine(colWidths);
        System.out.printf("| %-" + colWidths.get("ID") + "s | %-" + colWidths.get("Nama") + "s | %-" + colWidths.get("Merek") + "s | %-" + colWidths.get("Harga") + "s | %-" + colWidths.get("Material") + "s | %-" + colWidths.get("Fitur Eksklusif") + "s | %-" + colWidths.get("Nomor Seri") + "s | %-" + colWidths.get("Jumlah Produksi") + "s |\n",
                           "ID", "Nama", "Merek", "Harga", "Material", "Fitur Eksklusif", "Nomor Seri", "Jumlah Produksi");
        printLine(colWidths);
    }

    private static void showData(ArrayList<BarangElektronik> list) {
        Map<String, Integer> colWidths = calculateColumnWidths(list);
        showHeader(colWidths);
        for (BarangElektronik item : list) {
            item.display(colWidths);
        }
        printLine(colWidths);
    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        ArrayList<BarangElektronik> barangList = new ArrayList<>();

        barangList.add(new BarangEdisiTerbatas(1, "Smartphone Limited", "Samsung", 15000000.00, "Titanium", "Kamera 200MP", "S001", 500));
        barangList.add(new BarangEdisiTerbatas(2, "Gaming Laptop Pro", "ASUS", 25000000.00, "Aluminium", "RTX 4090", "A002", 100));
        barangList.add(new BarangEdisiTerbatas(3, "Smartwatch Elite", "Apple", 8000000.00, "Sapphire Glass", "ECG Sensor", "P003", 250));
        barangList.add(new BarangEdisiTerbatas(4, "Headphone Custom", "Sony", 5000000.00, "Kulit Asli", "Noise Cancelling Pro", "H004", 300));
        barangList.add(new BarangEdisiTerbatas(5, "Drone Pro", "DJI", 12000000.00, "Carbon Fiber", "Otonom Terbang", "D005", 150));

        int choice;
        do {
            System.out.println("\n--- Toko Elektronik Multilevel Inheritance Java ---");
            System.out.println("1. Tampilkan Semua Barang");
            System.out.println("2. Tambah Barang Baru");
            System.out.println("3. Keluar");
            System.out.print("Pilih menu: ");
            choice = scanner.nextInt();
            scanner.nextLine();

            switch (choice) {
                case 1:
                    showData(barangList);
                    break;
                case 2:
                    System.out.println("Tambah Barang Edisi Terbatas");
                    System.out.print("ID: "); int id = scanner.nextInt();
                    scanner.nextLine();
                    System.out.print("Nama: "); String nama = scanner.nextLine();
                    System.out.print("Merek: "); String merek = scanner.nextLine();
                    System.out.print("Harga: "); double harga = scanner.nextDouble();
                    scanner.nextLine();
                    System.out.print("Material: "); String material = scanner.nextLine();
                    System.out.print("Fitur Eksklusif: "); String fitur = scanner.nextLine();
                    System.out.print("Nomor Seri: "); String seri = scanner.nextLine();
                    System.out.print("Jumlah Produksi: "); int jumlah = scanner.nextInt();
                    scanner.nextLine();

                    BarangEdisiTerbatas newItem = new BarangEdisiTerbatas(id, "", "", 0.0, "", "", "", 0);
                    newItem.setNama(nama);
                    newItem.setMerek(merek);
                    newItem.setHarga(harga);
                    newItem.setMaterial(material);
                    newItem.setFiturEksklusif(fitur);
                    newItem.setNomorSeri(seri);
                    newItem.setJumlahProduksi(jumlah);
                    
                    barangList.add(newItem);
                    System.out.println("Data berhasil ditambahkan!");
                    break;
                case 3:
                    System.out.println("Terima kasih!");
                    break;
                default:
                    System.out.println("Pilihan tidak valid.");
                    break;
            }
        } while (choice != 3);

        scanner.close();
    }
}