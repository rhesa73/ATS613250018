<?php
require "fungsi.php";
periksaLogin();
require "koneksi.php";

$id = $_GET["id"] ?? "";
$stmt = $koneksi->prepare(
    "SELECT nomor_kendaraan, jenis_kendaraan, pemilik, tahun_pembuatan
     FROM mobil018 WHERE no_id = ?"
);
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

if (!$data) {
    $_SESSION["pesan"] = ["tipe" => "danger", "teks" => "Data kendaraan tidak ditemukan."];
    header("Location: dashboard.php");
    exit;
}

$judulForm = "Edit Kendaraan";
$aksi = "edit.php?id=" . $id;
$nomor = $data["nomor_kendaraan"];
$jenisKendaraan = $data["jenis_kendaraan"];
$pemilik = $data["pemilik"];
$tahun = $data["tahun_pembuatan"];
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
            "UPDATE mobil018 SET nomor_kendaraan = ?, jenis_kendaraan = ?,
             pemilik = ?, tahun_pembuatan = ? WHERE no_id = ?"
        );
        $stmt->bind_param("ssssi", $nomor, $jenisKendaraan, $pemilik, $tahun, $id);
        $stmt->execute();

        $_SESSION["pesan"] = ["tipe" => "success", "teks" => "Data kendaraan berhasil diperbarui."];
        header("Location: dashboard.php");
        exit;
    }
}

require "form_mobil.php";
