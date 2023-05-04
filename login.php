<?php

session_start();

// cek coockie awalan dicek
if (isset($_COOKIE['login'])) {
    if ($_COOKIE['login'] == 'true') {
        $_SESSION['login'] = true;
    }
}

// lanjut set session dicek
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

//tf data dari file koneksi
include 'koneksi.php';

// pengecekan tombol sumbit ws dipencet ta durung\
if (isset($_POST['login'])) {
    global $koneksi;

    $username = $_POST["username"];
    $password = $_POST["password"];

    $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    // bris yang dikembalikan
    if (mysqli_num_rows($cek) == 1) {
        $cekPw = mysqli_fetch_assoc($cek);
        if (password_verify($password, $cekPw["password"])) {
            // coba set session
            $_SESSION["login"] = true;

            // set cockies
            if (isset($_POST['remember'])) {
                setcookie('login', 'true', time() + 60);
            }

            header("Location: index.php");
            exit;
        }
        $error = true;
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    <br><br><br><br><br>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="card">
                    <div class="card-header bg-info text-dark text-center">
                        <h5>Login</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($error)) {
                            echo "<div class='alert alert-danger' role='alert'>password wrong, try again !!</div>";
                        }
                        ?>
                        <form action="" method="post">
                            <br>
                            <div class="input-group">
                                <span for="username" class="input-group-text"> <i class="fa-solid fa-user" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" id="username" name="username" placeholder="masukkan username anda">
                            </div>
                            <br>
                            <div class="input-group">
                                <span for="password" class="input-group-text"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="masukkan password anda">
                            </div>
                            <br>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Always Remember</label>
                            </div>
                            <button style="width: 100% ;" class="btn btn-info" type="submit" name="login">Login!</button>
                        </form>
                        <hr>
                        <p class="text-center">Belum punya akun? <a href="regis.php">Daftar disini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://kit.fontawesome.com/90add86f1d.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>



</html>