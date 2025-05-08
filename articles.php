<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM empirearticle WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$article = $result->fetch_assoc();

if (!$article) {
    die("Article not found!");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="UTF-8">
    <title>Empire Global Logistics</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

        
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">



    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful Article Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">



    <link href="/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">



    <link href="img/favicon.ico" rel="icon">
    <script src="lib/easing/easing.min.js"></script>




    <title>Article Detail</title>

    <style>
        .body-container {
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            max-width: 75%;
            /* Set a maximum width to control the side margins */
        }



        /* Center the container and add margins around */
        .image-container {
            text-align: center;
            /* Centers the image horizontally */
            margin: 20px;
            /* Margin around the entire container */
        }

        .image-container img {
            max-width: 100%;
            /* Make image responsive */
            height: auto;
            margin: 20px auto;
            /* Adds space around the image */
            display: block;
            /* Ensures image is centered within the container */
        }

        /* Add margin to text to prevent it from touching the image */
        .content {
            text-indent: 2em;
            /* Adjust as needed for a larger or smaller tab */

        }
    </style>

    <style>
        /* Custom CSS to ensure round corners */
        .dropdown-menu.rounded-custom {
            border-radius: 15px !important;
            /* Increase as desired */
            overflow: hidden;
        }

        body[data-lang="th"] h1,
        body[data-lang="th"] h2,
        body[data-lang="th"] h3,
        body[data-lang="th"] h4,
        body[data-lang="th"] h5,
        body[data-lang="th"] h6 {
            font-family: 'Kanit', sans-serif;
        }
    </style>

    <style>
        body {
            overflow-x: hidden;
        }



        /* Adjust dropdown menu size */
        .dropdown-menu {
            max-width: 200px;
            /* Limit dropdown width */
            min-width: auto;
            /* Remove Bootstrap's default */
            width: auto;
            /* Ensure it adapts to content */
            overflow-x: hidden;
            /* Prevent horizontal scrolling */
        }



        /* Optional: Style dropdown for a cleaner look */
        .dropdown-menu {
            border-radius: 8px;
            /* Add rounded corners */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Add shadow for depth */
        }
    </style>

    <style>
        .article-content {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #f9f9f9;
            max-width: 1000px;
            margin: 0 auto;
            margin-top: 30px;
        }

        .article-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .article-author {
            font-size: 16px;
            color: #555;
            margin-bottom: 15px;
        }

        .article-text {
            font-size: 18px;
            line-height: 1.6;
        }

        .article-content img {
            max-width: 100%;
            /* Makes the image responsive */
            max-width: 600px;
            /* Maximum width */

            height: auto;
            /* Keeps the aspect ratio */
            display: block;
            /* Centers the image horizontally */
            margin: 0 auto;
            /* Centers the image horizontally */
        }
    </style>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
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
            <a href="policy.html" target="_blank" style="color: #FF3E41; text-decoration: underline;"
                data-translate="link-cookie">
                cookies policy
            </a>.
        </p>

        <button id="accept-cookies" data-translate="accept-cookies">Accept</button>
        <button id="decline-cookies" data-translate="decline-cookies">Decline</button>
    </div>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-xl bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0 "
        id="navbar">
        <a href="/index.html" class="navbar-brand bg-primary d-flex align-items-center px-4 px-lg-5">
            <img src="/img/logo3.png" alt="Logo" style="height: 40px; margin-right: 10px; margin-top: -8px;">
            <h2 class=" mb-2 text-white">Empire Global Logistics</h2>
        </a>

        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            style="transform: scale(0.6); margin-top: 0.5rem">
            <span class="navbar-toggler-icon"></span>
        </button>

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
    <!-- Navbar End -->

    <div class="article-content" id="article-content">
        <div class="article-title" id="article-title"></div>
        <div class="article-author" id="article-author"></div>
        <div class="article-text" id="article-text"></div>
    </div>

    <h1><?= htmlspecialchars($article['title']) ?></h1>
    <p><small>Published on: <?= $article['created_at'] ?></small></p>
    <p><?= nl2br(htmlspecialchars($article['content'])) ?></p>
    <a href="index.php">Back to Articles</a>

    <script>
        // Fetch article details based on slug
        async function loadArticle() {
            const articleContent = document.getElementById('article-content');
            const articleTitle = document.getElementById('article-title');
            const articleAuthor = document.getElementById('article-author');
            const articleText = document.getElementById('article-text');

            // Get the slug from the URL
            const slug = window.location.pathname.split('/').pop();

            try {
                const response = await fetch(`/api/articles/slug/${slug}`);
                if (!response.ok) {
                    throw new Error('Article not found');
                }

                const article = await response.json();

                // Populate the page with article data
                articleTitle.innerText = article.title;
                articleAuthor.innerText = `By ${article.author || 'Anonymous'}`;
                articleText.innerHTML = article.content; // Assuming the content is HTML formatted

            } catch (error) {
                console.error('Error loading article:', error);
                articleContent.innerHTML = '<p>Failed to load article. Please try again later.</p>';
            }
        }

        // Load article when the page is loaded
        document.addEventListener('DOMContentLoaded', loadArticle);
    </script>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s"
        style="margin-top: 6rem;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4" data-translate="footer-address">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><span
                            data-translate="footer-address-text">445/3 Phetchaburi Road, Phayathai, Rajtavee, Bangkok
                            10400</span></p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><span data-translate="footer-phone">+662 215
                            1769</span></p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i><span
                            data-translate="footer-email">admin@empireglobal.co.th</span></p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social"
                            href="https://www.facebook.com/people/EmpireLogistics/61570489110357/?mibextid=wwXIfr&rdid=4YOr5EZxljDqV8vi&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F19qSFV8GD1%2F%3Fmibextid%3DwwXIfr"
                            target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="btn btn-outline-light btn-social" href="https://www.instagram.com" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="btn btn-outline-light btn-social" href="https://lin.ee/MYiN3II" target="_blank">
                            <i class="fab fa-line"></i>
                        </a>

                        <a class="btn btn-outline-light btn-social"
                            href="https://www.linkedin.com/in/empire-global-logistics-512673346/" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4" data-translate="footer-services">Services</h4>

                    <a class="btn btn-link" href="/staff-a1.html" data-translate="footer-service-1">NVOCC
                        Consolidation</a>
                    <a class="btn btn-link" href="/staff-a2.html" data-translate="footer-service-2">Customs
                        Clearance</a>
                    <a class="btn btn-link" href="/staff-a3.html" data-translate="footer-service-3">LCL (Less than
                        Container load)</a>
                    <a class="btn btn-link" href="/staff-a4.html" data-translate="footer-service-4">FCL (Full Container
                        load)</a>
                    <a class="btn btn-link" href="/staff-a5.html" data-translate="footer-service-5">Inland
                        Transportation</a>
                    <a class="btn btn-link" href="/staff-a6.html" data-translate="footer-service-6">International
                        Freight
                        Forwarding</a>

                    <!-- Hidden additional services initially -->
                    <div id="extra-services" style="display: none;">
                        <a class="btn btn-link" href="/staff-a7.html" data-translate="footer-service-7">Door to door
                            Service</a>
                        <a class="btn btn-link" href="/staff-a8.html" data-translate="footer-service-8">Industrial
                            Packaging and Removal</a>
                        <a class="btn btn-link" href="/staff-a9.html" data-translate="footer-service-9">Project Handling
                            and Marine Insurance</a>
                        <a class="btn btn-link" href="/staff-a10.html" data-translate="footer-service-10">Cross
                            Border</a>
                        <a class="btn btn-link" href="/staff-a11.html" data-translate="footer-service-11">Air
                            Freight</a>
                    </div>

                    <!-- Button to toggle the extra services -->
                    <button id="show-more" onclick="toggleServices()"
                        style="background: none; border: none; padding: 0; font-size: inherit; color: inherit; cursor: pointer;"
                        data-translate="footer-show-more">Show More</button>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4" data-translate="footer-quick-links">Quick Links</h4>
                    <a class="btn btn-link" href="" data-translate="footer-faq">Frequency Question</a>
                    <a class="btn btn-link" href="" data-translate="footer-download">Download</a>
                    <a class="btn btn-link" href="" data-translate="footer-terms">Terms & Condition</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4" data-translate="footer-newsletter">Newsletter</h4>
                    <p data-translate="footer-newsletter-text">Receive news from us.</p>
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
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">www.empireglobal.co.th</a>, All Right Reserved.
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        document.getElementById('emailForm').addEventListener('submit', async function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const email = formData.get('email');

            const response = await fetch('http://localhost:5000/api/emails', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email
                })
            });

            if (response.ok) {
                alert('Email submitted successfully!');
                this.reset();
            } else {
                alert('Error submitting email.');
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
                "footer-signup": "SignUp"

            },
            th: {
                home: "หน้าแรก",
                article: "บทความ",
                about: "เกี่ยวกับเรา",
                services: "บริการ",
                download: "ดาวน์โหลด",
                contact: "ติดต่อเรา",
                policy: "นโยบาย",

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
                "footer-signup": "สมัครสมาชิก"

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
    </script>
    <script src="/js/main.js"></script> <!-- Correct path -->

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