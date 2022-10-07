<?php
include 'cari.php';

$fitur = $_GET['fitur'];
switch ($fitur) {
    case 'pinjam':
        header('location:pinjam/pinjam.php?fitur=read');
        exit();
    case 'cari':
    default:
        $keyword = $_GET['keyword'];
        $listbuku = cari($keyword);
        display($listbuku); // fungsi untuk menampilkan buku
        break; // dalam bentuk tabel
}
