<?php
$host = "localhost";
$user = "uppbmi0whibtc";
$pass = "bjgew6ykgu1v";
$dbname = "db4oa3blzv8gnc";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
