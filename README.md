# Tugas Praktikum 1
## Janji
Saya Muhammad Attala Rafikasya dengan NIM 2403310 mengerjakan Tugas Praktikum 1 dalam mata kuliah Desain Pemrograman Berbasis Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan.

## Desain Program
Toko Elektronik Part Laptop

kelas Barang
Atribut Private :
- id
- nama
- kategori
- no_part
- manufaktur
- harga
- foto (Hanya php)

Method :
- Get Set untuk semua private atribut

# Alur Program
Ketika dijalankan program akan memberikan menu pilihan kepada user seperti berikut.
![Menu Program](Dokumentasi/001.png)

## Operasi  
### 1. Tampilkan Semua Data.
Jika user memilih 1, maka program akan menampilkan seluruh data yang ada.
![Tampilkan Semua Data](Dokumentasi/002.png)

### 2. Menambahkan Data.
Jika user memilih 2, maka program akan meminta input kepada user berupa semua atribut dari kelas Barang.  
![Menambahkan Data](Dokumentasi/003.png)

### 3. Update Data.
Jika user memilih 3, maka program akan meminta input kepada user untuk id yang akan diubah.
![Masukan Id yang akan dirubah](Dokumentasi/004.png)

- Jika data ditemukan  
Maka user akan diminta memasukan input untuk setiap atribut Barang. Jika atribut tidak ingin dirubah cukup kosongkan input lalu klik enter, jika berupa int seperti harga maka cukup di beri 0.
![Jika data ditemukan](Dokumentasi/005.png)

- Jika data tidak ditemukan
Maka akan ada pemberitahuan bahwa id yang dicari tidak ada.
![Jika data tidak ditemukan](Dokumentasi/006.png)

### 4. Hapus Data
