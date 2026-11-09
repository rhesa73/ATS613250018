<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function aman($teks) {
    return htmlspecialchars((string) $teks, ENT_QUOTES, "UTF-8");
}

function periksaLogin() {
    if (!isset($_SESSION["id"])) {
        header("Location: index.php");
        exit;
    }
}

// Token untuk memastikan formulir dikirim dari halaman aplikasi.
if (!isset($_SESSION["csrf"])) {
    $_SESSION["csrf"] = bin2hex(random_bytes(32));
}

function periksaToken() {
    $token = $_POST["csrf"] ?? "";

    if (!is_string($token) || !hash_equals($_SESSION["csrf"], $token)) {
        $_SESSION["pesan"] = [
            "tipe" => "danger",
            "teks" => "Formulir tidak valid. Silakan coba kembali."
        ];
        header("Location: dashboard.php");
        exit;
    }
}

function inputTeks($namaKolom) {
    $nilai = $_POST[$namaKolom] ?? "";
    return trim((string) $nilai);
}

function validasiMobil($nomor, $jenis, $pemilik, $tahun) {
    if ($nomor === "" || strlen($nomor) > 12) {
        return "Nomor kendaraan wajib diisi dan maksimal 12 karakter.";
    }

    if (!in_array($jenis, ["Sedan", "Pickup", "Truk", "Bemo"], true)) {
        return "Jenis kendaraan tidak valid.";
    }

    if ($pemilik === "" || mb_strlen($pemilik, "UTF-8") > 50) {
        return "Nama pemilik wajib diisi dan maksimal 50 karakter.";
    }

    if (!preg_match('/^[0-9]{4}$/', $tahun)) {
        return "Tahun pembuatan harus terdiri dari 4 angka.";
    }

    return "";
}
