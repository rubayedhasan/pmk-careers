<?php
$userId = $_SESSION["user"]["userId"] ?? null;
$userPhone =  $_SESSION["user"]["userPhoneNumber"] ?? null;
$userEmail =  $_SESSION["user"]["userEmail"] ?? null;


// connect database 
require_once("../db/dbconnect.php");
$dbConnection = $conn;

// user name query 
$userNameArr = $dbConnection->query("SELECT user_name FROM signup_user WHERE user_id = '$userId'")->fetch_assoc();

// QUERY:: general information 
$get_generalInfo_query = "SELECT * FROM candidate_general_information WHERE user_id = '$userId'";
$general_info = $dbConnection->query($get_generalInfo_query)->fetch_assoc();

// QUERY:: identity 
$get_identity_query = "SELECT * FROM candidate_identity WHERE user_id = '$userId'";
$identity = $dbConnection->query($get_identity_query)->fetch_assoc();

// QUERY:: address 
$get_address_query = "SELECT * FROM candidate_address WHERE user_id = '$userId'";
$address = $dbConnection->query($get_address_query)->fetch_assoc();

// QUERY:: education 
$get_education_query = "SELECT * FROM candidate_education WHERE user_id = '$userId'";
$education = $dbConnection->query($get_education_query)->fetch_all(MYSQLI_ASSOC);

// QUERY:: training 
$get_training_query = "SELECT * FROM candidate_training WHERE user_id = '$userId'";
$training = $dbConnection->query($get_training_query)->fetch_all(MYSQLI_ASSOC);

