# main.py
from Barang import Barang
import os

def printBarang(input_barang):
    print(f"ID : {input_barang.getId()}")
    print(f"Nama : {input_barang.getNama()}")
    print(f"Kategori : {input_barang.getKategori()}")
    print(f"No Part : {input_barang.getNoPart()}")
    print(f"Manufaktur : {input_barang.getManufaktur()}")
    print(f"Harga : {input_barang.getHarga()}")

def clearScreen():
    os.system('cls' if os.name == 'nt' else 'clear')

def printMenu():
    print("Pilih operasi yang akan dilakukan dengan mengetik no pilihan anda.")
    print("1. Tampilkan Semua data.")
    print("2. Menambahkan Data.")
    print("3. Update Data.")
    print("4. Hapus Data.")
    print("5. Cari Data")
    print("6. Akhiri Program")
    print()

def main():
    # test Barang
    test = Barang()
    test.setId(10)
    test.setHarga(100000)
    test.setKategori("Barang Tidak Illegal")
    test.setManufaktur("Pabrik Terang")
    test.setNama("C4 Cotroller")
    test.setNoPart("11AA43FD")

    listBarang = []

    # input data dengan GetSet
    lcdDisplay = Barang()
    lcdDisplay.setId(1)
    lcdDisplay.setNama("LCD Display")
    lcdDisplay.setKategori("Display")
    lcdDisplay.setNoPart("11AA43FD")
    lcdDisplay.setManufaktur("Hitachi")
    lcdDisplay.setHarga(1_000_000)

    # input data dengan parameter
    oledDisplay = Barang(2, "Oled Display", "Display", "21BC23GD", "Samsung", 2_000_000)
    keyboard_US = Barang(3, "Keyboard US", "Keyboard", "32BB53US", "Delta", 150_000)

    listBarang.extend([lcdDisplay, oledDisplay, keyboard_US])

    # temp variables
    id_temp = 0
    nama_temp = ""
    kategori_temp = ""
    no_part_temp = ""
    manufaktur_temp = ""
    harga_temp = 0
    barang_temp = Barang()

    found = False
    index = -1
    menuSelector = 0

    clearScreen()

    while menuSelector != 6:
        print()
        printMenu()
        try:
            menuSelector = int(input())
        except ValueError:
            print("Angka Invalid")
            continue

        if menuSelector == 1:
            for b in listBarang:
                printBarang(b)
                print()
        elif menuSelector == 2:
            id_temp = int(input("Masukan ID : "))
            nama_temp = input("Masukan Nama : ")
            no_part_temp = input("Masukan No Part: ")
            manufaktur_temp = input("Masukan Manufaktur : ")
            harga_temp = int(input("Masukan Harga : "))

            barang_temp = Barang()
            barang_temp.setId(id_temp)
            barang_temp.setNama(nama_temp)
            barang_temp.setNoPart(no_part_temp)
            barang_temp.setManufaktur(manufaktur_temp)
            barang_temp.setHarga(harga_temp)

            listBarang.append(barang_temp)
            print("Data berhasil terinput.")
        elif menuSelector == 3:
            id_temp = int(input("Masukan ID yang akan diupdate : "))
            found = False
            for b in listBarang:
                if b.getId() == id_temp:
                    found = True
                    nama_temp = input("Masukan Nama baru (kosong = tetap): ")
                    if nama_temp:
                        b.setNama(nama_temp)
                    kategori_temp = input("Masukan Kategori baru (kosong = tetap): ")
                    if kategori_temp:
                        b.setKategori(kategori_temp)
                    no_part_temp = input("Masukan No Part baru (kosong = tetap): ")
                    if no_part_temp:
                        b.setNoPart(no_part_temp)
                    manufaktur_temp = input("Masukan Manufaktur baru (kosong = tetap): ")
                    if manufaktur_temp:
                        b.setManufaktur(manufaktur_temp)
                    harga_line = input("Masukan Harga baru (0 = tetap): ")
                    if harga_line:
                        harga_temp = int(harga_line)
                        if harga_temp != 0:
                            b.setHarga(harga_temp)
                    print("Data berhasil diupdate.")
                    break
            if not found:
                print("ID tidak ditemukan.")
        elif menuSelector == 4:
            id_temp = int(input("Masukan ID yang akan dihapus: "))
            index = -1
            for i, b in enumerate(listBarang):
                if b.getId() == id_temp:
                    index = i
            if index != -1:
                del listBarang[index]
                print("ID berhasil dihapus.")
            else:
                print("ID tidak ditemukan.")
        elif menuSelector == 5:
            id_temp = int(input("Masukan ID yang akan dicari: "))
            index = -1
            for i, b in enumerate(listBarang):
                if b.getId() == id_temp:
                    index = i
            if index != -1:
                print("Data ditemukan.")
                printBarang(listBarang[index])
                index = -1
            else:
                print("ID tidak ditemukan.")
        elif menuSelector == 6:
            break
        else:
            print("Angka Invalid")

if __name__ == "__main__":
    main()
