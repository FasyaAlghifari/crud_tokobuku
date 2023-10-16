<?php
    include "koneksi.php";


    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = mysqli_query($koneksi, "select * from login where username = '$username' and password = '$password'");
    $cek = mysqli_num_rows($login);

    if ($cek > 0) {

        $data = mysqli_fetch_assoc($login);
        if ($data['level'] == "user") {
            header("location:user/index.php");
        }elseif ($data['level'] == "admin") {
            header("location:admin/index.php");
        }
    }

?>