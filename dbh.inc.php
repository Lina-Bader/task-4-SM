<?php
$dsn = "mysql:host=localhost;dbname=robot";
$dbusername = "root";
$dbpassword = "";

try {
    $dbh = new PDO($dsn, $dbusername, $dbpassword);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>
