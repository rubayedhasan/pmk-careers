<?php
session_start();

// connect database 
require_once("../db/dbconnect.php");
$dbConnection = $conn;

if (isset($_GET["circular_id"])) {
    // id 
    $circular_id = $_GET["circular_id"];

    //query:: get all data
    $circularDataQuery = "SELECT * FROM `publish_circular` WHERE circular_id = '$circular_id'";

    // query result 
    $rawCircularData = $dbConnection->query($circularDataQuery);
    $circularData = $rawCircularData->fetch_all(MYSQLI_ASSOC);

    // extract the all data a part 
    $designation_name = $circularData[0]["circular_title"];
    $designation_category = $circularData[0]["designation_category"];
    $available_position = $circularData[0]["available_vacancy"];
    $probation_salary = $circularData[0]["probation_salary"];
    $gross_salary = $circularData[0]["gross_salary"];
    $min_age = $circularData[0]["min_age"];
    $max_age = $circularData[0]["max_age"];
    $age_deadline = $circularData[0]["age_deadline"];
    $qualification = $circularData[0]["qualification"];
    $experience = $circularData[0]["experience"];
    $additional_requirement = $circularData[0]["additional_requirement"];
    $training_rules = $circularData[0]["training_rules"];
    $circular_publish_date = $circularData[0]["circular_publish_date"];
    $application_deadline = $circularData[0]["application_deadline"];
    $circular_status = (int)  $circularData[0]["circular_status"];
}

// apply functionality 
if (isset($_POST["applyBtn"])) {
    if ($_SESSION["user"]["userPhoneNumber"]) {
        header("location:../includes/job_application.php?circular_id=$circular_id&designation_name=$designation_name");

        // close the database connection 
        exit();
    } else {
        header("location:../includes/career-login.php");

        // close the database connection 
        exit();
    }
}


// close the database connection 
mysqli_close($dbConnection);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circular Details</title>
    <!-- Linked Favicon  -->
    <link rel="shortcut icon" href="../assets/logo/main-logo.png" type="image/x-icon">
    <!-- Linked custom stylesheet  -->
    <?php include_once("../includes/sharedLinks.php") ?>
    <link rel="stylesheet" href="../styles/vacancyDetails.css">
</head>

