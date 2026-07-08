<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMK | Career</title>
    <!-- Linked shared styles and scripts  -->
    <?php require_once("../includes/sharedLinks.php") ?>
</head>

<body>

    <!-- Linked section :: Navbar -->
    <?php
    session_start();

    include_once("../includes/navbar.php");
    ?>

    <main>
        <?php

        if (isset($_GET["result"])) {
            // Linked section:: result-board 
            include_once("../includes/result-board.php");
        } else {
            // Linked section:: circular-head 
            include_once("../includes/circular-head.php");
            // Linked section:: circular-body 
            include_once("../includes/circular-body.php");
        }
        ?>
    </main>


    <!-- Linked section:: Footer -->
    <?php
    include_once("../includes/footer.php");
    ?>

    <!-- Linked custom script  -->
    <script src="../js/circular.js"></script>
</body>

</html>