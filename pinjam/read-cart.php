<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" />

    <style>
    table,
    th,
    td {
        border: 1px solid #000;
    }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">

    <?php
    include "conn.php";

    $listPeminjaman = [];
    function read()
    {
    	global $conn, $listPeminjaman;
    	$query = "SELECT * FROM peminjaman";
    	$result = mysqli_query($conn, $query);
    	while ($row = mysqli_fetch_array($result)) {
    		$listPeminjaman[] = $row;
    	}
    	mysqli_close($conn);
    }
    ?>
    <h1>Daftar Peminjaman Buku</h1>
    <?php if (!$listPeminjaman): ?>
    <p>Tidak ada buku yang dipinjam</p>
    <?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Judul</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listPeminjaman as $key): ?>
            <tr>
                <td>
                    <?php $key["id"]; ?>
                </td>
                <td>
                    <?php $key["judul"]; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</body>

</html>