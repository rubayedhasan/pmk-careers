// get submit button element
const circularPublishButton = document.querySelector(".publish-button");
const circularId = document.getElementById("circular-id");
const designationCategory = document.getElementById(
  "circular-designation-category",
);

// function:: to handle the circular publish cancel process
function handleCancel() {
  if (
    confirm(
      "This circular has not been published yet. Leaving this page will discard all unsaved information.",
    )
  ) {
    window.history.back();
  }
}

// function:: to handle the circular publish process
async function handlePublishCircular() {
  // create the for tag
  const circularFormData = new FormData();

  // appending the data to the form
  //step-1:: basic data
  circularFormData.append(
    "circular_designation_title",
    document.getElementById("circular-designation-title").value,
  );
  circularFormData.append(
    "circular_designation_category",
    document
      .getElementById("circular-designation-category")
      .value.trim()
      .toUpperCase(),
  );
  circularFormData.append(
    "circular_available_position",
    document.getElementById("circular-available-position").value,
  );
  circularFormData.append(
    "circular_id",
    document.getElementById("circular-id").value,
  );

  // step-2:: publish date
  circularFormData.append(
    "circular_publish_date",
    document.getElementById("circular-publish-date").value,
  );
  circularFormData.append(
    "circular_application_deadline",
    document.getElementById("circular-application-deadline").value,
  );

  // step-3:: salary and age
  circularFormData.append(
    "circular_probation_salary",
    document.getElementById("circular-probation-salary").value,
  );
  circularFormData.append(
    "circular_gross_salary",
    document.getElementById("circular-gross-salary").value,
  );
  circularFormData.append(
    "circular_min_age",
    document.getElementById("circular-min-age").value,
  );
  circularFormData.append(
    "circular_max_age",
    document.getElementById("circular-max-age").value,
  );
  circularFormData.append(
    "circular_age_deadline",
    document.getElementById("circular-age-deadline").value,
  );

  // step-4:: qualification
  circularFormData.append(
    "circular_education_requirement",
    document.getElementById("circular-education-requirement").value,
  );
  circularFormData.append(
    "circular_required_experience",
    document.getElementById("circular-required-experience").value,
  );
  circularFormData.append(
    "circular_additional_requirement",
    document.getElementById("circular-additional-requirement").value,
  );

  // step-5:: application instructions
  circularFormData.append(
    "circular_training_rules",
    document.getElementById("circular-training-rules").value,
  );

  // send data to back end:: circular_published.php
  try {
    // disable the publish button
    if (circularPublishButton) {
      circularPublishButton.disabled = true;
      circularPublishButton.innerHTML = `
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-loader">
	<path stroke="none" d="M0 0h24v24H0z" fill="none" />
	<path d="M12 6l0 -3" />
	<path d="M16.25 7.75l2.15 -2.15" />
	<path d="M18 12l3 0" />
	<path d="M16.25 16.25l2.15 2.15" />
	<path d="M12 18l0 3" />
	<path d="M7.75 16.25l-2.15 2.15" />
	<path d="M6 12l-3 0" />
	<path d="M7.75 7.75l-2.15 -2.15" />
</svg>
    <span>Publishing...</span>
    `;
    }

    // fetching the data
    const circularPublishResponse = await fetch(
      "../server/circular_published.php",
      {
        method: "POST",
        body: circularFormData,
      },
    );

    const responseResult = await circularPublishResponse.json();

    // response result success message
    if (responseResult.success) {
      alert(`Success ${responseResult.message}`);
      window.history.back();
    } else {
      alert(`Error: ${responseResult.message}`);

      // on error enable the publish button
      if (circularPublishButton) {
        circularPublishButton.disabled = false;
        circularPublishButton.innerHTML = `
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-telegram">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
                </svg>
    <span>Publish</span>
    `;
      }
    }
  } catch (err) {
    alert(`Network error: ${err.message}`);

    // on error enable the publish button
    if (circularPublishButton) {
      circularPublishButton.disabled = false;
      circularPublishButton.innerHTML = `
    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-telegram">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
                </svg>
    <span>Publish</span>
    `;
    }
  }
}

// generate the circular id
designationCategory.addEventListener("keyup", function () {
  var category = this.value.trim().toUpperCase();

  if (category == "") {
    circularId.value = "";
    return;
  }

  var xhr = new XMLHttpRequest();

  xhr.open("POST", "../server/generate_circular_id.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      circularId.value = xhr.responseText;
    }
  };

  xhr.send("category=" + encodeURIComponent(category));
});
