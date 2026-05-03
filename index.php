<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMK | Career</title>
    <!-- Linked favicon  -->
    <link rel="shortcut icon" href="./assets/logo/main-logo.png" type="image/x-icon">

    <!-- Linked shared styles and scripts  -->
    <?php require_once("./includes/sharedLinks.php") ?>
</head>

<body>

    <!-- Linked section :: Navbar -->
    <?php
    session_start();

    include_once("./includes/navbar.php"); ?>

    <main>
        <?php
        //  $userEmailValid = $_SESSION["user"]["userEmail"] ?? null; //declare in navbar


        if ($userEmailValid) {
            include_once("./includes/career-dashboard.php");
        } else {
            // Linked section:: circular-head 
            include_once("./includes/circular-head.php");

            // Linked section:: circular-body 
            include_once("./includes/circular-body.php");

            // Linked section:: circular-foot 
            include_once("./includes/circular-foot.php");
        }
        ?>
    </main>


    <!-- Linked section:: Footer -->
    <?php
    include_once("./includes/footer.php");
    ?>

    <!-- Linked custom script  -->
    <script src="./js/circular.js"></script>
</body>

</html>