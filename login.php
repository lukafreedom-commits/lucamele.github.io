<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connessione DB
$conn = new mysqli("localhost", "login_user", "PasswordSicura123", "login_test");
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Se è stato inviato il form
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Controllo username + password OLD_PASSWORD()
    $sql = "SELECT id FROM users WHERE username = ? AND password = OLD_PASSWORD(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        echo "<h1>LOGIN OK</h1>";
    } else {
        echo "<h1>LOGIN FALLITO</h1>";
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Accedi</button>
    </form>
</body>
</html>