// QUERY:: job experience 
$get_jobExp_query = "SELECT * FROM candidate_job_experience WHERE user_id = '$userId'";
$jobExp = $dbConnection->query($get_jobExp_query)->fetch_all(MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Manage your PMK profile, update personal information, view application status, and keep your account details accurate and secure.">
    <title>PMK | Profile</title>
    <!-- Linked favicon  -->
    <link rel="shortcut icon" href="../assets/logo/main-logo.png" type="image/x-icon">

    <!-- Linked custom stylesheet  -->
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/user_profile.css">

</head>

<body>
    <!-- section:: main  -->
    <main>
        <!-- section:: main-page (A4 size)  -->
        <section id="main-page">
            <!-- sub-section:: profile aside  -->
            <aside class="profile-aside">
                <!-- profile image  -->
                <figure class="profile-picture">
                    <img src="https://careers.pmk-bd.org/assets/candidate_picture/<?php echo $general_info['profile_picture'] ?? ''; ?>"
                        alt="<?php echo $general_info['candidate_name'] ?? ''; ?>">

                    <!-- <img src="../assets/images/profile_pic_ai.jpeg" alt=""> -->
                </figure>
                <h2 class="user-name">
                    <?php echo $userNameArr['user_name']; ?>
                </h2>

                <!-- contact  -->
                <div class="profile-info">
                    <h4 class="profile-info-label">Contact</h4>

                    <!-- phone  -->
                    <div class="info">
                        <div class="info-label">
                            <span class="info-label-text">Phone</span>
                        </div>
                        <div class="info-value" id="phone">
                            <?php echo $userPhone; ?>
                        </div>
                    </div>

                    <!-- email  -->
                    <div class="info">
                        <div class="info-label">
                            <span class="info-label-text">Email</span>
                        </div>
                        <div class="info-value">
                            <?php echo $userEmail; ?>
                        </div>
                    </div>
                </div>

                <!-- permanent address  -->
                <div class="profile-info">
                    <h4 class="profile-info-label">Permanent address</h4>

                    <!-- address  -->
                    <div class="info">
                        <div class="info-value" style="line-height: 1.5;">
                            <?php echo $address['per_house'] ?? ''; ?>
                            Upazila: <?php echo $address['per_upazilla'] ?? ''; ?>,
                            Post Office: <?php echo $address['per_post'] ?? ''; ?>-<?php echo $address['per_post_code'] ?? ''; ?>,
                            District: <?php echo $address['per_district'] ?? ''; ?>,
                            Division: <?php echo $address['per_division'] ?? ''; ?>
                        </div>
                    </div>
                </div>

                <!-- Present address  -->
                <div class="profile-info">
                    <h4 class="profile-info-label">Present address</h4>

                    <!-- address  -->
                    <div class="info">
                        <div class="info-value" style="line-height: 1.5;">
                            <?php echo $address['pre_house'] ?? ''; ?>
                            Upazila: <?php echo $address['pre_upazilla'] ?? ''; ?>,
                            Post Office: <?php echo $address['pre_post'] ?? ''; ?>-<?php echo $address['pre_post_code'] ?? ''; ?>,
                            District: <?php echo $address['pre_district'] ?? ''; ?>,
                            Division: <?php echo $address['pre_division'] ?? ''; ?>
                        </div>
                    </div>
                </div>

                <!-- signature  -->
                <div class="profile-info">
                    <h4 class="profile-info-label">Signature</h4>

                    <!-- address  -->
                    <div class="info">
                        <figure class="signature">
                            <img src="https://careers.pmk-bd.org/assets/candidate_signature/<?php echo $general_info['signature'] ?? ''; ?>" alt="signature">
                        </figure>

                        <h5 class="signature-name">
                            <?php echo $general_info['candidate_name'] ?? ''; ?>
                        </h5>
                    </div>
                </div>


            </aside>

            <!-- sub-section:: profile main content  -->
            <div class="profile-content">

                <!-- personal info  -->
                <div class="profile-content-info">
                    <h4 class="content-info-label">Personal details</h4>

                    <!-- Father Name  -->
                    <div class="data">
                        <div class="data-label">
                            <span class="data-label-text">Father's Name:</span>
                        </div>
                        <div class="data-info-value">
                            <?php echo $general_info['fathers_name'] ?? ''; ?>
                        </div>
                    </div>

                    <!-- Mother Name  -->
                    <div class="data" style="margin-top: 6px;">
                        <div class="data-label">
                            <span class="data-label-text">Mother's Name:</span>
                        </div>
                        <div class="data-info-value">
                            <?php echo $general_info['mothers_name'] ?? ''; ?>
                        </div>
                    </div>

                    <!-- identity  -->
                    <div class="data-container">
                        <!-- date of birth  -->
                        <div class="data">
                            <div class="data-label">
                                <span class="data-label-text">Date of Birth:</span>
                            </div>
                            <div class="data-value">
                                <?php echo $identity['date_of_birth'] ?? ''; ?>
                            </div>
                        </div>
                        <!-- Gender -->
                        <div class="data">
                            <div class="data-label">
                                <span class="data-label-text">Gender:</span>
                            </div>
                            <div class="data-value">
                                <?php echo $general_info['gender'] ?? ''; ?>
                            </div>
                        </div>
                        <!-- Marital status -->
                        <div class="data">
                            <div class="data-label">
                                <span class="data-label-text">Marital status:</span>
                            </div>
                            <div class="data-value">
                                <?php echo $general_info['marital_status'] ?? ''; ?>
                            </div>
                        </div>
                        <!-- Religion -->
                        <div class="data">
                            <div class="data-label">
                                <span class="data-label-text">Religion:</span>
                            </div>
                            <div class="data-value">
                                <?php echo $general_info['religion'] ?? ''; ?>
                            </div>
                        </div>
                        <!--  Blood group  -->
                        <div class="data">
                            <div class="data-label">
                                <span class="data-label-text"> Blood group:</span>
                            </div>
                            <div class="data-value">
                                <?php echo $general_info['blood_group'] ?? ''; ?>
                            </div>
                        </div>
                        <!-- Nationality -->
                        <div class="data">
                            <div class="data-label">
                                <span class="data-label-text">Nationality:</span>
                            </div>
                            <div class="data-value">
                                <?php echo $identity['nationality'] ?? ''; ?>
                            </div>
                        </div>
                        <!-- NID -->
                        <div class="data">
                            <div class="data-label">
                                <span class="data-label-text">NID:</span>
                            </div>
                            <div class="data-value">
                                <?php echo $identity['national_id'] ?? ''; ?>
                            </div>
                        </div>
                        <!-- Passport No. -->
                        <div class="data">
                            <div class="data-label">
                                <span class="data-label-text">Passport:</span>
                            </div>
                            <div class="data-value">
                                <?php
                                if (!empty($identity['passport_no'])) {
                                    echo $identity['passport_no'];
                                } else {
                                    echo "Not Available";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- education  -->
                <div class="sec">
                    <div class="sec-title">
                        <span class="num">1</span>Education<span class="line"></span>
                    </div>
                    <div class="tl">
                        <?php foreach ($education as $edu) {  ?>

                            <div class="tl-item">
                                <div class="row">
                                    <span class="title"><?php echo stripslashes($edu["edu_examination"]); ?> in <?php echo $edu["edu_msubject"]; ?></span><span class="year"><?php echo $edu["academic_year"]; ?></span>
                                </div>
                                <div class="desc"><?php echo stripslashes($edu["edu_institution"]); ?> — <?php echo $edu["edu_msubject"]; ?></div>
                                <span class="result">CGPA <?php echo $edu["result"]; ?></span>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- training -->
                <div class="sec">
                    <div class="sec-title">
                        <span class="num">2</span>Training &amp; Certifications<span class="line"></span>
                    </div>
                    <div class="tl">
                        <?php if (!empty($training)) { ?>
                            <?php foreach ($training as $tra) { ?>
                                <?php if (!empty($tra['course_name'])) { ?>
                                    <div class="tl-item">
                                        <div class="row">
                                            <span class="title">
                                                <?php echo $tra['course_name']; ?>
                                            </span>
                                            <span class="year">
                                                <?php echo !empty($tra['course_stard_date']) ? date("M Y", strtotime($tra['course_stard_date'])) : "N/A"; ?>
                                                to
                                                <?php echo !empty($tra['course_end_date']) ? date("M Y", strtotime($tra['course_end_date'])) : "Present"; ?>
                                            </span>
                                        </div>
                                        <div class="desc">
                                            <?php echo !empty($tra['institution_name']) ? stripslashes($tra['institution_name']) : "N/A"; ?>
                                            —
                                            <?php echo !empty($tra['course_duration']) ? $tra['course_duration'] : "N/A"; ?>
                                        </div>
                                        <div class="desc">
                                            <?php echo !empty($tra['institution_address']) ? stripslashes($tra['institution_address']) : "N/A"; ?>
                                        </div>
                                        <span class="result">Completed</span>
                                    </div>
                                <?php } else { ?>
                                    <div class="tl-item">
                                        <div class="desc">No training or certification information available.</div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="tl-item">
                                <div class="desc">No training or certification information available.</div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- job experience -->
                <div class="sec">
                    <div class="sec-title">
                        <span class="num">3</span>Job Experience<span class="line"></span>
                    </div>
                    <div class="tl">
                        <?php if (!empty($jobExp)) { ?>
                            <?php foreach ($jobExp as $exp) { ?>
                                <?php if (!empty($exp['project_name'])) { ?>
                                    <div class="tl-item">
                                        <div class="row">
                                            <span class="title">
                                                <?php echo $exp['project_name']; ?>
                                            </span>
                                            <span class="year">
                                                <?php echo !empty($exp['from_date']) ? date("M Y", strtotime($exp['from_date'])) : "N/A"; ?>
                                                to
                                                <?php echo !empty($exp['to_date']) ? date("M Y", strtotime($exp['to_date'])) : "Present"; ?>
                                            </span>
                                        </div>
                                        <div class="desc">
                                            <?php echo !empty($exp['org_name']) ? stripslashes($exp['org_name']) : "N/A"; ?>
                                        </div>
                                        <div class="desc">
                                            <?php echo !empty($exp['company_location']) ? stripslashes($exp['company_location']) : "N/A"; ?>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="tl-item">
                                        <div class="desc">No job experience available.</div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="tl-item">
                                <div class="desc">No job experience available.</div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- additional  -->
                <div class="sec">
                    <div class="sec-title">
                        <span class="num">4</span>Additional<span class="line"></span>
                    </div>
                    <div class="tl">
                        <?php if (!empty($general_info['additonal_information'])) { ?>
                            <div class="tl-item">
                                <div class="desc">
                                    <?php echo  nl2br(htmlspecialchars($general_info['additonal_information'])); ?>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="tl-item">
                                <div class="desc">No Additional Information available.</div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>