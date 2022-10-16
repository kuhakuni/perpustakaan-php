<?php
require 'conn.php';

function save($hari)
{
    global $conn;
    $query = 'UPDATE dipinjam SET hari = ' . $hari . ' WHERE hari = 0';
    mysqli_query($conn, $query);
    header('location:pinjam.php?fitur=read');
    mysqli_close($conn);
}
