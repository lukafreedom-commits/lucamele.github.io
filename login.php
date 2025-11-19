<?php
$conn = new mysqli("localhost", "root", "", "login_test");

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username='$username' AND password=PASSWORD('$password')";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "LOGIN OK";
} else {
    echo "LOGIN FALLITO";
}
?>
