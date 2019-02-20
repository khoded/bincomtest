<?php

$server   = "sql106.unaux.com";
$username = "unaux_23480941";
$password = "jqtllp4aj8";
$database = "unaux_23480941_bincom";


$db = mysqli_connect($server, $username, $password, $database);


if (!$db) {
    die('Koneksi Database Gagal : ' . mysqli_connect_error());
}
?>