<?php
require_once('../config/auth.php');
include('../config/database.php');
error_reporting(0);

if (strlen($_SESSION['login']) == 0) {
  header('location:../index.php');
} else {

  $PageID = 'P032';
  $ModulePage = 'P013';
  $ModuleID = 002;
  include('../include/user_query.php');


  if (!in_array($ModulePage, $RolModule)) {
    header('location:../include/user_permission_require.php');
  } elseif (!in_array($PageID, $RoleUpdateViw)) {
    header('location:../include/user_permission_require.php');
  } else {


    include '../include/header.php';
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Employee Registration</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />

      <style>
        :root {
          --brand: #128E69;
          --brand-dark: #0d6e52;
          --brand-light: #e8f7f2;
          --brand-border: rgba(18, 142, 105, 0.35);
        }

        body {
          background: #f5f6f8;
          font-family: 'Segoe UI', system-ui, sans-serif;
          min-height: 100vh;
        }

        /* ── Header ── */
        .form-header {
          background: #fff;
          border-bottom: 1px solid #e5e7eb;
          padding: 14px 24px;
          position: sticky;
          top: 0;
          z-index: 100;
          box-shadow: 0 1px 6px rgba(0, 0, 0, .06);
        }

        .form-header .title {
          font-size: 15px;
          font-weight: 600;
          color: #1a1a1a;
        }

        /* ── Step nav tabs ── */
        .step-nav {
          display: flex;
          gap: 6px;
          flex-wrap: nowrap;
          overflow-x: auto;
          padding-bottom: 2px;
        }

        .step-nav::-webkit-scrollbar {
          height: 0;
        }

        .step-btn {
          display: flex;
          align-items: center;
          gap: 7px;
          padding: 6px 14px;
          border-radius: 6px;
          font-size: 12.5px;
          font-weight: 500;
          cursor: pointer;
          border: 1px solid #dee2e6;
          background: #fff;
          color: #6c757d;
          white-space: nowrap;
          transition: all .2s ease;
          text-decoration: none;
        }

        .step-btn:hover {
          background: #f8f9fa;
          color: #212529;
          border-color: #adb5bd;
        }

        .step-btn.active {
          background: var(--brand);
          color: #fff;
          border-color: var(--brand);
        }

        .step-btn.completed {
          background: var(--brand-light);
          color: var(--brand-dark);
          border-color: var(--brand-border);
        }

        .step-badge {
          width: 20px;
          height: 20px;
          border-radius: 50%;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 10px;
          font-weight: 700;
          background: #e9ecef;
          color: #6c757d;
          flex-shrink: 0;
        }

        .step-btn.active .step-badge {
          background: rgba(255, 255, 255, .25);
          color: #fff;
        }

        .step-btn.completed .step-badge {
          background: var(--brand);
          color: #fff;
        }

        /* ── Card ── */
        .form-card {
          background: #fff;
          border-radius: 10px;
          border: 1px solid #e5e7eb;
          box-shadow: 0 1px 4px rgba(0, 0, 0, .04);
        }

        .section-label {
          font-size: 11px;
          font-weight: 600;
          text-transform: uppercase;
          letter-spacing: .06em;
          color: #6c757d;
          padding-bottom: 10px;
          border-bottom: 1px solid #f0f0f0;
          margin-bottom: 18px;
        }

        /* ── Form controls ── */
        .form-label {
          font-size: 12px;
          font-weight: 500;
          color: #495057;
          margin-bottom: 4px;
        }

        .form-control,
        .form-select {
          font-size: 13px;
          border: 1px solid #dee2e6;
          border-radius: 6px;
          padding: 7px 11px;
          color: #212529;
          transition: border-color .15s, box-shadow .15s;
        }

        .form-control:focus,
        .form-select:focus {
          border-color: var(--brand);
          box-shadow: 0 0 0 3px rgba(18, 142, 105, .12);
          outline: none;
        }

        textarea.form-control {
          resize: vertical;
          min-height: 76px;
        }

        /* ── Upload ── */
        .upload-box {
          border: 1.5px dashed #ced4da;
          border-radius: 8px;
          padding: 24px;
          text-align: center;
          cursor: pointer;
          background: #fafafa;
          transition: border-color .2s, background .2s;
        }

        .upload-box:hover {
          border-color: var(--brand);
          background: var(--brand-light);
        }

        .upload-box i {
          font-size: 28px;
          color: #adb5bd;
          display: block;
          margin-bottom: 6px;
        }

        .upload-box:hover i {
          color: var(--brand);
        }

        .upload-box .up-label {
          font-size: 13px;
          color: #6c757d;
        }

        .upload-box .up-hint {
          font-size: 11px;
          color: #adb5bd;
          margin-top: 3px;
        }

        /* ── Address ── */
        .addr-title {
          font-size: 13.5px;
          font-weight: 600;
          color: #212529;
        }

        /* ── Education table ── */
        .edu-table {
          font-size: 12.5px;
          border-collapse: collapse;
          width: 100%;
        }

        .edu-table th {
          padding: 8px 10px;
          font-size: 11px;
          font-weight: 600;
          text-transform: uppercase;
          letter-spacing: .04em;
          color: #6c757d;
          border-bottom: 1px solid #e5e7eb;
          background: #f8f9fa;
          white-space: nowrap;
        }

        .edu-table td {
          padding: 6px 6px;
          border-bottom: 1px solid #f0f0f0;
          vertical-align: middle;
        }

        .edu-table td input,
        .edu-table td select {
          padding: 5px 8px;
          font-size: 12px;
          border: 1px solid #dee2e6;
          border-radius: 5px;
          width: 100%;
          color: #212529;
          outline: none;
          background: #fff;
        }

        .edu-table td input:focus,
        .edu-table td select:focus {
          border-color: var(--brand);
          box-shadow: 0 0 0 2px rgba(18, 142, 105, .1);
        }


        /* ── Trainig table ── */
        .train-table {
          font-size: 12.5px;
          border-collapse: collapse;
          width: 100%;
        }

        .train-table th {
          padding: 8px 10px;
          font-size: 11px;
          font-weight: 600;
          text-transform: uppercase;
          letter-spacing: .04em;
          color: #6c757d;
          border-bottom: 1px solid #e5e7eb;
          background: #f8f9fa;
          white-space: nowrap;
        }

        .train-table td {
          padding: 6px 6px;
          border-bottom: 1px solid #f0f0f0;
          vertical-align: middle;
        }

        .train-table td input,
        .train-table td select {
          padding: 5px 8px;
          font-size: 12px;
          border: 1px solid #dee2e6;
          border-radius: 5px;
          width: 100%;
          color: #212529;
          outline: none;
          background: #fff;
        }

        .train-table td input:focus,
        .train-table td select:focus {
          border-color: var(--brand);
          box-shadow: 0 0 0 2px rgba(18, 142, 105, .1);
        }

        .del-row-btn {
          background: none;
          border: none;
          color: #adb5bd;
          cursor: pointer;
          padding: 4px 8px;
          border-radius: 4px;
          font-size: 14px;
          transition: color .15s, background .15s;
        }

        .del-row-btn:hover {
          color: #dc3545;
          background: #fff5f5;
        }

        /* ── Buttons ── */
        .btn-brand {
          background: var(--brand);
          color: #fff;
          border: 1px solid var(--brand);
          border-radius: 6px;
          padding: 7px 18px;
          font-size: 13px;
          font-weight: 500;
          transition: background .15s, border-color .15s;
        }

        .btn-brand:hover {
          background: var(--brand-dark);
          border-color: var(--brand-dark);
          color: #fff;
        }

        .btn-outline-secondary {
          border-radius: 6px;
          font-size: 13px;
          font-weight: 500;
          padding: 7px 18px;
        }

        .btn-add-row {
          font-size: 12.5px;
          font-weight: 500;
          color: var(--brand);
          background: var(--brand-light);
          border: 1px dashed var(--brand-border);
          border-radius: 6px;
          padding: 6px 14px;
          cursor: pointer;
          transition: background .15s;
        }

        .btn-add-row:hover {
          background: #d0f0e6;
        }

        /* ── Footer nav ── */
        .form-footer {
          background: #f8f9fa;
          border-top: 1px solid #e5e7eb;
          border-radius: 0 0 10px 10px;
          padding: 14px 20px;
        }

        .progress-text {
          font-size: 12px;
          color: #6c757d;
        }

        /* ── Panels ── */
        .step-panel {
          display: none;
        }

        .step-panel.active {
          display: block;
        }

        /* ── Same address ── */
        .same-check-label {
          font-size: 12.5px;
          color: #495057;
          cursor: pointer;
          user-select: none;
        }

        input[type="checkbox"] {
          accent-color: var(--brand);
        }

        /* ── File name display ── */
        .file-chosen {
          font-size: 12px;
          color: var(--brand);
          margin-top: 5px;
          display: none;

          .nominee-card {
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 16px;
            background: #fff;
            position: relative;
          }

          .nominee-card .nominee-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f0f0f0;
          }

          .nominee-card .nominee-title {
            font-size: 13.5px;
            font-weight: 600;
            color: #212529;
          }

          .nominee-remove-btn {
            background: none;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            color: #6c757d;
            cursor: pointer;
            padding: 4px 10px;
            font-size: 12px;
            transition: all .15s;
          }

          .nominee-remove-btn:hover {
            background: #fff5f5;
            border-color: #dc3545;
            color: #dc3545;
          }

          .pct-input-wrap {
            position: relative;
          }

          .pct-input-wrap input {
            padding-right: 32px;
          }

          .pct-input-wrap .pct-sign {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 13px;
            color: #6c757d;
            pointer-events: none;
          }

          .pct-over {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 3px rgba(220, 53, 69, .12) !important;
          }

          .pct-ok {
            border-color: var(--brand) !important;
          }

          .nominee-upload-box {
            border: 1.5px dashed #ced4da;
            border-radius: 8px;
            padding: 16px;
            text-align: center;
            cursor: pointer;
            background: #fafafa;
            transition: border-color .2s, background .2s;
            font-size: 12px;
            color: #6c757d;
          }

          .nominee-upload-box:hover {
            border-color: var(--brand);
            background: var(--brand-light);
          }

          .nominee-upload-box i {
            font-size: 22px;
            display: block;
            margin-bottom: 4px;
            color: #adb5bd;
          }

          .nominee-upload-box:hover i {
            color: var(--brand);
          }
        }
      </style>
    </head>

    <body>
      <div id="mainContent" class="main-content">
        <!-- ═══════════════════════════════ STICKY HEADER ═══════════════════════════════ -->
        <div class="form-header">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="title">
              <i class="bi bi-person-plus-fill me-2" style="color:var(--brand)"></i>New Employee Registration
            </span>
            <div class="d-flex gap-2">
              <button class="btn btn-outline-secondary btn-sm" onclick="handleCancel()">
                <i class="bi bi-x-lg me-1"></i>Cancel
              </button>
              <button class="btn btn-brand btn-sm" onclick="handleSave()">
                <i class="bi bi-floppy-fill me-1"></i>Save &amp; Close
              </button>
            </div>
          </div>
          <!-- Step navigation -->
          <div class="step-nav" id="stepNav">
            <button class="step-btn active" data-step="1" onclick="goTo(1)">
              <span class="step-badge">1</span> Employment
            </button>
            <button class="step-btn" data-step="2" onclick="goTo(2)">
              <span class="step-badge">2</span> Personal
            </button>
            <button class="step-btn" data-step="3" onclick="goTo(3)">
              <span class="step-badge">3</span> Identification
            </button>
            <button class="step-btn" data-step="4" onclick="goTo(4)">
              <span class="step-badge">4</span> Address
            </button>
            <button class="step-btn" data-step="5" onclick="goTo(5)">
              <span class="step-badge">5</span> Education
            </button>
            <button class="step-btn" data-step="6" onclick="goTo(6)">
              <span class="step-badge">6</span> Training Experience
            </button>
            <button class="step-btn" data-step="7" onclick="goTo(7)">
              <span class="step-badge">7</span> Job Experience
            </button>
            <button class="step-btn" data-step="8" onclick="goTo(8)">
              <span class="step-badge">8</span> Guarantor
            </button>
            <button class="step-btn" data-step="9" onclick="goTo(9)">
              <span class="step-badge">9</span> Nominee
            </button>

          </div>
        </div>

        <!-- ═══════════════════════════════ MAIN CONTENT ═══════════════════════════════ -->
        <div class="py-4" style="">
          <div class="form-card">
            <div class="p-4">

              <!-- ───────── STEP 1: Employment ───────── -->
              <div class="step-panel active" id="step-1">
                <p class="section-label"><i class="bi bi-briefcase me-2"></i>Step 1 — Employment Information</p>
                <div class="row g-3">
                  <div class="col-md-4">
                    <label class="form-label">Employee ID <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="employee_id" id="employee_id"
                      placeholder="e.g. 10120" />
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Joining Date</label>
                    <input type="date" onfocus="this.showPicker()" name="emp_joining_date" id="emp_joining_date"
                      class="form-control" onchange="calcConfirmDate()" />
                  </div>

                  <div class="col-md-4">
                    <label class="form-label">Employee Name <span class="text-danger">*</span></label>
                    <input type="text" name="employee_name" id="employee_name" class="form-control"
                      placeholder="Full name" />
                  </div>


                  <div class="col-md-4">
                    <label class="form-label">Branch <span class="text-danger">*</span></label>
                    <select class="form-select" name="work_station" id="work_station">
                      <option value="">Select Branch</option>
                      <?php
                      $query_branch = mysqli_query($conn_ad, "SELECT `branch_code`,`branch_name` FROM `office_branch` WHERE branch_status = 1 ORDER BY branch_code ASC");
                      while ($result_branch = mysqli_fetch_assoc($query_branch)) {
                        $sel = (isset($_GET['employment_form']) && $_GET['employment_form'] == $result_branch['branch_code']) ? 'selected' : '';
                        echo '<option value="' . $result_branch['branch_code'] . '" ' . $sel . '>' . $result_branch['branch_code'] . '-' . $result_branch['branch_name'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>



                  <div class="col-md-4">
                    <label class="form-label">Department <span class="text-danger">*</span></label>
                    <select class="form-select" id="department" name="department">
                      <option value="">Select Department</option>
                      <?php
                      $query_dept = mysqli_query($conn_ad, "SELECT `dep_id`, `dep_name`, `dep_code` FROM `department` ORDER BY `dep_name` ASC");
                      while ($result_dept = mysqli_fetch_assoc($query_dept)) {
                        $sel = (isset($_POST['department']) && $_POST['department'] == $result_dept['dep_code']) ? 'selected' : '';
                        echo '<option value="' . $result_dept['dep_id'] . '" ' . $sel . '>' . $result_dept['dep_name'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>


                  <div class="col-md-4">
                    <label class="form-label">Designation <span class="text-danger">*</span></label>
                    <select class="form-select" id="designation" name="designation">
                      <option value="">Select Designation</option>
                      <?php
                      $query_desig = mysqli_query($conn_ad, "SELECT `desig_code`, `desig_name`, `desig_short_name`, `salary_grade` FROM `designation` ORDER BY `desig_name` ASC");
                      while ($result_desig = mysqli_fetch_assoc($query_desig)) {
                        $sel = (isset($_POST['designation']) && $_POST['designation'] == $result_desig['desig_code']) ? 'selected' : '';
                        echo '<option value="' . $result_desig['desig_code'] . '" ' . $sel . '>' . $result_desig['desig_name'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>


                  <div class="col-md-4">
                    <label class="form-label">Project's Name <span class="text-danger">*</span></label>
                    <select class="form-select" id="project_name" name="project_name">
                      <option value="">Select Project's Name</option>
                      <?php
                      $query_projectName = mysqli_query($conn_ad, "SELECT `program_id`, `program_code`, `program_name`, `program_description` FROM `program_name` ORDER BY `program_name` ASC");
                      while ($result_projectName = mysqli_fetch_assoc($query_projectName)) {
                        $sel = (isset($_POST['project_name']) && $_POST['project_name'] == $result_desig['program_code']) ? 'selected' : '';
                        echo '<option value="' . $result_projectName['program_code'] . '" ' . $sel . '>' . $result_projectName['program_name'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>


                  <div class="col-md-4">
                    <label class="form-label">Employee Type</label>
                    <select name="emploee_type" id="emploee_type" class="form-select">
                      <option value="">Select type</option>
                      <option value="Regular">Regular</option>
                      <option value="Contractual">Contractual</option>
                      <option value="Intern">Intern</option>
                      <option value="Part-time">Part-time</option>
                    </select>
                  </div>


                  <div class="col-md-4">
                    <label class="form-label">Amount of Security Money</label>
                    <div class="input-group">
                      <span class="input-group-text" style="font-size:13px">৳</span>
                      <input type="number" name="security_money" class="form-control" placeholder="0.00" />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Initial Deposit Amount</label>
                    <div class="input-group">
                      <span class="input-group-text" style="font-size:13px">৳</span>
                      <input type="number" name="deposit_money" class="form-control" placeholder="0.00" />
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label">Probation Period</label>
                    <select name="probation_period" id="probation_period" class="form-select" onchange="calcConfirmDate()">
                      <option value="">Select type</option>
                      <option value="3">3 Months</option>
                      <option value="6">6 Months</option>
                      <option value="9">9 Months</option>
                      <option value="12">12 Months</option>
                    </select>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label">Tentative Confirmation Date</label>
                    <input type="date" name="date_conf" id="tentative_confirmation_date" class="form-control" readonly
                      style="background:#f8f9fa" />
                  </div>

                  <div class="col-12 mb-5">
                    <label class="form-label">Note</label>
                    <textarea class="form-control" name="emp_note" placeholder="Describe the extra details..."></textarea>
                  </div>
                </div>
              </div>

              <!-- ───────── STEP 2: Personal ───────── -->
              <div class="step-panel" id="step-2">
                <p class="section-label"><i class="bi bi-person me-2"></i>Step 2 — Personal Information</p>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label">Father's Name</label>
                    <input type="text" name="fathers_name" class="form-control" placeholder="Father's full name" />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Mother's Name</label>
                    <input name="mothers_name" type="text" class="form-control" placeholder="Mother's full name" />
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Religion</label>
                    <select name="religion" class="form-select">
                      <option value="">Select religion</option>
                      <option>Islam</option>
                      <option>Hinduism</option>
                      <option>Christianity</option>
                      <option>Buddhism</option>
                      <option>Other</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-select">
                      <option value="">Select gender</option>
                      <option>Male</option>
                      <option>Female</option>
                      <option>Other</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Marital Status</label>
                    <select name="merital_status" class="form-select">
                      <option value="">Select status</option>
                      <option>Single</option>
                      <option>Married</option>
                      <option>Divorced</option>
                      <option>Widowed</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Blood Group</label>
                    <select name="blood_group" class="form-select">
                      <option value="">Select blood group</option>
                      <option>A+</option>
                      <option>A-</option>
                      <option>B+</option>
                      <option>B-</option>
                      <option>AB+</option>
                      <option>AB-</option>
                      <option>O+</option>
                      <option>O-</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Employee Status</label>
                    <select name="empl_status" class="form-select">
                      <option value="">Select status</option>
                      <option>Active</option>
                      <option>Inactive</option>
                      <option>On Leave</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label class="form-label">Upload Picture</label>
                    <div class="upload-box" onclick="document.getElementById('picUpload').click()">
                      <i class="bi bi-cloud-arrow-up"></i>
                      <div class="up-label">Click to upload employee photo</div>
                      <div class="up-hint">JPG, PNG — max 5 MB</div>
                    </div>
                    <input name="empl_picture" type="file" id="picUpload" accept="image/*" style="display:none"
                      onchange="showFile(this,'picChosen')" />
                    <div class="file-chosen" id="picChosen"></div>
                  </div>
                </div>
              </div>

              <!-- ───────── STEP 3: Identification ───────── -->
              <div class="step-panel" id="step-3">
                <p class="section-label"><i class="bi bi-card-text me-2"></i>Step 3 — Identification Details</p>
                <div class="row g-3">
                  <div class="col-md-4">
                    <label class="form-label">National ID</label>
                    <input type="text" name="national_id" class="form-control" placeholder="NID number" />
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Birth Registration ID</label>
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
                    <label class="form-label">Mobile No.</label>
                    <input type="tel" name="mobile_no" class="form-control" placeholder="+880 1XXXXXXXXX" />
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Email ID</label>
                    <input type="email" name="email_id" class="form-control" placeholder="email@example.com" />
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Nationality</label>
                    <input type="text" name="nationality" class="form-control" placeholder="e.g. Bangladeshi" />
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" onfocus="this.showPicker()" name="date_of_birth" class="form-control" />
                  </div>
                </div>
              </div>

              <!-- ───────── STEP 4: Address ───────── -->
              <div class="step-panel" id="step-4">
                <p class="section-label"><i class="bi bi-geo-alt me-2"></i>Step 4 — Address Details</p>

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

              <!-- ───────── STEP 5: Education ───────── -->
              <div class="step-panel" id="step-5">
                <p class="section-label"><i class="bi bi-mortarboard me-2"></i>Step 5 — Educational Background</p>
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
                            <option>SSC</option>
                            <option>HSC</option>
                            <option>Diploma</option>
                            <option>Bachelor's</option>
                            <option>Master's</option>
                            <option>PhD</option>
                            <option>Other</option>
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

              <!-- ───────── STEP 6: Training Experience ───────── -->
              <div class="step-panel" id="step-6">
                <p class="section-label"><i class="bi bi-card-text me-2"></i>Step 6 — Training Experience</p>
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




              <!-- ───────── STEP 7: Job Exprience ───────── -->
              <div class="step-panel" id="step-7">
                <p class="section-label"><i class="bi bi-card-text me-2"></i>Step 7 — Job Experience</p>
                <div class="table-responsive">
                  <table class="train-table">
                    <thead>
                      <tr>
                        <th style="min-width:110px">Organization Name</th>
                        <th style="min-width:150px">Project Name</th>
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
                        <td><input name="project_name" type="text" placeholder="Project Name" /></td>
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

              <!-- ───────── STEP 8: Guarantor ───────── -->
              <div class="step-panel" id="step-8">
                <p class="section-label"><i class="bi bi-person me-2"></i>Step 8 — Guarantor Information</p>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label">Guarantor Name</label>
                    <input type="text" class="form-control" name="guerontor_name" placeholder="Guarantor's full name" />
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">NID or Passport Number</label>
                    <input type="text" class="form-control" id="nid_passporta" name="nid_passport"
                      pattern="^(\d{10}|\d{17}|[A-Za-z]{2}\d{7})$" maxlength="17"
                      placeholder="NID (10 or 17 digits) or Passport (e.g. AB1234567)" oninput="validateNidPassport(this)"
                      requireda />
                    <div class="invalid-feedback" id="nid_passport_msg">
                      Enter a valid NID (10 or 17 digits) or Passport number
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Birth Date</label>
                    <input type="date" onfocus="this.showPicker()" class="form-control" name="date_of_birth"
                      placeholder="Date of Birth" />
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-select">
                      <option value="">Select gender</option>
                      <option>Male</option>
                      <option>Female</option>
                      <option>Other</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="phone_no" placeholder="Phone Number" />
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Email Id</label>
                    <input type="text" class="form-control" name="email_id" placeholder="Email ID" />
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Occupation</label>
                    <input type="text" class="form-control" name="occupation" placeholder="Occupation" />
                  </div>

                  <div class="col-12">
                    <label class="form-label">Upload Picture</label>
                    <div class="upload-box" onclick="document.getElementById('picUploadGuar').click()">
                      <i class="bi bi-cloud-arrow-up"></i>
                      <div class="up-label">Click to upload employee photo</div>
                      <div class="up-hint">JPG, PNG — max 5 MB</div>
                    </div>
                    <input name="guar_picture" type="file" id="picUploadGuar" accept="image/*" style="display:none"
                      onchange="showFile(this,'picChosenGuar')" />
                    <div class="file-chosen" id="picChosenGuar"></div>
                  </div>

                  <!-- Permanent -->
                  <div class="mb-4">
                    <div class="d-flex align-items-center mb-3">
                      <i class="bi bi-house-fill me-2" style="color:var(--brand);font-size:14px"></i>
                      <span class="addr-title">Permanent Address</span>
                    </div>
                    <div class="row g-3">
                      <div class="col-12">
                        <label class="form-label">Parmanent Address</label>
                        <input type="text" class="form-control" id="guar-perm-house" name="permanent_address"
                          placeholder="House no., Road, Village/Area, Division, District, Upazila, Thana"
                          oninput="syncGuarAddr()" />
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
                        <input type="checkbox" id="sameGuarAddr" onchange="toggleSameGuar()" />
                        Same as permanent address
                      </label>
                    </div>
                    <div class="row g-3" id="presentAddrFields">
                      <div class="col-12">
                        <label class="form-label">House / Road</label>
                        <input name="present_address" type="text" class="form-control" id="guar-pres-house"
                          placeholder="House no., Road, Village/Area, Division, District, Upazila, Thana" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <!-- ───────── STEP 9: Nominee ───────── -->
              <div class="step-panel" id="step-9">
                <p class="section-label"><i class="bi bi-people me-2"></i>Step 9 — Nominee Information</p>

                <!-- Percentage Summary Bar -->
                <div class="card border-0 mb-4" style="background:#f8f9fa;border-radius:10px">
                  <div class="card-body py-3">
                    <div class="row g-3 text-center">
                      <div class="col-md-3 col-6">
                        <div class="fw-600" style="font-size:12px;color:#6c757d;margin-bottom:4px">Employee PF</div>
                        <div class="progress" style="height:8px;border-radius:4px">
                          <div class="progress-bar" id="bar_emp_pf" style="background:var(--brand);width:0%"></div>
                        </div>
                        <div style="font-size:12px;margin-top:4px"><span id="total_emp_pf">0</span>% / 100%</div>
                      </div>
                      <div class="col-md-3 col-6">
                        <div class="fw-600" style="font-size:12px;color:#6c757d;margin-bottom:4px">Gratuity</div>
                        <div class="progress" style="height:8px;border-radius:4px">
                          <div class="progress-bar" id="bar_gratuity" style="background:#0d6efd;width:0%"></div>
                        </div>
                        <div style="font-size:12px;margin-top:4px"><span id="total_gratuity">0</span>% / 100%</div>
                      </div>
                      <div class="col-md-3 col-6">
                        <div class="fw-600" style="font-size:12px;color:#6c757d;margin-bottom:4px">Staff Welfare Fund</div>
                        <div class="progress" style="height:8px;border-radius:4px">
                          <div class="progress-bar" id="bar_staff_welfare_fund" style="background:#fd7e14;width:0%"></div>
                        </div>
                        <div style="font-size:12px;margin-top:4px"><span id="total_staff_welfare_fund">0</span>% / 100%
                        </div>
                      </div>
                      <div class="col-md-3 col-6">
                        <div class="fw-600" style="font-size:12px;color:#6c757d;margin-bottom:4px">Other Benefit</div>
                        <div class="progress" style="height:8px;border-radius:4px">
                          <div class="progress-bar" id="bar_other_benifit" style="background:#6f42c1;width:0%"></div>
                        </div>
                        <div style="font-size:12px;margin-top:4px"><span id="total_other_benifit">0</span>% / 100%</div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Nominee Cards -->
                <div id="nomineeContainer"></div>

                <button class="btn-add-row mt-2" onclick="addNominee()">
                  <i class="bi bi-plus-circle me-1"></i> Add Nominee
                </button>
              </div>


            </div><!-- /p-4 -->

            <!-- ═══ Footer navigation ═══ -->
            <div class="form-footer d-flex justify-content-between align-items-center">
              <div>
                <button class="btn btn-outline-secondary btn-sm" id="prevBtn" onclick="prevStep()" style="display:none">
                  <i class="bi bi-arrow-left me-1"></i>Previous
                </button>
              </div>
              <span class="progress-text" id="progressTxt">Step 1 of 8</span>
              <div>
                <button class="btn btn-brand btn-sm" id="nextBtn" onclick="nextStep()">
                  Next <i class="bi bi-arrow-right ms-1"></i>
                </button>
              </div>
            </div>

          </div><!-- /form-card -->
        </div><!-- /container -->
      </div>


      <script>
        let currentStep = 1;
        const totalSteps = 9;

        function goTo(n) {
          const steps = document.querySelectorAll('.step-panel');
          const navBtns = document.querySelectorAll('.step-btn');

          // hide current
          document.getElementById('step-' + currentStep).classList.remove('active');

          // mark old step nav state
          const oldNav = document.querySelector('[data-step="' + currentStep + '"]');
          oldNav.classList.remove('active');
          if (n > currentStep) oldNav.classList.add('completed');

          currentStep = n;

          // show new
          document.getElementById('step-' + currentStep).classList.add('active');
          const newNav = document.querySelector('[data-step="' + currentStep + '"]');
          newNav.classList.add('active');
          newNav.classList.remove('completed');

          // update footer
          document.getElementById('progressTxt').textContent = 'Step ' + currentStep + ' of ' + totalSteps;
          document.getElementById('prevBtn').style.display = currentStep > 1 ? '' : 'none';

          const nextBtn = document.getElementById('nextBtn');
          if (currentStep === totalSteps) {
            nextBtn.style.display = 'none';
          } else {
            nextBtn.style.display = '';
            nextBtn.innerHTML = 'Next <i class="bi bi-arrow-right ms-1"></i>';
          }

          // scroll to top of page
          window.scrollTo({
            top: 0,
            behavior: 'smooth'
          });
        }

        function nextStep() {
          if (currentStep < totalSteps) goTo(currentStep + 1);
        }

        function prevStep() {
          if (currentStep > 1) goTo(currentStep - 1);
        }

        function handleCancel() {
          if (confirm('Cancel registration? Any unsaved data will be lost.')) {
            history.back();
          }
        }

        /* For Save and poat Data to Backend */
        async function handleSave() {
          // Validate nominees percentage before saving
          if (!validateNominees()) return;

          const formData = new FormData();

          // ── Step 1 ──
          formData.append('employee_id', document.getElementById('employee_id').value);
          formData.append('emp_joining_date', document.getElementById('emp_joining_date').value);
          formData.append('employee_name', document.getElementById('employee_name').value);
          formData.append('work_station', document.getElementById('work_station').value);
          formData.append('department', document.getElementById('department').value);
          formData.append('designation', document.getElementById('designation').value);
          formData.append('project_name', document.getElementById('project_name').value);
          formData.append('emploee_type', document.getElementById('emploee_type').value);
          formData.append('security_money', document.querySelector('[name="security_money"]').value);
          formData.append('deposit_money', document.querySelector('[name="deposit_money"]').value);
          formData.append('probation_period', document.getElementById('probation_period').value);
          formData.append('date_conf', document.getElementById('tentative_confirmation_date').value);
          formData.append('emp_note', document.querySelector('[name="emp_note"]').value);

          // ── Step 2 ──
          formData.append('fathers_name', document.querySelector('[name="fathers_name"]').value);
          formData.append('mothers_name', document.querySelector('[name="mothers_name"]').value);
          formData.append('religion', document.querySelector('[name="religion"]').value);
          formData.append('gender', document.querySelector('#step-2 [name="gender"]').value);
          formData.append('merital_status', document.querySelector('[name="merital_status"]').value);
          formData.append('blood_group', document.querySelector('[name="blood_group"]').value);
          formData.append('empl_status', document.querySelector('[name="empl_status"]').value);

          // Employee picture
          const pic = document.getElementById('picUpload').files[0];
          if (pic) formData.append('empl_picture', pic);

          // ── Step 3 ──
          formData.append('national_id', document.querySelector('[name="national_id"]').value);
          formData.append('birth_id', document.querySelector('[name="birth_id"]').value);
          formData.append('passport_no', document.querySelector('[name="passport_no"]').value);
          formData.append('driving_license', document.querySelector('[name="driving_license"]').value);
          formData.append('tin_no', document.querySelector('[name="tin_no"]').value);
          formData.append('mobile_no', document.querySelector('[name="mobile_no"]').value);
          formData.append('email_id', document.querySelector('[name="email_id"]').value);
          formData.append('nationality', document.querySelector('[name="nationality"]').value);
          formData.append('date_of_birth', document.querySelector('[name="date_of_birth"]').value);

          // ── Step 4 ──
          formData.append('per_house', document.getElementById('perm-house').value);
          formData.append('per_division', document.getElementById('perm-div').value);
          formData.append('per_district', document.getElementById('perm-dist').value);
          formData.append('per_upazilla', document.getElementById('perm-upa').value);
          formData.append('per_post', document.getElementById('perm-post').value);
          formData.append('per_post_code', document.getElementById('perm-post-code').value);
          formData.append('pre_house', document.getElementById('pres-house').value);
          formData.append('pre_division', document.getElementById('pres-div').value);
          formData.append('pre_district', document.getElementById('pres-dist').value);
          formData.append('pre_upazilla', document.getElementById('pres-upa').value);
          formData.append('pre_post', document.getElementById('pres-post').value);
          formData.append('pre_post_code', document.getElementById('pres-post-code').value);

          // ── Step 5: Education rows ──
          document.querySelectorAll('#eduBody tr').forEach((row, i) => {
            const cols = row.querySelectorAll('input, select');
            formData.append(`education[${i}][examination]`, cols[0]?.value || '');
            formData.append(`education[${i}][institution]`, cols[1]?.value || '');
            formData.append(`education[${i}][major_subject]`, cols[2]?.value || '');
            formData.append(`education[${i}][board_university]`, cols[3]?.value || '');
            formData.append(`education[${i}][academic_year]`, cols[4]?.value || '');
            formData.append(`education[${i}][result]`, cols[5]?.value || '');
          });

          // ── Step 6: Training rows ──
          document.querySelectorAll('#trainBody tr').forEach((row, i) => {
            const cols = row.querySelectorAll('input');
            formData.append(`training[${i}][course_name]`, cols[0]?.value || '');
            formData.append(`training[${i}][course_stard_date]`, cols[1]?.value || '');
            formData.append(`training[${i}][course_end_date]`, cols[2]?.value || '');
            formData.append(`training[${i}][course_duration]`, cols[3]?.value || '');
            formData.append(`training[${i}][institution_name]`, cols[4]?.value || '');
            formData.append(`training[${i}][institution_address]`, cols[5]?.value || '');
            formData.append(`training[${i}][result]`, cols[6]?.value || '');
          });

          // ── Step 7: Experience rows ──
          document.querySelectorAll('#jobBody tr').forEach((row, i) => {
            const cols = row.querySelectorAll('input');
            formData.append(`experience[${i}][org_name]`, cols[0]?.value || '');
            formData.append(`experience[${i}][project_name]`, cols[1]?.value || '');
            formData.append(`experience[${i}][company_location]`, cols[2]?.value || '');
            formData.append(`experience[${i}][from_date]`, cols[3]?.value || '');
            formData.append(`experience[${i}][to_date]`, cols[4]?.value || '');
            formData.append(`experience[${i}][job_respons]`, cols[5]?.value || '');
          });

          // ── Step 8: Guarantor ──
          formData.append('guerontor_name', document.querySelector('[name="guerontor_name"]').value);
          formData.append('nid_passport', document.getElementById('nid_passporta').value);
          formData.append('guar_date_of_birth', document.querySelector('#step-8 [name="date_of_birth"]').value);
          formData.append('guar_gender', document.querySelector('#step-8 [name="gender"]').value);
          formData.append('phone_no', document.querySelector('[name="phone_no"]').value);
          formData.append('guar_email_id', document.querySelector('#step-8 [name="email_id"]').value);
          formData.append('permanent_address', document.querySelector('[name="permanent_address"]').value);
          formData.append('present_address', document.querySelector('[name="present_address"]').value);
          formData.append('occupation', document.querySelector('[name="occupation"]').value);

          // Guarantor picture
          const picGuar = document.getElementById('picUploadGuar').files[0];
          if (picGuar) formData.append('guar_picture', picGuar);

          // ── Step 9: Nominee cards ──
          document.querySelectorAll('.nominee-card').forEach((card) => {
            const idx = card.id.replace('nominee_card_', '');

            // Append all text/select/number fields inside this card
            card.querySelectorAll('input[name], select[name]').forEach(field => {
              if (field.type !== 'file') {
                formData.append(field.name, field.value);
              }
            });

            // Nominee picture file — match PHP's expected key exactly
            const nomPicInput = document.getElementById('nom_pic_' + idx);
            if (nomPicInput && nomPicInput.files[0]) {
              formData.append('nominee_picture' + idx, nomPicInput.files[0]);
            }
          });

          // ── Send to backend ──
          try {
            const btn = document.querySelector('.btn-brand[onclick="handleSave()"]');
            if (btn) {
              btn.disabled = true;
              btn.innerHTML = '<i class="bi bi-hourglass-split me-1"></i>Saving...';
            }

            const response = await fetch('employee_save.php', {
              method: 'POST',
              body: formData
            });

            const result = await response.json();

            if (result.success) {
              alert('Success' + result.message);
              history.back();
            } else {
              alert('Error: ' + result.message);
              if (btn) {
                btn.disabled = false;
                btn.innerHTML = '<i class="bi bi-floppy-fill me-1"></i>Save &amp; Close';
              }
            }
          } catch (err) {
            alert('Network error: ' + err.message);
            const btn = document.querySelector('.btn-brand[onclick="handleSave()"]');
            if (btn) {
              btn.disabled = false;
              btn.innerHTML = '<i class="bi bi-floppy-fill me-1"></i>Save &amp; Close';
            }
          }
        }


        /* ── File upload ── */
        function showFile(input, labelId) {
          const label = document.getElementById(labelId);
          if (input.files && input.files[0]) {
            label.textContent = '✓ ' + input.files[0].name;
            label.style.display = 'block';
          }
        }

        /* ── Address sync ── */
        function toggleSame() {
          const checked = document.getElementById('sameAddr').checked;
          const presFields = ['pres-house', 'pres-div', 'pres-dist', 'pres-upa', 'pres-post', 'pres-post-code'];
          if (checked) {
            document.getElementById('pres-house').value = document.getElementById('perm-house').value;
            document.getElementById('pres-div').value = document.getElementById('perm-div').value;
            document.getElementById('pres-dist').value = document.getElementById('perm-dist').value;
            document.getElementById('pres-upa').value = document.getElementById('perm-upa').value;
            document.getElementById('pres-post').value = document.getElementById('perm-post').value;
            document.getElementById('pres-post-code').value = document.getElementById('perm-post-code').value;
            presFields.forEach(id => {
              const el = document.getElementById(id);
              el.disabled = true;
              el.style.opacity = '0.6';
              el.style.background = '#f8f9fa';
            });
          } else {
            presFields.forEach(id => {
              const el = document.getElementById(id);
              el.disabled = false;
              el.style.opacity = '1';
              el.style.background = '';
            });
          }
        }

        function syncAddr() {
          if (document.getElementById('sameAddr').checked) toggleSame();
        }



        /* ── Guarantor Address sync ── */
        function toggleSameGuar() {
          const checked = document.getElementById('sameGuarAddr').checked;
          const presFields = ['guar-pres-house'];
          if (checked) {
            document.getElementById('guar-pres-house').value = document.getElementById('guar-perm-house').value;
            presFields.forEach(id => {
              const el = document.getElementById(id);
              el.disabled = true;
              el.style.opacity = '0.6';
              el.style.background = '#f8f9fa';
            });
          } else {
            presFields.forEach(id => {
              const el = document.getElementById(id);
              el.disabled = false;
              el.style.opacity = '1';
              el.style.background = '';
            });
          }
        }

        function syncGuarAddr() {
          if (document.getElementById('sameGuarAddr').checked) toggleSameGuar();
        }



        /* ── Education table ── */
        function addEduRow() {
          const tbody = document.getElementById('eduBody');
          const tr = document.createElement('tr');
          tr.innerHTML = `
      <td>
        <select>
          <option value="">Select</option>
          <option>SSC</option><option>HSC</option><option>Diploma</option>
          <option>Bachelor's</option><option>Master's</option><option>PhD</option><option>Other</option>
        </select>
      </td>
      <td><input type="text" placeholder="Institution" /></td>
      <td><input type="text" placeholder="Subject" /></td>
      <td><input type="text" placeholder="Board / University" /></td>
      <td><input type="text" placeholder="e.g. 2018–2019" /></td>
      <td><input type="text" placeholder="GPA / Grade" /></td>
      <td>
        <button class="del-row-btn" onclick="deleteRow(this)" title="Remove row">
          <i class="bi bi-trash3"></i>
        </button>
      </td>
    `;
          tbody.appendChild(tr);
        }

        function deleteRow(btn) {
          const rows = document.getElementById('eduBody').querySelectorAll('tr');
          if (rows.length > 1) {
            btn.closest('tr').remove();
          } else {
            alert('At least one education record is required.');
          }
        }



        /* ── Training Experience ── */
        function addTrainRow() {
          const tbody = document.getElementById('trainBody');
          const tr = document.createElement('tr');
          tr.innerHTML = `
                        <td><input type="text" name="course_name" placeholder="Course Name" /></td>
                        <td><input type="date" name="course_stard_date" placeholder="Course Start Date" /></td>
                        <td><input type="date" name="course_end_date" placeholder="Course End Date" /></td>
                        <td><input type="text" name="course_duration" placeholder="Course Duration" /></td>
                        <td><input type="text" name="institution_name" placeholder="Institution Name" /></td>
                        <td><input type="text" name="institution_address" placeholder="Institution Address" /></td>
                        <td><input type="text" name="result" placeholder="Result" /></td>
                        <td>
                          <button class=" del-row-btn" onclick="deleteRow(this)" title="Remove row">
                            <i class="bi bi-trash3"></i>
                          </button>
                        </td>
    `;
          tbody.appendChild(tr);
        }

        function deleteRow(btn) {
          const rows = document.getElementById('trainBody').querySelectorAll('tr');
          btn.closest('tr').remove();
        }



        /* ── Job Experience ── */
        function addJobRow() {
          const tbody = document.getElementById('jobBody');
          const tr = document.createElement('tr');
          tr.innerHTML = `
                        <td><input type="text" placeholder="Organization Name" /></td>
                        <td><input type="text" placeholder="Project Name" /></td>
                        <td><input type="text" placeholder="Company Location" /></td>
                        <td><input type="date" placeholder="From Date" /></td>
                        <td><input type="date" placeholder="To Date" /></td>
                        <td><input type="text" placeholder="Job Responsibility" /></td>
      <td>
        <button class="del-row-btn" onclick="deleteRow(this)" title="Remove row">
          <i class="bi bi-trash3"></i>
        </button>
      </td>
    `;
          tbody.appendChild(tr);
        }

        function deleteRow(btn) {
          const rows = document.getElementById('jobBody').querySelectorAll('tr');
          btn.closest('tr').remove();
        }



        /*================ Required Conditions =======================*/
        function nextStep() {
          if (!validateStep(currentStep)) return; // stop if validation fails
          if (currentStep < totalSteps) goTo(currentStep + 1);
        }

        function validateStep(step) {
          // Get all required fields in the current step
          const panel = document.getElementById('step-' + step);
          const requiredFields = panel.querySelectorAll('[required]');

          let isValid = true;
          let firstInvalid = null;

          requiredFields.forEach(field => {
            // Remove old error style
            field.classList.remove('is-invalid');

            if (!field.value.trim()) {
              field.classList.add('is-invalid');
              isValid = false;
              if (!firstInvalid) firstInvalid = field; // track first empty field
            }
          });

          if (!isValid) {
            firstInvalid.focus(); // scroll to first empty field
            showValidationAlert(panel);
          }

          return isValid;
        }

        function showValidationAlert(panel) {
          // Remove old alert if exists
          const old = panel.querySelector('.validation-alert');
          if (old) old.remove();

          const alert = document.createElement('div');
          alert.className = 'alert alert-danger validation-alert mt-3';
          alert.innerHTML = '<i class="bi bi-exclamation-circle me-2"></i>Please fill in all required fields before proceeding.';
          panel.prepend(alert);

          // Auto remove after 3 seconds
          setTimeout(() => alert.remove(), 3000);
        }


        /*================ Nid Passport Conditions ==================*/
        function validateNidPassport(input) {
          const value = input.value.trim();

          const nid10 = /^\d{10}$/; // exactly 10 digits
          const nid17 = /^\d{17}$/; // exactly 17 digits
          const passport = /^[A-Za-z]{2}\d{7}$/; // exactly 2 letters + 7 digits = 9 chars

          const isValid = nid10.test(value) || nid17.test(value) || passport.test(value);

          if (!isValid && value.length > 0) {
            input.classList.add('is-invalid');
            input.classList.remove('is-valid');

            // Show specific message based on what they typed
            const msg = document.getElementById('nid_passport_msg');
            if (/^\d+$/.test(value)) {
              // user is typing digits — must be NID
              msg.textContent = value.length < 10 ?
                `NID must be 10 or 17 digits. You entered ${value.length} digit(s).` :
                value.length > 10 && value.length < 17 ?
                `NID must be exactly 10 or 17 digits. You entered ${value.length}.` :
                value.length > 17 ?
                'NID cannot be more than 17 digits.' :
                'Invalid NID number.';
            } else {
              // user is typing letters — must be passport
              msg.textContent = 'Passport must be 2 letters followed by 7 digits (e.g. AB1234567).';
            }
          } else if (isValid) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
          } else {
            input.classList.remove('is-invalid');
            input.classList.remove('is-valid');
          }
        }

        /*================ Nominee ==================*/
        let nomineeCount = 0;
        const PCT_FIELDS = ['emp_pf', 'gratuity', 'staff_welfare_fund', 'other_benifit'];

        function addNominee() {
          nomineeCount++;
          const idx = nomineeCount;
          const container = document.getElementById('nomineeContainer');

          const card = document.createElement('div');
          card.className = 'nominee-card';
          card.id = 'nominee_card_' + idx;
          card.innerHTML = `
    <div class="nominee-header">
      <span class="nominee-title"><i class="bi bi-person-fill me-2" style="color:var(--brand)"></i>Nominee ${idx}</span>
      <button class="nominee-remove-btn" onclick="removeNominee(${idx})">
        <i class="bi bi-trash3 me-1"></i>Remove
      </button>
    </div>
    <div class="row g-3">
      <div class="col-md-4">
        <label class="form-label">Nominee Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="nominee[${idx}][nominee_name]" placeholder="Full name" required />
      </div>
      <div class="col-md-4">
        <label class="form-label">Date of Birth</label>
        <input type="date" class="form-control" name="nominee[${idx}][birth_date]" />
      </div>
      <div class="col-md-4">
        <label class="form-label">Contact No.</label>
        <input type="tel" class="form-control" name="nominee[${idx}][contact_no]" placeholder="+880 1XXXXXXXXX" />
      </div>
      <div class="col-md-4">
        <label class="form-label">Relation</label>
        <select class="form-select" name="nominee[${idx}][relation]">
          <option value="">Select relation</option>
          <option>Father</option>
          <option>Mother</option>
          <option>Spouse</option>
          <option>Son</option>
          <option>Daughter</option>
          <option>Brother</option>
          <option>Sister</option>
          <option>Other</option>
        </select>
      </div>
      <div class="col-md-4">
        <label class="form-label">NID / Birth Reg. No.</label>
        <input type="text" class="form-control" name="nominee[${idx}][nid_birth_reg]" placeholder="NID or Birth Registration" />
      </div>
      <div class="col-md-4">
        <label class="form-label">Picture</label>
        <div class="nominee-upload-box" onclick="document.getElementById('nom_pic_${idx}').click()">
          <i class="bi bi-cloud-arrow-up"></i>
          Click to upload photo
        </div>
        <input type="file" id="nom_pic_${idx}" accept="image/*" style="display:none" onchange="showNomineePic(this, ${idx})" />
        <div id="nom_pic_name_${idx}" style="font-size:11px;color:var(--brand);margin-top:4px;display:none"></div>
      </div>

      <!-- Percentage fields -->
      <div class="col-12">
        <div class="section-label mb-3 mt-1">Benefit Allocation (%)</div>
        <div class="row g-3">
          <div class="col-md-3 col-6">
            <label class="form-label">Employee PF %</label>
            <div class="pct-input-wrap">
              <input type="number" class="form-control pct-field" min="0" max="100" step="0.01"
                name="nominee[${idx}][emp_pf]" data-field="emp_pf" data-idx="${idx}"
                placeholder="0" oninput="updatePercentage('emp_pf')" />
              <span class="pct-sign">%</span>
            </div>
            <div class="pct-msg text-danger mt-1" id="msg_emp_pf_${idx}" style="font-size:11px;display:none"></div>
          </div>
          <div class="col-md-3 col-6">
            <label class="form-label">Gratuity %</label>
            <div class="pct-input-wrap">
              <input type="number" class="form-control pct-field" min="0" max="100" step="0.01"
                name="nominee[${idx}][gratuity]" data-field="gratuity" data-idx="${idx}"
                placeholder="0" oninput="updatePercentage('gratuity')" />
              <span class="pct-sign">%</span>
            </div>
            <div class="pct-msg text-danger mt-1" id="msg_gratuity_${idx}" style="font-size:11px;display:none"></div>
          </div>
          <div class="col-md-3 col-6">
            <label class="form-label">Staff Welfare Fund %</label>
            <div class="pct-input-wrap">
              <input type="number" class="form-control pct-field" min="0" max="100" step="0.01"
                name="nominee[${idx}][staff_welfare_fund]" data-field="staff_welfare_fund" data-idx="${idx}"
                placeholder="0" oninput="updatePercentage('staff_welfare_fund')" />
              <span class="pct-sign">%</span>
            </div>
            <div class="pct-msg text-danger mt-1" id="msg_staff_welfare_fund_${idx}" style="font-size:11px;display:none"></div>
          </div>
          <div class="col-md-3 col-6">
            <label class="form-label">Other Benefit %</label>
            <div class="pct-input-wrap">
              <input type="number" class="form-control pct-field" min="0" max="100" step="0.01"
                name="nominee[${idx}][other_benifit]" data-field="other_benifit" data-idx="${idx}"
                placeholder="0" oninput="updatePercentage('other_benifit')" />
              <span class="pct-sign">%</span>
            </div>
            <div class="pct-msg text-danger mt-1" id="msg_other_benifit_${idx}" style="font-size:11px;display:none"></div>
          </div>
        </div>
      </div>
    </div>
  `;

          container.appendChild(card);
          updateAllPercentages();
        }

        function removeNominee(idx) {
          const card = document.getElementById('nominee_card_' + idx);
          if (card) card.remove();
          updateAllPercentages();
        }

        function showNomineePic(input, idx) {
          const label = document.getElementById('nom_pic_name_' + idx);
          if (input.files && input.files[0]) {
            label.textContent = '✓ ' + input.files[0].name;
            label.style.display = 'block';
          }
        }

        function updatePercentage(fieldName) {
          const inputs = document.querySelectorAll(`[data-field="${fieldName}"]`);
          let total = 0;

          inputs.forEach(input => {
            const val = parseFloat(input.value) || 0;
            total += val;
          });

          total = Math.round(total * 100) / 100;

          // Update progress bar and total display
          const bar = document.getElementById('bar_' + fieldName);
          const totalSpan = document.getElementById('total_' + fieldName);

          if (bar) {
            bar.style.width = Math.min(total, 100) + '%';
            bar.style.background = total > 100 ? '#dc3545' : total === 100 ? 'var(--brand)' : '#fd7e14';
          }

          if (totalSpan) totalSpan.textContent = total;

          // Show per-nominee warnings
          inputs.forEach(input => {
            const idx = input.getAttribute('data-idx');
            const msg = document.getElementById('msg_' + fieldName + '_' + idx);
            const val = parseFloat(input.value) || 0;

            input.classList.remove('pct-over', 'pct-ok');

            if (total > 100) {
              input.classList.add('pct-over');
              if (msg) {
                msg.textContent = `Total exceeds 100%. Currently at ${total}%. Please reduce by ${(total - 100).toFixed(2)}%.`;
                msg.style.display = 'block';
              }
            } else if (total === 100) {
              input.classList.add('pct-ok');
              if (msg) msg.style.display = 'none';
            } else {
              if (msg) {
                const remaining = (100 - total).toFixed(2);
                msg.textContent = remaining > 0 && val > 0 ? `${remaining}% remaining to allocate.` : '';
                msg.style.display = remaining > 0 && val > 0 ? 'block' : 'none';
                msg.style.color = '#fd7e14';
              }
            }
          });
        }

        function updateAllPercentages() {
          PCT_FIELDS.forEach(f => updatePercentage(f));
        }

        function validateNominees() {
          let valid = true;
          let msg = '';

          PCT_FIELDS.forEach(field => {
            const inputs = document.querySelectorAll(`[data-field="${field}"]`);
            let total = 0;
            inputs.forEach(i => total += parseFloat(i.value) || 0);
            total = Math.round(total * 100) / 100;

            const label = {
              emp_pf: 'Employee PF',
              gratuity: 'Gratuity',
              staff_welfare_fund: 'Staff Welfare Fund',
              other_benifit: 'Other Benefit'
            } [field];

            if (inputs.length > 0 && total !== 100 && total !== 0) {
              msg += `• ${label}: ${total}% allocated (must be exactly 100% or 0%)\n`;
              valid = false;
            }

            if (total > 100) {
              msg += `• ${label}: exceeds 100%\n`;
              valid = false;
            }
          });

          if (!valid) {
            alert('⚠️ Percentage allocation error:\n\n' + msg);
          }

          return valid;
        }





        /*=================== Tentative Confirmation Date Change Condition ==================*/
        function calcConfirmDate() {
          const joiningDate = document.getElementById('emp_joining_date').value;
          const probationMonth = document.getElementById('probation_period').value;
          const confirmField = document.getElementById('tentative_confirmation_date');

          // Both fields must be filled
          if (!joiningDate || !probationMonth) {
            confirmField.value = '';
            return;
          }

          const date = new Date(joiningDate);

          // Add probation months
          date.setMonth(date.getMonth() + parseInt(probationMonth));

          // Format to YYYY-MM-DD for input[type=date]
          const year = date.getFullYear();
          const month = String(date.getMonth() + 1).padStart(2, '0');
          const day = String(date.getDate()).padStart(2, '0');

          confirmField.value = `${year}-${month}-${day}`;
        }
      </script>
    </body>

    </html>

<?php
  } // end permission check
} // end session check
?>