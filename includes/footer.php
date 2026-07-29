<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PMK ! Footer</title>
    <!-- Linked Fav Icon  -->
    <link
        rel="shortcut icon"
        href="./assets/logo/logo.png"
        type="image/x-icon" />
    <link rel="stylesheet" href="../styles/footer-alter.css" />
</head>

<body>
    <main>
        <footer>
            <!-- main footer container  -->
            <section class="footer-main">
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
                        <!-- about PMK  -->
                        <div class="col">
                            <h3 class="widget-title">About PMK</h3>
                            <figure onclick="window.location.href='https://pmk-bd.org'">
                                <img
                                    src="../assets/logo/main-logo.png"
                                    alt="pmk-logo"
                                    loading="lazy"
                                    class="pmk-mini-logo" />
                            </figure>
                            <p class="widget-description">
                                Established in 1988, PMK has over
                                <script>
                                    document.write(new Date().getFullYear() - 1988);
                                </script>
                                years of experience in advancing poverty reduction, social
                                justice, climate resilience, and sustainable rural development
                                across Bangladesh.
                            </p>

                            <ul class="social-icons d-flex gap-3 justify-content-start">
                                <li>
                                    <a
                                        href="https://facebook.com/themefisher"
                                        target="_blank"
                                        class="social-link facebook">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="social-link twitter">
                                        <i class="fa-brands fa-square-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="social-link instagram">
                                        <i class="fa-brands fa-square-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="social-link github">
                                        <i class="fa-brands fa-github"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- our program  -->
                        <div class="col">
                            <h3 class="widget-title">Our Programs</h3>

                            <!-- footer nav  -->
                            <nav class="nav flex-column">
                                <a class="nav-link" href="https://pmk-bd.org/pages/pmk_mfi.php">
                                    <span>
                                        <i class="fa-solid fa-angles-right"></i>
                                    </span>
                                    <span>Microfinance Program</span></a>
                                <a class="nav-link" href="https://pmk-bd.org/pages/project.php">
                                    <span>
                                        <i class="fa-solid fa-angles-right"></i>
                                    </span>
                                    <span>Our Projects</span></a>
                                <a class="nav-link" href="https://pmk-bd.org/pages/page.php">
                                    <span>
                                        <i class="fa-solid fa-angles-right"></i>
                                    </span>
                                    <span>PMK Community Health</span></a>
                                <a class="nav-link" href="https://pmk-bd.org/pages/page.php">
                                    <span>
                                        <i class="fa-solid fa-angles-right"></i>
                                    </span>
                                    <span>Technical Training</span></a>
                                <a class="nav-link" href="https://pmk-bd.org/pages/page.php">
                                    <span>
                                        <i class="fa-solid fa-angles-right"></i>
                                    </span>
                                    <span>Tissue Culture Lab</span></a>
                            </nav>
                        </div>

                        <!-- quick links  -->
                        <div class="col">
                            <h3 class="widget-title">Quick Links</h3>

                            <!-- footer nav  -->
                            <nav class="nav flex-column">
                                <a class="nav-link" href="https://pmk-bd.org/pages/our_story.php">
                                    <span>
                                        <i class="fa-solid fa-angles-right"></i>
                                    </span>
                                    <span>About PMK</span></a>
                                <a class="nav-link" href="http://localhost/pmk/pages/executive_committee.php">
                                    <span>
                                        <i class="fa-solid fa-angles-right"></i>
                                    </span>
                                    <span>Leadership</span></a>
                                <a class="nav-link" href="https://pmk-bd.org/pages/annual_report.php">
                                    <span>
                                        <i class="fa-solid fa-angles-right"></i>
                                    </span>
                                    <span>Annual Reports</span></a>
                                <a class="nav-link" href="https://careers.pmk-bd.org">
                                    <span>
                                        <i class="fa-solid fa-angles-right"></i>
                                    </span>
                                    <span>Careers</span></a>
                                <a class="nav-link" href="https://pmk-bd.org/pages/contact.php">
                                    <span>
                                        <i class="fa-solid fa-angles-right"></i>
                                    </span>
                                    <span>Contact</span></a>
                            </nav>
                        </div>

                        <!-- contact  -->
                        <div class="col">
                            <h3 class="widget-title">Contact US</h3>

                            <div class="address">
                                <p>Zirabo, Ashulia, Dhaka-1341, Bangladesh</p>
                                <p>
                                    Email: <a href="mailto:info@pmk-bd.org">info@pmk-bd.org</a>
                                </p>
                                <p>
                                    Phone: <a href="tel:+8801709914000">+880 1709 91 40 00</a>
                                </p>
                            </div>

                            <!-- newsletter  -->
                            <div class="newsletter">
                                <h5>Subscribe to Updates</h5>
                                <form action="../server/subscribe.php" method="post">
                                    <input
                                        type="email"
                                        name="subscription_user"
                                        id="input-email"
                                        placeholder="Your Email Address" />
                                    <button id="subscribe-btn" type="submit">Subscribe</button>
                                </form>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- copyright text  -->
            <section class="copyright">
                <div
                    class="copyright-content d-flex justify-content-center justify-content-lg-between align-items-center flex-wrap">
                    <p class="copy-text">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        , All Rights Reserved by MIS & ICT Department, PMK
                    </p>

                    <!-- links  -->
                    <ul class="nav justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Privacy Policy </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Terms of Service </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Transparency</a>
                        </li>
                    </ul>
                </div>
            </section>
        </footer>
    </main>
</body>

</html>