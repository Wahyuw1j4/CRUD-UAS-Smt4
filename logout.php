<?php
  session_start();
  // hapus session
  session_unset();
  session_destroy();

  // redirect ke halaman login.php
  header("Location: login.php");
?>