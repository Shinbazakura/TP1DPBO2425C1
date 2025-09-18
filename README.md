# Tugas Praktikum 1
## Janji
Saya Muhammad Attala Rafikasya dengan NIM 2403310 mengerjakan Tugas Praktikum 1 dalam mata kuliah Desain Pemrograman Berbasis Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan.

## Desain Program
Toko Elektronik Part Laptop  
Program ini adalah program manajemen barang sederhana yang memiliki fitur CRUD.

kelas Barang
Atribut Private :
- id : ID unik dalam program.
- nama : Nama produk.
- kategori : Kategori barang.
- no_part : No part .
- manufaktur : Manufaktur Barang.
- harga : Harga jual barang.
- foto (Hanya php) : Gambar dari produk.

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
Jika user memilih 4, maka program akan meminta input kepada user untuk id yang akan dihapus.  
![Masukan id yang ingin dihapus](Dokumentasi/007.png)

- Jika data ditemukan  
Maka data akan di hapus dari list barang.  
![Jika data ditemukan](Dokumentasi/008.png)

- Jika data tidak ditemukan  
Maka akan ada pemberitahuan bahwa id yang akan dihapus tidak ada.  
![Jika data tidak ditemukan](Dokumentasi/009.png)

### 5. Cari Data
Jika user memilih 5, maka program akan meminta input kepada user untuk id yang akan di cari.  
![Masukan ID yang akan dicari](Dokumentasi/010.png)

- Jika data ditemukan  
Maka data akan ditampilkan kepada user  
![Jika data ditemukan](Dokumentasi/011.png)

- Jika data tidak ditemukan  
Maka akan ada pemberitahuan bahwa id yang dicari tidak ditemukan.  
![Jika data tidak ditemukan](Dokumentasi/012.png)

### 6. Akhiri Program
Jika user memilih 6, maka program akan berhenti berjalan.  
![Akhiri Program](Dokumentasi/013.png)

## Dokumentasi
### Dokumentasi C++
![Dokumentasi C++](Dokumentasi/014.png)

### Dokumentasi Java
![Dokumentasi Java](Dokumentasi/015.png)

### Dokumentasi Python
![Dokumentasi Python](Dokumentasi/016.png)

### Dokumentasi PHP
#### Read  
![Read PHP](Dokumentasi/017.png)
#### Add  
![Add PHP 1](Dokumentasi/018.png)  
![Add PHP 2](Dokumentasi/019.png)
#### Edit
![Edit PHP 1](Dokumentasi/020.png)
![Edit PHP 2](Dokumentasi/021.png)
#### Hapus
![Hapus PHP 1](Dokumentasi/022.png)
![Hapus PHP 2](Dokumentasi/023.png)
![Hapus PHP 3](Dokumentasi/024.png)