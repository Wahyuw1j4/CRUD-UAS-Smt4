<?php
  // buat koneksi dengan database mysql
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $link   = mysqli_connect($dbhost,$dbuser,$dbpass);

  //periksa koneksi, tampilkan pesan kesalahan jika gagal
  if(!$link){
    die ("Koneksi dengan database gagal: ".mysqli_connect_errno().
         " - ".mysqli_connect_error());
  }

  //buat database dbmaster jika belum ada
  $query = "CREATE DATABASE IF NOT EXISTS dbmaster";
  $result = mysqli_query($link, $query);

  if(!$result){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }
  else {
    echo "Database <b>'dbmaster'</b> berhasil dibuat... <br>";
  }

  //pilih database dbmaster
  $result = mysqli_select_db($link, "dbmaster");

  if(!$result){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }
  else {
    echo "Database <b>'dbmaster'</b> berhasil dipilih... <br>";
  }

  // cek apakah tabel table_master sudah ada. jika ada, hapus tabel
  $query = "DROP TABLE IF EXISTS table_master";
  $hasil_query = mysqli_query($link, $query);

  if(!$hasil_query){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }
  else {
    echo "Tabel <b>'table_master'</b> berhasil dihapus... <br>";
  }

  // buat query untuk CREATE tabel table_master
  $query  = "CREATE TABLE `dbmaster`.`table_master`(
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nama` VARCHAR(100) NOT NULL,
    `jenis_kelamin` VARCHAR(30) NOT NULL,
    `tempat_lahir` VARCHAR(50) NOT NULL,
    `tanggal_lahir` DATE NOT NULL,
    `alamat` VARCHAR(100) NOT NULL,
    `provinsi` VARCHAR(100) NOT NULL,
    `kabupaten` VARCHAR(100) NOT NULL,
    `kecamatan` VARCHAR(100) NOT NULL,
    `kode_pos` INT(10) NOT NULL,
    `no_hp` BIGINT(15) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE = INNODB";


  $hasil_query = mysqli_query($link, $query);

  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }
  else {
    echo "Tabel <b>'table_master'</b> berhasil dibuat... <br>";
  }

  // buat query untuk INSERT data ke tabel table_master
  $query  = "INSERT INTO `table_master`(
    `id`,
    `nama`,
    `jenis_kelamin`,
    `tempat_lahir`,
    `tanggal_lahir`,
    `alamat`,
    `provinsi`,
    `kabupaten`,
    `kecamatan`,
    `kode_pos`,
    `no_hp`,
    `email`
)
VALUES(
    NULL,
    'Wahyu Wijaya',
    'Laki - Laki',
    'Surakarta',
    '2021-07-13',
    'Solo',
    'jateng',
    'kota surakarta',
    'banjarsari',
    '57321',
    '081232113339',
    'WahyuWijaya@gmail.com'
), (
    NULL,
    'Riski kukuh',
    'Laki - Laki',
    'Surakarta',
    '2000-01-13',
    'Solo',
    'jateng',
    'kota surakarta',
    'banjarsari',
    '57321',
    '0812589123900',
    'Riskikukuh@gmail.com'
), (
    NULL,
    'Aldi Wahyudi',
    'Laki - Laki',
    'Gunung Kidul',
    '2000-06-29',
    'Wonosari',
    'jateng',
    'Gunung Kidul',
    'Wamir',
    '57321',
    '0823189122340',
    'Aldiwa@gmail.com'
);";
  
  $hasil_query = mysqli_query($link, $query);

  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }
  else {
    echo "Tabel <b>'table_master'</b> berhasil diisi... <br>";
  }

  // cek apakah tabel table_admin sudah ada. jika ada, hapus tabel
  $query = "DROP TABLE IF EXISTS table_admin";
  $hasil_query = mysqli_query($link, $query);

  if(!$hasil_query){
    die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
  }
  else {
    echo "Tabel <b>'table_admin'</b> berhasil dihapus... <br>";
  }

  // buat query untuk CREATE tabel table_admin
  $query  = "CREATE TABLE table_admin (username VARCHAR(50), password CHAR(40))";
  $hasil_query = mysqli_query($link, $query);

  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }
  else {
    echo "Tabel <b>'table_admin'</b> berhasil dibuat... <br>";
  }

  // buat username dan password untuk table_admin
  $username = "admin";
  $password = sha1("admin");

  // buat query untuk INSERT data ke table_admin
  $query  = "INSERT INTO table_admin VALUES ('$username','$password')";

  $hasil_query = mysqli_query($link, $query);

  if(!$hasil_query){
      die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }
  else {
    echo "Tabel <b>'table_admin'</b> berhasil diisi... <br>";
  }

  // tutup koneksi dengan database mysql
  mysqli_close($link);
?>
