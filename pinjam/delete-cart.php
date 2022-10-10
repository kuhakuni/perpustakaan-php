<?php
require "conn.php";
function delete($idbuku)
{
	global $conn;
	$query = "DELETE FROM peminjaman WHERE id = $idbuku";
	if (mysqli_query($conn, $query)) {
		echo "Buku berhasil dipinjam!";
	} else {
		echo "Error: " . $query . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
}