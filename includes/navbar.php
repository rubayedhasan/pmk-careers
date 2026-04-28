<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMK | Navbar</title>

    <!-- Linked my custom stylesheet  -->
    <link rel="stylesheet" href="./styles/navbar.css">

</head>

<body>
    <!-- section:: mini nav -->
    <section id="mini-nav">
        <div class="container-fluid container-width">
            <div class="mini-nav-container">

                <div class="brand">
                    <a class="brand-name" href="https://pmk.org.bd/">
                        <img class="logo-img" loading="lazy" decoding="async" fetchpriority="high" src="./assets/logo/PMK_Logo_For_Web.png" alt="pmk logo">
                    </a>
                </div>

                <!-- mini navigation  menu -->
                <div class="container-mini-navbar">
                    <!-- mini-navbar  -->
                    <ul class="mini-navbar">
                        <li>
                            <a class="mini-nav-link" href=" #">
                                <span class="nav-icon">
                                    <img src="./assets/icons/newspaper-regular-full.svg" alt="newspaper icon">
                                </span>
                                <span>NEWS</span>
                            </a>
                        </li>
                        <li>
                            <a class="mini-nav-link" href="https://careers.pmk.org.bd/" target="_blank">
                                <span class="nav-icon">
                                    <img src="./assets/icons/user-tie-solid-full.svg" alt="user icon">
                                </span>
                                <span> CAREER </span>
                            </a>
                        </li>
                    </ul>

                    <!--En/Bn Layout  -->
                    <div class="dropdown lang-container">
                        <a
                            class="dropdown-toggle lang-btn"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="nav-icon">
                                <img src="./assets/icons/earth-asia-solid-full.svg" alt="earth icon">
                            </span> <span>English</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item lang-btn" href="#">
                                    <i class="fa-solid fa-earth-asia"></i> <span>বাংলা</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--section::  navbar  (main)-->
    <nav id="navigation" class="navbar navbar-expand-lg">
        <div class="container-fluid container-width">
            <!-- brand name  -->
            <a class="brand-name d-inline-block d-lg-none" href="https://pmk.org.bd/">
                <img class="logo-img" loading="lazy" decoding="async" fetchpriority="high" src="./assets/logo/PMK_Logo_For_Web.png" alt="pmk logo">
            </a>

            <!-- toggler button and menu  -->
            <button class="navbar-toggler collapsed d-flex d-lg-none flex-column justify-content-around" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="toggler-icon top-bar"></span>
                <span class="toggler-icon middle-bar"></span>
                <span class="toggler-icon bottom-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-2">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="https://pmk.org.bd/">
                            <span class="nav-icon">
                                <img src="./assets/icons/house-solid-full.svg" alt="house icon">
                            </span>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="nav-icon">
                                <img src="./assets/icons/address-card-solid-full.svg" alt="card icon">
                            </span>
                            <span>About PMK</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Our Story</a></li>
                            <li><a class="dropdown-item" href="#">The People Behind PMK</a></li>
                            <li><a class="dropdown-item" href="#">What We Aim For</a></li>
                            <li><a class="dropdown-item" href="#">Strategic Objectives</a></li>
                            <li>
                                <a class="dropdown-item" href="#">Success Stories & Achievements</a>
                            </li>
                            <li><a class="dropdown-item" href="#">Governance Body</a></li>
                            <li><a class="dropdown-item" href="#">Executive Body</a></li>
                            <li><a class="dropdown-item" href="#">Legal & Registration</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="nav-icon">
                                <img src="./assets/icons/hands-bound-solid-full.svg" alt="hand bound icon">
                            </span>
                            <span>Microfinance</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="nav-icon">
                                <img src="./assets/icons/folder-open-solid-full.svg" alt="folder open icon">
                            </span>
                            <span>Projects</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Ongoing Projects</a></li>
                            <li><a class="dropdown-item" href="#">Completed Projects</a></li>
                            <li><a class="dropdown-item" href="#">Upcoming Projects</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="nav-icon">
                                <img src="./assets/icons/brain-solid-full.svg" alt="brain icon">
                            </span>
                            <span>Our Initiatives</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Technical Training</a></li>
                            <li><a class="dropdown-item" href="#">Tissue Culture Lab</a></li>
                            <li><a class="dropdown-item" href="#">PMK Community Health</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="nav-icon">
                                <img src="./assets/icons/book-solid-full.svg" alt="book icon">
                            </span>
                            <span>Case Studies</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Case Study-1</a></li>
                            <li><a class="dropdown-item" href="#">Case Study-2</a></li>
                            <li><a class="dropdown-item" href="#">Case Study-3</a></li>
                            <li><a class="dropdown-item" href="#">Case Study-4</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span class="nav-icon">
                                <img src="./assets/icons/chart-pie-solid-full.svg" alt="pie chart icon">
                            </span>
                            <span>Reports</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Annual Reports</a></li>
                            <li><a class="dropdown-item" href="#">Audit Reports</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="nav-icon">
                                <img src="./assets/icons/location-dot-solid-full.svg" alt="location icon">
                            </span>
                            <span>Working Area</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="nav-icon"><img src="./assets/icons/square-phone-solid-full.svg" alt="phone icon"></span>
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Linked my custom script  -->
    <script src="./js/navbar.js"></script>
</body>

</html>