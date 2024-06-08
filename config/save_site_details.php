<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
include('site.php');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $site_name = $_POST['site_name'];
    $site_intro = $_POST['site_intro'];
    $site_address = $_POST['site_address'];
    $site_area = $_POST['site_area'];
    $site_city = $_POST['site_city'];
    $site_state = $_POST['site_state'];
    $site_pin = $_POST['site_pin'];

    $sql = "UPDATE site_details SET 
            site_name = ?, 
            site_intro = ?, 
            site_address = ?, 
            site_area = ?, 
            site_city = ?, 
            site_state = ?, 
            site_pin = ?
            WHERE id = 1";  // Assuming there's a single record with id = 1

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sssssss", $site_name, $site_intro, $site_address, $site_area, $site_city, $site_state, $site_pin);

        if ($stmt->execute()) {
            header("Location: ../index.php");
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>
