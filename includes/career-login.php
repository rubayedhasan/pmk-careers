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
                        Join a trusted community where opportunities grow and success begins.
                    </p>
                </div>
            </div>
        </div>

        <div class="action-form">
            <div class="form-container">
                <h3 class="form-title">Login to your account</h3>
                <form class="user-form" action="../server/requests.php" method="post">

                    <div class="user-field">
                        <label for="user-email">
                            <span><i class="fa-solid fa-envelope"></i></span>
                            <span>Email Address</span>
                        </label>
                        <input type="email" name="userEmail" id="user-email" placeholder="you@email.com" required>
                    </div>
                    <div class="user-field">
                        <label for="user-password">
                            <span><i class="fa-solid fa-key"></i></span>
                            <span>Password</span>
                        </label>
                        <div class="password-field">
                            <input type="password" name="userPassword" id="user-password" placeholder="password">
                            <span id="peak-password"><i class="fa-solid fa-eye"></i></span>
                        </div>
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
                    Do not have any account? <a href="./career-signup.php">Signup</a>
                </p>
            </div>
        </div>
    </section>


    <!-- Linked font awesome script  -->
    <script src="https://kit.fontawesome.com/ff87b718c4.js" crossorigin="anonymous"></script>
    <!-- Linked custom scripts  -->
    <script src="../js/career-form.js"></script>
</body>

</html>