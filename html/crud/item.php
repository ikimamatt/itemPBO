<?php

namespace CRUD;

include 'config.php';

class Item
{
    private $con;

    public function __construct()
    {
        global $con;
        $this->con = $con;
    }

    public function getAllItems()
    {
        $stmt = $this->con->query("SELECT * FROM item");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getItemById($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM item WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function addItem($nama,$harga,$jumlah,$masuk)
    {
        $stmt = $this->con->prepare("INSERT INTO item (nama_barang, harga, jumlah, masuk) VALUES (:nama, :harga, :jumlah, :masuk)");
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':jumlah', $jumlah);
        $stmt->bindParam(':masuk', $masuk);
        $stmt->execute();
    }

    public function updateItem($id, $nama, $harga, $jumlah, $masuk)
    {
        $stmt = $this->con->prepare("UPDATE item SET nama_barang = :nama, harga = :harga , jumlah = :jumlah , masuk = :masuk WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':jumlah', $jumlah);
        $stmt->bindParam(':masuk', $masuk);
        $stmt->execute();
    }

    public function deleteItem($id)
    {
        $stmt = $this->con->prepare("DELETE FROM item WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
?>
