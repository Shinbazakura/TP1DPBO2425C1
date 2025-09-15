import java.util.*;

public class Main {
    private static final Scanner sc = new Scanner(System.in);

    public static void main(String[] args) {
        // test Barang
        Barang test = new Barang();
        test.setId(10);
        test.setHarga(100000);
        test.setKategori("Barang Tidak Illegal");
        test.setManufaktur("Pabrik Terang");
        test.setNama("C4 Cotroller");
        test.setNoPart("11AA43FD");

        // ArrayList Barang
        ArrayList<Barang> listBarang = new ArrayList<>();

        // input data dengan GetSet
        Barang lcdDisplay = new Barang();
        lcdDisplay.setId(1);
        lcdDisplay.setNama("LCD Display");
        lcdDisplay.setKategori("Display");
        lcdDisplay.setNoPart("11AA43FD");
        lcdDisplay.setManufaktur("Hitachi");
        lcdDisplay.setHarga(1_000_000);

        // input data dengan parameter
        Barang oledDisplay = new Barang(2, "Oled Display", "Display", "21BC23GD", "Samsung", 2_000_000);
        Barang keyboardUS = new Barang(3, "Keyboard US", "Keyboard", "32BB53US", "Delta", 150_000);

        // add static data to list
        listBarang.add(lcdDisplay);
        listBarang.add(oledDisplay);
        listBarang.add(keyboardUS);

        // temp variables for input
        int idTemp;
        String namaTemp;
        String kategoriTemp;
        String noPartTemp;
        String manufakturTemp;
        int hargaTemp;
        Barang barangTemp = new Barang();

        int menuSelector = 0;

        clearScreen();

        while (menuSelector != 6) {
            System.out.println();
            printMenu();
            while (!sc.hasNextInt()) { sc.nextLine(); }
            menuSelector = sc.nextInt();
            sc.nextLine(); // clear newline

            switch (menuSelector) {
                case 1 -> {
                    for (Barang b : listBarang) {
                        printBarang(b);
                        System.out.println();
                    }
                }
                case 2 -> {
                    System.out.print("Masukan ID : ");
                    idTemp = Integer.parseInt(sc.nextLine());

                    System.out.print("Masukan Nama : ");
                    namaTemp = sc.nextLine();

                    System.out.print("Masukan No Part: ");
                    noPartTemp = sc.nextLine();

                    System.out.print("Masukan Manufaktur : ");
                    manufakturTemp = sc.nextLine();

                    System.out.print("Masukan Harga : ");
                    hargaTemp = Integer.parseInt(sc.nextLine());

                    barangTemp = new Barang();
                    barangTemp.setId(idTemp);
                    barangTemp.setNama(namaTemp);
                    barangTemp.setNoPart(noPartTemp);
                    barangTemp.setManufaktur(manufakturTemp);
                    barangTemp.setHarga(hargaTemp);

                    listBarang.add(barangTemp);

                    System.out.println("Data berhasil terinput.");
                }
                case 3 -> {
                    System.out.print("Masukan ID yang akan diupdate : ");
                    idTemp = Integer.parseInt(sc.nextLine());
                    boolean found = false;

                    for (Barang b : listBarang) {
                        if (b.getId() == idTemp) {
                            found = true;

                            System.out.print("Masukan Nama baru (kosong = tetap): ");
                            namaTemp = sc.nextLine();
                            if (!namaTemp.isEmpty()) b.setNama(namaTemp);

                            System.out.print("Masukan Kategori baru (kosong = tetap): ");
                            kategoriTemp = sc.nextLine();
                            if (!kategoriTemp.isEmpty()) b.setKategori(kategoriTemp);

                            System.out.print("Masukan No Part baru (kosong = tetap): ");
                            noPartTemp = sc.nextLine();
                            if (!noPartTemp.isEmpty()) b.setNoPart(noPartTemp);

                            System.out.print("Masukan Manufaktur baru (kosong = tetap): ");
                            manufakturTemp = sc.nextLine();
                            if (!manufakturTemp.isEmpty()) b.setManufaktur(manufakturTemp);

                            System.out.print("Masukan Harga baru (0 = tetap): ");
                            String hargaLine = sc.nextLine();
                            if (!hargaLine.isEmpty()) {
                                hargaTemp = Integer.parseInt(hargaLine);
                                if (hargaTemp != 0) b.setHarga(hargaTemp);
                            }

                            System.out.println("Data berhasil diupdate.");
                            break;
                        }
                    }
                    if (!found) System.out.println("ID tidak ditemukan.");
                }
                case 4 -> {
                    System.out.print("Masukan ID yang akan dihapus: ");
                    idTemp = Integer.parseInt(sc.nextLine());
                    int index = -1;

                    for (int i = 0; i < listBarang.size(); i++) {
                        if (listBarang.get(i).getId() == idTemp) {
                            index = i;
                        }
                    }

                    if (index != -1) {
                        listBarang.remove(index);
                        System.out.println("ID berhasil dihapus.");
                    } else {
                        System.out.println("ID tidak ditemukan.");
                    }
                }
                case 5 -> {
                    System.out.print("Masukan ID yang akan dicari: ");
                    idTemp = Integer.parseInt(sc.nextLine());
                    int index = -1;

                    for (int i = 0; i < listBarang.size(); i++) {
                        if (listBarang.get(i).getId() == idTemp) {
                            index = i;
                        }
                    }

                    if (index != -1) {
                        System.out.println("Data ditemukan.");
                        printBarang(listBarang.get(index));
                    } else {
                        System.out.println("ID tidak ditemukan.");
                    }
                }
                case 6 -> { /* exit loop */ }
                default -> System.out.println("Angka Invalid");
            }
        }
    }

    private static void printBarang(Barang b) {
        System.out.println("ID : " + b.getId());
        System.out.println("Nama : " + b.getNama());
        System.out.println("Kategori : " + b.getKategori());
        System.out.println("No Part : " + b.getNoPart());
        System.out.println("Manufaktur : " + b.getManufaktur());
        System.out.println("Harga : " + b.getHarga());
    }

    private static void clearScreen() {
        try {
            if (System.getProperty("os.name").toLowerCase().contains("win")) {
                new ProcessBuilder("cmd", "/c", "cls").inheritIO().start().waitFor();
            } else {
                System.out.print("\033[H\033[2J");
                System.out.flush();
            }
        } catch (Exception e) {
            // ignore if clear fails
        }
    }

    private static void printMenu() {
        System.out.println("Pilih operasi yang akan dilakukan dengan mengetik no pilihan anda.");
        System.out.println("1. Tampilkan Semua data.");
        System.out.println("2. Menambahkan Data.");
        System.out.println("3. Update Data.");
        System.out.println("4. Hapus Data.");
        System.out.println("5. Cari Data");
        System.out.println("6. Akhiri Program");
        System.out.println();
    }
}
