<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Judul Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" />
    <title>Cari Buku</title>
    <style>
    table,
    th,
    td {
        border: 1px solid #000;
    }
    </style>
</head>

<body  class="d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
    <h1 class="text-center">Cari buku</h1>
    <br />
    <div class="container">
        <form action="" method="GET">
            <div class="row mb-3 justify-content-center">
                <div class="col">
                    <input type="text" placeholder="Cari buku yang Anda mau disini ..." required class="form-control" name="keyword" />
                </div>
                <div class="col-1">
                    <button type="submit" class="btn btn-primary ">Cari</button>
                </div>
            </div>
        </form>
        <?php
        require 'pinjam/conn.php';
        function cari($keyword)
        {
            $listbuku = [];
            global $conn;
            $query = "SELECT id, judul FROM buku WHERE judul LIKE '%$keyword%'";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result)) {
                $listbuku[] = $row;
            }
            mysqli_close($conn);
            return $listbuku;
        }

        function display($listbuku)
        {
            if (!$listbuku) {
                echo 'Buku not found';
                return;
            }
            echo "
			<br />
    		<div class=\"d-flex justify-content-center w-75\">
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
                    $key['id'] .
                    "</td>
						<td>" .
                    $key['judul'] .
                    "</td>
					</tr>
					";
            }
            echo "
					</tbody>
				</table>
				<br/>
				<a href=\"../\" class=\"text-decoration-none\"><i class=\"bi bi-arrow-left\"></i> Kembali</a>
    			</div>
    		</div>
			";
        }
        ?>
    </div>

</body>

</html>