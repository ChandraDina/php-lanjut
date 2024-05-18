<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nama = $_GET["nama"];
    $email = $_GET["email"];
    $alamat = $_GET["alamat"];

    echo "<h2>Data yang Anda masukkan:</h2>";
    echo "Nama: $nama <br>";
    echo "Email: $email <br>";
    echo "Alamat: $alamat <br>";
}
?>
