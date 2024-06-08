<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}
include ('config/site.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="title" content="Event planner and Balloon decoration">
    <meta name="description" content="Balloon decoration, Event planner, Birthday Organizer">
    <meta name="keywords"
        content="Balloon decoration, Event planner, Birthday Organizer, DJ, Party plot, Baby shower decoration, Room Decoration, Kanku pagla, Fog Matka, Fire Entry, Entry">

    <title>Admin Panel</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap');

    body {
        background: #ecf0f4;
        width: 100%;
        height: 100%;
        font-size: 18px;
        line-height: 1.5;
        font-family: 'Roboto', sans-serif;
        color: #222;
    }

    .container {
        max-width: 1230px;
        width: 100%;
    }

    h1 {
        font-weight: 700;
        font-size: 45px;
        font-family: 'Roboto', sans-serif;
    }

    .header {
        margin-bottom: 80px;
    }

    #description {
        font-size: 24px;
    }

    .form-wrap {
        background: rgba(255, 255, 255, 1);
        width: 100%;
        max-width: 850px;
        padding: 50px;
        margin: 0 auto;
        position: relative;
        border-radius: 10px;
        box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
    }

    .form-wrap:before {
        content: "";
        width: 90%;
        height: calc(100% + 60px);
        left: 0;
        right: 0;
        margin: 0 auto;
        position: absolute;
        top: -30px;
        background: #f82249;
        z-index: -1;
        opacity: 0.8;
        border-radius: 10px;
        box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.15);
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group>label {
        display: block;
        font-size: 18px;
        color: #000;
    }

    .custom-control-label {
        color: #000;
        font-size: 16px;
    }

    .form-control {
        height: 50px;
        background: #ecf0f4;
        border-color: transparent;
        padding: 0 15px;
        font-size: 16px;
        transition: all 0.3s ease-in-out;
    }

    .form-control:focus {
        border-color: #f82249;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
    }

    textarea.form-control {
        height: 160px;
        padding-top: 15px;
        resize: none;
    }

    .btn {
        padding: .657rem .75rem;
        font-size: 18px;
        letter-spacing: 0.050em;
        transition: all 0.3s ease-in-out;
    }

    .btn-primary {
        color: #fff;
        background-color: #f82249;
        border-color: #f82249;
    }

    .btn-primary:hover {
        color: #f82249;
        background-color: #ffffff;
        border-color: #f82249;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
    }

    .btn-primary:focus,
    .btn-primary.focus {
        color: #f82249;
        background-color: #ffffff;
        border-color: #f82249;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
    }

    .btn-primary:not(:disabled):not(.disabled):active,
    .btn-primary:not(:disabled):not(.disabled).active,
    .show>.btn-primary.dropdown-toggle {
        color: #f82249;
        background-color: #ffffff;
        border-color: #f82249;
    }

    .btn-primary:not(:disabled):not(.disabled):active:focus,
    .btn-primary:not(:disabled):not(.disabled).active:focus,
    .show>.btn-primary.dropdown-toggle:focus {
        box-shadow: 0px 0px 20px rgba(0, 0, 0, .1);
    }

    #submit{
        width: 100%;
    }
</style>

<body>
    <div class="container">
        <header class="header">
            <h1 id="title" class="text-center"><?= $_SESSION['name'] ?></h1>
            <p id="description" class="text-center">Edit WebSite Details</p>
        </header>
        <div class="form-wrap">
            <form method="POST" action="config/save_site_details.php">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label id="name-label" for="site_name">Website Name</label>
                            <input type="text" name="site_name" id="site_name" placeholder="Enter your Site name"
                                value="<?= SITE_NAME ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site_intro">Site Intro</label>
                            <input type="text" name="site_intro" id="site_intro" placeholder="Enter site intro link"
                                value="<?= SITE_INTRO ?>" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="site_address">Address</label>
                            <input type="text" name="site_address" id="site_address" placeholder="Enter address"
                                value="<?= SITE_ADDRESS ?>" class="form-control" required>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site_city">City</label>
                            <input type="text" name="site_city" id="site_city" placeholder="Enter city"
                                value="<?= SITE_CITY ?>" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site_area">Area</label>
                            <input type="text" name="site_area" id="site_area" placeholder="Enter area"
                                value="<?= SITE_AREA ?>" class="form-control" required>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site_state">State</label>
                            <input type="text" name="site_state" id="site_state" placeholder="Enter state"
                                value="<?= SITE_STATE ?>" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="site_pin">PIN</label>
                            <input type="text" name="site_pin" id="site_pin" placeholder="Enter PIN"
                                value="<?= SITE_PIN ?>" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="profile_image">Profile Image</label>
                            <input type="file" name="profile_image" id="profile_image" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" id="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>