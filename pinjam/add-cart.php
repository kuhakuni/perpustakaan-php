<?php
require "conn.php";

function add($idbuku)
{
	global $conn;
	$query = "INSERT INTO peminjaman (judul) VALUES('$idbuku')";
	if (mysqli_query($conn, $query)) {
		echo "Buku berhasil dipinjam!";
	} else {
		echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
}