<?php
require "fungsi.php";
periksaLogin();
require "koneksi.php";

$judulForm = "Tambah Kendaraan";
$aksi = "tambah.php";
$nomor = $jenisKendaraan = $pemilik = $tahun = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    periksaToken();

    $nomor = inputTeks("nomor_kendaraan");
    $jenisKendaraan = inputTeks("jenis_kendaraan");
    $pemilik = inputTeks("pemilik");
    $tahun = inputTeks("tahun_pembuatan");
    $error = validasiMobil($nomor, $jenisKendaraan, $pemilik, $tahun);

    if ($error === "") {
        $stmt = $koneksi->prepare(
            "INSERT INTO mobil018 (nomor_kendaraan, jenis_kendaraan, pemilik, tahun_pembuatan)
             VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("ssss", $nomor, $jenisKendaraan, $pemilik, $tahun);
        $stmt->execute();

        $_SESSION["pesan"] = ["tipe" => "success", "teks" => "Data kendaraan berhasil ditambahkan."];
        header("Location: dashboard.php");
        exit;
    }
}

require "form_mobil.php";
