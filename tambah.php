<?php 
session_start();
if (!isset($_SESSION["login"])){
    header("location: login.php");
}
include("conn.php");

// cek apakah form telah di submit
if (isset($_POST["submit"])) {
    // form telah disubmit, proses data

    $nama = htmlspecialchars($_POST["nama"]);
    $jenis_kelamin = htmlspecialchars($_POST["jk"]);
    $tempat_lahir = htmlspecialchars($_POST["tl"]);
    $tanggal_lahir = htmlspecialchars($_POST["tgll"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $provinsi = htmlspecialchars($_POST["prov"]);
    $kabupaten = htmlspecialchars($_POST["kota"]);
    $kecamatan = htmlspecialchars($_POST["camat"]);
    $kode_pos = htmlspecialchars($_POST["pos"]);
    $no_hp = htmlspecialchars($_POST["nohp"]);
    $email = htmlspecialchars($_POST["email"]);
    // filter semua data
    $nama = mysqli_real_escape_string($link,$nama);
    $jenis_kelamin = mysqli_real_escape_string($link,$jenis_kelamin);
    $tempat_lahir = mysqli_real_escape_string($link,$tempat_lahir);
    $tanggal_lahir = mysqli_real_escape_string($link,$tanggal_lahir);
    $alamat = mysqli_real_escape_string($link,$alamat);
    $provinsi = mysqli_real_escape_string($link,$provinsi);
    $kabupaten = mysqli_real_escape_string($link,$kabupaten);
    $kecamatan = mysqli_real_escape_string($link,$kecamatan);
    $kode_pos = mysqli_real_escape_string($link,$kode_pos);
    $no_hp = mysqli_real_escape_string($link,$no_hp);
    $email = mysqli_real_escape_string($link,$email);
  
    //buat dan jalankan query INSERT
    $query = "INSERT INTO table_master VALUES ('','$nama', '$jenis_kelamin','$tempat_lahir','$tanggal_lahir',
    '$alamat','$provinsi','$kabupaten','$kecamatan','$kode_pos','$no_hp','$email')";


    $result = mysqli_query($link, $query);

    //periksa hasil query
    if($result) {
    // INSERT berhasil, redirect ke index.php + pesan
        $pesan = "Data dengan nama = \"<b>$nama</b>\" sudah berhasil di tambah";
        $pesan = urlencode($pesan);
        header("Location: index.php?pesan={$pesan}");
    }
    else {
    die ("Query gagal dijalankan: ".mysqli_errno($link).
            " - ".mysqli_error($link));
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Ubah</title>
    <meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
    <meta name="author" content="Vincent Garreau" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" media="screen" href="css/style.css">
</head>

<body>
    <div id="particles-js"></div>

    <div class="container ubah">
        <h2 class="pt-2 text-center">Tambah Data</h2>
        <div class="cardd">
            <form name="tambah" onsubmit="return validateformm()" method="post">
                <div class="mb-4">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" />
                </div>
                <div class="mb-4">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <input type="text" class="form-control" id="jk" name="jk" />
                </div>
                <div class="mb-4">
                    <label for="tl" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tl" name="tl" />
                </div>
                <div class="mb-4">
                    <label for="tgll" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgll" name="tgll" />
                </div>
                <div class="mb-4">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" />
                </div>
                <div class="mb-4">
                    <label for="prov" class="form-label">Provinsi</label>
                    <input type="text" class="form-control" id="prov" name="prov" />
                </div>
                <div class="mb-4">
                    <label for="kota" class="form-label">Kabupaten/Kota</label>
                    <input type="text" class="form-control" id="kota" name="kota" />
                </div>
                <div class="mb-4">
                    <label for="camat" class="form-label">Kecamatan</label>
                    <input type="text" class="form-control" id="camat" name="camat" />
                </div>
                <div class="mb-4">
                    <label for="pos" class="form-label">Kode Pos</label>
                    <input type="text" class="form-control" id="pos" name="pos" />
                </div>
                <div class="mb-4">
                    <label for="nohp" class="form-label">No HP</label>
                    <input type="text" class="form-control" id="nohp" name="nohp" />
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" />
                </div>
                <div class="mb-4" id="alr">
                </div>
                <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
        <p class="text-center footer">Wahyu Wijaya | 190103060</p>
    </div>
    <!-- scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>
    <script src="js/script.js"></script>

    <!-- stats.js -->
    <script src="js/lib/stats.js"></script>
</body>

</html>