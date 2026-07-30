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
    <title>Login | PMK</title>
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
                        Join a trusted community where opportunities grow and success begins.
                    </p>
                </div>
            </div>
        </div>

        <div class="action-form">
            <div class="form-container">
                <h3 class="form-title">Login to your account</h3>
                <p class="form-short-text">Please log in to your account to continue. If you don't have an account yet, sign up first to get started.</p>
                <form class="user-form" action="../server/login.php" method="post">
                    <div class="user-field">
                        <label for="user-mobile-number">
                            <span>
                                <i class="fa-solid fa-square-phone"></i>
                            </span>
                            <span>Phone Number</span>
                        </label>
                        <input type="text" name="userMobileNumber" id="user-mobile-number" placeholder="phone:01XXXXXXXXX" required>
                    </div>

                    <div class="group-user-field">
                        <div>
                            <button id="signup-btn" class="form-btn" type="submit" name="login-button">Login</button>
                        </div>

                        <div class="forget_password">
                            <a href="">Forget Password</a>
                        </div>
                    </div>
                </form>

                <p class="action-notice">
                    Do not have any account? <a href="./career-signup.php">Sign up</a>
                </p>
            </div>
        </div>
    </section>


    <!-- Linked font awesome script  -->
    <script src="https://kit.fontawesome.com/ff87b718c4.js" crossorigin="anonymous"></script>
</body>

</html>