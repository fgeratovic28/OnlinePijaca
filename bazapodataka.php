<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pijaca";

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Neuspešna konekcija: " . $conn->connect_error);
}

?>
