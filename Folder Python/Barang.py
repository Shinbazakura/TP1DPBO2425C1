class Barang:
    def __init__(self, id=0, nama="", kategori="", no_part="", manufaktur="", harga=0):
        # default constructor and parameterized in one
        self.id = id
        self.nama = nama
        self.kategori = kategori
        self.no_part = no_part
        self.manufaktur = manufaktur
        self.harga = harga

    # Getter and Setter for id
    def getId(self):
        return self.id

    def setId(self, value):
        self.id = value

    # Getter and Setter for nama
    def getNama(self):
        return self.nama

    def setNama(self, value):
        self.nama = value

    # Getter and Setter for kategori
    def getKategori(self):
        return self.kategori

    def setKategori(self, value):
        self.kategori = value

    # Getter and Setter for no_part
    def getNoPart(self):
        return self.no_part

    def setNoPart(self, value):
        self.no_part = value

    # Getter and Setter for manufaktur
    def getManufaktur(self):
        return self.manufaktur

    def setManufaktur(self, value):
        self.manufaktur = value

    # Getter and Setter for harga
    def getHarga(self):
        return self.harga

    def setHarga(self, value):
        self.harga = value
