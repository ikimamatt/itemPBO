<?php

include 'item.php';

use CRUD\Item;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $item = new Item();
    $item->deleteItem($id);
    echo"<script>alert('Berhasil Menghapus Data');window.location='../tabel.php';</script>";

    exit();
} else {
    echo"<script>alert('Gagal Menghapus Data');window.location='../tabel.php';</script>";
}
