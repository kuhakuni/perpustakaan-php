<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Buku</title>
    <style>
    table,
    th,
    td {
        border: 1px solid #000;
    }
    </style>
</head>

<body>

    <?php
    // Jangan lupa diganti db_username sama db_password
    // sama dibuat database nya
    const DB_USERNAME = "root";
    const DB_PASSWORD = "290601";
    const DB_NAME = "perpustakaan_iesi";
    function cari($keyword)
    {
    	$listbuku = [];
    	$link = mysqli_connect("127.0.0.1", DB_USERNAME, DB_PASSWORD, DB_NAME);
    	$query = "SELECT id, judul FROM buku WHERE judul LIKE '%$keyword%'";
    	$result = mysqli_query($link, $query);
    	while ($row = mysqli_fetch_array($result)) {
    		$listbuku[] = $row;
    	}
    	mysqli_close($link);
    	return $listbuku;
    }

    function display($listbuku)
    {
    	if (!$listbuku) {
    		echo "Buku not found";
    		return;
    	}
    	echo "
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Judul</th>
			</tr>
		</thead>
		<tbody>
	";
    	foreach ($listbuku as $key) {
    		echo "
		<tr> 
			<td>" .
    			$key["id"] .
    			"</td>
			<td>" .
    			$key["judul"] .
    			"</td>
		</tr>
		";
    	}
    	echo "
		</tbody>
	</table>
	";
    }
    ?>
</body>

</html>