<?php

// start session 
session_start();

// connect database 
require_once("../db/dbconnect.php");
$dbConnection = $conn;

header("Content-Type: application/json");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// user info from session 
$userId = $_SESSION["user"]["userId"] ?? null;
$userEmail = $_SESSION["user"]["userEmail"] ?? null;
$userPhoneNumber = $_SESSION["user"]["userPhoneNumber"] ?? null;


// log in check 
if (!$userEmail) {
    echo json_encode([
        "success" => false,
        "message" => "Please Login & try again..."
    ]);
    exit();
}

// only accept POST method 
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(['success' => false, 'message' => "Invalid request method"]);
    exit();
}

// ══════════════════════════════════════════════
//  HELPER: sanitize text input
// ══════════════════════════════════════════════
function clean($conn, $val)
{
    return mysqli_real_escape_string($conn, trim($val ?? ''));
}

// ══════════════════════════════════════════════
//  HELPER: sanitize numeric/decimal input
//  Empty values become '0' instead of '' so MySQL
//  decimal columns never reject the insert.
// ══════════════════════════════════════════════
function cleanNumber($conn, $val)
{
    $val = trim($val ?? '');
    return ($val === '') ? '0' : mysqli_real_escape_string($conn, $val);
}

function nullOrVal($val)
{
    return ($val === '' || $val === null) ? null : $val;
}


// handle picture upload 
$candidate_picture = "";
if (isset($_FILES["empl_picture"]) && $_FILES['empl_picture']['error'] === UPLOAD_ERR_OK) {

    // upload directory create and validation 
    $pictureUploadDir = "../assets/candidate_picture/";
    if (!is_dir($pictureUploadDir)) {
        mkdir($pictureUploadDir, 0755, true);
    }

    // validate the file extension 
    $pictureExe = strtolower(pathinfo($_FILES["empl_picture"]["name"], PATHINFO_EXTENSION));
    $allowedExe = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (!in_array($pictureExe, $allowedExe)) {
        echo json_encode(
            [
                "success" => false,
                "message" => 'Invalid picture format. Allowed: JPG, PNG, GIF, WEBP.'
            ]
        );

        exit();
    }

    // validate the image size  300 * 300
    $pictureInfo = getimagesize($_FILES["empl_picture"]["tmp_name"]);

    if (!$pictureInfo) {
        echo json_encode(
            [
                "success" => false,
                "message" => 'Invalid picture.'
            ]
        );
        exit();
    }

    $pictureWidth = $pictureInfo[0];
    $pictureHeight = $pictureInfo[1];

    if ($pictureHeight > 300 || $pictureWidth > 300) {
        echo json_encode(
            [
                "success" => false,
                "message" => 'The Photo must be 300 × 300 pixels or smaller.'
            ]
        );
        exit();
    }

    // create file name 
    $fileName = 'candidate_' . $userPhoneNumber . '.' . $pictureExe;
    $fileDestination = $pictureUploadDir . $fileName;

    // upload file 
    if (move_uploaded_file($_FILES["empl_picture"]["tmp_name"], $fileDestination)) {
        $candidate_picture = $fileName;
    }
}

// handle signature upload 
$candidate_signature = "";
if (isset($_FILES["empl_signature"]) && $_FILES['empl_signature']['error'] === UPLOAD_ERR_OK) {

    // upload directory create and validation 
    $pictureUploadDir = "../assets/candidate_signature/";
    if (!is_dir($pictureUploadDir)) {
        mkdir($pictureUploadDir, 0755, true);
    }

    // validate the file extension 
    $pictureExe = strtolower(pathinfo($_FILES["empl_signature"]["name"], PATHINFO_EXTENSION));
    $allowedExe = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (!in_array($pictureExe, $allowedExe)) {
        echo json_encode(
            [
                "success" => false,
                "message" => 'Invalid sign picture format. Allowed: JPG, PNG, GIF, WEBP.'
            ]
        );

        exit();
    }

    // validate the image size  80 * 80
    $signPicInfo = getimagesize($_FILES["empl_signature"]["tmp_name"]);

    if (!$signPicInfo) {
        echo json_encode(
            [
                "success" => false,
                "message" => 'Invalid picture.'
            ]
        );
        exit();
    }

    $signPicWidth = $signPicInfo[0];
    $signPicHeight = $signPicInfo[1];

    if ($signPicHeight > 80 || $signPicWidth > 80) {
        echo json_encode(
            [
                "success" => false,
                "message" => 'The signature image must be 80 × 80 pixels or smaller.'
            ]
        );
        exit();
    }

    // create file name 
    $fileName = 'candidate_signature_' . $userPhoneNumber . '.' . $pictureExe;
    $fileDestination = $pictureUploadDir . $fileName;

    // upload file 
    if (move_uploaded_file($_FILES["empl_signature"]["tmp_name"], $fileDestination)) {
        $candidate_signature = $fileName;
    }
}


