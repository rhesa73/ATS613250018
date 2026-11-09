<?php
require "fungsi.php";
periksaLogin();
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    periksaToken();
    $id = $_POST["id"] ?? "";

    $stmt = $koneksi->prepare("DELETE FROM mobil018 WHERE no_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $_SESSION["pesan"] = ["tipe" => "success", "teks" => "Data kendaraan berhasil dihapus."];
}

header("Location: dashboard.php");
exit;
