<!-- connect the database  -->
<?php
// connect database 
require_once("../db/dbconnect.php");
$dbConnection = $conn;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMK | Career</title>
    <!-- Linked custom stylesheet  -->
    <link rel="stylesheet" href="../styles/circular-body.css">
</head>

<body>
    <!-- section:: pmk circular body container -->
    <section id="pmk-circular-body">
        <div class="container-width">
            <div class="circular-body-heading">
                <hgroup class="hiring-heading">
                    <h3 class="hiring-title">We're hiring</h3>
                    <p class="hiring-text">Discover exciting job opportunities at PMK and apply today to become part of our friendly, mission-driven growing team.
                    </p>
                </hgroup>

                <figure class="hiring-feature-image">
                    <img src="../assets/images/Resume-bro.png" alt="">
                </figure>
            </div>

            <!-- job lists  -->
            <div class="job-list-container">
                <div class="jobs" id="jobLists">

                    <!-- random  -->
                    <?php
                    include_once("../includes/vacancy-5.php");
                    include_once("../includes/vacancy-4.php");
                    include_once("../includes/vacancy-3.php");
                    include_once("../includes/vacancy-2.php");
                    include_once("../includes/vacancy-1.php");

                    // update the circular status active to inactive after over the deadline
                    $statusUpdateQuery = $dbConnection->prepare("UPDATE publish_circular SET circular_status = 0 WHERE  application_deadline < CURDATE()");
                    $statusUpdateQuery->execute();

                    // circular access from database 
                    $allCircularQuery = "SELECT circular_id, circular_title,application_deadline FROM publish_circular WHERE circular_status = 1 ORDER BY circular_publish_date DESC";
                    $allCircular = $dbConnection->query($allCircularQuery);

                    // data array 
                    $circularArray = $allCircular->fetch_all(MYSQLI_ASSOC);
                    foreach ($circularArray as $circular) {
                        echo "
                        
                        <div class='job-card'>

                        <div class='job-info'>
                             <a href ='../includes/vacancyDetails.php?circular_id=$circular[circular_id]'>
                                <h4 class='job-title' style='color:var(--pmk-blue-dark)'>
                                    $circular[circular_title]
                                </h4>
                            </a>

                            <div class='job-meta'>
                                <div class='job-meta-group'>
                                    <span>
                                        <i class='fa-solid fa-location-dot'></i>
                                    </span>
                                    <span id='job-location'>Anywhere in Bangladesh</span>
                                </div>

                                <div class='job-meta-group'>
                                    <span>
                                        <i class='fa-solid fa-business-time'></i>
                                    </span>
                                    <span id='job-deadline-time'>
                                    $circular[application_deadline]
                                    </span>
                                </div>
                            </div>
                        </div>

                        <a href ='../includes/vacancyDetails.php?circular_id=$circular[circular_id]' class='job-actions'>
                            <span class='stack-icon view'>
                                View More
                            </span>
                        </a>

                    </div>
                        ";
                    }

                    ?>

                    <!-- 1st:: job card  -->
                    <!-- <div class="job-card">

                        <div class="job-info">
                            <h4 class="job-title">Job Title 1</h4>

                            <div class="job-meta">
                                <div class="job-meta-group">
                                    <span>
                                        <i class="fa-solid fa-location-dot"></i>
                                    </span>
                                    <span id="job-location">Location</span>
                                </div>

                                <div class="job-meta-group">
                                    <span>
                                        <i class="fa-solid fa-business-time"></i>
                                    </span>
                                    <span id="job-deadline-time">Deadline</span>
                                </div>
                            </div>
                        </div>

                        <div class="job-actions">
                            <span class="stack-icon view">
                                View More
                            </span>
                        </div>

                    </div> -->

                </div>

                <!-- view all button  -->
                <div class="view-all-jobs-btn-container button-container">
                    <a href="#pmk-circular-body" class="visit-btn button-effect" id="view-all-jobs-btn">
                        <span>
                            <i class="fa-solid fa-briefcase"></i>
                        </span>
                        <span>VIEW ALL JOBS</span>
                    </a>
                </div>
            </div>
    </section>
</body>

<!-- custom script  -->
<script>
    document.querySelectorAll("#job-deadline-time").forEach(datelineElement => {
        const [day, month, year] = datelineElement.textContent.trim().split("/");
        const deadline = new Date(year, month - 1, day);
        const today = new Date();
        today.setHours(0, 0, 0, 0);

        if (deadline < today) {
            datelineElement.classList.add("dateover");
            datelineElement.textContent += " (Date Over)";
        }
    })
</script>

</html>