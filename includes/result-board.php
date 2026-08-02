<?php
// connect database 
require_once("../db/dbconnect.php");
$dbConnection = $conn;

// QUERY:: get published result phase circular 
$get_circular_query = "SELECT circular_id, circular_title, available_vacancy, circular_publish_date, application_deadline  FROM publish_circular WHERE circular_status = 3";
$result_phase_circular = $dbConnection->query($get_circular_query)->fetch_all(MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pmk Notice Board</title>

    <!-- Linked custom stylesheet  -->
    <link rel="stylesheet" href="../styles/result-board.css">
</head>

<body>
    <main>
        <section id="result-board">
            <div class="container-width">
                <h3 class="result-title">Results</h3>

                <!-- result board  -->
                <div class="results-container">
                    <div class="results" id="resultList">
                        <!-- 1st: result card  -->
                        <div class="result-card">
                            <img src="../assets/results/co_exam_foridpur.jpg" alt="" class="result-img">
                            <div class="result-info">
                                <h4 class="result-card-title">Credit Officer Selection Result (Faridpur)</h4>
                                <p class="result-publish-date">29.06.2026</p>
                            </div>

                            <button class="result-view-btn" type="button">
                                View Result
                            </button>
                        </div>

                        <!-- result card  -->
                        <?php
                        if (count($result_phase_circular) > 0) {
                            foreach ($result_phase_circular as $circular) {
                        ?>
                                <div class="result-card">
                                    <div class="result-info">
                                        <h4 class="result-card-title">Result: <?php echo $circular['circular_title'] ?></h4>
                                        <div class="publish-date">
                                            <div class="date-item">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-week">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12" />
                                                    <path d="M16 3v4" />
                                                    <path d="M8 3v4" />
                                                    <path d="M4 11h16" />
                                                    <path d="M7 14h.013" />
                                                    <path d="M10.01 14h.005" />
                                                    <path d="M13.01 14h.005" />
                                                    <path d="M16.015 14h.005" />
                                                    <path d="M13.015 17h.005" />
                                                    <path d="M7.01 17h.005" />
                                                    <path d="M10.01 17h.005" />
                                                </svg>
                                                <?php echo $circular['circular_publish_date'] ?>
                                            </div>
                                            <div class="date-item">
                                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-off">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M9 5h9a2 2 0 0 1 2 2v9m-.184 3.839a2 2 0 0 1 -1.816 1.161h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 1.158 -1.815" />
                                                    <path d="M16 3v4" />
                                                    <path d="M8 3v1" />
                                                    <path d="M4 11h7m4 0h5" />
                                                    <path d="M3 3l18 18" />
                                                </svg>

                                                <?php echo $circular['application_deadline'] ?>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="../includes/result_table.php?circular_id=<?php echo $circular['circular_id'] ?>" class="result-view-btn">
                                        View Result
                                    </a>
                                </div>
                            <?php
                            }
                        } else { ?>
                            <div class="result-card" style="text-align: center !important; display:block !important;">
                                <div class="result-info">
                                    <h4 class="result-card-title">No circular results have been published yet</h4>
                                </div>
                            </div>
                        <?php   }
                        ?>
                    </div>
                </div>

                <!-- result view modal  -->
                <div class="result-view-modal">
                    <div class="result-modal-content">
                        <div class="modal-content-container">
                            <h4 class="modal-title">Result Title</h4>
                            <span class="close-result-modal">&times;</span>
                        </div>

                        <figure class="modal-result-image">
                            <img src="" alt="image" loading="lazy">
                        </figure>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Linked custom script  -->
    <script src="../js/result-board.js"></script>
</body>

</html>