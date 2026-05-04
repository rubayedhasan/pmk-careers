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

            <!-- application form  -->
            <form action="" method="" enctype="multipart/form-data" id="application-form">
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

                <!-- permanent address container-->
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
            </form>
        </section>
    </main>
</body>

</html>