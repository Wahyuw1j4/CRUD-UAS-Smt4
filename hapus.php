<?php 
session_start();
if (!isset($_SESSION["login"])){
    header("location: login.php");
}

include("conn.php");
// Tangkap id url
$id = $_GET["id"];
$id = mysqli_real_escape_string($link,$id);



// untuk mengambil nama dari table
$query = "SELECT * FROM table_master WHERE id='$id'";
$result = mysqli_query($link, $query);

if(!$result){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
}
$data = mysqli_fetch_assoc($result);
$nama = htmlspecialchars($data["nama"]);


//jalankan query DELETE
$query = "DELETE FROM table_master WHERE id='$id' ";
$hasil_query = mysqli_query($link, $query);


if($hasil_query) {
  // DELETE berhasil, redirect ke tampil_mahasiswa.php + pesan
  $pesan = "Data dengan nama = \"<b>$nama</b>\" sudah berhasil di hapus";
  $pesan = urlencode($pesan);
    header("Location: index.php?pesan={$pesan}");
}
else {
  die ("Query gagal dijalankan: ".mysqli_errno($link).
       " - ".mysqli_error($link));
}
?>