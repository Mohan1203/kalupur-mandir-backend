"use strict";

var $table = $("#table_list"); // "table" accordingly
var electiveSubjectGroupCounter = 1;

$(document).ready(function () {
    updatePrasadiRowButtons("pasadi-darshan-row");
});

// Function to update buttons based on row count
function updatePrasadiRowButtons() {
    const rows = $(".pasadi-darshan-row");
    const rowCount = rows.length;

    rows.each(function (index) {
        // Remove any previous button to prevent duplication
        $(this).find(".row-action-btn").remove();

        if (rowCount === 1) {
            // Don't show any button if only one row
            return;
        }

        // Create and append the remove button
        const removeBtn = $(`
            <div class="mb-3 col-md-6 row-action-btn">
                <button class="btn btn-danger remove-prasadi-row">
                    <i class="bi bi-dash-circle fs-5"></i>
                </button>
            </div>
        `);
        $(this).append(removeBtn);
    });
}

$(document).ready(function () {
    updateTestimonialRows();
});

// Function to update buttons based on row count
function updateTestimonialRows() {
    const rows = $(".testimonial-row");
    const rowCount = rows.length;

    rows.each(function (index) {
        // Remove any previous button to prevent duplication
        $(this).find(".row-action-btn").remove();

        if (rowCount === 1) {
            // Don't show any button if only one row
            return;
        }

        // Create and append the remove button
        const removeBtn = $(`
            <div class="mb-3 col-md-6 row-action-btn">
                <button class="btn btn-danger remove-testimonial-row">
                    <i class="bi bi-dash-circle fs-5"></i>
                </button>
            </div>
        `);
        $(this).append(removeBtn);
    });
}

$(document).on("click", ".add-prasadi-row", function (e) {
    e.preventDefault();

    let lastRow = $(".pasadi-darshan-row:last");
    let newRow = lastRow.clone();

    // Clear values inside inputs and textarea
    newRow.find("input, textarea").val("");

    // Optionally reset file input (can't fully clear file input for security, but UI-wise it's ok)
    newRow.find('input[type="file"]').val("");

    // Append new row before the add button
    $(".extra-prasadi-section")
        .find(".add-prasadi-row")
        .closest("div")
        .before(newRow);
    updatePrasadiRowButtons();
});
// Handle remove functionality
$(document).on("click", ".remove-prasadi-row", function (e) {
    e.preventDefault();
    $(this).closest(".pasadi-darshan-row").remove();
    updatePrasadiRowButtons();
});

$(document).on("click", ".add-testimonial-row", function (e) {
    e.preventDefault();

    let lastRow = $(".testimonial-row:last");
    let newRow = lastRow.clone();

    // Clear values inside inputs and textarea
    newRow.find("input, textarea").val("");

    // Optionally reset file input (can't fully clear file input for security, but UI-wise it's ok)
    newRow.find('input[type="file"]').val("");

    // Append new row before the add button
    $(".extra-testimonial-section")
        .find(".add-testimonial-row")
        .closest("div")
        .before(newRow);
    updateTestimonialRows();
});

$(document).on("click", ".remove-testimonial-row", function (e) {
    e.preventDefault();
    $(this).closest(".testimonial-row").remove();
    updateTestimonialRows();
});
