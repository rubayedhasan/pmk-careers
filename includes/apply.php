<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMK | Application Form</title>
    <!-- Linked favicon  -->
    <link rel="shortcut icon" href="../assets/logo/main-logo.png" type="image/x-icon">
    <!-- linked custom css  -->
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/button.css">
    <link rel="stylesheet" href="../styles/apply.css">
</head>

<body>
    <main>
        <section id="job-application">
            <div class="application-header">
                <figure class="org-logo">
                    <img src="../assets/logo/main-logo.png" alt="pmk-log">
                </figure>

                <hgroup class="apply-header-content">
                    <h3 class="apply-header-title">Complete Your Job Application</h3>
                    <p class="apply-header-description">Complete your profile accurately to submit your job application successfully at PMK following all provided instructions carefully.</p>
                </hgroup>
            </div>

            <!-- application form personal information  -->
            <div id="personal-information-container" class="">
                <form action="" method="" enctype="multipart/form-data" id="application-personal-form">
                    <!-- personal information container  -->
                    <div class="personal-information">
                        <h4 class="form-info-title">Personal Information</h4>

                        <!-- 1st: profile picture field  -->
                        <div class="form-info-group">
                            <div class="field-image">
                                <label for="profile-image" class="field-label">
                                    Profile Picture
                                    <span class="field-label-required">*</span>
                                </label>
                                <input type="file" name="profile_picture" id="profile-image" class="hidden-field" accept=".png,.jpg,.jpeg" required>
                                <label for="profile-image">
                                    <div class="user-profile-image">
                                        <svg class="user-profile-image-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" height="16" width="16">
                                            <path d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z" fill="#6FBF9E" />
                                        </svg>

                                        <svg class="user-profile-add-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                                            <path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM296 408L296 344L232 344C218.7 344 208 333.3 208 320C208 306.7 218.7 296 232 296L296 296L296 232C296 218.7 306.7 208 320 208C333.3 208 344 218.7 344 232L344 296L408 296C421.3 296 432 306.7 432 320C432 333.3 421.3 344 408 344L344 344L344 408C344 421.3 333.3 432 320 432C306.7 432 296 421.3 296 408z" fill="#00946a" />
                                        </svg>
                                    </div>
                                </label>
                                <span class="field-suggest">Max image size 5MB</span>
                            </div>
                        </div>

                        <!-- 2nd: form input group  -->
                        <div class="form-info-group">
                            <!-- name field  -->
                            <div class="input-field-group">
                                <label for="candidate-name" class="field-label">
                                    Your Full Name
                                    <span class="field-label-required">*</span>
                                </label>
                                <input type="text" name="candidate_name" id="candidate-name" class="input-field" placeholder="Enter Your Full Name" required>
                            </div>

                            <!-- date of birth field  -->
                            <div class="input-field-group">
                                <label for="candidate-birth-date" class="field-label">
                                    Date of Birth
                                    <span class="field-label-required">*</span>
                                </label>
                                <input type="date" name="candidate_birth_date" id="candidate-birth-date" class="input-field" placeholder="DD/MM/YYYY" required>
                            </div>
                        </div>

                        <!-- 3rd: form input group  -->
                        <div class="form-info-group">
                            <!-- Father name field  -->
                            <div class="input-field-group">
                                <label for="candidate-Father-name" class="field-label">
                                    Father's Name
                                    <span class="field-label-required">*</span>
                                </label>
                                <input type="text" name="candidate_Father_name" id="candidate-Father-name" class="input-field" placeholder="Enter Father's Name" required>
                            </div>

                            <!-- date of birth field  -->
                            <div class="input-field-group">
                                <label for="candidate-mother-name" class="field-label">
                                    Mother's Name
                                    <span class="field-label-required">*</span>
                                </label>
                                <input type="text" name="candidate_mother_name" id="candidate-mother-name" class="input-field" placeholder="Enter Mother's Name" required>
                            </div>
                        </div>

                        <!-- 4th: form input group  -->
                        <div class="form-info-group">
                            <!--Gender field  -->
                            <div class="input-field-group">
                                <label for="candidate-gender" class="field-label">
                                    Gender
                                    <span class="field-label-required">*</span>
                                </label>
                                <select name="candidate_gender" id="candidate-gender" class="input-select" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">female</option>
                                    <option value="other">Others</option>
                                </select>
                            </div>

                            <!-- Nationality field  -->
                            <div class="input-field-group">
                                <label for="candidate-nationality" class="field-label">
                                    Nationality
                                    <span class="field-label-required">*</span>
                                </label>
                                <select name="candidate_nationality" id="candidate-nationality" class="input-select" required>
                                    <option value="">Select Nationality</option>
                                    <option value="bangladeshi">Bangladeshi</option>
                                </select>
                            </div>
                        </div>

                        <!-- 5th: form input group  -->
                        <div class="form-info-group">
                            <!-- blood group field  -->
                            <div class="input-field-group">
                                <label for="candidate-marital-status" class="field-label">
                                    Marital Status
                                    <span class="field-label-required">*</span>
                                </label>
                                <select name="candidate_marital_status" id="candidate-marital-status" class="input-select" required>
                                    <option value="">Select Your Marital Status</option>
                                    <option value="married">Married</option>
                                    <option value="unmarried">Unmarried</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>

                            <!-- passport field  -->
                            <div class="input-field-group">
                                <label for="candidate-blood-group" class="field-label">
                                    Blood Group
                                </label>
                                <select name="candidate_blood_group" id="candidate-blood-group" class="input-select">
                                    <option value="">Select Blood Group</option>
                                    <option value="a_positive">A(+)</option>
                                    <option value="a_negative">A(-)</option>
                                    <option value="b_positive">B(+)</option>
                                    <option value="b_negative">B(-)</option>
                                    <option value="ab_positive">AB(+)</option>
                                    <option value="ab_negative">AB(-)</option>
                                    <option value="o_positive">O(+)</option>
                                    <option value="o_negative">O(-)</option>
                                </select>
                            </div>
                        </div>

                        <!-- 6th: form input group  -->
                        <div class="form-info-group">
                            <!-- nid field  -->
                            <div class="input-field-group">
                                <label for="candidate-nid-number" class="field-label">
                                    NID Number
                                    <span class="field-label-required">*</span>
                                </label>
                                <input type="text" name="candidate_nid_number" id="candidate-nid-number" class="input-field" placeholder="Enter NID Number" required>
                            </div>

                            <!-- phone field  -->
                            <div class="input-field-group">
                                <label for="candidate-contact-number" class="field-label">
                                    Contact Number
                                    <span class="field-label-required">*</span>
                                </label>
                                <input type="text" name="candidate_contact_number" id="candidate-contact-number" class="input-field" placeholder="Enter Contact Number" required>
                            </div>
                        </div>

                        <!-- 7th: form input group  -->
                        <div class="form-info-group">
                            <!-- email field  -->
                            <div class="input-field-group">
                                <label for="candidate-email" class="field-label">
                                    Email Address
                                    <span class="field-label-required">*</span>
                                </label>
                                <input type="text" name="candidate_email" id="candidate-email" class="input-field" placeholder="Enter Email" required>
                            </div>

                            <!-- passport field  -->
                            <div class="input-field-group">
                                <label for="candidate-passport-number" class="field-label">
                                    Passport Number
                                </label>
                                <input type="text" name="candidate_passport_number" id="candidate-passport-number" class="input-field" placeholder="Enter passport Number">
                            </div>
                        </div>

                        <!-- 8th: form input group  -->
                        <div class="form-info-group">
                            <!-- email field  -->
                            <div class="input-field-group">
                                <label for="" class="field-label">
                                    Do you have any disability that requires reasonable accommodation?
                                </label>
                                <div class="radio-input-container">
                                    <label>
                                        <input type="radio" name="disability" id="disability-yes">
                                        <span>Yes</span>
                                    </label>

                                    <label>
                                        <input type="radio" name="disability" id="disability-no" checked>
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- address container  -->
                    <div class="address-container">
                        <!-- permanent address container-->
                        <div class="permanent-address">
                            <h4 class="form-info-title">Permanent Address</h4>

                            <!-- 1st: profile picture field  -->
                            <div class="form-info-group">
                                <!-- name field  -->
                                <div class="input-field-group textarea-field">
                                    <label for="candidate-permanent-address" class="field-label">
                                        Address
                                        <span class="field-label-required">*</span>
                                    </label>
                                    <textarea name="candidate_permanent_address" id="candidate-permanent-address" class="input-field" placeholder="Village, Post Office, House" required cols="10" rows="5"></textarea>
                                </div>
                            </div>

                            <!-- 2nd: form info group  -->
                            <div class="form-info-group">
                                <!-- division field  -->
                                <div class="input-field-group">
                                    <label for="candidate-permanent-division" class="field-label">
                                        Division
                                        <span class="field-label-required">*</span>
                                    </label>
                                    <input type="text" name="candidate_permanent_division" id="candidate-permanent-division" class="input-field" placeholder="Enter Your Division" required>
                                </div>

                                <!-- district field  -->
                                <div class="input-field-group">
                                    <label for="candidate-permanent-district" class="field-label">
                                        District
                                        <span class="field-label-required">*</span>
                                    </label>
                                    <input type="text" name="candidate_permanent_district" id="candidate-permanent-district" class="input-field" placeholder="Enter Your District" required>
                                </div>
                            </div>

                            <!-- 3rd: form info group  -->
                            <div class="form-info-group">
                                <!-- division field  -->
                                <div class="input-field-group">
                                    <label for="candidate-permanent-thana" class="field-label">
                                        Thana/ Upazila
                                        <span class="field-label-required">*</span>
                                    </label>
                                    <input type="text" name="candidate_permanent_thana" id="candidate-permanent-thana" class="input-field" placeholder="Enter Your Thana/ Upazila" required>
                                </div>

                                <!-- district field  -->
                                <div class="input-field-group">
                                    <label for="candidate-permanent-postCode" class="field-label">
                                        Postal Code
                                        <span class="field-label-required">*</span>
                                    </label>
                                    <input type="text" name="candidate_permanent_postCode" id="candidate-permanent-postCode" class="input-field" placeholder="Enter Your Postal Code" required>
                                </div>
                            </div>
                        </div>

                        <!-- present address container-->
                        <div class="present-address">
                            <h4 class="form-info-title">Present Address</h4>

                            <!-- 1st: profile picture field  -->
                            <div class="form-info-group">
                                <!-- name field  -->
                                <div class="input-field-group textarea-field">
                                    <label for="candidate-present-address" class="field-label">
                                        Address
                                        <span class="field-label-required">*</span>
                                    </label>
                                    <textarea name="candidate_present_address" id="candidate-present-address" class="input-field" placeholder="Village, Post Office, House" required cols="10" rows="5"></textarea>
                                </div>
                            </div>

                            <!-- 2nd: form info group  -->
                            <div class="form-info-group">
                                <!-- division field  -->
                                <div class="input-field-group">
                                    <label for="candidate-present-division" class="field-label">
                                        Division
                                        <span class="field-label-required">*</span>
                                    </label>
                                    <input type="text" name="candidate_present_division" id="candidate-present-division" class="input-field" placeholder="Enter Your Division" required>
                                </div>

                                <!-- district field  -->
                                <div class="input-field-group">
                                    <label for="candidate-present-district" class="field-label">
                                        District
                                        <span class="field-label-required">*</span>
                                    </label>
                                    <input type="text" name="candidate_present_district" id="candidate-present-district" class="input-field" placeholder="Enter Your District" required>
                                </div>
                            </div>

                            <!-- 3rd: form info group  -->
                            <div class="form-info-group">
                                <!-- division field  -->
                                <div class="input-field-group">
                                    <label for="candidate-present-thana" class="field-label">
                                        Thana/ Upazila
                                        <span class="field-label-required">*</span>
                                    </label>
                                    <input type="text" name="candidate_present_thana" id="candidate-present-thana" class="input-field" placeholder="Enter Your Thana/ Upazila" required>
                                </div>

                                <!-- district field  -->
                                <div class="input-field-group">
                                    <label for="candidate-present-postCode" class="field-label">
                                        Postal Code
                                        <span class="field-label-required">*</span>
                                    </label>
                                    <input type="text" name="candidate_present_postCode" id="candidate-present-postCode" class="input-field" placeholder="Enter Your Postal Code" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Resume Container  -->
                    <div class="resume-container">
                        <h4 class="form-info-title">Document</h4>

                        <div class="form-info-group">
                            <div class="field-resume">
                                <label for="candidate-resume" class="field-label">
                                    Resume (pdf only)
                                    <span class="field-label-required">*</span>
                                </label>
                                <input type="file" name="candidate_resume" id="candidate-resume" accept=".pdf" required>
                            </div>
                        </div>
                    </div>

                    <!-- submit button  -->
                    <div class="apply-btn-container">
                        <button type="submit" name="apply-next-page-btn" class="apply-btn">Upload & Next Page</button>
                    </div>
                </form>
            </div>

            <!-- application form educational information  -->
            <div id="educational-information-container" class="hidden-field">
                <!-- education container  -->
                <div class="education-container">
                    <div class="education-header-container">
                        <h4 class="form-info-title">Education</h4>
                        <div class="add-education-button-container">
                            <button type="button" class="add-education-button">
                                <span>+</span>
                                <span>Add education</span>
                            </button>
                        </div>
                    </div>

                    <!-- education summary container  -->
                    <div id="education-summery-container">
                        <p class="summery-notice">Add your educational qualifications</p>
                        <div id="education-summery-lists"></div>
                    </div>

                    <!-- form modal  -->
                    <form action="" method="post" id="application-education-form">
                        <div class="education-form-modal hidden-field">
                            <!-- modal header  -->
                            <div class="edu-modal-header">
                                <hgroup class="edu-modal-head-container">
                                    <h4 class="edu-modal-title">Add education</h4>
                                    <p class="edu-modal-text">Enter your academic qualifications</p>
                                </hgroup>

                                <div class="edu-modal-close">
                                    <button type="button" class="edu-modal-close-btn">
                                        <i class="fa-regular fa-circle-xmark"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- modal content  -->
                            <div class="edu-modal-content">
                                <!--  form input group  -->
                                <div class="form-info-group">
                                    <!--education level field  -->
                                    <div class="input-field-group">
                                        <label for="candidate-education-level" class="field-label">
                                            Education Level
                                            <span class="field-label-required">*</span>
                                        </label>
                                        <select name="candidate_education_level" id="candidate-education-level" class="input-select" required>
                                            <option value="">Select Your Education Level</option>
                                            <option value="ssc">SSC</option>
                                            <option value="hsc">HSC</option>
                                            <option value="diploma">Diploma</option>
                                            <option value="bsc">Bachelor / Honours</option>
                                            <option value="msc">Master's</option>
                                            <option value="mphil">MPhil</option>
                                            <option value="phd">PhD</option>
                                            <option value="jsc">JSC / Below JSC</option>
                                            <option value="psc">PSC / Below PSC</option>
                                        </select>
                                    </div>

                                    <!-- degree field  -->
                                    <div class="input-field-group">
                                        <label for="candidate-education-degree" class="field-label">
                                            Degree
                                            <span class="field-label-required">*</span>
                                        </label>
                                        <select name="candidate_education_degree" id="candidate-education-degree" class="input-select" required>
                                            <option value="">Select Your Education Degree</option>
                                            <!-- School Level -->
                                            <option value="psc">PSC</option>
                                            <option value="jsc">JSC</option>
                                            <option value="ssc">SSC</option>
                                            <option value="hsc">HSC</option>

                                            <!-- Diploma -->
                                            <option value="diploma_engineering">Diploma in Engineering</option>
                                            <option value="diploma_medical">Diploma in Medical Technology</option>

                                            <!-- Bachelor / Honours -->
                                            <option value="ba">BA</option>
                                            <option value="bsc">BSc</option>
                                            <option value="beng">BSc(Eng.)</option>
                                            <option value="bba">BBA</option>
                                            <option value="bcom">BCom</option>
                                            <option value="llb">LLB</option>
                                            <option value="mbbs">MBBS</option>
                                            <option value="bpharm">BPharm</option>

                                            <!-- Master's -->
                                            <option value="ma">MA</option>
                                            <option value="msc">MSc</option>
                                            <option value="meng">MSC(Eng.)</option>
                                            <option value="mba">MBA</option>
                                            <option value="mcom">MCom</option>
                                            <option value="llm">LLM</option>
                                            <option value="mpharm">MPharm</option>

                                            <!-- Higher -->
                                            <option value="mphil">MPhil</option>
                                            <option value="phd">PhD</option>
                                        </select>
                                    </div>
                                </div>

                                <!--  form input group  -->
                                <div class="form-info-group">
                                    <!--result type field  -->
                                    <div class="input-field-group">
                                        <label for="candidate-result-type" class="field-label">
                                            Division/Grade
                                            <span class="field-label-required">*</span>
                                        </label>
                                        <select name="candidate_result_type" id="candidate-result-type" class="input-select" required>
                                            <option value="">Select Your Result Type</option>
                                            <option value="grade">Grade</option>
                                            <option value="division">Division / Class</option>
                                        </select>
                                    </div>

                                    <!-- result field  -->
                                    <div class="input-field-group">
                                        <label for="candidate-result-division" class="field-label">
                                            Result
                                            <span class="field-label-required">*</span>
                                        </label>
                                        <select name="candidate_result_division" id="candidate-result-division" class="input-select" required>
                                            <option value="">Select Your Result</option>
                                            <option value="one">1st</option>
                                            <option value="two">2nd</option>
                                            <option value="three">3rd</option>
                                        </select>
                                    </div>

                                    <!-- result grade  -->
                                    <div class="input-field-group hidden-field">
                                        <label for="candidate-result-grade" class="field-label">
                                            GPA/CGPA
                                            <span class="field-label-required">*</span>
                                        </label>
                                        <input type="text" name="candidate_result_grade" id="candidate-result-grade" class="input-field" placeholder="Enter Result Grade">
                                    </div>

                                    <!-- result grade scale  -->
                                    <div class="input-field-group hidden-field">
                                        <label for="candidate-result-grade-scale" class="field-label">
                                            GPA/CGPA Scale
                                            <span class="field-label-required">*</span>
                                        </label>

                                        <input type="text" name="candidate_result_grade_scale" id="candidate-result-grade-scale" class="input-field" placeholder="Enter Result Grade Scale">
                                    </div>
                                </div>

                                <!--  form input group  -->
                                <div class="form-info-group">
                                    <!--passing year field  -->
                                    <div class="input-field-group">
                                        <label for="candidate-passing-year" class="field-label">
                                            Passing Year
                                            <span class="field-label-required">*</span>
                                        </label>
                                        <input type="text" name="candidate_passing_year" id="candidate-passing-year" class="input-field" placeholder="Enter Passing Year">
                                    </div>

                                    <!-- candidate-institute -->
                                    <div class="input-field-group">
                                        <label for="candidate-institute" class="field-label">
                                            Institute
                                            <span class="field-label-required">*</span>
                                        </label>

                                        <input type="text" name="candidate_institute" id="candidate-institute" class="input-field" placeholder="Enter Institute">
                                    </div>
                                </div>
                            </div>

                            <!-- modal button  -->
                            <div class="modal-upload-button-container apply-btn-container">
                                <button type="button" class="modal-upload-button apply-btn">
                                    Save
                                </button>
                            </div>
                        </div>

                        <!-- submit button  -->
                        <div class="apply-btn-container">
                            <button type="submit" name="submit-apply-btn" class="apply-btn">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>


    <!-- Linked font awesome script  -->
    <script src="https://kit.fontawesome.com/ff87b718c4.js" crossorigin="anonymous"></script>
    <!-- Linked custom script  -->
    <script src="../js/apply-form.js"></script>
</body>

</html>