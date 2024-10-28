<?php
// models/LaporanRugiLaba.php

class LaporanRugiLaba {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getLaporan() {
        $query = "
            SELECT 
                id_barang AS 'ID Barang', 
                nama_barang AS 'Nama Barang',
                harga_beli AS 'Harga Beli', 
                FLOOR(SUM(jumlah_pembelian) / 2) AS 'Total Stok Pembelian', 
                FLOOR((SUM(harga_beli) * SUM(jumlah_pembelian)) / 4) AS 'Modal Pembelian',
                harga_jual AS 'Harga Jual', 
                FLOOR(SUM(jumlah_penjualan) / 2) AS 'Total Stok Terjual', 
                FLOOR((SUM(harga_jual) * SUM(jumlah_penjualan)) / 4) AS 'Hasil Penjualan',
                FLOOR(((SUM(harga_jual) * SUM(jumlah_penjualan)) - (SUM(harga_beli) * SUM(jumlah_pembelian))) / 4) AS 'Keuntungan',
                (SUM(jumlah_pembelian) - SUM(jumlah_penjualan)) AS 'Sisa Stok'
            FROM 
                barang 
            JOIN 
                penjualan USING(id_barang)
            JOIN 
                pembelian USING(id_barang)
            GROUP BY 
                id_barang, nama_barang, harga_beli, harga_jual
        ";
        
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStokModalPembelian() {
        $query = "
            SELECT 
                id_barang AS 'ID Barang', 
                nama_barang AS 'Nama Barang', 
                harga_beli AS 'Harga Beli', 
                SUM(jumlah_pembelian) AS 'Total Stok Pembelian', 
                (SUM(harga_beli) * SUM(jumlah_pembelian)) AS 'Modal Pembelian'
            FROM 
                pembelian 
            RIGHT JOIN 
                barang USING(id_barang) 
            GROUP BY 
                id_barang
        ";
        
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTransaksiPenjualan() {
        $query = "
            SELECT 
                id_barang AS 'ID Barang', 
                nama_barang AS 'Nama Barang', 
                harga_jual AS 'Harga Jual', 
                SUM(jumlah_penjualan) AS 'Total Stok Terjual', 
                (SUM(harga_jual) * SUM(jumlah_penjualan)) AS 'Hasil Penjualan'
            FROM 
                penjualan 
            RIGHT JOIN 
                barang USING(id_barang) 
            GROUP BY 
                id_barang
        ";
        
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