// start transaction 
mysqli_begin_transaction($dbConnection);

try {

    // circular related 
    // $application_id = clean($dbConnection, $_POST['application_id'] ?? '');
    $circular_id = clean($dbConnection, $_POST['circular_id'] ?? '');

    // step - 1:: personal
    $candidate_name = clean($dbConnection, $_POST['candidate_name'] ?? '');
    $fathers_name = clean($dbConnection, $_POST['fathers_name'] ?? '');
    $mothers_name = clean($dbConnection, $_POST['mothers_name'] ?? '');
    $religion = clean($dbConnection, $_POST['religion'] ?? '');
    $gender = clean($dbConnection, $_POST['gender'] ?? '');
    $merital_status = clean($dbConnection, $_POST['merital_status'] ?? '');
    $blood_group = clean($dbConnection, $_POST['blood_group'] ?? '');


    // Validate Required Field 
    // Candidate Name 
    if (empty($candidate_name)) {
        throw new Exception('Candidate Name is Required');
    }
    // fathers Name 
    if (empty($fathers_name)) {
        throw new Exception('Fathers Name is Required');
    }
    // Mothers Name 
    if (empty($mothers_name)) {
        throw new Exception('Mothers Name is Required');
    }
    // religion 
    if (empty($religion)) {
        throw new Exception('Religion is Required');
    }
    // Candidate gender 
    if (empty($gender)) {
        throw new Exception('Gender is Required');
    }
    // merital_status 
    if (empty($merital_status)) {
        throw new Exception('Marital Status is Required');
    }
    // blood group 
    if (empty($blood_group)) {
        throw new Exception('Blood Group is Required');
    }

    // candidate picture  
    if (empty($candidate_picture)) {
        throw new Exception('Candidate Picture is Required');
    }

    // candidate signature  
    if (empty($candidate_signature)) {
        throw new Exception('Candidate signature is Required');
    }

    $candidate_general_query = $dbConnection->prepare("INSERT INTO 	candidate_general_information (user_id,candidate_name,fathers_name,mothers_name,religion,gender,marital_status,blood_group,profile_picture,circular_id,signature) VALUES(?,?,?,?,?,?,?,?,?,?,?)");

    $candidate_general_query->bind_param(
        "sssssssssss",
        $userId,
        $candidate_name,
        $fathers_name,
        $mothers_name,
        $religion,
        $gender,
        $merital_status,
        $blood_group,
        $candidate_picture,
        $circular_id,
        $candidate_signature
    );

    $outComeOfCandidateGeneralQuery = $candidate_general_query->execute();

    if (!$outComeOfCandidateGeneralQuery) {
        throw new Exception('Step 1 (personal) Error:' .  $candidate_general_query->error);
    }

    // step-2  Identification
    $national_id = clean($dbConnection, $_POST['national_id'] ?? '');
    $birth_id = clean($dbConnection, $_POST['birth_id'] ?? '');
    $passport_no = clean($dbConnection, $_POST['passport_no'] ?? '');
    $driving_license = clean($dbConnection, $_POST['driving_license'] ?? '');
    $tin_no = clean($dbConnection, $_POST['tin_no'] ?? '');
    $mobile_no = clean($dbConnection, $_POST['mobile_no'] ?? '');
    $email_id = clean($dbConnection, $_POST['email_id'] ?? '');
    $nationality = clean($dbConnection, $_POST['nationality'] ?? '');
    $date_of_birth = clean($dbConnection, $_POST['date_of_birth'] ?? '');

    // validate the NID 
    if (empty($national_id)) {
        throw new Exception('NID is Required');
    }

    if (strlen($national_id) !== 10 && strlen($national_id) !== 17) {
        throw new Exception('NID Must 10 or 17 digit');
    }

    // mobile number
    if (empty($mobile_no)) {
        throw new Exception('Mobile Number is Required');
    }

    // email
    if (empty($email_id)) {
        throw new Exception('Email Address is Required');
    }

    //nationality
    if (empty($nationality)) {
        throw new Exception('Nationality is Required');
    }

    // birth date
    if (empty($date_of_birth)) {
        throw new Exception('Birth Date is Required');
    }

    $candidateIdentityQuery = $dbConnection->prepare("INSERT INTO candidate_identity (user_id,national_id,birth_id,passport_no,driving_license,tin_no,mobile_no,email_id,nationality,date_of_birth,circular_id) VALUES (?,?,?,?,?,?,?,?,?,?,?)
    ");

    $candidateIdentityQuery->bind_param(
        "sssssssssss",
        $userId,
        $national_id,
        $birth_id,
        $passport_no,
        $driving_license,
        $tin_no,
        $mobile_no,
        $email_id,
        $nationality,
        $date_of_birth,
        $circular_id
    );

    $outComeCandidateIdentityQuery = $candidateIdentityQuery->execute();
    if (!$outComeCandidateIdentityQuery) {
        throw new Exception('Step-2 (identity) Error:' . $candidateIdentityQuery->error);
    }

    // step-3 (address )
    $per_house = clean($dbConnection, $_POST['per_house'] ?? '');
    $per_division = clean($dbConnection, $_POST['per_division'] ?? '');
    $per_district = clean($dbConnection, $_POST['per_district'] ?? '');
    $per_upazilla = clean($dbConnection, $_POST['per_upazilla'] ?? '');
    $per_post = clean($dbConnection, $_POST['per_post'] ?? '');
    $per_post_code = clean($dbConnection, $_POST['per_post_code'] ?? '');
    $pre_house = clean($dbConnection, $_POST['pre_house'] ?? '');
    $pre_division = clean($dbConnection, $_POST['pre_division'] ?? '');
    $pre_district = clean($dbConnection, $_POST['pre_district'] ?? '');
    $pre_upazilla = clean($dbConnection, $_POST['pre_upazilla'] ?? '');
    $pre_post = clean($dbConnection, $_POST['pre_post'] ?? '');
    $pre_post_code = clean($dbConnection, $_POST['pre_post_code'] ?? '');


    // permanent house
    if (empty($per_house)) {
        throw new Exception('Permanent House is Required');
    }

    // permanent Division
    if (empty($per_division)) {
        throw new Exception('Permanent Division is Required');
    }

    // permanent District
    if (empty($per_district)) {
        throw new Exception('Permanent District is Required');
    }

    // permanent upazila
    if (empty($per_upazilla)) {
        throw new Exception('Permanent Upazila is Required');
    }

    // permanent Post office
    if (empty($per_post)) {
        throw new Exception('Permanent Post Office is Required');
    }

    // permanent Post Office Code
    if (empty($per_post_code)) {
        throw new Exception('Permanent Post Office Code is Required');
    }

    // Present house
    if (empty($pre_house)) {
        throw new Exception('Present House is Required');
    }

    // Present Division
    if (empty($pre_division)) {
        throw new Exception('Present Division is Required');
    }

    // Present District
    if (empty($pre_district)) {
        throw new Exception('Present District is Required');
    }

    // Present upazila
    if (empty($pre_upazilla)) {
        throw new Exception('Present Upazila is Required');
    }

    // Present Post office
    if (empty($pre_post)) {
        throw new Exception('Present Post Office is Required');
    }

    // Present Post Office Code
    if (empty($pre_post_code)) {
        throw new Exception('Present Post Office Code is Required');
    }


    $candidateAddressQuery = $dbConnection->prepare("INSERT INTO candidate_address (user_id,per_house,per_division,per_district,per_upazilla,per_post,per_post_code,pre_house,pre_division,pre_district,pre_upazilla,pre_post,pre_post_code,circular_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $candidateAddressQuery->bind_param(
        "sssssssssssssss",
        $userId,
        $per_house,
        $per_division,
        $per_district,
        $per_upazilla,
        $per_post,
        $per_post_code,
        $pre_house,
        $pre_division,
        $pre_district,
        $pre_upazilla,
        $pre_post,
        $pre_post_code,
        $circular_id
    );

    $outComeCandidateAddressQuery = $candidateAddressQuery->execute();

    if (!$outComeCandidateAddressQuery) {
        throw new Exception("step-3(Address) Error:" . $candidateAddressQuery->error);
    }

    // validation:: gratulation 
    $isGraduated = false;
    //ste-4 education (multi rows )
    if (!empty($_POST["education"]) && is_array($_POST["education"])) {
        // check is graduated or not 
        foreach ($_POST["education"] as $edu) {
            $candidate_gradu_edu_exam = clean($dbConnection, $edu["examination"] ?? "");

            if (
                strcasecmp($candidate_gradu_edu_exam, "Bachelors") === 0 ||
                strcasecmp($candidate_gradu_edu_exam, "Masters") === 0 ||
                strcasecmp($candidate_gradu_edu_exam, "PhD") === 0
            ) {
                $isGraduated = true;
                break;
            }
        }

        if (!$isGraduated) {
            throw new Exception("You must have at least one Bachelor's or Master's or PhD degree.");
        }


        //    insert education data 
        foreach ($_POST["education"] as $edu) {
            $candidate_edu_exam = clean($dbConnection, $edu["examination"] ?? "");
            $candidate_edu_institute = clean($dbConnection, $edu["institution"] ?? "");
            $candidate_edu_subject = clean($dbConnection, $edu["major_subject"] ?? "");
            $candidate_edu_university = clean($dbConnection, $edu["board_university"] ?? "");
            $candidate_edu_academic_year = clean($dbConnection, $edu["academic_year"] ?? "");
            $candidate_edu_result = clean($dbConnection, $edu["result"] ?? "");

            $candidateEducationQuery = $dbConnection->prepare("INSERT INTO candidate_education (user_id,edu_examination,edu_institution,edu_msubject,board_university,academic_year,result,circular_id) VALUES (?,?,?,?,?,?,?,?)");

            $candidateEducationQuery->bind_param(
                "sssssssss",
                $userId,
                $candidate_edu_exam,
                $candidate_edu_institute,
                $candidate_edu_subject,
                $candidate_edu_university,
                $candidate_edu_academic_year,
                $candidate_edu_result,
                $circular_id
            );

            $outComeCandidateEducationQuery = $candidateEducationQuery->execute();

            if (!$outComeCandidateEducationQuery) {
                throw new Exception(("Step-4(EDUCATION) Error:" . $candidateEducationQuery->error));
            }
        }
    } else {
        throw new Exception("Education information is required.");
    }

    // step-5 training (multi rows )
    if (!empty($_POST["training"]) && is_array($_POST["training"])) {
        foreach ($_POST["training"] as $training) {
            $candidate_course_name = clean($dbConnection, $training["course_name"] ?? "");
            $candidate_course_start_date = clean($dbConnection, $training["course_stard_date"] ?? "");
            $candidate_course_end_date = clean($dbConnection, $training["course_end_date"] ?? "");
            $candidate_course_duration = clean($dbConnection, $training["course_duration"] ?? "");
            $candidate_institution_name = clean($dbConnection, $training["institution_name"] ?? "");
            $candidate_institution_address = clean($dbConnection, $training["institution_address"] ?? "");
            $candidate_course_result = clean($dbConnection, $training["result"] ?? "");

            $candidateTrainingQuery = $dbConnection->prepare("INSERT INTO candidate_training (user_id,course_name,course_stard_date,course_end_date,course_duration,institution_name,institution_address,result,circular_id)  VALUES (?,?,?,?,?,?,?,?,?)");

            $candidateTrainingQuery->bind_param(
                "sssssssss",
                $userId,
                $candidate_course_name,
                $candidate_course_start_date,
                $candidate_course_end_date,
                $candidate_course_duration,
                $candidate_institution_name,
                $candidate_institution_address,
                $candidate_course_result,
                $circular_id

            );

            $outComeCandidateTrainingQuery = $candidateTrainingQuery->execute();

            if (!$outComeCandidateTrainingQuery) {
                throw new Exception(("Step-5 (Training) Error:" . $candidateTrainingQuery->error));
            }
        }
    }


    // step-6 job experience (multi row )
    if (!empty($_POST["experience"]) && is_array($_POST["experience"])) {
        foreach ($_POST["experience"] as $jobExp) {
            $candidate_org_name = clean($dbConnection, $jobExp["org_name"] ?? "");
            $candidate_prev_designation = clean($dbConnection, $jobExp["project_name"] ?? "");
            $candidate_company_location = clean($dbConnection, $jobExp["company_location"] ?? "");
            $candidate_org_form_date = clean($dbConnection, $jobExp["from_date"] ?? "");
            $candidate_org_to_date = clean($dbConnection, $jobExp["to_date"] ?? "");
            $candidate_org_responsibility = clean($dbConnection, $jobExp["job_respons"] ?? "");

            $candidateJobExpQuery = $dbConnection->prepare("INSERT INTO candidate_job_experience (user_id,org_name,project_name,company_location,from_date,to_date,job_respons,circular_id) VALUES (?,?,?,?,?,?,?,?)");

            $candidateJobExpQuery->bind_param(
                "ssssssss",
                $userId,
                $candidate_org_name,
                $candidate_prev_designation,
                $candidate_company_location,
                $candidate_org_form_date,
                $candidate_org_to_date,
                $candidate_org_responsibility,
                $circular_id
            );

            $outComeCandidateJobExpQuery = $candidateJobExpQuery->execute();
            if (!$outComeCandidateJobExpQuery) {
                throw new Exception(("Step-6 (Job Experience) Error:" . $candidateJobExpQuery->error));
            }
        }
    }

    // all is ok the commit 
    mysqli_commit($dbConnection);

    // return json 
    echo json_encode([
        'success' => true,
        'message' => 'Your application has been successfully submitted to Palli Mongal Karmosuchi (PMK).',
    ]);
} catch (Exception $e) {
    // rollback everything if any step failed 
    mysqli_rollback($dbConnection);

    error_log('Application Submit Error: ' . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' =>  $e->getMessage(),
    ]);
}

// close the database connection  
mysqli_close($dbConnection);
