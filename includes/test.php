<input type="date" id="dob">

<script>
    const minAge = 18;
    const maxAge = 32;
    const ageDeadline = "2026-07-31";

    function calculateDateRange(minAge, maxAge, deadline) {
        const deadlineDate = new Date(deadline);

        // Earliest DOB (oldest allowed)
        const minDate = new Date(deadlineDate);
        minDate.setFullYear(minDate.getFullYear() - maxAge);

        // Latest DOB (youngest allowed)
        const maxDate = new Date(deadlineDate);
        maxDate.setFullYear(maxDate.getFullYear() - minAge);

        const format = (date) => {
            const y = date.getFullYear();
            const m = String(date.getMonth() + 1).padStart(2, "0");
            const d = String(date.getDate()).padStart(2, "0");
            return `${y}-${m}-${d}`;
        };

        return {
            min: format(minDate),
            max: format(maxDate)
        };
    }

    const range = calculateDateRange(minAge, maxAge, ageDeadline);

    const dobInput = document.getElementById("dob");
    dobInput.min = range.min;
    dobInput.max = range.max;

    console.log(range);
    // {
    //   min: "1994-07-31",
    //   max: "2008-07-31"
    // }
</script>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="files" id="">
    <button name="btn" type="submit">post</button>
</form>
<?php
print_r($_FILES);
?>