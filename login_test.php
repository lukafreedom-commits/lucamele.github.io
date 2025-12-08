<?php
// ENDPOINT DI TEST SICURO PER SIMULARE TENTATIVI DI LOGIN

header("Content-Type: text/plain");

// Username e password fittizi SOLO per test
$correct_user = "testuser";
$correct_pass = "password123";

// Leggo i parametri POST
$user = $_POST["username"] ?? "";
$pass = $_POST["password"] ?? "";

// Logica finta:
// - se la password è corretta → login ok (codice 200, dimensione risposta 46)
// - se la password è sbagliata → login fallito (codice 200, dimensione risposta 52)

if ($user === $correct_user && $pass === $correct_pass) {
    echo "LOGIN OK";   // dimensione corta → simuliamo 46 byte
} else {
    echo "LOGIN FAIL"; // dimensione lunga → simuliamo 52 byte
}
?>
