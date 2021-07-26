<?php 
session_start();
if (isset($_SESSION["login"])){
    header("location: index.php");
}
include("conn.php");
// cek apakah form telah di submit
if (isset($_POST["login"])) {

    // ambil nilai form
    $username = htmlentities(strip_tags(trim($_POST["username"])));
    $password = htmlentities(strip_tags(trim($_POST["password"])));

    // filter dengan mysqli_real_escape_string
    $username = mysqli_real_escape_string($link,$username);
    $password = mysqli_real_escape_string($link,$password);
    // generate hashing
    $password_sha1 = sha1($password);
    // cek apakah username dan password ada di tabel admin
    $query = "SELECT * FROM table_admin WHERE username = '$username'
              AND password = '$password_sha1'";
    $result = mysqli_query($link,$query);

    if(mysqli_num_rows($result) == 1)  {
        
        $_SESSION["login"] = true;
        $_SESSION["nama"] = $username;
        header("Location: index.php");
        mysqli_free_result($result);
        mysqli_close($link);
        exit;
    }
     $error = true;
  }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
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

    <div class="container login">
        <h2 class="pt-2 text-center">Login</h2>
        <div class="cardd">
            <form name="login" onsubmit="return validateform()" method="post">
                <?php if(isset($error)) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username dan Pasword salah!</strong><br> Cek ulang Username dan Pasword anda!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                <div class="mb-4">
                    <label for="username" class="form-label">Username/Email</label>
                    <input type="text" class="form-control" id="username" name="username"/>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"/>
                </div>
                <div class="mb-4" id="alr">
                </div>
                <div class="d-grid">
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
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