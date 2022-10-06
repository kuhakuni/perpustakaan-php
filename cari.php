<?php
// Jangan lupa diganti db_username sama db_password
// sama dibuat database nya
const DB_USERNAME = "root";
const DB_PASSWORD = "290601";
const DB_NAME = "perpustakaan_iesi";
function cari($keyword)
{
	$link = mysqli_connect(
		"127.0.0.1",
		"DB_USERNAME",
		"DB_PASSWORD",
		"DB_NAME"
	);
	$query = "SELECT id, judul FROM buku WHERE judul LIKE '%keyword%'";
	$result = mysqli_query($link, $query);
	while ($row = mysqli_fetch_array($result)) {
		$listbuku[] = $row;
	}
	mysqli_close($link);
	return $listbuku;
}