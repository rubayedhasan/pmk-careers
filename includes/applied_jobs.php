<?php
$user_id = $_SESSION['user']['userId'] ?? "";

// connect database 
require_once("../db/dbconnect.php");
$dbConnection = $conn;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Manage PMK job applications by viewing the complete list of applicants, reviewing candidate details, and tracking application statuses from one centralized dashboard.">
    <title>PMK | Applied Job</title>

    <!-- Linked custom stylesheet  -->
    <link rel="stylesheet" href="../styles/applied_jobs.css">
</head>

<body>
    <main>
        <!-- section:: applied job list  -->
        <div class="container-width">
            <section id="applied-job-list">
                <hgroup class="applied-header">
                    <h3 class="applied-title">Applied Jobs</h3>
                    <p class="applied-text">Track your job applications and stay updated on their progress.</p>
                </hgroup>

                <!-- job list  -->
                <div class="applied-jobs">
                    <?php
                    // QUERY: get circular id from cgi table 
                    $get_circular_query = "SELECT circular_id FROM candidate_general_information WHERE user_id = '$user_id'";
                    $circular_arr = $dbConnection->query($get_circular_query)->fetch_all(MYSQLI_ASSOC);

                    // print_r($circular_arr);

                    if (count($circular_arr) > 0) {
                        foreach ($circular_arr as $circular) {
                            // QUERY:: circular info
                            $get_circular_info = "SELECT * FROM publish_circular WHERE circular_id = '$circular[circular_id]'";
                            $circular_info = $dbConnection->query($get_circular_info)->fetch_assoc();

                            // echo "<pre>";
                            // print_r($circular_info);
                            // echo "</pre>";
                    ?>
                            <div class="applied-job">
                                <!-- pmk logo  -->
                                <figure class="org-logo">
                                    <img src="../assets/logo/main-logo.png" alt="pmk logo">
                                </figure>

                                <!-- job-description -->
                                <div class="job-description">
                                    <h4 class="job-desc-title">
                                        <?php echo $circular_info['circular_title']; ?>
                                    </h4>
                                    <p class="job-desc-loc">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-map-pin">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                            <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0" />
                                        </svg>
                                        <?php echo $circular_info['job_location']; ?>
                                    </p>
                                    <div class="job-desc-info">
                                        <div class="desc-info">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-stack-2">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 4l-8 4l8 4l8 -4l-8 -4" />
                                                <path d="M4 12l8 4l8 -4" />
                                                <path d="M4 16l8 4l8 -4" />
                                            </svg>
                                            <span>
                                                <?php
                                                switch ($circular_info['employment_type']) {
                                                    case 1:
                                                        echo "Regular";
                                                        break;

                                                    case 2:
                                                        echo "Contractual";
                                                        break;

                                                    case 3:
                                                        echo "Intern";
                                                        break;

                                                    case 4:
                                                        echo "Part-Time";
                                                        break;
                                                    default:
                                                        echo "";
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="desc-info">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-off">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 5h9a2 2 0 0 1 2 2v9m-.184 3.839a2 2 0 0 1 -1.816 1.161h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 1.158 -1.815" />
                                                <path d="M16 3v4" />
                                                <path d="M8 3v1" />
                                                <path d="M4 11h7m4 0h5" />
                                                <path d="M3 3l18 18" />
                                            </svg>
                                            <span>
                                                <?php echo $circular_info['application_deadline']; ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- view job description  -->
                                <div class="view-job-info">
                                    <a href="../includes/vacancyDetails.php?circular_id=<?php echo $circular_info['circular_id']; ?>&applied_view=true" class="view-job-details">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                        View Details
                                    </a>
                                </div>
                            </div>

                        <?php
                        }
                    } else { ?>
                        <div class="no-applied">
                            <p class="no-text">
                                You haven't applied for any job circulars yet. Browse available jobs and submit your application today.
                            </p>
                        </div>
                </div>
            <?php  } ?>
        </div>
        </section>
        </div>
    </main>
</body>

</html>