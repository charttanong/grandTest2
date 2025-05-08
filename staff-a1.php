<?php
include 'db.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Grand Dragon</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap"
        rel="stylesheet">
        
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

        <link
        href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Owl Carousel CSS & JS -->
    <link rel="stylesheet" href="lib/owlcarousel/assets/owl.carousel.min.css">
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>



    <style>
        @keyframes scaleUp {
            0% {
                transform: translateX(-50%) scale(0);
                opacity: 1;
            }

            100% {
                transform: translateX(-50%) scale(1);
                opacity: 1;
            }
        }


        .navbar-custom {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);

            width: 90%;
            max-width: 1050px;
            background-color: #3173a7;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 20px;
            border-radius: 50px;
            border: 0px solid #ffffff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            z-index: 9999;
        }

        /* Responsive padding for small screens */
        @media (max-width: 991px) {
            .navbar-custom {
                padding: 5px 12px;
            }
        }

        /* Navigation links */
        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 20px;
            transition: background 0.3s;
        }

        .navbar-nav .nav-link:hover {
            background-color: #174d79;
        }

        /* Logo */
        .logo-container {
            background-color: #194769;
            padding: 4px 12px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.3);

        }



        .logo-container img {
            height: 72px;
            width: 72px;
        }

        .navbar-toggler {
            border: none;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=UTF8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30' fill='white'%3E%3Cpath stroke='white' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }


        .navbar-toggler-icon {
            filter: invert(1);
        }

        .navbar-nav .nav-item {
            padding: 2px 0;
            /* Adjust padding to reduce height */
        }

        .navbar-nav .nav-link {
            padding: 12px 12px;
            /* Reduce padding if needed */
            line-height: 1.2;
            /* Make sure links aren't too tall */
        }

        /* Center logo on large screens */
        @media (min-width: 992px) {
            .logo-container {
                position: absolute;
                left: 50%;
                transform: translateX(-55%);
            }
        }

        /* Move logo to the left on small screens */
        @media (max-width: 1199px) {
            .logo-container {
                position: relative;
                left: 0;
                transform: none;
                margin-left: 2px;
            }

            .logo-container {

                padding: 2px 12px;
                gap: 4px;

            }

            .logo-container img {
                height: 64px;
                width: 64px;
            }


            .navbar .logo-container {
                order: -1;
                /* Move logo to the first position */
                margin-right: auto;
            }

            .navbar-toggler {
                margin-left: auto;
                /* Move toggler to the right */
            }
        }

        .navbar-toggler {
            background-color: rgb(255, 255, 255);
            /* Light white-transparent background */
            border: 2px solid white;
            /* White border */
            border-radius: 8px;
            /* Rounded corners */
            padding: 3px;
            /* Reduce padding for a smaller button */
            width: 35px;
            /* Reduce button width */
            height: 35px;
            /* Reduce button height */
        }

        .navbar-toggler-icon {
            width: 22px;
            /* Reduce icon width */
            height: 22px;
            /* Reduce icon height */

            border-radius: 0px;
            /* Slight rounding for the icon */
        }



        /* Hero Section */
        .hero-container {
            width: 95%;

            margin: 80px auto 0;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Hero Section */
        .container-fluid {
            width: 95%;

            margin: 40px auto 0;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }

        .carousel-item {
            position: relative;
            width: 100%;
            height: 600px;
            /* Fixed height */
        }

        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Crop image while maintaining aspect ratio */
        }


        /* Overlay */
        .carousel-caption {
            position: absolute;
            top: 50%;
            left: 8%;
            transform: translateY(-50%);
            text-align: left;
            max-width: 500px;
        }

        .carousel-caption h1 {
            font-size: 38px;
            font-weight: bold;
            color: white;
        }

        .carousel-caption p {
            font-size: 18px;
            color: white;
            margin-bottom: 20px;
        }

        .cta-btn {
            background-color: white;
            color: #a67c52;
            padding: 12px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            border: 0px solid #a67c52;
            /* Add a border */
            transition: all 0.3s ease-in-out;
            /* Smooth transition */
        }

        /* Hover Effect */
        .cta-btn:hover {
            background-color: #a67c52;
            /* Change background to brown */
            color: white;
            /* Change text to white */
            border-color: #a67c52;
            /* Keep border same as background */
            transform: scale(1.05);
            /* Slightly enlarge button */
        }

        .cta-btn2 {
            background-color: rgb(255, 123, 0);
            color: #a67c52;
            padding: 12px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
        }
    </style>

    <style>
        /* Hero Section */
        .hero {
            max-width: 1400px;
            /* Limits the width of the section */
            margin: 0 auto;
            /* Centers the section */
            padding: 20px;
            /* Optional: Adds some spacing inside the section */
            display: grid;
            /* Ensures responsive grid layout */
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            /* Space between stat cards */
        }

        .hero {
            background-color: #f9f9f900;
            border: 0px solid #ddd;
            border-radius: 0px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0);

        }

        .stat-card {
            background-color: #fdfdfd;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .icon-container {
            font-size: 2em;
            color: #130759;
            /* Adjust to fit your theme */
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .hero {
                grid-template-columns: 1fr;
                /* Stack cards vertically */
                /* Stack cards vertically on smaller screens */
                justify-content: center;
                /* Center cards horizontally */

            }
        }


        .stat-card h2 {
            font-size: 1rem;
        }

        .stat-card p {
            font-size: 1.2rem;
            font-weight: bold;
            margin: 10px 0 0;
        }

        /* Chart Section */
        .chart-section {
            padding: 2rem;
            text-align: center;
            opacity: 0;
            transform: translateX(-100px);
            transition: opacity 1s ease, transform 1s ease;
        }

        .chart-section {
            border: 1px solid #ddd;
            /* Blue border */
            border-radius: 8px;
            /* Rounded corners */
            padding: 20px;
            /* Space inside the border */
            margin: 20px auto;
            /* Space around the section */
            background-color: #fdfdfd;
            /* Optional: Light background */
            max-width: 1400px;
            /* Optional: Limit width */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Optional: Add a shadow for depth */
        }

        /* Responsive and taller chart container */
        .chart-container {
            width: 80%;
            height: 500px;
            /* Increased height for the chart */
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Adjust height for smaller screens */
        @media (max-width: 768px) {
            .chart-container {
                height: 400px;
                /* Reduced height for smaller screens */
            }
        }



        /* Animation Classes */
        .stat-card.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .chart-section.animate {
            opacity: 1;
            transform: translateX(0);
        }

        .testimonial-item-link {
            text-decoration: none;
        }

        .testimonial-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 10px;
            transition: transform 0.2s;
        }

        .testimonial-item:hover {
            transform: scale(1.05);
            border-color: #007bff;
            /* Optional: Highlight border on hover */
        }

        /* Style for the quote icon */
        .testimonial-item .fa-quote-right {
            color: #007bff;
            /* Quote color */
            opacity: 0;
            /* Semi-transparent */
        }

        /* Image styling */
        .testimonial-item img {
            border: 2px solid #007bff;
            /* Border around image */
            padding: 2px;
            border-radius: 50%;
            /* Circular image */
        }

        /* Title styling */
        .testimonial-item h5 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
        }

        /* Subtitle styling */
        .testimonial-item p.text-muted {
            font-size: 0.9rem;
            color: #6c757d;
        }

        /* Main text styling */
        .testimonial-item p.mb-0 {
            font-size: 1rem;
            color: #555;
        }

        .owl-dots {
            position: relative;
            bottom: auto;
            top: auto;
            margin-top: 30px;
            text-align: center;
            z-index: 1;
        }

        .owl-dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            background: #aaa;
            margin: 5px;
            border-radius: 50%;
        }

        .owl-dot.active {
            background: #333;
        }

        .dropdown-menu.rounded-custom {
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            min-width: 150px;
            padding: 8px 0;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 16px;
            transition: background-color 0.2s ease;

        }

        .dropdown-item:hover {
            background-color: #f0f0f0;
            border-radius: 8px;
        }

        .dropdown-icon {
            font-size: 1.2rem;
        }
    </style>
    <style>
        /* Center the container and add margins around */
        .image-container {
            text-align: center;
            /* Centers the image horizontally */
            margin: 10px;
            /* Margin around the entire container */
        }

        .image-container img {
            max-width: 100%;
            /* Make image responsive */
            height: auto;
            margin: 30px auto;
            /* Adds space around the image */
            display: block;
            /* Ensures image is centered within the container */
            border-radius: 16px;

        }

        /* Add margin to text to prevent it from touching the image */
        .content {
            text-indent: 2em;
            /* Adjust as needed for a larger or smaller tab */

        }

       
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">

        <img class="position-absolute top-50 start-50 translate-middle" style="max-width: 300px; width: 100%;"
            src="img/icons/icon-1.png" alt="Icon">

    </div>
    <!-- Spinner End -->

    <!-- Cookie Consent Banner -->
    <div id="cookie-consent-banner" class="cookie-consent-banner">
        <p>
            <span data-translate="cookieBanner">
                This website uses cookies to track user behavior and improve your experience. Please choose whether you
                consent
                to the use of cookies for tracking purposes. You can view our
            </span>
            <a href="web-policy.html" target="_blank" style="color: #FF3E41; text-decoration: underline;"
                data-translate="link-cookie">
                cookies policy
            </a>.
        </p>

        <button id="accept-cookies" data-translate="accept-cookies">Accept</button>
        <button id="decline-cookies" data-translate="decline-cookies">Decline</button>
    </div>



    <nav class="navbar navbar-expand-xl navbar-custom">
        <!-- Navbar Toggle Button for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>


        </button>

        <!-- Logo (Centered in large screens, left in mobile) -->
        <a class="navbar-brand logo-container" href="index.html">
            <img src="img/icons/icon-1.png" alt="Logo">
            <span class="fw-bold text-white">GRAND DRAGON</span>
        </a>



         <!-- Collapsible Menu -->
         <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <!-- Left Nav -->
            <ul class="navbar-nav">
                <li class="nav-item"><a href="index.html" class="nav-link" data-translate="home">Home</a></li>
                <li class="nav-item"><a href="article.php" class="nav-link" data-translate="article">Article</a></li>
                <li class="nav-item"><a href="service.html" class="nav-link" data-translate="services">Services</a></li>
                <li class="nav-item"><a href="about.html" class="nav-link" data-translate="about">About</a></li>


            </ul>

            <!-- Right Nav -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="download.html" class="nav-link" data-translate="download">Download</a>
                </li>
                <li class="nav-item"><a href="contact.html" class="nav-link" data-translate="contact">Contact</a></li>
                <li class="nav-item"><a href="policy.html" class="nav-link" data-translate="policy">Policy</a></li>

                <!-- Language Dropdown -->
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="languageDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        🌐
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end rounded-custom" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item" href="#" onclick="changeLanguage('en')">EN</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeLanguage('th')">TH</a></li>
                    </ul>
                </div>
            </ul>
        </div>
    </nav>

    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase" data-translate="Our-Staff">Our Staff</h6>
                <h1 class="mb-5" data-translate="Position">NVOCC Consolidation Specialist</h1>
            </div>
            <div id="staff-list" class="row g-4">
                <!-- Staff cards will be dynamically inserted here -->
            </div>
        </div>
    </div>



    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-body footer mt-5 pt-3 px-2 wow fadeIn" data-wow-delay="0.1s">
        <div class="container-fluid">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-light mb-4" data-translate="footer-address">Address</h3>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><span
                            data-translate="footer-address-text">445/3 Phetchaburi Road, Phayathai, Rajtavee, Bangkok
                            10400</span></p>
                    <p class="mb-2"><i class="fa fa-phone text-light  me-3"></i><span data-translate="footer-phone">+662
                            215
                            1769</span></p>
                    <p class="mb-2"><i class="fa fa-envelope text-light  me-3"></i><span
                            data-translate="footer-email">admin@empireglobal.co.th</span></p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-body me-1"
                            href="https://www.facebook.com/people/EmpireLogistics/61570489110357/?mibextid=wwXIfr&rdid=4YOr5EZxljDqV8vi&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F19qSFV8GD1%2F%3Fmibextid%3DwwXIfr"
                            target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-body me-1" href="https://www.instagram.com"
                            target="_blank"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square btn-outline-body me-0" href="https://lin.ee/MYiN3II" target="_blank"><i
                                class="fab fa-line"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-light mb-4" data-translate="footer-services">Services</h3>
                    <a class="btn btn-link" href="staff-a1.php" data-translate="footer-service-1">NVOCC
                        Consolidation</a>
                    <a class="btn btn-link" href="staff-a2.php" data-translate="footer-service-2">Customs Clearance</a>
                    <a class="btn btn-link" href="staff-a3.php" data-translate="footer-service-3">LCL (Less than
                        Container load)</a>
                    <a class="btn btn-link" href="staff-a4.php" data-translate="footer-service-4">FCL (Full Container
                        load)</a>
                    <a class="btn btn-link" href="staff-a5.php" data-translate="footer-service-5">Inland
                        Transportation</a>
                    <a class="btn btn-link" href="staff-a6.php" data-translate="footer-service-6">International Freight
                        Forwarding</a>

                    <!-- Hidden additional services initially -->
                    <div id="extra-services" style="display: none;">
                        <a class="btn btn-link" href="staff-a7.php" data-translate="footer-service-7">Door to door
                            Service</a>
                        <a class="btn btn-link" href="staff-a8.php" data-translate="footer-service-8">Industrial
                            Packaging and Removal</a>
                        <a class="btn btn-link" href="staff-a9.php" data-translate="footer-service-9">Project Handling
                            and Marine Insurance</a>
                        <a class="btn btn-link" href="staff-a10.php" data-translate="footer-service-10">Cross
                            Border</a>
                        <a class="btn btn-link" href="staff-a11.php" data-translate="footer-service-11">Air Freight</a>
                    </div>

                    <!-- Button to toggle the extra services -->
                    <button id="show-more" onclick="toggleServices()"
                        style="background: none; border: none; padding: 0; font-size: inherit; color: inherit; cursor: pointer;"
                        data-translate="footer-show-more">Show More</button>


                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-light mb-4" data-translate="footer-quick-links">Quick Links</h3>
                    <a class="btn btn-link" href="download.html" data-translate="footer-download">Download</a>
                    <a class="btn btn-link" href="term.html" data-translate="footer-terms">Terms & Condition</a>
                    <a class="btn btn-link" href="policy.html" data-translate="footer-policy">Privacy Policy</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-light mb-4" data-translate="footer-newsletter">Newsletter</h3>
                    <p data-translate="footer-newsletter-text">Receive news from us.

                    </p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <form id="emailForm">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="email" name="email"
                                id="emailInput" placeholder="Your email" required>
                            <button type="submit" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2"
                                data-translate="footer-signup">SignUp</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-6 text-center">
                        &copy; <a href="#">Grand Dragon Logistic</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top" style="border-radius: 20%;"><i
            class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        document.getElementById('emailForm').addEventListener('submit', async (e) => {
            e.preventDefault(); // Prevent the form from refreshing the page

            const emailInput = document.getElementById('emailInput');
            const email = emailInput.value;

            if (email) {
                try {
                    const response = await fetch('add_email.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({
                            email
                        }),
                    });

                    const result = await response.json();

                    if (result.success) {
                        alert(result.message);
                        emailInput.value = ''; // Clear the input field
                    } else {
                        alert(`Error: ${result.error}`);
                    }
                } catch (error) {
                    console.error('Error adding email:', error);
                }
            } else {
                alert('Please enter a valid email.');
            }
        });
    </script>

    

    <script>
        const translations = {
            en: {
                home: "Home",
                article: "Article",
                about: "About",
                services: "Services",
                download: "Download",
                contact: "Contact",
                policy: "Policy",

                cookieBanner: "This website uses cookies to track user behavior and improve your experience. Please indicate whether you consent to the use of cookies for tracking and improvement purposes. You can view our ",
                "accept-cookies": "Accept",
                "decline-cookies": "Decline",
                "link-cookie": "cookies policy",

                "Digital Logistics Management in the Digital Age": "Digital Logistics Management in the Digital Age",
                "By Logistic Author": "By Admin | November 12, 2024",
                "Analyzing the Role of Technology": "Analyzing the Role of Technology in Logistics and How to Enhance Operational Efficiency",
                "In an era where digital": "In an era where digital technology plays a crucial role in every aspect of business, logistics is no exception. Modern logistics management relies on technology to enhance operational efficiency and respond swiftly to customer demands.",
                "The Role of Technology in Logistics": "The Role of Technology in Logistics",
                "The use of digital technology in logistics": "The use of digital technology in logistics, known as \"Digital Logistics,\" involves leveraging digital data to manage various processes such as transportation, storage, and inventory management. These technologies help businesses reduce costs, increase speed, and minimize errors that arise from labor-intensive processes.",
                "One significant technology": "One significant technology is the Internet of Things (IoT), which enables real-time tracking of goods' status, allowing operators to monitor shipments from origin to destination. Additionally, Machine Learning aids in data analysis, enabling more effective decision-making.",
                "Ways to Enhance Operational": "Ways to Enhance Operational Efficiency with Technology",
                "Data Analytics": "1. Data Analytics: Utilizing data analytics to understand trends and customer behaviors allows businesses to adjust strategies accordingly, such as optimizing transportation routes for better efficiency.",
                "Automation Systems": "2. Automation Systems: Implementing automation in inventory management and transportation processes reduces repetitive tasks and increases operational speed.",
                "Cloud Platforms": "3. Cloud Platforms: Using cloud platforms enables all stakeholders to access information quickly and easily, fostering transparency in operations and facilitating rapid decision-making.",
                "Effective Communication": "4. Effective Communication: Technology enhances communication channels between service providers and customers, allowing for immediate responses to inquiries or issues.",
                "Conclusion": "Conclusion",
                "In the digital age": "In the digital age, logistics transcends mere transportation of goods; it has become a vital strategy for gaining competitive advantage in business. By integrating technology into logistics processes, companies can reduce costs, enhance efficiency, and significantly improve customer satisfaction.",
                "reference": "reference",



                "footer-address": "Address",
                "footer-address-text": "445/3 Phetchaburi Road, Phayathai, Rajtavee, Bangkok 10400",
                "footer-phone": "+662 215 1769",
                "footer-email": "admin@empireglobal.co.th",
                "footer-services": "Services",
                "footer-service-1": "NVOCC Consolidation",
                "footer-service-2": "Customs Clearance",
                "footer-service-3": "LCL (Less than Container load)",
                "footer-service-4": "FCL (Full Container load)",
                "footer-service-5": "Inland Transportation",
                "footer-service-6": "International Freight Forwarding",
                "footer-service-7": "Door to door Service",
                "footer-service-8": "Industrial Packaging and Removal",
                "footer-service-9": "Project Handling and Marine Insurance",
                "footer-service-10": "Cross Border",
                "footer-service-11": "Air Freight",
                "footer-show-more": "Show More",
                "footer-quick-links": "Quick Links",
                "footer-faq": "Frequency Question",
                "footer-download": "Download",
                "footer-terms": "Terms & Condition",
                "footer-newsletter": "Newsletter",
                "footer-newsletter-text": "Receive news from us.",
                "footer-signup": "SignUp",
                "footer-policy": "Privacy Policy"


            },
            th: {
                home: "หน้าแรก",
                article: "บทความ",
                about: "เกี่ยวกับเรา",
                services: "บริการ",
                download: "ดาวน์โหลด",
                contact: "ติดต่อเรา",
                policy: "นโยบาย",

                cookieBanner: "เว็บไซต์นี้ใช้คุกกี้ในการติดตามพฤติกรรมของผู้ใช้และปรับปรุงประสบการณ์ของคุณ กรุณาเลือกว่าคุณยินยอมให้ใช้คุกกี้เพื่อการติดตามและปรับปรุงข้อมูลหรือไม่ คุณสามารถดูนโยบายคุกกี้ของเราได้ที่นี่ ",
                "accept-cookies": "ยอมรับ",
                "decline-cookies": "ปฏิเสธ",
                "link-cookie": "นโยบายคุกกี้",


                "Digital Logistics Management in the Digital Age": "การจัดการโลจิสติกส์ในยุคดิจิทัล",
                "By Logistic Author": "แอดมิน | 12 พฤศจิกายน 2024",
                "Analyzing the Role of Technology": "การวิเคราะห์บทบาทของเทคโนโลยีโลจิสติกส์และวิธีเพิ่มประสิทธิภาพการดำเนินงาน",
                "In an era where digital": "ในยุคที่เทคโนโลยีดิจิทัลมีบทบาทสำคัญในทุกด้านของธุรกิจ โลจิสติกส์ก็ไม่แตกต่าง การจัดการโลจิสติกส์สมัยใหม่พึ่งพาเทคโนโลยีในการเพิ่มประสิทธิภาพการดำเนินงานและตอบสนองความต้องการของลูกค้าได้อย่างรวดเร็ว",
                "The Role of Technology in Logistics": "บทบาทของเทคโนโลยีกับโลจิสติกส์",
                "The use of digital technology in logistics": "การใช้เทคโนโลยีดิจิทัลกับโลจิสติกส์ หรือที่เรียกว่า \"โลจิสติกส์ดิจิทัล\" ซึ่งเป็นการใช้ข้อมูลดิจิทัลเพื่อจัดการกระบวนการต่าง ๆ เช่น การขนส่ง การจัดเก็บ และการบริหารจัดการสต็อก สร้างความรวดเร็วและลดข้อผิดพลาดที่เกิดจากกระบวนการใช้แรงงานตามปกติ",
                "One significant technology": "เทคโนโลยีหนึ่งที่สำคัญคือ Internet of Things (IoT) ที่ช่วยให้การติดตามสถานะสินค้ามีความเป็นปัจจุบัน ผู้ปฏิบัติงานสามารถติดตามการจัดส่งจากต้นทางถึงปลายทางได้ และ Machine Learning ช่วยในการวิเคราะห์ข้อมูลเพื่อการตัดสินใจที่มีประสิทธิภาพมากยิ่งขึ้น",
                "Ways to Enhance Operational": "วิธีการเพิ่มประสิทธิภาพการดำเนินงานด้วยเทคโนโลยี",
                "Data Analytics": "1. การวิเคราะห์ข้อมูล: ใช้การวิเคราะห์ข้อมูลเพื่อทำความเข้าใจแนวโน้มและพฤติกรรมของลูกค้า ทำให้ธุรกิจสามารถปรับกลยุทธ์ได้ เช่น การเพิ่มประสิทธิภาพเส้นทางการขนส่ง",
                "Automation Systems": "2. ระบบอัตโนมัติ: การใช้ระบบอัตโนมัติในกระบวนการบริหารสต็อกและการขนส่งช่วยลดงานซ้ำซ้อนและเพิ่มความเร็วในการดำเนินงาน",
                "Cloud Platforms": "3. แพลตฟอร์มคลาวด์: ใช้แพลตฟอร์มคลาวด์เพื่อให้ผู้ที่เกี่ยวข้องสามารถเข้าถึงข้อมูลได้รวดเร็วและสะดวกขึ้น เพิ่มความโปร่งใสในกระบวนการและช่วยให้การตัดสินใจเป็นไปอย่างรวดเร็ว",
                "Effective Communication": "4. การสื่อสารที่มีประสิทธิภาพ: เทคโนโลยีช่วยเพิ่มช่องทางการสื่อสารระหว่างผู้ให้บริการและลูกค้า ทำให้ตอบสนองต่อข้อสงสัยหรือปัญหาได้ทันที",
                "Conclusion": "บทสรุป",
                "In the digital age": "ในยุคดิจิทัล โลจิสติกส์ไม่ใช่แค่การขนส่งสินค้า แต่กลายเป็นกลยุทธ์สำคัญที่ช่วยให้ธุรกิจมีความได้เปรียบในการแข่งขัน โดยการนำเทคโนโลยีเข้ามาช่วยในกระบวนการโลจิสติกส์ ช่วยลดต้นทุน เพิ่มประสิทธิภาพ และเพิ่มความพึงพอใจของลูกค้าอย่างมีนัยสำคัญ",
                "reference": "อ้างอิง",




                "footer-address": "ติดต่อเรา",
                "footer-address-text": "445/3 ถนนเพชรบุรี, พญาไท, ราชเทวี, กรุงเทพฯ 10400",
                "footer-phone": "+662 215 1769",
                "footer-email": "admin@empireglobal.co.th",
                "footer-services": "บริการ",
                "footer-service-1": "การรวม NVOCC",
                "footer-service-2": "การทำพิธีศุลกากร",
                "footer-service-3": "LCL (น้อยกว่าการโหลดตู้)",
                "footer-service-4": "FCL (เต็มตู้คอนเทนเนอร์)",
                "footer-service-5": "การขนส่งทางบก",
                "footer-service-6": "การขนส่งทางเรือระหว่างประเทศ",
                "footer-service-7": "บริการประตูถึงประตู",
                "footer-service-8": "การบรรจุและการขนย้ายอุตสาหกรรม",
                "footer-service-9": "การจัดการโครงการและประกันภัยทางทะเล",
                "footer-service-10": "ข้ามพรมแดน",
                "footer-service-11": "การขนส่งทางอากาศ",
                "footer-show-more": "แสดงเพิ่มเติม",
                "footer-quick-links": "ควิกลิงก์",
                "footer-faq": "คำถามที่พบบ่อย",
                "footer-download": "ดาวน์โหลด",
                "footer-terms": "ข้อกำหนดและเงื่อนไข",
                "footer-newsletter": "ข่าวสาร",
                "footer-newsletter-text": "รับข่าวสารจากเรา",
                "footer-signup": "สมัครสมาชิก",
                "footer-policy": "นโยบายความเป็นส่วนตัว"

            },


        };

        function changeLanguage(lang) {
            const languageData = translations[lang];
            document.querySelectorAll("[data-translate]").forEach(element => {
                const key = element.getAttribute("data-translate");
                element.textContent = languageData[key];
            });
            localStorage.setItem("language", lang);
            setFontBasedOnLanguage(lang);
        }

        function setFontBasedOnLanguage(lang) {
            document.body.setAttribute("data-lang", lang); // Add lang attribute to body

            const logoContainer = document.querySelector('.logo-container');
            const navbar = document.querySelector('#navbarNav');

            if (lang === 'th') {
                document.body.style.fontFamily = 'Prompt, sans-serif'; // Thai font

                if (navbar) {
                    navbar.classList.remove('navbar-inter'); // Remove Inter font from navbar
                }

                if (window.innerWidth >= 992 && logoContainer) {
                    logoContainer.style.transform = 'translateX(-51%)';
                }
            } else {
                document.body.style.fontFamily = 'Roboto, sans-serif'; // Default English font

                if (navbar) {
                    navbar.classList.add('navbar-inter'); // Add Inter font only for navbar
                }

                if (window.innerWidth >= 992 && logoContainer) {
                    logoContainer.style.transform = 'translateX(-55%)';
                }
            }
        }

        window.addEventListener("load", () => {
            const savedLanguage = localStorage.getItem("language") || "en";
            changeLanguage(savedLanguage);
        });

        (function () {
            const originalSetItem = localStorage.setItem;

            // Override localStorage.setItem
            localStorage.setItem = function (key, value) {
                // Skip blocking storage for cookie consent keys
                if (key === "cookieConsent" || key === "cookieConsentTimestamp") {
                    originalSetItem.apply(this, arguments); // Allow saving these keys
                } else {
                    const cookieConsent = localStorage.getItem("cookieConsent"); // Check cookie consent
                    if (cookieConsent === "accepted") {
                        originalSetItem.apply(this, arguments); // Only store if cookies are accepted
                    }
                }
            };
        })();


        // Cookie consent logic
        window.addEventListener("DOMContentLoaded", () => {
            const cookieConsent = localStorage.getItem("cookieConsent");

            // Show cookie banner if no consent is found
            if (!cookieConsent) {
                const banner = document.getElementById("cookie-consent-banner");
                banner.style.display = "block"; // Display the banner
            }

            // Accept cookies
            document.getElementById("accept-cookies").addEventListener("click", () => {
                localStorage.setItem("cookieConsent", "accepted");
                document.getElementById("cookie-consent-banner").style.display = "none";
            });

            // Decline cookies
            document.getElementById("decline-cookies").addEventListener("click", () => {
                localStorage.setItem("cookieConsent", "declined");
                document.getElementById("cookie-consent-banner").style.display = "none";
                localStorage.clear(); // Clear all data if cookies are declined
            });
        });
    </script>

    <script>
        function toggleServices() {
            var extraServices = document.getElementById("extra-services");
            var button = document.getElementById("show-more");

            if (extraServices.style.display === "none" || extraServices.style.display === "") {
                extraServices.style.display = "block"; // Show extra services
                button.innerHTML = "Show Less"; // Change text to "Show Less"
            } else {
                extraServices.style.display = "none"; // Hide extra services
                button.innerHTML = "Show More"; // Change text to "Show More"
            }
        }
    </script>

    <div id="qrModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>QR Code</h2>
            <img class="qr-code" src="" alt="QR Code Image">
        </div>
    </div>

    <script>
        // JavaScript code here
        const modal = document.getElementById("qrModal");
        const closeBtn = modal.querySelector(".close");

        function openModal(qrCodeUrl) {
            const modalImage = modal.querySelector(".qr-code");

            if (modalImage) {
                modalImage.src = qrCodeUrl; // Set the QR code image source
                modal.style.display = "flex"; // Show the modal with flex layout
            } else {
                console.error("Modal image element not found");
            }
        }

        closeBtn.onclick = function () {
            modal.style.display = "none";
        };

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
    </script>

    <script>
    async function fetchStaffData(group) {
        try {
            const response = await fetch(`fetch_staff.php?group=${encodeURIComponent(group)}`);
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            const staffData = await response.json();

            const staffList = document.getElementById('staff-list');
            staffList.innerHTML = '';

            staffData.forEach(staff => {
                const staffCard = `
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
    <div class="team-item position-relative shadow-team m-2">
        <div class="position-relative" style="display: flex; justify-content: center;">
            <img class="img-fluid" src="${staff.profile_image || 'default-profile.png'}" alt="Profile Image">
            <div class="team-social text-center">
                <a class="btn btn-square shadow-btn" href="${staff.facebook || '#'}" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="btn btn-square shadow-btn" href="#" onclick="openModal('${staff.line_qr_code || 'default-qr.png'}')">
                    <i class="fab fa-line fa-2x"></i>
                </a>
                <a class="btn btn-square shadow-btn" href="mailto:${staff.email || 'N/A'}">
                    <i class="fas fa-at"></i>
                </a>
            </div>
        </div>
        <div class="bg-light text-center py-4 px-1">
            <h5 class="mt-2 fw-bold section-title">${staff.name || 'Unknown'}</h5>
            <div class="text-secondary">${staff.thainame || 'ไม่มีข้อมูล'}</div>

            <div class="text-muted mt-3">${staff.position || 'N/A'}</div>
            <div class="text-muted">${staff.phone || 'N/A'}</div>
            <div class="text-muted" style="word-break: break-word;">${staff.email || 'N/A'}</div>
        </div>
    </div>
</div>
`;
                staffList.insertAdjacentHTML('beforeend', staffCard);
            });
        } catch (error) {
            console.error("Error fetching staff data:", error);
            alert("Failed to load staff data. Please try again later.");
        }
    }

    // Example usage
    fetchStaffData('NVOCC Consolidation');
    </script>

    <!-- JavaScript Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cookieBanner = document.getElementById('cookie-consent-banner');
            const acceptCookiesButton = document.getElementById('accept-cookies');
            const declineCookiesButton = document.getElementById('decline-cookies');
            const COOKIE_EXPIRY_DAYS = 30; // Expiry time in days

            // Check if the user has already made a choice
            let cookieConsent = localStorage.getItem('cookieConsent');
            let cookieTimestamp = localStorage.getItem('cookieConsentTimestamp');

            if (cookieConsent && cookieTimestamp) {
                const now = new Date().getTime();
                const consentAge = (now - parseInt(cookieTimestamp, 10)) / (1000 * 60 * 60 * 24); // Age in days

                console.log('Consent Age:', consentAge); // Debug log (1000 * 60 * 60 * 24)

                if (consentAge <= COOKIE_EXPIRY_DAYS) {
                    console.log('Consent is valid, hiding banner'); // Debug log
                    cookieBanner.style.display = 'none';

                    if (cookieConsent === 'accepted') {
                        enableTracking(); // Enable tracking if consent was given
                    } else {
                        disableTracking(); // Disable tracking if consent was denied
                    }
                } else {
                    console.log('Consent has expired, clearing and showing banner'); // Debug log
                    localStorage.removeItem('cookieConsent');
                    localStorage.removeItem('cookieConsentTimestamp');
                    cookieBanner.style.display = 'block';
                }
            } else {
                console.log('No valid consent saved, showing banner'); // Debug log
                cookieBanner.style.display = 'block';
            }

            // Handle "Accept" button click
            acceptCookiesButton.addEventListener('click', function () {
                const now = new Date().getTime();
                console.log('Accept button clicked');
                localStorage.setItem('cookieConsent', 'accepted');
                localStorage.setItem('cookieConsentTimestamp', now);
                console.log('cookieConsent set to accepted');
                cookieBanner.style.display = 'none';
                enableTracking();
            });

            // Handle "Decline" button click
            declineCookiesButton.addEventListener('click', function () {
                const now = new Date().getTime();
                console.log('Decline button clicked');
                localStorage.setItem('cookieConsent', 'declined');
                localStorage.setItem('cookieConsentTimestamp', now);
                console.log('cookieConsent set to declined');
                cookieBanner.style.display = 'none';
                disableTracking();
            });
        });

        // Function to enable tracking (e.g., Google Analytics and custom tracking)
        function enableTracking() {
            console.log('Tracking enabled.');

            

            // Custom Tracking
            async function trackUserVisit() {
                try {
                    // Get device and browser info
                    const userAgent = navigator.userAgent;
                    const device = /Mobi|Android/i.test(userAgent) ? 'Mobile' : 'Desktop';
                    const browser = (() => {
                        if (userAgent.includes("Firefox")) return "Firefox";
                        if (userAgent.includes("Chrome")) return "Chrome";
                        if (userAgent.includes("Safari")) return "Safari";
                        return "Unknown";
                    })();

                    // Get the user's IP address using an external API
                    const ipResponse = await fetch('https://api.ipify.org?format=json');
                    const {
                        ip
                    } = await ipResponse.json();

                    // Ensure IP is available before sending data
                    if (ip) {
                        // Send data to the backend (track.php)
                        const response = await fetch('track.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                ip,
                                device,
                                browser
                            }),
                        });

                        const result = await response.json();
                        if (response.ok) {
                            console.log('User visit tracked:', result.message); // Handle success
                        } else {
                            console.error('Error tracking visit:', result.error);
                        }
                    } else {
                        console.error('IP address could not be retrieved.');
                    }
                } catch (error) {
                    console.error('Error tracking user:', error);
                }
            }

            // Track user on page load
            trackUserVisit();
        }

        // Function to disable tracking (e.g., block Google Analytics and custom tracking)
        function disableTracking() {
            console.log('Tracking disabled.');

           
        }
    </script>





</body>

</html>