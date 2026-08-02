<?php
// connect database 
require_once("../db/dbconnect.php");
$dbConnection = $conn;

if (isset($_GET['circular_id'])) {
    $circular_id = $_GET['circular_id'];

    // QUERY::
    $get_selected_candidate = "SELECT user_id,candidate_name,fathers_name,mothers_name, profile_picture FROM candidate_general_information WHERE circular_id='$circular_id' && applicant_status = 3";
    $selected_candidate = $dbConnection->query($get_selected_candidate)->fetch_all(MYSQLI_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Check PMK job circular results, exam results, shortlisted candidates, and official recruitment updates in one place.">
    <title>PMK | Circular Result</title>

    <!-- Linked shared  -->
    <?php include_once("../includes/sharedLinks.php"); ?>

    <!-- Linked custom stylesheet  -->
    <link rel="stylesheet" href="../styles/result_table.css">
</head>

<body>
    <!-- includes: Navbar  -->
    <?php include_once('../includes/navbar.php')
    ?>

    <!-- section:: header -->
    <header>
        <div class="container-width">
            <hgroup class="result-header">
                <h3 class="result-header-title">
                    Result: Branch Manager
                </h3>
                <p class="result-header-text">
                    Congratulations to all successful candidates. Find your name in the list below to check your result.
                </p>
            </hgroup>
        </div>
    </header>


    <!-- section:: main container  -->
    <main>
        <div class="container-width">
            <section class="panel-main-container">
                <h4 class="panel-label">Selected Candidates</h4>
                <div class="table-wrapper">
                    <table class="panel-table">
                        <thead class="panel-table-head">
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Father's Name</th>
                                <th>Mother's Name</th>
                                <th>Address</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="applied_list_tbody" class="panel-table-body">
                            <?php
                            $count = 1;
                            foreach ($selected_candidate as $candidate) {

                                // QUERY:: Get address 
                                $get_permanent_address = "SELECT per_house,per_division,per_district,per_upazilla,per_post,per_post_code FROM candidate_address WHERE user_id = '$candidate[user_id]'";
                                $candidate_address = $dbConnection->query($get_permanent_address)->fetch_assoc();

                            ?>
                                <tr>
                                    <td>
                                        <span class='circular-id'>
                                            <?php echo $count++; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <figure class="candidate-image">
                                            <img src="https://careers.pmk-bd.org/assets/candidate_picture/<?php echo $candidate['profile_picture'] ?>"
                                                alt="<?php echo $candidate['candidate_name'] ?>">
                                        </figure>
                                    </td>
                                    <td>
                                        <span class='item-title'>
                                            <?php echo $candidate['candidate_name'] ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class='open-position'>
                                            <?php echo $candidate['fathers_name'] ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div>
                                            <span class='open-position'>
                                                <?php echo $candidate['mothers_name'] ?>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <span class='open-position address'>
                                                <?php echo $candidate_address['per_house'] ?>
                                                Upazila: <?php echo $candidate_address['per_upazilla'] ?>,
                                                Post: <?php echo $candidate_address['per_post'] ?>
                                                -
                                                <?php echo $candidate_address['per_post_code'] ?>,
                                                District: <?php echo $candidate_address['per_district'] ?>,
                                                Division: <?php echo $candidate_address['per_division'] ?>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class='circular-status cs-active'>Selected</span>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>

    <!-- includes: Navbar  -->
    <?php include_once('../includes/footer.php') ?>
</body>

</html>