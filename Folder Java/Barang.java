import java.util.*;

public class Barang {
    private int id;
    private String nama;
    private String kategori;
    private String noPart;
    private String manufaktur;
    private int harga;

    // Constructor tanpa parameter
    public Barang() {
        id = 0;
        nama = "";
        kategori = "";
        noPart = "";
        manufaktur = "";
        harga = 0;
    }

    // Constructor dengan parameter
    public Barang(int id, String nama, String kategori,
                  String noPart, String manufaktur, int harga) {
        this.id = id;
        this.nama = nama;
        this.kategori = kategori;
        this.noPart = noPart;
        this.manufaktur = manufaktur;
        this.harga = harga;
    }

    // Getter & Setter
    public int getId() { return id; }
    public void setId(int value) { id = value; }

    public String getNama() { return nama; }
    public void setNama(String value) { nama = value; }

    public String getKategori() { return kategori; }
    public void setKategori(String value) { kategori = value; }

    public String getNoPart() { return noPart; }
    public void setNoPart(String value) { noPart = value; }

    public String getManufaktur() { return manufaktur; }
    public void setManufaktur(String value) { manufaktur = value; }

    public int getHarga() { return harga; }
    public void setHarga(int value) { harga = value; }
}
