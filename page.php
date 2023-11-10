<?php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $category = $_POST["category"];
    $services = $_POST["services"];
    $employee = $_POST["employee"];
    $date = $_POST["date"];
    $time = isset($_POST["time"]) ? $_POST["time"] : "";
    $formattedTime = $time . ":00";
    
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $note = $_POST["note"];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pfa";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into database
    $sql = "INSERT INTO appointments (category, services, employee, date, time, first_name, last_name, email, phone, note)
    VALUES ('$category', '$services', '$employee', '$date', '$formattedTime', '$first_name', '$last_name', '$email', '$phone', '$note')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to success.php
        $redirectURL = "success.php" . "?date=" . urlencode($_POST['date']) . "&time=" . urlencode($time) . "&services=" . urlencode($_POST['services']) . "&employee=" . urlencode($_POST['employee']);

        header("Location: $redirectURL");
        exit();
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

<!-- Votre formulaire HTML ici -->

<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from techpedia.co.uk/template/stylen/appointment-1.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Aug 2023 13:24:23 GMT -->
<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Stylen | Saloon & Spa HTML 5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/media/favicon.png">

    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/font-awesome.css">
    <link rel="stylesheet" href="assets/css/vendor/slick.css">
    <link rel="stylesheet" href="assets/css/vendor/slick-theme.css">
    <link rel="stylesheet" href="assets/css/vendor/sal.css">
    <link rel="stylesheet" href="assets/css/vendor/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/vendor/wizard/smart_wizard_all.min.css">

    <!-- color Stylesheet -->
    <link rel="stylesheet" href="assets/css/colors/color-peach.css" class="color-css">

    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="assets/css/app.css">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <img src="assets/media/logo.png" alt="logo" class="mb-5"><br>
        <img src="assets/media/preloader.gif" alt="logo">
    </div>

    <!-- Back To Top Start -->
    <a href="#main-wrapper" id="backto-top" class="back-to-top">
        <i class="fas fa-angle-double-up"></i>
    </a>

    <!-- Settings -->
    <button class="settings">
        <i class="fas fa-cog fa-spin"></i>
    </button>
    <div class="setting-box">
        <div class="form-group">
            <label>Theme Color:</label>
            <ul>
                <li><a href="javascript:;" class="change-color peach" data-color="assets/css/colors/color-peach.css"></a></li>
                <li><a href="javascript:;" class="change-color purple" data-color="assets/css/colors/color-purple.css"></a></li>
                <li><a href="javascript:;" class="change-color pink" data-color="assets/css/colors/color-pink.css"></a></li>
                <li><a href="javascript:;" class="change-color green" data-color="assets/css/colors/color-green.css"></a></li>
                <li><a href="javascript:;" class="change-color biege" data-color="assets/css/colors/color-biege.css"></a></li>
            </ul>
        </div>
        <div class="form-group">
            <label>Header Style</label>
            <select class="form-control form-group header-change">
                <option value="1">Header Style 1</option>
                <option value="2" selected>Header Style 2</option>
                <option value="3">Header Style 3</option>
            </select>
        </div>
        <div class="form-group">
            <label>header Sticky</label>
            <select class="form-control form-group header-sticky">
                <option value="yes">Yes</option>
                <option value="no" selected>No</option>
            </select>
        </div>
        <div class="form-group">
            <label>Footer Style</label>
            <select class="form-control form-group footer-change">
                <option value="1" selected>Footer Style 1</option>
                <option value="2">Footer Style 2</option>
            </select>
        </div>
    </div>

    <!-- Main Wrapper Start -->
    <div id="main-wrapper" class="main-wrapper">

        <!--=====================================-->
        <!--=        Header Area Start       ,=-->
        <!--=====================================-->
        <header class="header style-1 d-none">
            <div class="container">
                <!--=====================================-->
                <!--=        Top Bar Start       ,=-->
                <!--=====================================-->
                <div class="top-bar">
                    <div class="row">
                        <div class="col-lg-9 col-sm-9 col-12">
                            <ul>
                                <li><a href="mailto:yosserkhaldi2001@gmail.com"><i class="fal fa-envelope"></i> yosserkhaldi2001@gmail.com</a></li>
                                <li><a href="tel:55973443"><i class="fal fa-mobile"></i> +216 55973443</a></li>
                                <li><span><i class="fal fa-clock"></i> Everyday 7 AM to 8 PM Sunday Off</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-12">
                            <div class="right-content">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Main menu Nav -->
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="index-1.php">
                        <svg width="100%" viewBox="0 0 145 34" fill="none" xmlns="../../../www.w3.org/2000/svg.php">
                            <g clip-path="url(#clip0_350_910)">
                                <path
                                    d="M22.3083 24.6904C22.3083 29.379 17.705 33.4515 11.2483 33.4515C4.18139 33.4515 0.557518 29.1912 0 28.4022L1.50681 25.7573C2.66616 27.2574 4.16089 28.4665 5.87182 29.2884C7.58274 30.1103 9.46254 30.5221 11.3613 30.4911C15.7311 30.4911 19.3549 27.8462 19.3549 24.48C19.3549 21.6022 17.5468 19.5209 11.5045 18.4088C3.06635 16.9061 1.11504 14.0358 1.11504 9.85812C1.11504 5.27469 5.16081 1.59293 11.5271 1.59293C14.9895 1.54566 18.3306 2.8634 20.8241 5.25967L19.4303 7.80685C18.4012 6.74522 17.1651 5.9049 15.7982 5.33761C14.4312 4.77033 12.9623 4.4881 11.4819 4.50829C7.43609 4.50829 4.09098 6.34166 4.09098 9.67779C4.09098 13.0139 6.4642 14.404 11.8058 15.4709C19.4755 16.9962 22.3083 19.4533 22.3083 24.6904Z"
                                    fill="#1B1B1B" />
                                <path
                                    d="M44.6165 1.93105V4.93657H36.4345V33.0608H33.4209V4.899H25.2842V1.93105H44.6165Z"
                                    fill="#1B1B1B" />
                                <path d="M92.2016 30.1154V33.1209H75.8452V1.93105H78.8588V30.1154H92.2016Z"
                                    fill="#1B1B1B" />
                                <path
                                    d="M123.43 9.01657V33.0608H120.462V1.19469L142.024 26.0354V1.93105H145.038V33.8122L123.43 9.01657Z"
                                    fill="#1B1B1B" />
                                <path
                                    d="M59.456 14.1684C59.456 14.1684 56.7593 10.4691 56.3793 9.44489C56.1633 8.77861 56.1761 8.05951 56.4158 7.40133C56.6266 6.93355 56.732 6.42536 56.7246 5.91256C56.7172 5.39977 56.5972 4.89482 56.373 4.43327C55.6082 2.79004 53.8639 1.96759 52.479 2.6155L52.4271 2.62463C52.1579 2.14102 51.7527 1.74657 51.2614 1.48994C50.7702 1.23331 50.2143 1.12573 49.6624 1.18048C49.2098 1.26007 49.3302 1.94084 49.7933 1.92045C50.2131 1.89031 50.6325 1.98478 50.9986 2.19195C51.3647 2.39912 51.6611 2.70973 51.8505 3.08463C51.3944 3.57538 51.1016 4.19471 51.012 4.85784C50.9225 5.52096 51.0406 6.19549 51.3502 6.78908C51.5851 7.33109 51.9584 7.80215 52.433 8.15517C52.9075 8.50819 53.4667 8.73082 54.0545 8.80081V8.80081C55.5357 9.30331 58.8279 14.6832 58.8279 14.6832L59.456 14.1684ZM51.8814 6.50493C51.5722 5.95307 51.4934 5.30197 51.662 4.69257C51.8306 4.08317 52.233 3.5645 52.7822 3.24885C53.3767 3.04378 54.028 3.0778 54.5977 3.34369C55.1675 3.60958 55.611 4.08642 55.834 4.67302C56.143 5.2229 56.2223 5.87202 56.0549 6.47982C55.8874 7.08762 55.4866 7.60517 54.9393 7.9204C54.3453 8.13178 53.6918 8.10185 53.1198 7.83705C52.5477 7.57226 52.103 7.09382 51.8814 6.50493V6.50493Z"
                                    fill="#1B1B1B" />
                                <path
                                    d="M65.7413 8.72931C66.334 8.66276 66.8985 8.44111 67.3776 8.08684C67.8567 7.73257 68.2333 7.25827 68.4694 6.71202C69.2541 5.07814 68.7701 3.22063 67.3843 2.56205C65.9986 1.90348 64.2832 2.74274 63.4685 4.33273C63.2387 4.79154 63.1126 5.29501 63.099 5.80768C63.0854 6.32036 63.1846 6.82977 63.3897 7.30007V7.30007C63.6215 7.96109 63.6256 8.68029 63.4015 9.34391C63.0091 10.3635 60.2678 14.0299 60.2678 14.0299L60.9368 14.5459C60.9368 14.5459 64.2541 9.21391 65.7413 8.72931ZM64.012 4.58036C64.238 3.9904 64.6876 3.51279 65.2637 3.25071C65.8398 2.98863 66.4962 2.96313 67.091 3.17972C67.6331 3.50437 68.0256 4.02842 68.1839 4.63894C68.3423 5.24946 68.2538 5.89757 67.9375 6.44364C67.7117 7.03317 67.2619 7.51011 66.6857 7.77095C66.1096 8.03179 65.4535 8.05549 64.8599 7.8369C64.3165 7.51527 63.9226 6.99261 63.7638 6.38269C63.605 5.77278 63.6942 5.12499 64.012 4.58036V4.58036Z"
                                    fill="#1B1B1B" />
                                <path
                                    d="M59.7976 33.4515C61.3873 33.4515 61.0181 14.5843 61.0181 14.5843L60.4606 13.6451H59.2702L58.5771 14.5843C58.5771 14.5843 58.2155 33.4515 59.7976 33.4515Z"
                                    fill="#1B1B1B" />
                                <path
                                    d="M59.2552 15.8166C59.2537 15.6985 59.2875 15.5828 59.3523 15.484C59.4172 15.3852 59.51 15.308 59.6191 15.2621C59.7282 15.2163 59.8484 15.2039 59.9646 15.2266C60.0807 15.2492 60.1875 15.3059 60.2712 15.3894C60.3549 15.4728 60.4117 15.5793 60.4344 15.6951C60.4572 15.811 60.4447 15.9309 60.3988 16.0397C60.3528 16.1485 60.2753 16.2411 60.1763 16.3057C60.0773 16.3704 59.9612 16.4041 59.8428 16.4027C59.687 16.4027 59.5375 16.3409 59.4273 16.231C59.3171 16.1211 59.2552 15.972 59.2552 15.8166Z"
                                    fill="white" />
                                <path
                                    d="M100.836 1.01436H111.097V3.43381L103.819 3.56154V5.12442H111.097V6.76243L103.819 7.08552V9.01657H111.097V10.7523L103.819 10.9777V12.9313H111.097V14.5768L103.819 14.8849V16.846H111.097V18.6643L103.819 18.7845V20.7381H111.097V22.5414L103.819 22.7518V24.3222L111.097 24.3973V25.9677L103.819 25.8851V27.8011L111.097 27.8612V29.4992L103.819 29.7547V31.3326H111.097V34H100.836C99.7582 34 98.8767 33.3839 98.8767 32.6325V2.38188C98.8767 1.63049 99.7582 1.01436 100.836 1.01436Z"
                                    class="logo-fill" />
                                <path opacity="0.1"
                                    d="M100.836 1.01436H101.099V34H100.836C99.7582 34 98.8767 33.3839 98.8767 32.6325V2.38188C98.8767 1.63049 99.7582 1.01436 100.836 1.01436Z"
                                    fill="#070707" />
                            </g>
                            <defs>
                                 <clipPath>
                                    <rect width="145" height="34" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar-1">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="mynavbar-1">
                        <ul class="navbar-nav ms-auto me-auto mainmenu">
                            <li class="menu-item-has-children">
                                <a href="javascript:void(0);">Home</a>
                                <ul class="stylen-submenu">
                                    <li><a href="index-1.php">Home 1</a></li>
                                    <li><a href="index-2.php">Home 2</a></li>
                                    <li><a href="index-3.php">Home 3</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="javascript:void(0);">Services</a>
                                <ul class="stylen-submenu">
                                    <li><a href="services-1.php">Services 1</a></li>
                                    <li><a href="services-2.php">Services 2</a></li>
                                    <li><a href="service-detail.php">Service Detail</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="javascript:void(0);">Shop</a>
                                <ul class="stylen-submenu">
                                    <li><a href="shop.php">Product Listing</a></li>
                                    <li><a href="product-detail.php">Product Detail</a></li>
                                    <li><a href="cart.php">Cart</a></li>
                                    <li><a href="checkout.php">Checkout</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="javascript:void(0);">Blogs</a>
                                <ul class="stylen-submenu">
                                    <li><a href="blogs-1.php">Blogs 1</a></li>
                                    <li><a href="blogs-2.php">Blogs 2</a></li>
                                    <li><a href="blog-detail.php">Blog Detail</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="javascript:void(0);"  class="active">Pages</a>
                                <ul class="stylen-submenu multiline">
                                    <li><a href="appointment-1.php"  class="active">Appointment 1</a></li>
                                    <li><a href="appointment-2.php">Appointment 2</a></li>
                                    <li><a href="gallery.php">Gallery</a></li>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="team.php">Team</a></li>
                                    <li><a href="team-detail.php">Team Detail</a></li>
                                    <li><a href="join-team.php">Join Team</a></li>
                                    <li><a href="404.php">404</a></li>
                                    <li><a href="coming-soon.php">Coming Soon</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="d-flex right-nav">
                            <a href="appointment-1.php" class="stylen-btn btn-primary right-arrow">BOOK APPOINTMENT</a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <!--=====================================-->
        <!--=        Header 2 Area Start       ,=-->
        <!--=====================================-->
        <header class="header style-2">
            <!--=====================================-->
            <!--=        Top Bar Start       ,=-->
            <!--=====================================-->
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-sm-8 col-12">
                            <ul>
                                <li><a href="mailto:yosserkhaldi2001@gmail.com"><i class="fal fa-envelope"></i> yosserkhaldi2001@gmail.com</a></li>
                                <li><span><i class="fal fa-clock"></i> Everyday 7 AM to 8 PM Sunday Off</span></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-sm-4 col-12">
                            <div class="right-content">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Main menu Nav -->
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="index-1.php">
                        <svg width="100%" viewBox="0 0 145 34" fill="none" xmlns="../../../www.w3.org/2000/svg.php">
                            <g clip-path="url(#clip0_350_910)">
                                <path
                                    d="M22.3083 24.6904C22.3083 29.379 17.705 33.4515 11.2483 33.4515C4.18139 33.4515 0.557518 29.1912 0 28.4022L1.50681 25.7573C2.66616 27.2574 4.16089 28.4665 5.87182 29.2884C7.58274 30.1103 9.46254 30.5221 11.3613 30.4911C15.7311 30.4911 19.3549 27.8462 19.3549 24.48C19.3549 21.6022 17.5468 19.5209 11.5045 18.4088C3.06635 16.9061 1.11504 14.0358 1.11504 9.85812C1.11504 5.27469 5.16081 1.59293 11.5271 1.59293C14.9895 1.54566 18.3306 2.8634 20.8241 5.25967L19.4303 7.80685C18.4012 6.74522 17.1651 5.9049 15.7982 5.33761C14.4312 4.77033 12.9623 4.4881 11.4819 4.50829C7.43609 4.50829 4.09098 6.34166 4.09098 9.67779C4.09098 13.0139 6.4642 14.404 11.8058 15.4709C19.4755 16.9962 22.3083 19.4533 22.3083 24.6904Z"
                                    fill="#1B1B1B" />
                                <path
                                    d="M44.6165 1.93105V4.93657H36.4345V33.0608H33.4209V4.899H25.2842V1.93105H44.6165Z"
                                    fill="#1B1B1B" />
                                <path d="M92.2016 30.1154V33.1209H75.8452V1.93105H78.8588V30.1154H92.2016Z"
                                    fill="#1B1B1B" />
                                <path
                                    d="M123.43 9.01657V33.0608H120.462V1.19469L142.024 26.0354V1.93105H145.038V33.8122L123.43 9.01657Z"
                                    fill="#1B1B1B" />
                                <path
                                    d="M59.456 14.1684C59.456 14.1684 56.7593 10.4691 56.3793 9.44489C56.1633 8.77861 56.1761 8.05951 56.4158 7.40133C56.6266 6.93355 56.732 6.42536 56.7246 5.91256C56.7172 5.39977 56.5972 4.89482 56.373 4.43327C55.6082 2.79004 53.8639 1.96759 52.479 2.6155L52.4271 2.62463C52.1579 2.14102 51.7527 1.74657 51.2614 1.48994C50.7702 1.23331 50.2143 1.12573 49.6624 1.18048C49.2098 1.26007 49.3302 1.94084 49.7933 1.92045C50.2131 1.89031 50.6325 1.98478 50.9986 2.19195C51.3647 2.39912 51.6611 2.70973 51.8505 3.08463C51.3944 3.57538 51.1016 4.19471 51.012 4.85784C50.9225 5.52096 51.0406 6.19549 51.3502 6.78908C51.5851 7.33109 51.9584 7.80215 52.433 8.15517C52.9075 8.50819 53.4667 8.73082 54.0545 8.80081V8.80081C55.5357 9.30331 58.8279 14.6832 58.8279 14.6832L59.456 14.1684ZM51.8814 6.50493C51.5722 5.95307 51.4934 5.30197 51.662 4.69257C51.8306 4.08317 52.233 3.5645 52.7822 3.24885C53.3767 3.04378 54.028 3.0778 54.5977 3.34369C55.1675 3.60958 55.611 4.08642 55.834 4.67302C56.143 5.2229 56.2223 5.87202 56.0549 6.47982C55.8874 7.08762 55.4866 7.60517 54.9393 7.9204C54.3453 8.13178 53.6918 8.10185 53.1198 7.83705C52.5477 7.57226 52.103 7.09382 51.8814 6.50493V6.50493Z"
                                    fill="#1B1B1B" />
                                <path
                                    d="M65.7413 8.72931C66.334 8.66276 66.8985 8.44111 67.3776 8.08684C67.8567 7.73257 68.2333 7.25827 68.4694 6.71202C69.2541 5.07814 68.7701 3.22063 67.3843 2.56205C65.9986 1.90348 64.2832 2.74274 63.4685 4.33273C63.2387 4.79154 63.1126 5.29501 63.099 5.80768C63.0854 6.32036 63.1846 6.82977 63.3897 7.30007V7.30007C63.6215 7.96109 63.6256 8.68029 63.4015 9.34391C63.0091 10.3635 60.2678 14.0299 60.2678 14.0299L60.9368 14.5459C60.9368 14.5459 64.2541 9.21391 65.7413 8.72931ZM64.012 4.58036C64.238 3.9904 64.6876 3.51279 65.2637 3.25071C65.8398 2.98863 66.4962 2.96313 67.091 3.17972C67.6331 3.50437 68.0256 4.02842 68.1839 4.63894C68.3423 5.24946 68.2538 5.89757 67.9375 6.44364C67.7117 7.03317 67.2619 7.51011 66.6857 7.77095C66.1096 8.03179 65.4535 8.05549 64.8599 7.8369C64.3165 7.51527 63.9226 6.99261 63.7638 6.38269C63.605 5.77278 63.6942 5.12499 64.012 4.58036V4.58036Z"
                                    fill="#1B1B1B" />
                                <path
                                    d="M59.7976 33.4515C61.3873 33.4515 61.0181 14.5843 61.0181 14.5843L60.4606 13.6451H59.2702L58.5771 14.5843C58.5771 14.5843 58.2155 33.4515 59.7976 33.4515Z"
                                    fill="#1B1B1B" />
                                <path
                                    d="M59.2552 15.8166C59.2537 15.6985 59.2875 15.5828 59.3523 15.484C59.4172 15.3852 59.51 15.308 59.6191 15.2621C59.7282 15.2163 59.8484 15.2039 59.9646 15.2266C60.0807 15.2492 60.1875 15.3059 60.2712 15.3894C60.3549 15.4728 60.4117 15.5793 60.4344 15.6951C60.4572 15.811 60.4447 15.9309 60.3988 16.0397C60.3528 16.1485 60.2753 16.2411 60.1763 16.3057C60.0773 16.3704 59.9612 16.4041 59.8428 16.4027C59.687 16.4027 59.5375 16.3409 59.4273 16.231C59.3171 16.1211 59.2552 15.972 59.2552 15.8166Z"
                                    fill="white" />
                                <path
                                    d="M100.836 1.01436H111.097V3.43381L103.819 3.56154V5.12442H111.097V6.76243L103.819 7.08552V9.01657H111.097V10.7523L103.819 10.9777V12.9313H111.097V14.5768L103.819 14.8849V16.846H111.097V18.6643L103.819 18.7845V20.7381H111.097V22.5414L103.819 22.7518V24.3222L111.097 24.3973V25.9677L103.819 25.8851V27.8011L111.097 27.8612V29.4992L103.819 29.7547V31.3326H111.097V34H100.836C99.7582 34 98.8767 33.3839 98.8767 32.6325V2.38188C98.8767 1.63049 99.7582 1.01436 100.836 1.01436Z"
                                    class="logo-fill" />
                                <path opacity="0.1"
                                    d="M100.836 1.01436H101.099V34H100.836C99.7582 34 98.8767 33.3839 98.8767 32.6325V2.38188C98.8767 1.63049 99.7582 1.01436 100.836 1.01436Z"
                                    fill="#070707" />
                            </g>
                            <defs>
                                 <clipPath>
                                    <rect width="145" height="34" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar-2">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="mynavbar-2">
                        <ul class="navbar-nav me-auto mainmenu">
                            <li class="menu-item-has-children">
                                
                                
                                <li class="stylen-submenu"><a href="index-1.php" class="active">Home</a></li>
                            
                        </li>
                        <li class="menu-item-has-children">
                               
                                
                            <li class="stylen-submenu"><a href="services-1.php">Services </a></li>
                            
                            
                       
                    </li>
                    <li class="menu-item-has-children">
                        <a href="javascript:void(0);">Shop</a>
                        <ul class="stylen-submenu">
                            <li><a href="product-detail.php">Product Detail</a></li>
                            <li><a href="cart.php">Cart</a></li>
                            <li><a href="checkout.php">Checkout</a></li>
                        </ul>
                    </li>
                           
                    <li class="menu-item-has-children">
                               
                               
                        <li  class="stylen-submenu multiline"><a href="contact.php">Contact</a></li>
                      
            
                </li>
                        </ul>
                        <div class="d-flex right-nav">
                            <a href="tel:55973443" class="phone-link"><i class="fal fa-phone"></i> +216 55973443</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <!--=====================================-->
        <!--=        Header 3 Area Start       ,=-->
        <!--=====================================-->
        <header class="header style-3 d-none">
            <!-- Start Main menu Nav -->
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a href="tel:55973443" class="phone-link show-on-dekstop"><i class="fal fa-phone"></i> +216
                        55973443</a>
                    <a class="navbar-brand show-on-mobile" href="index-1.php">
                        <svg width="100%" viewBox="0 0 145 34" fill="none" xmlns="../../../www.w3.org/2000/svg.php">
                            <g clip-path="url(#clip0_350_910)">
                                <path
                                    d="M22.3083 24.6904C22.3083 29.379 17.705 33.4515 11.2483 33.4515C4.18139 33.4515 0.557518 29.1912 0 28.4022L1.50681 25.7573C2.66616 27.2574 4.16089 28.4665 5.87182 29.2884C7.58274 30.1103 9.46254 30.5221 11.3613 30.4911C15.7311 30.4911 19.3549 27.8462 19.3549 24.48C19.3549 21.6022 17.5468 19.5209 11.5045 18.4088C3.06635 16.9061 1.11504 14.0358 1.11504 9.85812C1.11504 5.27469 5.16081 1.59293 11.5271 1.59293C14.9895 1.54566 18.3306 2.8634 20.8241 5.25967L19.4303 7.80685C18.4012 6.74522 17.1651 5.9049 15.7982 5.33761C14.4312 4.77033 12.9623 4.4881 11.4819 4.50829C7.43609 4.50829 4.09098 6.34166 4.09098 9.67779C4.09098 13.0139 6.4642 14.404 11.8058 15.4709C19.4755 16.9962 22.3083 19.4533 22.3083 24.6904Z"
                                    fill="#1B1B1B" />
                                <path
                                    d="M44.6165 1.93105V4.93657H36.4345V33.0608H33.4209V4.899H25.2842V1.93105H44.6165Z"
                                    fill="#1B1B1B" />
                                <path d="M92.2016 30.1154V33.1209H75.8452V1.93105H78.8588V30.1154H92.2016Z"
                                    fill="#1B1B1B" />
                                <path
                                    d="M123.43 9.01657V33.0608H120.462V1.19469L142.024 26.0354V1.93105H145.038V33.8122L123.43 9.01657Z"
                                    fill="#1B1B1B" />
                                <path
                                    d="M59.456 14.1684C59.456 14.1684 56.7593 10.4691 56.3793 9.44489C56.1633 8.77861 56.1761 8.05951 56.4158 7.40133C56.6266 6.93355 56.732 6.42536 56.7246 5.91256C56.7172 5.39977 56.5972 4.89482 56.373 4.43327C55.6082 2.79004 53.8639 1.96759 52.479 2.6155L52.4271 2.62463C52.1579 2.14102 51.7527 1.74657 51.2614 1.48994C50.7702 1.23331 50.2143 1.12573 49.6624 1.18048C49.2098 1.26007 49.3302 1.94084 49.7933 1.92045C50.2131 1.89031 50.6325 1.98478 50.9986 2.19195C51.3647 2.39912 51.6611 2.70973 51.8505 3.08463C51.3944 3.57538 51.1016 4.19471 51.012 4.85784C50.9225 5.52096 51.0406 6.19549 51.3502 6.78908C51.5851 7.33109 51.9584 7.80215 52.433 8.15517C52.9075 8.50819 53.4667 8.73082 54.0545 8.80081V8.80081C55.5357 9.30331 58.8279 14.6832 58.8279 14.6832L59.456 14.1684ZM51.8814 6.50493C51.5722 5.95307 51.4934 5.30197 51.662 4.69257C51.8306 4.08317 52.233 3.5645 52.7822 3.24885C53.3767 3.04378 54.028 3.0778 54.5977 3.34369C55.1675 3.60958 55.611 4.08642 55.834 4.67302C56.143 5.2229 56.2223 5.87202 56.0549 6.47982C55.8874 7.08762 55.4866 7.60517 54.9393 7.9204C54.3453 8.13178 53.6918 8.10185 53.1198 7.83705C52.5477 7.57226 52.103 7.09382 51.8814 6.50493V6.50493Z"
                                    fill="#1B1B1B" />
                                <path
                                    d="M65.7413 8.72931C66.334 8.66276 66.8985 8.44111 67.3776 8.08684C67.8567 7.73257 68.2333 7.25827 68.4694 6.71202C69.2541 5.07814 68.7701 3.22063 67.3843 2.56205C65.9986 1.90348 64.2832 2.74274 63.4685 4.33273C63.2387 4.79154 63.1126 5.29501 63.099 5.80768C63.0854 6.32036 63.1846 6.82977 63.3897 7.30007V7.30007C63.6215 7.96109 63.6256 8.68029 63.4015 9.34391C63.0091 10.3635 60.2678 14.0299 60.2678 14.0299L60.9368 14.5459C60.9368 14.5459 64.2541 9.21391 65.7413 8.72931ZM64.012 4.58036C64.238 3.9904 64.6876 3.51279 65.2637 3.25071C65.8398 2.98863 66.4962 2.96313 67.091 3.17972C67.6331 3.50437 68.0256 4.02842 68.1839 4.63894C68.3423 5.24946 68.2538 5.89757 67.9375 6.44364C67.7117 7.03317 67.2619 7.51011 66.6857 7.77095C66.1096 8.03179 65.4535 8.05549 64.8599 7.8369C64.3165 7.51527 63.9226 6.99261 63.7638 6.38269C63.605 5.77278 63.6942 5.12499 64.012 4.58036V4.58036Z"
                                    fill="#1B1B1B" />
                                <path
                                    d="M59.7976 33.4515C61.3873 33.4515 61.0181 14.5843 61.0181 14.5843L60.4606 13.6451H59.2702L58.5771 14.5843C58.5771 14.5843 58.2155 33.4515 59.7976 33.4515Z"
                                    fill="#1B1B1B" />
                                <path
                                    d="M59.2552 15.8166C59.2537 15.6985 59.2875 15.5828 59.3523 15.484C59.4172 15.3852 59.51 15.308 59.6191 15.2621C59.7282 15.2163 59.8484 15.2039 59.9646 15.2266C60.0807 15.2492 60.1875 15.3059 60.2712 15.3894C60.3549 15.4728 60.4117 15.5793 60.4344 15.6951C60.4572 15.811 60.4447 15.9309 60.3988 16.0397C60.3528 16.1485 60.2753 16.2411 60.1763 16.3057C60.0773 16.3704 59.9612 16.4041 59.8428 16.4027C59.687 16.4027 59.5375 16.3409 59.4273 16.231C59.3171 16.1211 59.2552 15.972 59.2552 15.8166Z"
                                    fill="white" />
                                <path
                                    d="M100.836 1.01436H111.097V3.43381L103.819 3.56154V5.12442H111.097V6.76243L103.819 7.08552V9.01657H111.097V10.7523L103.819 10.9777V12.9313H111.097V14.5768L103.819 14.8849V16.846H111.097V18.6643L103.819 18.7845V20.7381H111.097V22.5414L103.819 22.7518V24.3222L111.097 24.3973V25.9677L103.819 25.8851V27.8011L111.097 27.8612V29.4992L103.819 29.7547V31.3326H111.097V34H100.836C99.7582 34 98.8767 33.3839 98.8767 32.6325V2.38188C98.8767 1.63049 99.7582 1.01436 100.836 1.01436Z"
                                    class="logo-fill" />
                                <path opacity="0.1"
                                    d="M100.836 1.01436H101.099V34H100.836C99.7582 34 98.8767 33.3839 98.8767 32.6325V2.38188C98.8767 1.63049 99.7582 1.01436 100.836 1.01436Z"
                                    fill="#070707" />
                            </g>
                            <defs>
                                 <clipPath>
                                    <rect width="145" height="34" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar-3">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="mynavbar-3">
                        <ul class="navbar-nav ms-auto me-auto mainmenu">
                            <li class="menu-item-has-children">
                                <a href="javascript:void(0);">Home</a>
                                <ul class="stylen-submenu">
                                    <li><a href="index-1.php">Home 1</a></li>
                                    <li><a href="index-2.php">Home 2</a></li>
                                    <li><a href="index-3.php">Home 3</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="javascript:void(0);">Services</a>
                                <ul class="stylen-submenu">
                                    <li><a href="services-1.php">Services 1</a></li>
                                    <li><a href="services-2.php">Services 2</a></li>
                                    <li><a href="service-detail.php">Service Detail</a></li>
                                </ul>
                            </li>

                            <li class="show-on-dekstop">
                                <a class="navbar-brand" href="index-1.php">
                                    <svg width="100%" viewBox="0 0 145 34" fill="none"
                                        xmlns="../../../www.w3.org/2000/svg.php">
                                        <g clip-path="url(#clip0_350_910)">
                                            <path
                                                d="M22.3083 24.6904C22.3083 29.379 17.705 33.4515 11.2483 33.4515C4.18139 33.4515 0.557518 29.1912 0 28.4022L1.50681 25.7573C2.66616 27.2574 4.16089 28.4665 5.87182 29.2884C7.58274 30.1103 9.46254 30.5221 11.3613 30.4911C15.7311 30.4911 19.3549 27.8462 19.3549 24.48C19.3549 21.6022 17.5468 19.5209 11.5045 18.4088C3.06635 16.9061 1.11504 14.0358 1.11504 9.85812C1.11504 5.27469 5.16081 1.59293 11.5271 1.59293C14.9895 1.54566 18.3306 2.8634 20.8241 5.25967L19.4303 7.80685C18.4012 6.74522 17.1651 5.9049 15.7982 5.33761C14.4312 4.77033 12.9623 4.4881 11.4819 4.50829C7.43609 4.50829 4.09098 6.34166 4.09098 9.67779C4.09098 13.0139 6.4642 14.404 11.8058 15.4709C19.4755 16.9962 22.3083 19.4533 22.3083 24.6904Z"
                                                fill="#1B1B1B" />
                                            <path
                                                d="M44.6165 1.93105V4.93657H36.4345V33.0608H33.4209V4.899H25.2842V1.93105H44.6165Z"
                                                fill="#1B1B1B" />
                                            <path d="M92.2016 30.1154V33.1209H75.8452V1.93105H78.8588V30.1154H92.2016Z"
                                                fill="#1B1B1B" />
                                            <path
                                                d="M123.43 9.01657V33.0608H120.462V1.19469L142.024 26.0354V1.93105H145.038V33.8122L123.43 9.01657Z"
                                                fill="#1B1B1B" />
                                            <path
                                                d="M59.456 14.1684C59.456 14.1684 56.7593 10.4691 56.3793 9.44489C56.1633 8.77861 56.1761 8.05951 56.4158 7.40133C56.6266 6.93355 56.732 6.42536 56.7246 5.91256C56.7172 5.39977 56.5972 4.89482 56.373 4.43327C55.6082 2.79004 53.8639 1.96759 52.479 2.6155L52.4271 2.62463C52.1579 2.14102 51.7527 1.74657 51.2614 1.48994C50.7702 1.23331 50.2143 1.12573 49.6624 1.18048C49.2098 1.26007 49.3302 1.94084 49.7933 1.92045C50.2131 1.89031 50.6325 1.98478 50.9986 2.19195C51.3647 2.39912 51.6611 2.70973 51.8505 3.08463C51.3944 3.57538 51.1016 4.19471 51.012 4.85784C50.9225 5.52096 51.0406 6.19549 51.3502 6.78908C51.5851 7.33109 51.9584 7.80215 52.433 8.15517C52.9075 8.50819 53.4667 8.73082 54.0545 8.80081V8.80081C55.5357 9.30331 58.8279 14.6832 58.8279 14.6832L59.456 14.1684ZM51.8814 6.50493C51.5722 5.95307 51.4934 5.30197 51.662 4.69257C51.8306 4.08317 52.233 3.5645 52.7822 3.24885C53.3767 3.04378 54.028 3.0778 54.5977 3.34369C55.1675 3.60958 55.611 4.08642 55.834 4.67302C56.143 5.2229 56.2223 5.87202 56.0549 6.47982C55.8874 7.08762 55.4866 7.60517 54.9393 7.9204C54.3453 8.13178 53.6918 8.10185 53.1198 7.83705C52.5477 7.57226 52.103 7.09382 51.8814 6.50493V6.50493Z"
                                                fill="#1B1B1B" />
                                            <path
                                                d="M65.7413 8.72931C66.334 8.66276 66.8985 8.44111 67.3776 8.08684C67.8567 7.73257 68.2333 7.25827 68.4694 6.71202C69.2541 5.07814 68.7701 3.22063 67.3843 2.56205C65.9986 1.90348 64.2832 2.74274 63.4685 4.33273C63.2387 4.79154 63.1126 5.29501 63.099 5.80768C63.0854 6.32036 63.1846 6.82977 63.3897 7.30007V7.30007C63.6215 7.96109 63.6256 8.68029 63.4015 9.34391C63.0091 10.3635 60.2678 14.0299 60.2678 14.0299L60.9368 14.5459C60.9368 14.5459 64.2541 9.21391 65.7413 8.72931ZM64.012 4.58036C64.238 3.9904 64.6876 3.51279 65.2637 3.25071C65.8398 2.98863 66.4962 2.96313 67.091 3.17972C67.6331 3.50437 68.0256 4.02842 68.1839 4.63894C68.3423 5.24946 68.2538 5.89757 67.9375 6.44364C67.7117 7.03317 67.2619 7.51011 66.6857 7.77095C66.1096 8.03179 65.4535 8.05549 64.8599 7.8369C64.3165 7.51527 63.9226 6.99261 63.7638 6.38269C63.605 5.77278 63.6942 5.12499 64.012 4.58036V4.58036Z"
                                                fill="#1B1B1B" />
                                            <path
                                                d="M59.7976 33.4515C61.3873 33.4515 61.0181 14.5843 61.0181 14.5843L60.4606 13.6451H59.2702L58.5771 14.5843C58.5771 14.5843 58.2155 33.4515 59.7976 33.4515Z"
                                                fill="#1B1B1B" />
                                            <path
                                                d="M59.2552 15.8166C59.2537 15.6985 59.2875 15.5828 59.3523 15.484C59.4172 15.3852 59.51 15.308 59.6191 15.2621C59.7282 15.2163 59.8484 15.2039 59.9646 15.2266C60.0807 15.2492 60.1875 15.3059 60.2712 15.3894C60.3549 15.4728 60.4117 15.5793 60.4344 15.6951C60.4572 15.811 60.4447 15.9309 60.3988 16.0397C60.3528 16.1485 60.2753 16.2411 60.1763 16.3057C60.0773 16.3704 59.9612 16.4041 59.8428 16.4027C59.687 16.4027 59.5375 16.3409 59.4273 16.231C59.3171 16.1211 59.2552 15.972 59.2552 15.8166Z"
                                                fill="white" />
                                            <path
                                                d="M100.836 1.01436H111.097V3.43381L103.819 3.56154V5.12442H111.097V6.76243L103.819 7.08552V9.01657H111.097V10.7523L103.819 10.9777V12.9313H111.097V14.5768L103.819 14.8849V16.846H111.097V18.6643L103.819 18.7845V20.7381H111.097V22.5414L103.819 22.7518V24.3222L111.097 24.3973V25.9677L103.819 25.8851V27.8011L111.097 27.8612V29.4992L103.819 29.7547V31.3326H111.097V34H100.836C99.7582 34 98.8767 33.3839 98.8767 32.6325V2.38188C98.8767 1.63049 99.7582 1.01436 100.836 1.01436Z"
                                                class="logo-fill" />
                                            <path opacity="0.1"
                                                d="M100.836 1.01436H101.099V34H100.836C99.7582 34 98.8767 33.3839 98.8767 32.6325V2.38188C98.8767 1.63049 99.7582 1.01436 100.836 1.01436Z"
                                                fill="#070707" />
                                        </g>
                                        <defs>
                                             <clipPath>
                                                <rect width="145" height="34" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="javascript:void(0);">Shop</a>
                                <ul class="stylen-submenu">
                                    <li><a href="shop.php">Product Listing</a></li>
                                    <li><a href="product-detail.php">Product Detail</a></li>
                                    <li><a href="cart.php">Cart</a></li>
                                    <li><a href="checkout.php">Checkout</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="javascript:void(0);"  class="active">Pages</a>
                                <ul class="stylen-submenu multiline">
                                    <li><a href="blogs-1.php">Blogs 1</a></li>
                                    <li><a href="blogs-2.php">Blogs 2</a></li>
                                    <li><a href="blog-detail.php">Blog Detail</a></li>
                                    <li><a href="appointment-1.php"  class="active">Appointment 1</a></li>
                                    <li><a href="appointment-2.php">Appointment 2</a></li>
                                    <li><a href="gallery.php">Gallery</a></li>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="team.php">Team</a></li>
                                    <li><a href="team-detail.php">Team Detail</a></li>
                                    <li><a href="join-team.php">Join Team</a></li>
                                    <li><a href="404.php">404</a></li>
                                    <li><a href="coming-soon.php">Coming Soon</a></li>
                                </ul>
                            </li>
                            <li class="show-on-mobile">
                                <a href="appointment-1.php">Book Appointment</a>
                            </li>
                        </ul>
                        <div class="d-flex right-nav show-on-dekstop">
                            <a href="appointment-1.php" class="stylen-btn btn-primary right-arrow">BOOK APPOINTMENT</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <!--=====================================-->
        <!--=      Page Start Banner Start      =-->
        <!--=====================================-->
        <section class="page-start-banner">
            <div class="container">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="index-1.php">Home</a></li>
                        <li><a href="appointment-1.php" class="active"> APPOINTMENT</a></li>
                    </ul>
                </div>
                <div class="heading">
                    <h2>APPOINTMENT</h2>
                </div>
            </div>
        </section>
        <!--=====================================-->
        <!--=      Appointment Area Start       =-->
        <!--=====================================-->
        <section class="appointment background-1 sec-pad-80">
            <div class="container">
            <form method="get" action="page.php" id="form-wizard" class="submit-form">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#step-1">
                                <div class="num">1</div>
                                <span class="nav-title">APPOINTMENT DETAIL</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#step-2">
                                <span class="num">2</span>
                                <span class="nav-title">DATE</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#step-3">
                                <span class="num">3</span>
                                <span class="nav-title">TIME</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#step-4">
                                <span class="num">4</span>
                                <span class="nav-title">PERSONAL DETAILS</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <select class="form-control form-group" name="category">
                                        <option value="">SELECT CATEGORY</option>
                                        <option value="body">BODY</option>
                                        <option value="make_up">MAKE UP</option>
                                        <option value="hair">HAIR</option>
                                        <option value="skin_care">SKIN CARE</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <select class="form-control form-group" name="services">
                                        <option value="">SELECT SERVICES</option>
                                        <option value="body">BODY</option>
                                        <option value="make_up">MAKE UP</option>
                                        <option value="hair">HAIR</option>
                                        <option value="skin_care">SKIN CARE</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <select class="form-control form-group" name="employee">
                                        <option value="">SELECT EMPLOYEE</option>
                                        <option value="1">EMPLOYEE 1</option>
                                        <option value="2">EMPLOYEE 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                            <div id="calendar" class="mb-5 mb-xl-0"></div>
                        </div>
                        <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                            <div class="book-time">
                                <div class="available-time" data-toggle="buttons">
                                    <label class="btn"> 10 : 00
                                        <input type="radio" value="10" name="time" class="time">
                                    </label>

                                    <label class="btn"> 11 : 00
                                        <input type="radio" value="11" name="time" class="time">
                                    </label>

                                    <label class="btn"> 12 : 00
                                        <input type="radio" value="12" name="time" class="time">
                                    </label>

                                    <label class="btn active"> 13 : 00
                                        <input type="radio" value="13" name="time" class="time">
                                    </label>

                                    <label class="btn"> 14 : 00
                                        <input type="radio" value="14" name="time" class="time">
                                    </label>

                                    <label class="btn"> 15 : 00
                                        <input type="radio" value="15" name="time" class="time">
                                    </label>

                                    <label class="btn"> 16 : 00
                                        <input type="radio" value="16" name="time" class="time">
                                    </label>

                                    <label class="btn"> 17 : 00
                                        <input type="radio" value="17" name="time" class="time">
                                    </label>

                                    <label class="btn"> 18 : 00
                                        <input type="radio" value="18" name="time" class="time">
                                    </label>

                                    <label class="btn"> 19 : 00
                                        <input type="radio" value="19" name="time" class="time">
                                    </label>

                                    <label class="btn"> 20 : 00
                                        <input type="radio" value="20" name="time" class="time">
                                    </label>
                                </div>
                                <div class="error-time text-center" style="text-align: center;"></div>
                            </div>
                        </div>
                        <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-group" name="first_name"
                                            placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-group" name="last_name"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-group" name="email"
                                            placeholder="info@example.com">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-group" name="phone" placeholder="Phone Number">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <textarea name="note" class="form-control form-group" id="note" rows="4"
                                    placeholder="ADD A DESCRIPTION"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="stylen-btn btn-primary paper-plane">BOOK APPOINTMENT</button>
                            </div>
                        </div>

                    </div>

                    <!-- Include optional progressbar HTML -->
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </form>
            </div>
            <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <i class="fal fa-check-circle"></i>
                                <h3>Appointment Booked Successfully!</h3>
                            </div>

                            <table class="table table-striped">
                                <tr>
                                    <th>Date:</th>
                                    <td>22 March 2023</td>
                                </tr>
                                <tr>
                                    <th>Time:</th>
                                    <td>8:00 PM</td>
                                </tr>
                                <tr>
                                    <th>Service</th>
                                    <td>Full Body Message</td>
                                </tr>
                                <tr>
                                    <th>Masseuse</th>
                                    <td>Jqluine Sabrina</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================-->
        <!--=      Footer Style 1 Area Start    =-->
        <!--=====================================-->
        <footer class="footer style-1">
            <div class="container">
                <div class="contact-box">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="content text-center">
                                <h1>CONTACT US</h1>
                                <div class="row">
                                    <div class="col-xl-4  col-lg-6 col-md-6 col-12">
                                        <div class="content-box">
                                            <h6>FOLLOW</h6>
                                            <ul class="list-unstyled social-icon">
                                                <li><a href="#"><i class="fab fa-snapchat-ghost"></i></a></li>
                                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-4  col-lg-6 col-md-6 col-12">
                                        <div class="content-box">
                                            <h6>PHONE</h6>
                                            <a class="phone" href="tel:55973443"><i class="fas fa-phone-alt"></i>+216
                                                55973443</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-4  col-lg-6 col-md-6 col-12 offset-xl-0 offset-lg-3 offset-md-3">
                                        <div class="content-box">
                                            <h6>EMAIL</h6>
                                            <a class="email" href="mailto:yosserkhaldi2001@gmail.com"><i
                                                    class="fas fa-envelope"></i>yosserkhaldi2001@gmail.com</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-main  background-2">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-4 col-lg-6 col-sm-12 col-12">
                            <div class="footer-widget">
                                <div class="footer-logo">
                                    <a href="index-1.php">
                                        <svg width="80%" viewBox="0 0 145 34" fill="none"
                                            xmlns="../../../www.w3.org/2000/svg.php">
                                            <g clip-path="url(#clip0_350_910)">
                                                <path
                                                    d="M22.3083 24.6904C22.3083 29.379 17.705 33.4515 11.2483 33.4515C4.18139 33.4515 0.557518 29.1912 0 28.4022L1.50681 25.7573C2.66616 27.2574 4.16089 28.4665 5.87182 29.2884C7.58274 30.1103 9.46254 30.5221 11.3613 30.4911C15.7311 30.4911 19.3549 27.8462 19.3549 24.48C19.3549 21.6022 17.5468 19.5209 11.5045 18.4088C3.06635 16.9061 1.11504 14.0358 1.11504 9.85812C1.11504 5.27469 5.16081 1.59293 11.5271 1.59293C14.9895 1.54566 18.3306 2.8634 20.8241 5.25967L19.4303 7.80685C18.4012 6.74522 17.1651 5.9049 15.7982 5.33761C14.4312 4.77033 12.9623 4.4881 11.4819 4.50829C7.43609 4.50829 4.09098 6.34166 4.09098 9.67779C4.09098 13.0139 6.4642 14.404 11.8058 15.4709C19.4755 16.9962 22.3083 19.4533 22.3083 24.6904Z"
                                                    fill="#1B1B1B" />
                                                <path
                                                    d="M44.6165 1.93105V4.93657H36.4345V33.0608H33.4209V4.899H25.2842V1.93105H44.6165Z"
                                                    fill="#1B1B1B" />
                                                <path
                                                    d="M92.2016 30.1154V33.1209H75.8452V1.93105H78.8588V30.1154H92.2016Z"
                                                    fill="#1B1B1B" />
                                                <path
                                                    d="M123.43 9.01657V33.0608H120.462V1.19469L142.024 26.0354V1.93105H145.038V33.8122L123.43 9.01657Z"
                                                    fill="#1B1B1B" />
                                                <path
                                                    d="M59.456 14.1684C59.456 14.1684 56.7593 10.4691 56.3793 9.44489C56.1633 8.77861 56.1761 8.05951 56.4158 7.40133C56.6266 6.93355 56.732 6.42536 56.7246 5.91256C56.7172 5.39977 56.5972 4.89482 56.373 4.43327C55.6082 2.79004 53.8639 1.96759 52.479 2.6155L52.4271 2.62463C52.1579 2.14102 51.7527 1.74657 51.2614 1.48994C50.7702 1.23331 50.2143 1.12573 49.6624 1.18048C49.2098 1.26007 49.3302 1.94084 49.7933 1.92045C50.2131 1.89031 50.6325 1.98478 50.9986 2.19195C51.3647 2.39912 51.6611 2.70973 51.8505 3.08463C51.3944 3.57538 51.1016 4.19471 51.012 4.85784C50.9225 5.52096 51.0406 6.19549 51.3502 6.78908C51.5851 7.33109 51.9584 7.80215 52.433 8.15517C52.9075 8.50819 53.4667 8.73082 54.0545 8.80081V8.80081C55.5357 9.30331 58.8279 14.6832 58.8279 14.6832L59.456 14.1684ZM51.8814 6.50493C51.5722 5.95307 51.4934 5.30197 51.662 4.69257C51.8306 4.08317 52.233 3.5645 52.7822 3.24885C53.3767 3.04378 54.028 3.0778 54.5977 3.34369C55.1675 3.60958 55.611 4.08642 55.834 4.67302C56.143 5.2229 56.2223 5.87202 56.0549 6.47982C55.8874 7.08762 55.4866 7.60517 54.9393 7.9204C54.3453 8.13178 53.6918 8.10185 53.1198 7.83705C52.5477 7.57226 52.103 7.09382 51.8814 6.50493V6.50493Z"
                                                    fill="#1B1B1B" />
                                                <path
                                                    d="M65.7413 8.72931C66.334 8.66276 66.8985 8.44111 67.3776 8.08684C67.8567 7.73257 68.2333 7.25827 68.4694 6.71202C69.2541 5.07814 68.7701 3.22063 67.3843 2.56205C65.9986 1.90348 64.2832 2.74274 63.4685 4.33273C63.2387 4.79154 63.1126 5.29501 63.099 5.80768C63.0854 6.32036 63.1846 6.82977 63.3897 7.30007V7.30007C63.6215 7.96109 63.6256 8.68029 63.4015 9.34391C63.0091 10.3635 60.2678 14.0299 60.2678 14.0299L60.9368 14.5459C60.9368 14.5459 64.2541 9.21391 65.7413 8.72931ZM64.012 4.58036C64.238 3.9904 64.6876 3.51279 65.2637 3.25071C65.8398 2.98863 66.4962 2.96313 67.091 3.17972C67.6331 3.50437 68.0256 4.02842 68.1839 4.63894C68.3423 5.24946 68.2538 5.89757 67.9375 6.44364C67.7117 7.03317 67.2619 7.51011 66.6857 7.77095C66.1096 8.03179 65.4535 8.05549 64.8599 7.8369C64.3165 7.51527 63.9226 6.99261 63.7638 6.38269C63.605 5.77278 63.6942 5.12499 64.012 4.58036V4.58036Z"
                                                    fill="#1B1B1B" />
                                                <path
                                                    d="M59.7976 33.4515C61.3873 33.4515 61.0181 14.5843 61.0181 14.5843L60.4606 13.6451H59.2702L58.5771 14.5843C58.5771 14.5843 58.2155 33.4515 59.7976 33.4515Z"
                                                    fill="#1B1B1B" />
                                                <path
                                                    d="M59.2552 15.8166C59.2537 15.6985 59.2875 15.5828 59.3523 15.484C59.4172 15.3852 59.51 15.308 59.6191 15.2621C59.7282 15.2163 59.8484 15.2039 59.9646 15.2266C60.0807 15.2492 60.1875 15.3059 60.2712 15.3894C60.3549 15.4728 60.4117 15.5793 60.4344 15.6951C60.4572 15.811 60.4447 15.9309 60.3988 16.0397C60.3528 16.1485 60.2753 16.2411 60.1763 16.3057C60.0773 16.3704 59.9612 16.4041 59.8428 16.4027C59.687 16.4027 59.5375 16.3409 59.4273 16.231C59.3171 16.1211 59.2552 15.972 59.2552 15.8166Z"
                                                    fill="white" />
                                                <path
                                                    d="M100.836 1.01436H111.097V3.43381L103.819 3.56154V5.12442H111.097V6.76243L103.819 7.08552V9.01657H111.097V10.7523L103.819 10.9777V12.9313H111.097V14.5768L103.819 14.8849V16.846H111.097V18.6643L103.819 18.7845V20.7381H111.097V22.5414L103.819 22.7518V24.3222L111.097 24.3973V25.9677L103.819 25.8851V27.8011L111.097 27.8612V29.4992L103.819 29.7547V31.3326H111.097V34H100.836C99.7582 34 98.8767 33.3839 98.8767 32.6325V2.38188C98.8767 1.63049 99.7582 1.01436 100.836 1.01436Z"
                                                    class="logo-fill" />
                                                <path opacity="0.1"
                                                    d="M100.836 1.01436H101.099V34H100.836C99.7582 34 98.8767 33.3839 98.8767 32.6325V2.38188C98.8767 1.63049 99.7582 1.01436 100.836 1.01436Z"
                                                    fill="#070707" />
                                            </g>
                                            <defs>
                                                <clipPath>
                                                    <rect width="145" height="34" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </div>
                                <p class="about">Stylen Salon provides a variety of beauty services that will help you feel and appear your best. Our services range from hair care products and styling to makeup.</p>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-sm-12 col-12">
                            <div class="footer-widget">
                                <h6 class="title">QUICKLINKS</h6>
                                <ul class="quicklinks list-unstyled">
                                    
                                    <li><a href="services-1.php">SERVICES</a></li>
                                    <li><a href="shop.php">SHOP</a></li>
                                    <li><a href="appointment-1.php">APPOINTMENT</a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-xl-3 col-lg-6 col-sm-12 col-12">
                            <div class="footer-widget">
                                
                                <h6 class="text-uppercase title">Opening Hours</h6>
                                <ul class="timing list-unstyled">
                                    <li>WEEK DAYS <span class="time">7 AM – 8 PM</span></li>
                                    <li>SATURDAY<span class="time">8 AM – 6 PM</span></li>
                                </ul>
                                <h6 class="title mt-4">ADDRESS</h6>
                                <a class="address" href="#"><i class="fal fa-map-marker-alt"></i> Le kef ,Tunisie
                                   </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="footer-copyright">
                <p class="copyright-text">© 2023. All Rights Reserved by <a href="index-1.php">STYLEN</a>
                </p>
            </div>
        </footer>
        <!--=====================================-->
        <!--=     Footer Style 2 Area Start      =-->
        <!--=====================================-->
        <footer class="footer style-2 d-none background-2">
            <div class="footer-main">
                <div class="container">
                    <div class="newsletter-box">
                        <div class="row">
                            <div class="col-md-5">
                                <h2>SUBSCRIBE NEWSLETTER</h2>
                            </div>
                            <form method="get" action="https://techpedia.co.uk/template/stylen/index-1.php" class="col-md-7">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="ENTER YOUR EMAIL">
                                    <button class="input-group-text">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        <div class="col-xl-4 col-lg-6 col-sm-12 col-12">
                            <div class="footer-widget">
                                <div class="footer-logo">
                                    <a href="index-1.php">
                                        <svg width="80%" viewBox="0 0 145 34" fill="none"
                                            xmlns="../../../www.w3.org/2000/svg.php">
                                            <g clip-path="url(#clip0_350_910)">
                                                <path
                                                    d="M22.3083 24.6904C22.3083 29.379 17.705 33.4515 11.2483 33.4515C4.18139 33.4515 0.557518 29.1912 0 28.4022L1.50681 25.7573C2.66616 27.2574 4.16089 28.4665 5.87182 29.2884C7.58274 30.1103 9.46254 30.5221 11.3613 30.4911C15.7311 30.4911 19.3549 27.8462 19.3549 24.48C19.3549 21.6022 17.5468 19.5209 11.5045 18.4088C3.06635 16.9061 1.11504 14.0358 1.11504 9.85812C1.11504 5.27469 5.16081 1.59293 11.5271 1.59293C14.9895 1.54566 18.3306 2.8634 20.8241 5.25967L19.4303 7.80685C18.4012 6.74522 17.1651 5.9049 15.7982 5.33761C14.4312 4.77033 12.9623 4.4881 11.4819 4.50829C7.43609 4.50829 4.09098 6.34166 4.09098 9.67779C4.09098 13.0139 6.4642 14.404 11.8058 15.4709C19.4755 16.9962 22.3083 19.4533 22.3083 24.6904Z"
                                                    fill="#1B1B1B" />
                                                <path
                                                    d="M44.6165 1.93105V4.93657H36.4345V33.0608H33.4209V4.899H25.2842V1.93105H44.6165Z"
                                                    fill="#1B1B1B" />
                                                <path
                                                    d="M92.2016 30.1154V33.1209H75.8452V1.93105H78.8588V30.1154H92.2016Z"
                                                    fill="#1B1B1B" />
                                                <path
                                                    d="M123.43 9.01657V33.0608H120.462V1.19469L142.024 26.0354V1.93105H145.038V33.8122L123.43 9.01657Z"
                                                    fill="#1B1B1B" />
                                                <path
                                                    d="M59.456 14.1684C59.456 14.1684 56.7593 10.4691 56.3793 9.44489C56.1633 8.77861 56.1761 8.05951 56.4158 7.40133C56.6266 6.93355 56.732 6.42536 56.7246 5.91256C56.7172 5.39977 56.5972 4.89482 56.373 4.43327C55.6082 2.79004 53.8639 1.96759 52.479 2.6155L52.4271 2.62463C52.1579 2.14102 51.7527 1.74657 51.2614 1.48994C50.7702 1.23331 50.2143 1.12573 49.6624 1.18048C49.2098 1.26007 49.3302 1.94084 49.7933 1.92045C50.2131 1.89031 50.6325 1.98478 50.9986 2.19195C51.3647 2.39912 51.6611 2.70973 51.8505 3.08463C51.3944 3.57538 51.1016 4.19471 51.012 4.85784C50.9225 5.52096 51.0406 6.19549 51.3502 6.78908C51.5851 7.33109 51.9584 7.80215 52.433 8.15517C52.9075 8.50819 53.4667 8.73082 54.0545 8.80081V8.80081C55.5357 9.30331 58.8279 14.6832 58.8279 14.6832L59.456 14.1684ZM51.8814 6.50493C51.5722 5.95307 51.4934 5.30197 51.662 4.69257C51.8306 4.08317 52.233 3.5645 52.7822 3.24885C53.3767 3.04378 54.028 3.0778 54.5977 3.34369C55.1675 3.60958 55.611 4.08642 55.834 4.67302C56.143 5.2229 56.2223 5.87202 56.0549 6.47982C55.8874 7.08762 55.4866 7.60517 54.9393 7.9204C54.3453 8.13178 53.6918 8.10185 53.1198 7.83705C52.5477 7.57226 52.103 7.09382 51.8814 6.50493V6.50493Z"
                                                    fill="#1B1B1B" />
                                                <path
                                                    d="M65.7413 8.72931C66.334 8.66276 66.8985 8.44111 67.3776 8.08684C67.8567 7.73257 68.2333 7.25827 68.4694 6.71202C69.2541 5.07814 68.7701 3.22063 67.3843 2.56205C65.9986 1.90348 64.2832 2.74274 63.4685 4.33273C63.2387 4.79154 63.1126 5.29501 63.099 5.80768C63.0854 6.32036 63.1846 6.82977 63.3897 7.30007V7.30007C63.6215 7.96109 63.6256 8.68029 63.4015 9.34391C63.0091 10.3635 60.2678 14.0299 60.2678 14.0299L60.9368 14.5459C60.9368 14.5459 64.2541 9.21391 65.7413 8.72931ZM64.012 4.58036C64.238 3.9904 64.6876 3.51279 65.2637 3.25071C65.8398 2.98863 66.4962 2.96313 67.091 3.17972C67.6331 3.50437 68.0256 4.02842 68.1839 4.63894C68.3423 5.24946 68.2538 5.89757 67.9375 6.44364C67.7117 7.03317 67.2619 7.51011 66.6857 7.77095C66.1096 8.03179 65.4535 8.05549 64.8599 7.8369C64.3165 7.51527 63.9226 6.99261 63.7638 6.38269C63.605 5.77278 63.6942 5.12499 64.012 4.58036V4.58036Z"
                                                    fill="#1B1B1B" />
                                                <path
                                                    d="M59.7976 33.4515C61.3873 33.4515 61.0181 14.5843 61.0181 14.5843L60.4606 13.6451H59.2702L58.5771 14.5843C58.5771 14.5843 58.2155 33.4515 59.7976 33.4515Z"
                                                    fill="#1B1B1B" />
                                                <path
                                                    d="M59.2552 15.8166C59.2537 15.6985 59.2875 15.5828 59.3523 15.484C59.4172 15.3852 59.51 15.308 59.6191 15.2621C59.7282 15.2163 59.8484 15.2039 59.9646 15.2266C60.0807 15.2492 60.1875 15.3059 60.2712 15.3894C60.3549 15.4728 60.4117 15.5793 60.4344 15.6951C60.4572 15.811 60.4447 15.9309 60.3988 16.0397C60.3528 16.1485 60.2753 16.2411 60.1763 16.3057C60.0773 16.3704 59.9612 16.4041 59.8428 16.4027C59.687 16.4027 59.5375 16.3409 59.4273 16.231C59.3171 16.1211 59.2552 15.972 59.2552 15.8166Z"
                                                    fill="white" />
                                                <path
                                                    d="M100.836 1.01436H111.097V3.43381L103.819 3.56154V5.12442H111.097V6.76243L103.819 7.08552V9.01657H111.097V10.7523L103.819 10.9777V12.9313H111.097V14.5768L103.819 14.8849V16.846H111.097V18.6643L103.819 18.7845V20.7381H111.097V22.5414L103.819 22.7518V24.3222L111.097 24.3973V25.9677L103.819 25.8851V27.8011L111.097 27.8612V29.4992L103.819 29.7547V31.3326H111.097V34H100.836C99.7582 34 98.8767 33.3839 98.8767 32.6325V2.38188C98.8767 1.63049 99.7582 1.01436 100.836 1.01436Z"
                                                    class="logo-fill" />
                                                <path opacity="0.1"
                                                    d="M100.836 1.01436H101.099V34H100.836C99.7582 34 98.8767 33.3839 98.8767 32.6325V2.38188C98.8767 1.63049 99.7582 1.01436 100.836 1.01436Z"
                                                    fill="#070707" />
                                            </g>
                                            <defs>
                                                <clipPath>
                                                    <rect width="145" height="34" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                </div>
                                <p class="about">Stylen Salon provides a variety of beauty services that will help you feel and appear your best. Our services range from hair care products and styling to makeup.</p>
                                <ul class="list-unstyled">
                                    <li><a class="contact-link mb-2" href="tel:55973443"><i class="fas fa-phone-alt"></i> +216
                                        55973443</a></li>
                                    <li> <a class="contact-link" href="mailto:yosserkhaldi2001@gmail.com"><i
                                        class="fas fa-envelope"></i> yosserkhaldi2001@gmail.com</a></li>
                                </ul>
                                <ul class="list-unstyled social-icon">
                                    <li><a href="#"><i class="fab fa-snapchat-ghost"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                               

                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-sm-12 col-12">
                            <div class="footer-widget">
                                <h6 class="title">QUICKLINKS</h6>
                                <ul class="quicklinks list-unstyled">
                                    <li><a href="about.php">ABOUT</a></li>
                                    <li><a href="blogs-1.php">BLOG</a></li>
                                    <li><a href="services-1.php">SERVICES</a></li>
                                    <li><a href="shop.php">SHOP</a></li>
                                    <li><a href="appointment-1.php">APPOINTMENT</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-sm-12 col-12">
                            <div class="footer-widget">
                                <h6 class="title">SERVICES</h6>
                                <ul class="quicklinks list-unstyled">
                                    <li><a href="service-detail.php">Facials</a></li>
                                    <li><a href="service-detail.php">Body Treatment</a></li>
                                    <li><a href="service-detail.php">Mineral Baths</a></li>
                                    <li><a href="service-detail.php">Waxing</a></li>
                                    <li><a href="service-detail.php">Massage</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-sm-12 col-12">
                            <div class="footer-widget">
                                <h6 class="title">OPENING HOURS</h6>
                                <ul class="timing list-unstyled">
                                    <li>WEEK DAYS <span class="time">9 AM – 7 PM</span></li>
                                    <li>SATURDAY<span class="time">9 AM – 5 PM</span></li>
                                </ul>
                                <h6 class="title">ADDRESS</h6>
                                <a href="#" class="contact-link"><i class="fas fa-map-marker-alt"></i> 4757 South Cobb Dr, USA, 30080</a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="footer-copyright">
                <p class="copyright-text">© 2023. All Rights Reserved by <a href="index-1.php">STYLEN</a>
                </p>
            </div>
        </footer>
    </div>
    <!-- Jquery Js -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery-validator.js"></script>
    <script src="assets/js/vendor/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/vendor/slick.min.js"></script>
    <script src="assets/js/vendor/jquery-appear.js"></script>
    <script src="assets/js/vendor/sal.js"></script>
    <script src="assets/js/vendor/js.cookie.js"></script>
    <script src="assets/js/vendor/jquery-ui.min.js"></script>
    <script src="assets/js/vendor/jquery.smartWizard.min.js"></script>

    <!-- Site Scripts -->
    <script src="assets/js/app.js"></script>
</body>


<!-- Mirrored from techpedia.co.uk/template/stylen/appointment-1.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Aug 2023 13:24:24 GMT -->
</html>
