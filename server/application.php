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

    // create file name 
    $fileName = 'candidate_' . $userPhoneNumber . '.' . $pictureExe;
    $fileDestination = $pictureUploadDir . $fileName;

    // upload file 
    if (move_uploaded_file($_FILES["empl_picture"]["tmp_name"], $fileDestination)) {
        $candidate_picture = $fileName;
    }
}


// start transaction 
mysqli_begin_transaction($dbConnection);

try {

    // step - 1:: personal
    $candidate_name = clean($dbConnection, $_POST['candidate_name'] ?? '');
    $fathers_name = clean($dbConnection, $_POST['fathers_name'] ?? '');
    $mothers_name = clean($dbConnection, $_POST['mothers_name'] ?? '');
    $religion = clean($dbConnection, $_POST['religion'] ?? '');
    $gender = clean($dbConnection, $_POST['gender'] ?? '');
    $merital_status = clean($dbConnection, $_POST['merital_status'] ?? '');
    $blood_group = clean($dbConnection, $_POST['blood_group'] ?? '');

    $candidate_general_query = $dbConnection->prepare("INSERT INTO 	candidate_general_information (user_id,candidate_name,fathers_name,mothers_name,religion,gender,marital_status,blood_group,profile_picture) VALUES(?,?,?,?,?,?,?,?,?)");

    $candidate_general_query->bind_param(
        "sssssssss",
        $userId,
        $candidate_name,
        $fathers_name,
        $mothers_name,
        $religion,
        $gender,
        $merital_status,
        $blood_group,
        $candidate_picture
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

    $candidateIdentityQuery = $dbConnection->prepare("INSERT INTO candidate_identity (user_id,national_id,birth_id,passport_no,driving_license,tin_no,mobile_no,email_id,nationality,date_of_birth) VALUES (?,?,?,?,?,?,?,?,?,?)
    ");

    $candidateIdentityQuery->bind_param(
        "ssssssssss",
        $userId,
        $national_id,
        $birth_id,
        $passport_no,
        $driving_license,
        $tin_no,
        $mobile_no,
        $email_id,
        $nationality,
        $date_of_birth
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


    $candidateAddressQuery = $dbConnection->prepare("INSERT INTO candidate_address (user_id,per_house,per_division,per_district,per_upazilla,per_post,per_post_code,pre_house,pre_division,pre_district,pre_upazilla,pre_post,pre_post_code) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $candidateAddressQuery->bind_param(
        "sssssssssssss",
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
        $pre_post_code
    );

    $outComeCandidateAddressQuery = $candidateAddressQuery->execute();

    if (!$outComeCandidateAddressQuery) {
        throw new Exception("step-3(Address) Error:" . $candidateAddressQuery->error);
    }


    //ste-4 education (multi rows )
    if (!empty($_POST["education"]) && is_array($_POST["education"])) {
        foreach ($_POST["education"] as $edu) {
            $candidate_edu_exam = clean($dbConnection, $edu["examination"] ?? "");
            $candidate_edu_institute = clean($dbConnection, $edu["institution"] ?? "");
            $candidate_edu_subject = clean($dbConnection, $edu["major_subject"] ?? "");
            $candidate_edu_university = clean($dbConnection, $edu["board_university"] ?? "");
            $candidate_edu_academic_year = clean($dbConnection, $edu["academic_year"] ?? "");
            $candidate_edu_result = clean($dbConnection, $edu["result"] ?? "");

            $candidateEducationQuery = $dbConnection->prepare("INSERT INTO candidate_education (user_id,edu_examination,edu_institution,edu_msubject,board_university,academic_year,result) VALUES (?,?,?,?,?,?,?)");

            $candidateEducationQuery->bind_param(
                "sssssss",
                $userId,
                $candidate_edu_exam,
                $candidate_edu_institute,
                $candidate_edu_subject,
                $candidate_edu_university,
                $candidate_edu_academic_year,
                $candidate_edu_result
            );

            $outComeCandidateEducationQuery = $candidateEducationQuery->execute();

            if (!$outComeCandidateEducationQuery) {
                throw new Exception(("Step-4(EDUCATION) Error:" . $candidateEducationQuery->error));
            }
        }
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

            $candidateTrainingQuery = $dbConnection->prepare("INSERT INTO candidate_training (user_id,course_name,course_stard_date,course_end_date,course_duration,institution_name,institution_address,result)  VALUES (?,?,?,?,?,?,?,?)");

            $candidateTrainingQuery->bind_param(
                "ssssssss",
                $userId,
                $candidate_course_name,
                $candidate_course_start_date,
                $candidate_course_end_date,
                $candidate_course_duration,
                $candidate_institution_name,
                $candidate_institution_address,
                $candidate_course_result

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

            $candidateJobExpQuery = $dbConnection->prepare("INSERT INTO candidate_job_experience (user_id,org_name,project_name,company_location,from_date,to_date,job_respons) VALUES (?,?,?,?,?,?,?)");

            $candidateJobExpQuery->bind_param(
                "sssssss",
                $userId,
                $candidate_org_name,
                $candidate_prev_designation,
                $candidate_company_location,
                $candidate_org_form_date,
                $candidate_org_to_date,
                $candidate_org_responsibility
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
