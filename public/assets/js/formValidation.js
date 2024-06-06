// script.js
$(document).ready(function () {
    $('select[name^="pilihan"]').change(function () {
        // Reset all dropdowns to default state
        $('select[name^="pilihan"]').removeClass('is-invalid');
        $('.invalid-feedback').hide();

        // Check for duplicate values
        var selectedValues = [];
        var hasDuplicates = false;

        $('select[name^="pilihan"]').each(function () {
            var value = $(this).val();
            // Exclude empty value (placeholder) from duplicate check
            if (value !== '') {
                if (selectedValues.indexOf(value) !== -1) {
                    hasDuplicates = true;
                    return false; // Exit the loop if a duplicate is found
                }
                selectedValues.push(value);
            }
        });

        // Update classes and error messages
        if (hasDuplicates) {
            $('select[name^="pilihan"]').addClass('is-invalid');
            $('.invalid-feedback').show();
            $('#submitBtn').hide(); // Hide submit button when there are duplicates
        } else {
            $('#submitBtn').show(); // Show submit button when there are no duplicates
        }
    });
});
