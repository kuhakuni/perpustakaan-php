<?php
include 'read-cart.php';
include 'add-cart.php';
include 'delete-cart.php';
include 'save-cart.php';

$fitur = $_GET['fitur'] ?? '';
switch ($fitur) {
    case 'add':
        $idbuku = $_GET['idbuku'] ?? '';
        add($idbuku);
        header('location:pinjam.php?fitur=read');
        break;
    case 'delete':
        $idbuku = $_GET['idbuku'];
        delete($idbuku);
        header('location:pinjam.php?fitur=read');
        break;
    case 'save':
        $hari = $_GET['hari'];
        save($hari);
        break;
    case 'read':
    default:
        $keywords = isset($_GET['keyword']) ? $_GET['keyword'] : null;
        read($keywords);
        break;
}
