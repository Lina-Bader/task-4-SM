<?php
require_once "dbh.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST['text'];

    // Debugging message to check received text
    echo "Received text: " . htmlspecialchars($text) . "<br>";

    try {
        $query = "INSERT INTO talktotext (text) VALUES (:text)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':text', $text, PDO::PARAM_STR);
        if ($stmt->execute()) {
            echo "Text successfully saved to the database.";
        } else {
            echo "Failed to save text to the database.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No POST request received.";
}
?>