<body>
    <!-- section:: Header  -->
    <header id="circular-details-header">
        <div class="container-width">
            <div class="career-nav">
                <figure class="pmk-logo">
                    <a href="https://pmk.org.bd/">
                        <img src="../assets/logo/main-logo.png" alt="pmk logo">
                    </a>
                </figure>

                <div>
                    <button class="home-button" onclick="window.history.back()">Back to Home</button>
                </div>
            </div>
            <div class="career-header-container">
                <hgroup class="header-content">
                    <h2 class="header-title">
                        <?php
                        if ($circular_status) {
                            echo "<span style='color: var(--pmk-green);'>Current</span> Opening";
                        } else {
                            echo "Opening <span style='color:#ff4f4f;'>Closed</span>";
                        }

                        ?>
                    </h2>
                    <p class="header-text">
                        Explore the details of this position and see if it’s the right fit for you.
                    </p>
                </hgroup>

                <figure class="art-image">
                    <img src="../assets/images/Working remotely-bro.png" alt="working image">
                </figure>

            </div>
        </div>
        <div class="wave"></div>
    </header>

    <!-- section:: Main  -->
    <main class="container-width" id="pdf-content">
        <section id="vacancy-body">
            <!-- vacancy description  -->
            <hgroup class="vacancy-description">
                <div class="vacancy-title-container">
                    <!-- title  -->
                    <h3 class="vacancy-title">
                        <?php echo "$designation_name ($designation_category)" ?>
                    </h3>

                    <!-- user action button  -->
                    <div class="user-action-container">
                        <!-- print  -->
                        <span class="print-btn" onclick="window.print()">
                            <i class="fa-solid fa-print"></i>
                        </span>

                        <!-- download  -->
                        <span class="download-btn" onclick="generatePDF()">
                            <i class="fa-solid fa-download"></i>
                        </span>
                    </div>
                </div>
                <p class="vacancy-post-date">
                    Post: <?php echo $circular_publish_date; ?>
                </p>
                <p class="vacancy-location">Location: Anywhere in Bangladesh</p>
            </hgroup>

            <!-- organization overview  -->
            <div class="org-overview">
                <p>
                    Palli Mangal Karmasuchi (PMK) is a nationally recognized and well-established non-governmental organization (NGO) in Bangladesh, licensed by the Microcredit Regulatory Authority (MRA) under Certificate No. 00862-00387-00312.
                </p>

                <p>
                    Established in 1988, PMK has grown into one of the country's leading microfinance institutions, currently operating through 376 branches across 36 districts, with its operations continuing to expand. As of May 2026, the organization serves more than 400,000 active members and has cumulatively disbursed approximately BDT 270 billion (over BDT 27,000 crore) in microcredit loans. Among 678 registered NGOs/MFIs operating in Bangladesh, PMK ranks 12th in the microfinance sector.
                </p>

                <p>
                    Beyond its microfinance operations, PMK is actively engaged in a wide range of socio-economic development initiatives, including education, community-based healthcare, cultural and sports development, and various social welfare programs. The organization has also established the PMK Nursing College and the 50-bed PMK Hospital & Diagnostic Centre, both of which have earned a strong reputation for excellence in healthcare education and medical services.
                </p>

                <p>
                    Applications are invited from qualified and motivated candidates for the following position.
                </p>
            </div>

            <!-- vacancy info table::Position & Salary Overview -->
            <div class="vacancy-info-table">
                <h4 class="vacancy-info-title">
                    Position & Salary Overview
                </h4>
                <table>
                    <thead>
                        <tr>
                            <th>Available Position</th>
                            <th>Probation Salary</th>
                            <th>Gross Salary</th>
                            <th>Application Deadline</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Available Position">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                </svg>
                                <?php echo $available_position; ?>
                            </td>
                            <td data-label="Probation Salary">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-coin-taka">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 8l.553 -.276a1 1 0 0 1 1.447 .894v6.382a2 2 0 0 0 2 2h.5a2.5 2.5 0 0 0 2.5 -2.5v-.5h-1" />
                                    <path d="M8 11h7" />
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                </svg>
                                <?php echo "$probation_salary/="; ?>
                            </td>
                            <td data-label="Gross Salary">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-coin-taka">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 8l.553 -.276a1 1 0 0 1 1.447 .894v6.382a2 2 0 0 0 2 2h.5a2.5 2.5 0 0 0 2.5 -2.5v-.5h-1" />
                                    <path d="M8 11h7" />
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                </svg>
                                <?php echo "$gross_salary/="; ?>
                            </td>
                            <td data-label="Application Deadline">
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
                                <?php echo $application_deadline; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Age Requirement -->
            <div class="vacancy-info">
                <h4 class="vacancy-info-title">
                    Age Requirement
                </h4>
                <p class="vacancy-info-description">
                    <?php echo "$min_age – $max_age years (as of $age_deadline)";  ?>
                </p>
            </div>

            <!-- Educational Requirements -->
            <div class="vacancy-info">
                <h4 class="vacancy-info-title">
                    Educational Requirements
                </h4>
                <p class="vacancy-info-description">
                    <?php echo $qualification; ?>
                </p>
            </div>

            <!-- Experience Requirements -->
            <div class="vacancy-info">
                <h4 class="vacancy-info-title">
                    Experience Requirements
                </h4>
                <p class="vacancy-info-description">
                    <?php echo $experience; ?>
                </p>
            </div>

            <!-- Skill Required -->
            <div class="vacancy-info">
                <h4 class="vacancy-info-title">
                    Skill Required
                </h4>
                <p class="vacancy-info-description">
                    <?php echo $additional_requirement; ?>
                </p>
            </div>

            <!-- Training -->
            <div class="vacancy-info">
                <h4 class="vacancy-info-title">
                    Training
                </h4>
                <p class="vacancy-info-description">
                    <?php echo $training_rules; ?>
                </p>
            </div>

            <!-- Minimum Service Commitment -->
            <div class="vacancy-info">
                <h4 class="vacancy-info-title">
                    Minimum Service Commitment
                </h4>
                <p class="vacancy-info-description">
                    Candidates selected for appointment must commit to serving the organization for a minimum period of six (6) months.
                </p>
            </div>

            <!-- Registration Fee -->
            <div class="vacancy-info">
                <h4 class="vacancy-info-title">
                    Registration Fee
                </h4>
                <p class="vacancy-info-description">
                    Applicants are required to pay a non-refundable registration fee of BDT 200 to participate in the recruitment examination.
                </p>
            </div>

            <!-- Security Deposit -->
            <div class="vacancy-info">
                <h4 class="vacancy-info-title">
                    Security Deposit
                </h4>
                <p class="vacancy-info-description">
                    At the time of joining, candidates must deposit an amount equivalent to one month's gross salary (payable after confirmation of employment) as a security deposit. This amount will be refundable, together with the applicable profit/interest, upon separation from the organization in accordance with its policies.
                </p>
            </div>

            <!-- Other Conditions -->
            <div class="vacancy-info">
                <h4 class="vacancy-info-title">
                    Other Conditions
                </h4>
                <ul class="vacancy-info-list">
                    <li>
                        No Travel Allowance (TA) or Daily Allowance (DA) will be provided for attending the recruitment examination.
                    </li>
                    <li>
                        Applicants must be physically fit, hardworking, courageous, willing to take on challenges, honest, and of good moral character. They must also be willing to work in any operational area of the organization across the country.
                    </li>
                    <li>
                        Any form of recommendation or undue influence regarding recruitment or posting will result in the candidate's disqualification.
                    </li>
                    <li>
                        The organization is committed to providing equal employment opportunities to qualified male and female candidates.
                    </li>
                    <li>
                        Smokers are discouraged from applying.
                    </li>
                </ul>
            </div>

            <!-- Benefits -->
            <div class="vacancy-info">
                <h4 class="vacancy-info-title">
                    Probation and Benefit
                </h4>

                <p class="vacancy-info-description">
                    Upon appointment, the selected candidate will undergo a six (6)-month probationary period. Subject to satisfactory performance during the probation, the candidate will be confirmed as a permanent employee and will be entitled to the organization's regular salary structure and benefits, including:
                </p>

                <ul class="vacancy-info-list">
                    <li>Provident Fund (PF)</li>
                    <li>Gratuity</li>
                    <li>Two festival bonuses per year</li>
                    <li>Boishakhi Allowance equivalent to 50% of the basic salary</li>
                    <li>Encashment of eligible unutilized leave at the end of each year, in accordance with organizational policy</li>
                    <li>An annual salary increment of 10%, subject to the organization's rules and regulations</li>
                </ul>
            </div>

            <!--additional Benefits -->
            <div class="vacancy-info">
                <h4 class="vacancy-info-title">
                    Additional Benefits
                </h4>

                <p class="vacancy-info-description">
                    The organization also provides the following benefits in accordance with its policies:
                </p>

                <ul class="vacancy-info-list">
                    <li>Motorcycle fuel and maintenance allowance for eligible employees</li>
                    <li>Gratuity</li>
                    <li>Free single accommodation for male employees at their assigned duty stations</li>
                    <li>Housing allowance for female employees</li>
                    <li>Two weekly holidays (Friday and Saturday)</li>
                    <li>Other benefits as per the organization's rules and policies</li>
                </ul>
            </div>

            <!-- apply button  -->
            <form class="apply-btn-container" action="" method="post">
                <button type="submit" class="apply-btn" name="applyBtn">Apply Now</button>
            </form>
        </section>
    </main>

    <!-- footer  -->
    <?php include_once("../includes/footer.php") ?>


    <!-- Linked html2canvas and jsPdf script  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <!-- custom script:: html to pdf convert    -->
    <script>
        async function generatePDF() {
            const {
                jsPDF
            } = window.jspdf;
            const element = document.getElementById("pdf-content");
            const canvas = await html2canvas(element, {
                scale: 2
            });
            const imgData = canvas.toDataURL("image/png");
            const pdf = new jsPDF("p", "mm", "a4");
            const margin = 15 * 0.2646;
            const pageWidth = 210;
            const pageHeight = 297;
            const imgWidth = pageWidth - margin * 2;
            const imgHeight = (canvas.height * imgWidth) / canvas.width;
            const pageHeightPx = (pageHeight - margin * 2);
            let renderedHeight = 0;
            let page = 0;
            while (renderedHeight < imgHeight) {
                const sourceY = (renderedHeight * canvas.width) / imgWidth;
                const remainingHeight = imgHeight - renderedHeight;
                const currentPageHeight = Math.min(pageHeightPx, remainingHeight);
                const pageCanvas = document.createElement("canvas");
                const pageCtx = pageCanvas.getContext("2d");
                pageCanvas.width = canvas.width;
                pageCanvas.height = (currentPageHeight * canvas.width) / imgWidth;
                pageCtx.drawImage(canvas, 0, sourceY, canvas.width, pageCanvas.height, 0, 0, canvas.width, pageCanvas.height);
                const pageImg = pageCanvas.toDataURL("image/png");
                if (page > 0) pdf.addPage();
                pdf.addImage(pageImg, "PNG", margin, margin, imgWidth, currentPageHeight);
                renderedHeight += currentPageHeight;
                page++;
            }
            pdf.save("pmk_vacancy_overview.pdf");
        }
    </script>
</body>

</html>