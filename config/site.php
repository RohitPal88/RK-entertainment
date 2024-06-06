<?php
// DataBase Details 
if($_SERVER['HTTP_HOST'] == 'localhost'){
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'rkentertainment'); 
}else{
    define('DB_HOST', 'localhost');
    define('DB_USER', 'id22257885_rohit_pal');
    define('DB_PASS', 'Rohit@8866');
    define('DB_NAME', 'id22257885_rkentertainment'); 
}



// Function to get the base URL
function getBaseUrl() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    $script = $_SERVER['SCRIPT_NAME'];
    $path = str_replace(basename($script), '', $script);
    return $protocol . $host . $path;
}

// Define BASEURL
define('BASEURL', getBaseUrl());
// Site // Connect to the database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch site details from the database
$sql = "SELECT * FROM site_details LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the fetched row
    $row = $result->fetch_assoc();
    
    define('SITE_NAME', $row['site_name']);
    define('SITE_ADDRESS', $row['site_address']);
    define('SITE_AREA', $row['site_area']);
    define('SITE_CITY', $row['site_city']);
    define('SITE_STATE', $row['site_state']);
    define('SITE_PIN', $row['site_pin']);
    define('SITE_INTRO', $row['site_intro']);
    define('ASSET', BASEURL . 'public/');
} else {
    die("No site details found in the database.");
}

// Close the database connection
$conn->close();