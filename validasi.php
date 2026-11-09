<?php
require "fungsi.php";
require "koneksi.php";

$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";

// Mencocokkan email dan password dari formulir dengan tabel member_018.
$stmt = $koneksi->prepare(
    "SELECT id, email, password, nama FROM member_018
     WHERE email = ? AND password = ? AND aktive = '1'"
);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();

if ($user) {
    session_regenerate_id(true);
    $_SESSION["id"] = $user["id"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["nama"] = $user["nama"];

    header("Location: dashboard.php");
    exit;
} else {
    $_SESSION["login_error"] = "Email atau password salah.";
    $_SESSION["login_email"] = $email;
    header("Location: index.php");
    exit;
}
