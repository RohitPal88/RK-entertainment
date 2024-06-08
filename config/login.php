<?php
session_start();
include('site.php');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Auth check
if (isset($_POST['email']) && isset($_POST['pswd'])) {
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];

    // Prepare the SQL statement to fetch the user by email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($pswd, $row['password'])) {
            // Set session variables
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            header("Location: ../admin.php");
            exit();
        } else {
            // Redirect to login if password does not match
            header("Location: login.php?error=invalidpassword");
            exit();
        }
    } else {
        // Redirect to login if email is not found
        header("Location: login.php?error=emailnotfound");
        exit();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to login if email or password is not set
    header("Location: login.php?error=missingdata");
    exit();
}
