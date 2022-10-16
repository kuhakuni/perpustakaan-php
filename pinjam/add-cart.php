<?php
require 'conn.php';

function add($idbuku)
{
    global $conn;
    $query = "INSERT INTO peminjaman (tanggal) VALUES('" . date('Y/m/d') . "')";
    if (mysqli_query($conn, $query)) {
        $last_id = mysqli_insert_id($conn);
        $query =
            'INSERT INTO dipinjam (peminjaman_id, buku_id) VALUES(' .
            $last_id .
            ',' .
            $idbuku .
            ')';
        if (mysqli_query($conn, $query)) {
            header('location:pinjam.php?fitur=read');
        }
    }
    mysqli_close($conn);
}
