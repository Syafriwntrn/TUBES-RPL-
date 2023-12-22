<?php
include('db_connection.php'); // Include the database connection script

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['nama']; // Adjust the field name to match your form
    $password = $_POST['pw'];   // Adjust the field name to match your form

    // Hash the password (use appropriate hashing algorithm, e.g., password_hash)
    $hashed_password = hash('sha256', $password);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$hashed_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo 'Login successful'; // You can redirect or set session variables here
    } else {
        echo 'Invalid username or password';
    }
}
?>
