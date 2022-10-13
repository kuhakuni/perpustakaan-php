<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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
    <h1 class="text-center">Cari buku</h1>
    <div class="container">
        <form action="" method="GET">
            <div class="row mb-3 justify-content-center">
                <div class="col">
                    <input type="text" placeholder="Cari Buku di sini.." required class="form-control" name="keyword" />
                </div>
                <div class="col-1">
                    <button type="submit" class="btn btn-primary ">Cari</button>
                </div>
            </div>
        </form>
        <?php
        // Jangan lupa diganti db_username sama db_password
        // sama dibuat database nya
        const DB_USERNAME = "root";
        const DB_PASSWORD = "290601";
        const DB_NAME = "perpustakaan_iesi";
        function cari($keyword)
        {
        	$listbuku = [];
        	$link = mysqli_connect(
        		"127.0.0.1",
        		DB_USERNAME,
        		DB_PASSWORD,
        		DB_NAME
        	);
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
    <div class=\"row justify-content-center\">
    <div class=\"col-md-4 \">
	<table class=\"table table-striped\">
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
    </div>
    </div>
	";
        }
        ?>
    </div>
</body>

</html>