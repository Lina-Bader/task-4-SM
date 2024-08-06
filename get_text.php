<?php
require_once "dbh.inc.php";

try {
    $query = "SELECT text FROM talktotext ORDER BY id DESC";
    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $texts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($texts as $text) {
        echo htmlspecialchars($text['text']) . "<br>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
