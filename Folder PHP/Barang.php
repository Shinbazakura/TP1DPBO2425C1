<?php
class Barang {
    private int $id;
    private string $nama;
    private string $kategori;
    private string $no_part;
    private string $manufaktur;
    private int $harga;
    private string $image; // new attribute

    // Constructor tanpa parameter
    public function __construct(
        int $id = 0,
        string $nama = "",
        string $kategori = "",
        string $no_part = "",
        string $manufaktur = "",
        int $harga = 0,
        string $image = ""
    ) {
        $this->id = $id;
        $this->nama = $nama;
        $this->kategori = $kategori;
        $this->no_part = $no_part;
        $this->manufaktur = $manufaktur;
        $this->harga = $harga;
        $this->image = $image;
    }

    // Getters & Setters
    public function getId(): int { return $this->id; }
    public function setId(int $v): void { $this->id = $v; }

    public function getNama(): string { return $this->nama; }
    public function setNama(string $v): void { $this->nama = $v; }

    public function getKategori(): string { return $this->kategori; }
    public function setKategori(string $v): void { $this->kategori = $v; }

    public function getNoPart(): string { return $this->no_part; }
    public function setNoPart(string $v): void { $this->no_part = $v; }

    public function getManufaktur(): string { return $this->manufaktur; }
    public function setManufaktur(string $v): void { $this->manufaktur = $v; }

    public function getHarga(): int { return $this->harga; }
    public function setHarga(int $v): void { $this->harga = $v; }

    public function getImage(): string { return $this->image; }
    public function setImage(string $v): void { $this->image = $v; }
}
