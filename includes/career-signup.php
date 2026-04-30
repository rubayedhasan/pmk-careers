<?php
session_start();
$userEmailValid = $_SESSION["user"]["userEmail"] ?? null;
if ($userEmailValid) {
    header("location:../index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | PMK</title>
    <!-- Linked favicon  -->
    <link rel="shortcut icon" href="../assets/logo/main-logo.png" type="image/x-icon">

    <!-- Linked custom stylesheet  -->
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/career-form.css">
</head>

<body>
    <!-- section:: signup form  -->
    <section class="career-form-container">
        <div class="feature-container">

            <div class="feature-content">

                <figure class="feature-image">
                    <a href="../index.php" class="linked">
                        <img src="../assets/logo/main-logo.png" alt="pmk main logo">
                    </a>
                </figure>
                <div class="feature-text">
                    <p>
                        Join a global community of change.
                    </p>
                    <p>
                        We create opportunities for people living in poverty to realise their potential.
                    </p>
                </div>
            </div>
        </div>

        <div class="action-form">
            <div class="form-container">
                <h3 class="form-title">Create New Account</h3>
                <form class="user-form" action="../server/requests.php" method="post">
                    <div class="user-field">
                        <label for="user-full-name">
                            <span>
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <span>Name</span>
                        </label>
                        <input type="text" name="userFullName" id="user-full-name" placeholder="Enter Your Name" required>
                    </div>

                    <div class="user-field">
                        <label for="user-address">
                            <span>
                                <i class="fa-solid fa-address-book"></i>
                            </span>
                            <span>Address</span>
                        </label>
                        <input type="text" name="userAddress" id="user-address" placeholder="Enter Your Address">
                    </div>
                    <div class="user-field">
                        <label for="user-contact-number">
                            <span>
                                <i class="fa-solid fa-square-phone"></i>
                            </span>
                            <span>Phone Number</span>
                        </label>
                        <input type="text" name="userContactNumber" id="user-contact-number" placeholder="phone:01XXXXXXXXX" required>
                    </div>
                    <div class="user-field">
                        <label for="user-email-address">
                            <span>
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                            <span>Email Address</span>
                        </label>
                        <input type="email" name="userEmailAddress" id="user-email-address" placeholder="you@email.com" required>
                    </div>

                    <div class="group-user-field">
                        <div class="terms">
                            <input type="checkbox" name="termsCheck" id="terms-check" required>
                            <label for="terms-check">By signing up I agree to the
                                <button type="button" id="terms-and-condition">PMK Terms & Conditions</button></label>
                        </div>
                        <div>
                            <button class="form-btn" id="signup-btn" type="submit" name="signup-button">Signup</button>
                        </div>
                    </div>
                </form>

                <p class="action-notice">
                    Already have an account? <a href="./career-login.php">LOGIN</a>
                </p>
            </div>
        </div>
    </section>


    <!-- Linked font awesome script  -->
    <script src="https://kit.fontawesome.com/ff87b718c4.js" crossorigin="anonymous"></script>
</body>

</html>