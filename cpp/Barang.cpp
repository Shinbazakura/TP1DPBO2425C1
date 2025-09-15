#include <string>

class Barang
{
private:
    int id;
    std::string nama;
    std::string kategori;
    // using string because some no part contain letter
    std::string no_part;
    std::string manufaktur;
    int harga;

public:
    // Constructor tanpa parameter
    Barang()
    {
        id = 0;
        nama = "";
        kategori = "";
        no_part = "";
        manufaktur = "";
        harga = 0;
    };

    // Constructor dengan parameter
    Barang(int id, std::string nama, std::string kategori, std::string no_part, std::string manufaktur, int harga)
    {
        //use this-> to specify it refer to "id" from this class(Barang) not "id" from parameter
        this->id = id;
        this->nama = nama;
        this->kategori = kategori;
        this->no_part = no_part;
        this->manufaktur = manufaktur;
        this->harga = harga;
    };

    // Getter and Setter for id
    int getId() const { return id; }
    void setId(int value) { id = value; }

    // Getter and Setter for nama
    std::string getNama() const { return nama; }
    void setNama(const std::string& value) { nama = value; }

    // Getter and Setter for kategori
    std::string getKategori() const { return kategori; }
    void setKategori(const std::string& value) { kategori = value; }

    // Getter and Setter for no_part
    std::string getNoPart() const { return no_part; }
    void setNoPart(const std::string& value) { no_part = value; }

    // Getter and Setter for manufaktur
    std::string getManufaktur() const { return manufaktur; }
    void setManufaktur(const std::string& value) { manufaktur = value; }

    // Getter and Setter for harga
    int getHarga() const { return harga; }
    void setHarga(int value) { harga = value; }

    ~Barang(){

    };
};
