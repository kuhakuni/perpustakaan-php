<?php
include '../cari.php';
function read($keyword = null)
{
    if ($keyword) {
        $link = mysqli_connect(
            '127.0.0.1',
            'root',
            'admin',
            'perpustakaan_iesi'
        );
        $query = "SELECT id, judul FROM buku WHERE judul LIKE '%$keyword%'";
        $result = mysqli_query($link, $query);
        $listbuku = [];
        while ($row = mysqli_fetch_array($result)) {
            $listbuku[] = $row;
        }
        mysqli_close($link);
        $row = '';

        if ($listbuku) {
            foreach ($listbuku as $id => $val) {
                $row .= '<tr>';
                $row .= '<td>' . ($id + 1) . '</td>';
                $row .= '<td>' . $val['judul'] . '</td>';
                $row .=
                    "<td><a href='../pinjam/pinjam.php?fitur=add&idbuku=" .
                    $val['id'] .
                    "'><button>Tambah</button></a></td>";
                $row .= '</tr>';
            }
        } else {
            $row = "<tr><td colspan='2'>Tidak Ditemukan Buku</td></tr>";
        }
        echo "<table border='1' style='border-collapse:collapse'>
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Aksi</th>
        <tr>
    </thead>
    <tbody>
        $row
    </tbody>
</table>";
    }
    $link = mysqli_connect('127.0.0.1', 'root', 'admin', 'perpustakaan_iesi');
    $query =
        'SELECT * FROM peminjaman p JOIN dipinjam d ON p.id = d.peminjaman_id JOIN buku b ON d.buku_id = b.id';
    $result = mysqli_query($link, $query);
    $listpinjam = [];
    while ($row = mysqli_fetch_array($result)) {
        $listpinjam[] = $row;
    }
    mysqli_close($link);

    $row = '';

    if ($listpinjam) {
        foreach ($listpinjam as $id => $val) {
            $row .= '<tr>';
            $row .= '<td>' . ($id + 1) . '</td>';
            $row .= '<td>' . $val['judul'] . '</td>';
            $row .= '<td>' . $val['hari'] . '</td>';
            $row .= '<td>' . $val['tanggal'] . '</td>';
            $row .=
                "<td><a href='pinjam.php?fitur=delete&idbuku=" .
                $val['peminjaman_id'] .
                "'><button>Hapus</button></a></td>";
            $row .= '</tr>';
        }
    } else {
        $row = "<tr><td colspan='5'>Tidak Ditemukan Peminjaman</td></tr>";
    }

    $html = "
    <br>
    <table border='1' style='border-collapse:collapse'>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Hari</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            <tr>
        </thead>
        <tbody>
            $row
        </tbody>
    </table>";

    echo $html;

    echo "<br><form action='pinjam.php' method='get'>
    <input type='text' name='hari' placeholder='masukkan durasi pinjam'>
    <br><br>
    <button type='submit' name='fitur' value='save'>Pinjam Buku</button>
</form>";
}
