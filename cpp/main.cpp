#include <iostream>
#include <string>
#include <vector>
#include "Barang.cpp"

void printBarang(Barang input);
void clearScreen();
void printMenu();

int main()
{
    // test Barang
    Barang test;
    test.setId(10);
    test.setHarga(100000);
    test.setKategori("Barang Tidak Illegal");
    test.setManufaktur("Pabrik Terang");
    test.setNama("C4 Cotroller");
    test.setNoPart("11AA43FD");

    // Array Class Barang
    std::vector<Barang> listBarang;

    // input data dengan GetSet
    Barang lcdDisplay;
    lcdDisplay.setId(1);
    lcdDisplay.setNama("LCD Display");
    lcdDisplay.setKategori("Display");
    lcdDisplay.setNoPart("11AA43FD");
    lcdDisplay.setManufaktur("Hitachi");
    lcdDisplay.setHarga(1'000'000);

    // input data dengan parameter
    Barang oledDisplay(2, "Oled Display", "Display", "21BC23GD", "Samsung", 2'000'000);
    Barang keyboard_US(3, "Keyboard US", "Keyboard", "32BB53WI", "Delta", 150'000);
    
    // input data static kedalam array/vector
    listBarang.push_back(lcdDisplay);
    listBarang.push_back(oledDisplay);
    listBarang.push_back(keyboard_US);

    // temp variable for input
    // using {} for default value initializer
    int id_temp{};
    std::string nama_temp{};
    std::string kategori_temp{};
    std::string no_part_temp{};
    std::string manufaktur_temp{};
    int harga_temp{};
    Barang barang_temp{};
    
    // var for selecting menu
    int menuSelector = 0;
    
    // clear screen before using
    clearScreen();

    //main loop for program
    while (menuSelector != 6)
    {
        printMenu();
        std::cin >> menuSelector;


        switch (menuSelector)
        {
        case 1:
            for (int i = 0; i < listBarang.size(); i++)
            {
                printBarang(listBarang[i]);
                std::cout << std::endl;
            }
            break;
        case 2:
            // ask user input for new data
            std::cout << "Masukan ID : ";
            std::cin >> id_temp;

            std::cout << "Masukan Nama : ";
            std::cin >> nama_temp;

            std::cout << "Masukan No Part: ";
            std::cin >> no_part_temp;

            std::cout << "Masukan Manufaktur : ";
            std::cin >> manufaktur_temp;

            std::cout << "Masukan Harga : ";
            std::cin >> harga_temp;

            // insert it to Barang
            barang_temp.setId(id_temp);
            barang_temp.setNama(nama_temp);
            barang_temp.setNoPart(no_part_temp);
            barang_temp.setManufaktur(manufaktur_temp);
            barang_temp.setHarga(harga_temp);

            // insert into vector
            listBarang.push_back(barang_temp);

            std::cout << "Data berhasil terinput.";
            break;
        case 3:
            std::cout << "Masukan ID yang akan diupdate";
            bool found = false;
            // using &b so it modifyng the original object not a copy of it
            for (Barang &b : listBarang)
            {
                if (b.getId() == id_temp)
                {
                    found = true;
                    std::cout << "Masukan Nama baru (kosong = tetap): ";
                    std::cin >> nama_temp;
                    if (!nama_temp.empty()) b.setNama(nama_temp);

                    std::cout << "Masukan Kategori baru (kosong = tetap): ";
                    std::cin >> kategori_temp;
                    if (!kategori_temp.empty()) b.setKategori(kategori_temp);

                    std::cout << "Masukan No Part baru (kosong = tetap): ";
                    std::cin >> no_part_temp;
                    if (!no_part_temp.empty()) b.setNoPart(no_part_temp);

                    std::cout << "Masukan Manufaktur baru (kosong = tetap): ";
                    std::cin >> manufaktur_temp;
                    if (!manufaktur_temp.empty()) b.setManufaktur(manufaktur_temp);

                    std::cout << "Masukan Harga baru (0 = tetap): ";
                    std::cin >> harga_temp;
                    if (harga_temp != 0) b.setHarga(harga_temp);

                    std::cout << "Data berhasil diupdate.\n";
                    break;
                }
                if (!found) std::cout << "ID tidak ditemukan.\n";
            }
            break;
        case 4: // Hapus Data
        {
            std::cout << "Masukan ID yang akan dihapus: ";
            std::cin >> id_temp;
            int index = -1;

            for (int i = 0; i < listBarang.size(); i++)
            {
                if (listBarang[i].getId() == id_temp)
                {
                    index = i;
                }
            }

            if (index != -1)
            {
                listBarang.erase(listBarang.begin() + index);
            }
            else
            {
                std::cout << "ID tidak ditemukan.\n";
            }
            break;
        }
        case 5:
            std::cout << "Masukan ID yang akan dicari: ";
            std::cin >> id_temp;
            int index = -1;

            for (int i = 0; i < listBarang.size(); i++)
            {
                if (listBarang[i].getId() == id_temp)
                {
                    index = i;
                }
            }

            if (index != -1)
            {
                std::cout << "Data ditemukan.";
                printBarang(listBarang[index]);
            }
            else
            {
                std::cout << "ID tidak ditemukan.\n";
            }
            break;
        case 6:
            break;
        default:
            std::cout << "Angka Invalid";
            break;
        }
    }
}

void printBarang(Barang input)
{
    std::cout << "ID : " << input.getId() << std::endl;
    std::cout << "Nama : " << input.getNama() << std::endl;
    std::cout << "Kategori : " << input.getKategori() << std::endl;
    std::cout << "No Part : " << input.getNoPart() << std::endl;
    std::cout << "Manufaktur : " << input.getManufaktur() << std::endl;
    std::cout << "Harga : " << input.getHarga() << std::endl;
}

void clearScreen()
{
    #ifdef _WIN32
    system("cls");   // Windows
    #else
    system("clear"); // Linux / macOS
    #endif
}

void printMenu()
{
    std::cout << "Pilih operasi yang akan dilakukan dengan mengetik no pilihan anda." << std::endl;
    std::cout << "1. Tampilkan Semua data." << std::endl;
    std::cout << "2. Menambahkan Data." << std::endl;
    std::cout << "3. Update Data." << std::endl;
    std::cout << "4. Hapus Data." << std::endl;
    std::cout << "5. Cari Data" << std::endl;
    std::cout << "6. Akhiri Program" << std::endl;
}