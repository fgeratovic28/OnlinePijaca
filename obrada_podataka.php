<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pijaca";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Neuspješna konekcija: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $korisnicko_ime = $_POST['korisnicko_ime'];
    $email = $_POST['email'];
    $broj_telefona = $_POST['broj_telefona'];
    $lozinka = $_POST['lozinka'];

    $sql = "INSERT INTO korisnici (korisnicko_ime, email, broj_telefona, lozinka) VALUES ('$korisnicko_ime', '$email', '$broj_telefona', '$lozinka')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();

    } else {
        echo "Greška prilikom registracije: " . $conn->error;
    }
}

$conn->close();
?>
