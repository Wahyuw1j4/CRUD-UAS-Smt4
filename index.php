<?php 
session_start();
if (!isset($_SESSION["login"])){
    header("location: login.php");
}
include("conn.php");
// buat query pencarian
$query  = "SELECT * FROM table_master ORDER BY nama ASC";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Table Master</title>
    <meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
    <meta name="author" content="Vincent Garreau" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div id="particles-js"></div>

    <div class="main">
        <h1 class="text-center">Data Master</h1>
        <div class="d-flex justify-content-between me-3">
            <a class="btn btn-success mb-1" href="tambah.php" style="color: #fff;">Tambah Data</a>
            <a class="btn btn-secondary mb-1" href="logout.php" style="color: #fff;">Logout</a>
        </div>
        <?php  if (isset($_GET["pesan"])) {
                $pesan = $_GET["pesan"];
                echo "<div class=\"alert alert-primary alert-dismissible fade show\" role=\"alert\">
                <p>$pesan</p>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                </div>";
        }?>
                
                
        <table id="customers">
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Tempat lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Kecamatan</th>
                <th>Kode Pos</th>
                <th>No_hp</th>
                <th>Email</th>
                <th>TOMBOL</th>
            </tr>
            <?php 
            // jalankan query
            $result = mysqli_query($link, $query); 
            if(!$result){
                die ("Query Error: ".mysqli_errno($link).
                     " - ".mysqli_error($link));
            }
            $no = 0;
            //buat perulangan untuk element tabel dari data mahasiswa
            while($data = mysqli_fetch_assoc($result))
            { 
                // konversi date MySQL (yyyy-mm-dd) menjadi dd-mm-yyyy
                $tanggal_php = strtotime($data["tanggal_lahir"]);
                $tanggal = date("d - m - Y", $tanggal_php);
                // genarate nomer
                $no++;
                echo "<tr>";
                echo "<td>$no</td>";
                echo "<td>$data[nama]</td>";
                echo "<td>$data[jenis_kelamin]</td>";
                echo "<td>$data[tempat_lahir]</td>";
                echo "<td>$tanggal</td>";
                echo "<td>$data[alamat]</td>";
                echo "<td>$data[provinsi]</td>";
                echo "<td>$data[kabupaten]</td>";
                echo "<td>$data[kecamatan]</td>";
                echo "<td>$data[kode_pos]</td>";
                echo "<td>$data[no_hp]</td>";
                echo "<td>$data[email]</td>";
                echo "<td>
                    <a class=\"btn btn-primary m-1\" href=\"ubah.php?id=$data[id]\" style=\"color: white;\">Ubah</a>
                    
                    <a class=\"btn btn-danger m-1\" href=\"hapus.php?id=$data[id]\" onclick=\"return confirm('Data dengan nama: $data[nama] akan dihapus?')\" style=\"color: white;\">Hapus</a>
            </td>";
                echo "</tr>";
            }
            // bebaskan memory 
            mysqli_free_result($result);
            // tutup koneksi dengan database mysql
            mysqli_close($link);
            ?>

        </table> 
        <p class="text-center footer" >Wahyu Wijaya | 190103060</p>
    </div>
    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>

    <!-- stats.js -->
    <script src="js/lib/stats.js"></script>
</body>

</html>