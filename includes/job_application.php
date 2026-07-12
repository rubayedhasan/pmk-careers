<?php
session_start();
// connect database 
require_once("../db/dbconnect.php");
$dbConnection = $conn;

// session user data 
$candidateEmail = $_SESSION["user"]["userEmail"] ?? null;
$candidatePhoneNumber = $_SESSION["user"]["userPhoneNumber"] ?? null;

if (isset($_GET["circular_id"])) {
    $circular_id = $_GET["circular_id"];
    $designation_name = $_GET["designation_name"];
}

$currentYear = date("Y");
$candidate_id_prefix = "PMKA";

$queryGetCandidateId = "SELECT application_id FROM candidate_general_information WHERE application_id LIKE '$candidate_id_prefix%' ORDER BY application_id DESC LIMIT 1";
$queryResult = $dbConnection->query($queryGetCandidateId);


if ($queryResult->num_rows > 0) {
    $row = $queryResult->fetch_all(MYSQLI_ASSOC);
    $lastSerial = (int) substr($row[0]["application_id"], -5);
    $nextSerial = $lastSerial + 1;
} else {
    $nextSerial = 1;
}

$applicant_custom_id = $candidate_id_prefix . str_pad($nextSerial, 5, "0", STR_PAD_LEFT);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMK | Application Form</title>
    <!-- Linked favicon  -->
    <link rel="shortcut icon" href="../assets/logo/main-logo.png" type="image/x-icon">
    <!-- Linked bootstrap stylesheet  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Linked Bootstrap Icon Link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Linked custom stylesheet  -->
    <link rel="stylesheet" href="../styles/job_application.css">
</head>

