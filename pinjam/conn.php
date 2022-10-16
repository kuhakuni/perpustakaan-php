<?php
// Jangan lupa diganti db_username sama db_password
// sama dibuat database nya

$conn = mysqli_connect('127.0.0.1', 'root', 'admin', 'perpustakaan_iesi');
if (mysqli_connect_errno()) {
    echo 'Koneksi database gagal : ' . mysqli_connect_error();
}
