<?php
require 'conn.php';
function delete($idbuku)
{
    global $conn;
    $query = "DELETE FROM dipinjam WHERE id = $idbuku";
    if (mysqli_query($conn, $query)) {
        echo 'Buku yang dipinjam berhasil dihapus.';
    } else {
        echo 'Error: ' . $query . '<br>' . mysqli_error($conn);
    }
    mysqli_close($conn);
}