<body>



    <!-- main container  -->
    <div id="mainContent" class="main-content">
        <!-- ═══════════════════════════════ STICKY HEADER ═══════════════════════════════ -->
        <div class="form-header">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="title">
                    <i class="bi bi-person-plus-fill me-2" style="color:var(--brand)"></i>Complete Your Job Application
                </span>
                <div class="d-flex gap-2">
                    <!-- onclick="window.location.href='../index.php'"  -->
                    <button class="btn btn-outline-secondary btn-sm" onclick="handleCancel()">
                        <i class="bi bi-x-lg me-1"></i>Cancel
                    </button>
                    <button class="btn btn-brand btn-sm" onclick="handleSave()">
                        <i class="bi bi-floppy-fill me-1"></i>Apply Now</button>
                </div>
            </div>
            <!-- Step navigation -->
            <div class="step-nav" id="stepNav">
                <button class="step-btn active" data-step="1" onclick="goTo(1)">
                    <span class="step-badge">1</span> Personal
                </button>
                <button class="step-btn" data-step="2" onclick="goTo(2)">
                    <span class="step-badge">2</span> Identification
                </button>
                <button class="step-btn" data-step="3" onclick="goTo(3)">
                    <span class="step-badge">3</span> Address
                </button>
                <button class="step-btn" data-step="4" onclick="goTo(4)">
                    <span class="step-badge">4</span> Education
                </button>
                <button class="step-btn" data-step="5" onclick="goTo(5)">
                    <span class="step-badge">5</span> Training Experience
                </button>
                <button class="step-btn" data-step="6" onclick="goTo(6)">
                    <span class="step-badge">6</span> Job Experience
                </button>
            </div>
        </div>

        <!-- ═══════════════════════════════ MAIN CONTENT ═══════════════════════════════ -->
        <div class="py-4">
            <div class="form-card">
                <div class="p-4">

                    <!-- ───────── STEP 1: Personal ───────── -->
                    <div class="step-panel active" id="step-1">
                        <p class="section-label"><i class="bi bi-person me-2"></i>Step 1 — Personal Information</p>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Application ID</label>
                                <input type="text" name="application_id" class="form-control" value="<?php echo $applicant_custom_id; ?>" style="opacity: 0.6; background: #f8f9fa;" disabled />
                            </div>
                            <div class="col-md-4">3.
                                <label class="form-label">Designation Name</label>
                                <input type="text" name="circular-designation_name" class="form-control" value="<?php echo $designation_name; ?>" style="opacity: 0.6; background: #f8f9fa;" disabled />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Circular ID</label>
                                <input type="text" name="circular_id" class="form-control" value="<?php echo $circular_id; ?>" style="opacity: 0.6; background: #f8f9fa;" disabled />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">
                                    Candidate's Name
                                    <span style="color: red;">*</span>
                                </label>
                                <input type="text" name="candidate_name" class="form-control" placeholder="Candidate's full name" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">
                                    Father's Name
                                    <span style="color: red;">*</span>
                                </label>
                                <input type="text" name="fathers_name" class="form-control" placeholder="Father's full name" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">
                                    Mother's Name
                                    <span style="color: red;">*</span>
                                </label>
                                <input name="mothers_name" type="text" class="form-control" placeholder="Mother's full name" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">
                                    Religion
                                    <span style="color: red;">*</span>
                                </label>
                                <select name="religion" class="form-select">
                                    <option value="">Select religion</option>
                                    <option value="islam">Islam</option>
                                    <option value="hinduism">Hinduism</option>
                                    <option value="christianity">Christianity</option>
                                    <option value="buddhism">Buddhism</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select">
                                    <option value="">Select gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Marital Status</label>
                                <select name="merital_status" class="form-select">
                                    <option value="">Select status</option>
                                    <option value="unmarried">Unmarried</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Blood Group</label>
                                <select name="blood_group" class="form-select">
                                    <option value="">Select blood group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Upload Picture</label>
                                <figure class="upload-picture-container">
                                    <img src="../assets/images/happy-moment.png" alt="candidate upload picture" id="candidate-upload-picture">
                                </figure>
                                <div class="upload-box" onclick="document.getElementById('picUpload').click()">
                                    <i class="bi bi-cloud-arrow-up"></i>
                                    <div class="up-label">Click to upload employee photo</div>
                                    <div class="up-hint">JPG, PNG — max 2 MB</div>
                                </div>
                                <input name="empl_picture" type="file" id="picUpload" accept="image/*" style="display:none"
                                    onchange="showFile(this,'picChosen')" />
                                <div class="file-chosen" id="picChosen"></div>
                            </div>
                        </div>
                    </div>

                    <!-- ───────── STEP 2: Identification ───────── -->
                    <div class="step-panel" id="step-2">
                        <p class="section-label"><i class="bi bi-card-text me-2"></i>Step 2 — Identification Details</p>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">
                                    National ID
                                    <span style="color: red;">*</span>
                                </label>
                                <input type="text" name="national_id" class="form-control" placeholder="NID number" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">
                                    Birth Registration ID
                                    <span style="color: red;">*</span>
                                </label>
                                <input type="text" name="birth_id" class="form-control" placeholder="Birth reg. number" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Passport No.</label>
                                <input type="text" name="passport_no" class="form-control" placeholder="Passport number" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Driving License</label>
                                <input type="text" name="driving_license" class="form-control" placeholder="License number" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">TIN No.</label>
                                <input type="text" name="tin_no" class="form-control" placeholder="Tax ID number" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">
                                    Mobile No.
                                    <span style="color: red;">*</span>
                                </label>
                                <input type="tel" name="mobile_no" class="form-control" value="<?php echo $candidatePhoneNumber; ?>" style="opacity: 0.6; background: #f8f9fa;" disabled />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">
                                    Email ID
                                    <span style="color: red;">*</span>
                                </label>
                                <input type="email" name="email_id" class="form-control" value="<?php echo $candidateEmail; ?>" style="opacity: 0.6; background: #f8f9fa;" disabled />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">
                                    Nationality
                                    <span style="color: red;">*</span>
                                </label>
                                <input type="text" name="nationality" class="form-control" placeholder="e.g. Bangladeshi" />
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" onfocus="this.showPicker()" name="date_of_birth" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <!-- ───────── STEP 3: Address ───────── -->
                    <div class="step-panel" id="step-3">
                        <p class="section-label"><i class="bi bi-geo-alt me-2"></i>Step 3 — Address Details</p>

                        <!-- Permanent -->
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-house-fill me-2" style="color:var(--brand);font-size:14px"></i>
                                <span class="addr-title">Permanent Address</span>
                            </div>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">House / Road</label>
                                    <input type="text" class="form-control" name="per_house" id="perm-house"
                                        placeholder="House no., Road, Village/Area" oninput="syncAddr()" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Division</label>
                                    <select name="per_division" class="form-select" id="perm-div" onchange="syncAddr()">
                                        <option value="">Select division</option>
                                        <option>Dhaka</option>
                                        <option>Chittagong</option>
                                        <option>Rajshahi</option>
                                        <option>Khulna</option>
                                        <option>Barisal</option>
                                        <option>Sylhet</option>
                                        <option>Rangpur</option>
                                        <option>Mymensingh</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">District</label>
                                    <input name="per_district" type="text" class="form-control" id="perm-dist" placeholder="District"
                                        oninput="syncAddr()" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Upazilla</label>
                                    <input name="per_upazilla" type="text" class="form-control" id="perm-upa" placeholder="Upazilla"
                                        oninput="syncAddr()" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Post-Office</label>
                                    <input name="per_post" type="text" class="form-control" id="perm-post"
                                        placeholder="Post Office Name With Post Code" oninput="syncAddr()" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Post Code</label>
                                    <input name="per_post_code" type="text" class="form-control" id="perm-post-code"
                                        placeholder="Post Office" oninput="syncAddr()" />
                                </div>
                            </div>
                        </div>

                        <!-- Present -->
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-pin-map-fill me-2" style="color:var(--brand);font-size:14px"></i>
                                    <span class="addr-title">Present Address</span>
                                </div>
                                <label class="same-check-label d-flex align-items-center gap-2">
                                    <input type="checkbox" id="sameAddr" onchange="toggleSame()" />
                                    Same as permanent address
                                </label>
                            </div>
                            <div class="row g-3" id="presentAddrFields">
                                <div class="col-12">
                                    <label class="form-label">House / Road</label>
                                    <input type="text" name="pre_house" class="form-control" id="pres-house"
                                        placeholder="House no., Road, Village/Area" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Division</label>
                                    <select name="pre_division" class="form-select" id="pres-div">
                                        <option value="">Select division</option>
                                        <option>Dhaka</option>
                                        <option>Chittagong</option>
                                        <option>Rajshahi</option>
                                        <option>Khulna</option>
                                        <option>Barisal</option>
                                        <option>Sylhet</option>
                                        <option>Rangpur</option>
                                        <option>Mymensingh</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">District</label>
                                    <input name="pre_district" type="text" class="form-control" id="pres-dist" placeholder="District" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Upazilla</label>
                                    <input name="pre_upazilla" type="text" class="form-control" id="pres-upa" placeholder="Upazilla" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Post-Office</label>
                                    <input name="pre_post" type="text" class="form-control" id="pres-post"
                                        placeholder="Post Office Name With Post Code" />
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Post Code</label>
                                    <input name="pre_post_code" type="text" class="form-control" id="pres-post-code"
                                        placeholder="Post Code" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ───────── STEP 4: Education ───────── -->
                    <div class="step-panel" id="step-4">
                        <p class="section-label"><i class="bi bi-mortarboard me-2"></i>Step 4 — Educational Background</p>
                        <div class="table-responsive">
                            <table class="edu-table">
                                <thead>
                                    <tr>
                                        <th style="min-width:110px">Examination</th>
                                        <th style="min-width:150px">Institution</th>
                                        <th style="min-width:120px">Major Subject</th>
                                        <th style="min-width:140px">Board / University</th>
                                        <th style="min-width:110px">Academic Year</th>
                                        <th style="min-width:90px">Result</th>
                                        <th style="width:40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="eduBody">
                                    <tr>
                                        <td>
                                            <select name="edu_examination">
                                                <option value="">Select</option>
                                                <option value="ssc">SSC</option>
                                                <option value="hsc">HSC</option>
                                                <option value="diploma">Diploma</option>
                                                <option value="bachelors">Bachelor's</option>
                                                <option value="masters">Master's</option>
                                                <option value="phd">PhD</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </td>
                                        <td><input name="edu_institution" type="text" placeholder="Institution" /></td>
                                        <td><input name="edu_msubject" type="text" placeholder="Subject" /></td>
                                        <td><input name="board_university" type="text" placeholder="Board / University" /></td>
                                        <td><input name="academic_year" type="text" placeholder="e.g. 2018–2019" /></td>
                                        <td><input name="result" type="text" placeholder="GPA / Grade" /></td>
                                        <td>
                                            <button class="del-row-btn" onclick="deleteRow(this)" title="Remove row">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            <button class="btn-add-row" onclick="addEduRow()">
                                <i class="bi bi-plus-circle me-1"></i> Add Row
                            </button>
                        </div>
                    </div>

                    <!-- ───────── STEP 5: Training Experience ───────── -->
                    <div class="step-panel" id="step-5">
                        <p class="section-label"><i class="bi bi-card-text me-2"></i>Step 5 — Training Experience</p>
                        <div class="table-responsive">
                            <table class="train-table">
                                <thead>
                                    <tr>
                                        <th style="min-width:110px">Course Name</th>
                                        <th style="min-width:150px">Course Start Date</th>
                                        <th style="min-width:120px">Course End Date</th>
                                        <th style="min-width:140px">Course Duration</th>
                                        <th style="min-width:110px">Institution</th>
                                        <th style="min-width:90px">Institution Address</th>
                                        <th style="min-width:90px">Result</th>
                                        <th style="width:40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="trainBody">
                                    <tr>
                                        <td>
                                            <input name="course_name" type="text" name="course_name" placeholder="Course Name" />
                                        </td>
                                        <td>
                                            <input name="course_stard_date" onfocus="this.showPicker()" type="date" name="course_stard_date"
                                                placeholder="Course Start Date" />
                                        </td>
                                        <td>
                                            <input name="course_end_date" onfocus="this.showPicker()" type="date" name="course_end_date"
                                                placeholder="Course End Date" />
                                        </td>
                                        <td>
                                            <input name="course_duration" type="text" name="course_duration" placeholder="Course Duration" />
                                        </td>
                                        <td>
                                            <input name="institution_name" type="text" name="institution_name" placeholder="Institution" />
                                        </td>
                                        <td>
                                            <input name="institution_address" type="text" name="institution_address"
                                                placeholder="Institution Address" />
                                        </td>
                                        <td>
                                            <input name="result" type="text" name="result" placeholder="Result" />
                                        </td>
                                        <td>
                                            <button class=" del-row-btn" onclick="deleteRow(this)" title="Remove row">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            <button class="btn-add-row" onclick="addTrainRow()">
                                <i class="bi bi-plus-circle me-1"></i> Add Row
                            </button>
                        </div>
                    </div>

                    <!-- ───────── STEP 6: Job Exprience ───────── -->
                    <div class="step-panel" id="step-6">
                        <p class="section-label"><i class="bi bi-card-text me-2"></i>Step 6 — Job Experience</p>
                        <div class="table-responsive">
                            <table class="train-table">
                                <thead>
                                    <tr>
                                        <th style="min-width:110px">Organization Name</th>
                                        <th style="min-width:150px">Designation/Project Name</th>
                                        <th style="min-width:120px">Company Location</th>
                                        <th style="min-width:140px">From Date</th>
                                        <th style="min-width:110px">To Date</th>
                                        <th style="min-width:90px">Job Responsibility</th>
                                        <th style="width:40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="jobBody">
                                    <tr>
                                        <td><input name="org_name" type="text" placeholder="Organization Name" /></td>
                                        <td><input name="project_name" type="text" placeholder="Designation/Project Name" /></td>
                                        <td><input name="company_location" type="text" placeholder="Company Location" /></td>
                                        <td><input name="from_date" onfocus="this.showPicker()" type="date" placeholder="From Date" /></td>
                                        <td><input name="to_date" onfocus="this.showPicker()" type="date" placeholder="To Date" /></td>
                                        <td><input name="job_respons" type="text" placeholder="Job Responsibility" /></td>
                                        <td>
                                            <button class=" del-row-btn" onclick="deleteRow(this)" title="Remove row">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            <button class="btn-add-row" onclick="addJobRow()">
                                <i class="bi bi-plus-circle me-1"></i> Add Row
                            </button>
                        </div>
                    </div>


                </div>

                <!-- ═══ Footer navigation ═══ -->
                <div class="form-footer d-flex justify-content-between align-items-center">
                    <div>
                        <button class="btn btn-outline-secondary btn-sm" id="prevBtn" onclick="prevStep()" style="display:none">
                            <i class="bi bi-arrow-left me-1"></i>Previous
                        </button>
                    </div>
                    <span class="progress-text" id="progressTxt">Step 1 of 6</span>
                    <div>
                        <button class="btn btn-brand btn-sm" id="nextBtn" onclick="nextStep()">
                            Next <i class="bi bi-arrow-right ms-1"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Linked Bootstrap script  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <!-- Linked custom script  -->
    <script src="../js/job_application.js"></script>
</body>

</html>