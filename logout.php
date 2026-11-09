<?php
require "fungsi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    periksaToken();
    $_SESSION = [];
    session_destroy();
}

header("Location: index.php");
exit;
