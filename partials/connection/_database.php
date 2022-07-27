<?php
define("HOST", "localhost");
define("DB_NAME", "library");
define("DB_USER", "root");
define("PASSWORD", "");

try {
    $conn = new PDO('mysql:host=' . HOST . ";dbname=" . DB_NAME, DB_USER, PASSWORD);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>