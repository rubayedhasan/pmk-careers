<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMK | Navbar</title>

    <!-- Linked my custom stylesheet  -->
    <link rel="stylesheet" href="../styles/navbar.css">

</head>

<body>
    <!--section::  navbar  (main)-->
    <nav id="navigation" class="navbar navbar-expand-lg">
        <div class="container-fluid container-width">
            <!-- brand name  -->
            <a class="brand-name" href="https://pmk.org.bd/">
                <img class="logo-img" loading="lazy" decoding="async" fetchpriority="high" src="../assets/logo/PMK_Logo_For_Web.png" alt="pmk logo">
            </a>

            <!-- toggler button and menu  -->
            <button class="navbar-toggler collapsed d-flex d-lg-none flex-column justify-content-around" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="toggler-icon top-bar"></span>
                <span class="toggler-icon middle-bar"></span>
                <span class="toggler-icon bottom-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-2">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.php">
                            <span class="nav-icon">
                                <img src="../assets/icons/user-tie-solid-full.svg" alt=" icon">
                            </span>
                            <span>Career</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="?result=true">
                            <span class="nav-icon">
                                <img src="../assets/icons/square-poll-vertical-solid-full.svg" alt=" icon">
                            </span>
                            <span>Result</span>
                        </a>
                    </li>

                    <?php
                    $userEmailValid = $_SESSION["user"]["userEmail"] ?? null;

                    if ($userEmailValid) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <span class="nav-icon">
                                    <img src="../assets/icons/circle-user-solid-full.svg" alt="icon">
                                </span>
                                <span>Profile</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <span class="nav-icon">
                                    <img src="../assets/icons/briefcase-solid-full.svg" alt="icon">
                                </span>
                                <span>Applied Jobs</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../server/logout.php?logout=true">
                                <span class="nav-icon">
                                    <img src="../assets/icons/arrow-right-from-bracket-solid-full.svg" alt="icon">
                                </span>
                                <span>Logout(<?php echo $_SESSION["user"]["userPhoneNumber"]; ?>)</span>
                            </a>
                        </li>

                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../includes/career-signup.php?signup=true">
                                <span class="nav-icon"><img src="../assets/icons/user-plus-solid-full.svg" alt="icon"></span>
                                <span>Signup</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../includes/career-login.php?login=true">
                                <span class="nav-icon"><img src="../assets/icons/right-to-bracket-solid-full.svg" alt="icon"></span>
                                <span>Login</span>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Linked my custom script  -->
    <script src="../js/navbar.js"></script>
</body>

</html>