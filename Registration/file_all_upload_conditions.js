
// Pic & File upload check all condition for [ registration.php ] file


$(document).ready(function() {
    var buttonClicked = false; // Track if the button is clicked
    var conditionsMet = false; // Track if all conditions are met

    $('#uploadButton').click(function(e) {
      buttonClicked = true; // Set the button clicked flag to true
      var fileSize = $('#fileInput')[0].files[0].size; // Get the file size in bytes
      var fileUpload = $('#fileInput')[0].files[0].name; // Get the file name

      var fileSizeLimit = 3 * 1024 * 1024; // 3MB in bytes

      // Check if the file size exceeds the limit
      if (fileSize > fileSizeLimit) {
        e.preventDefault(); // Prevent the form from submitting
        alert('File size exceeds the limit. Please choose a file under 3MB.');
      } else if (!fileUpload.match(/\.(jpg|pdf)$/i)) {
        e.preventDefault(); // Prevent the form from submitting
        alert('Only JPG and PDF formats are allowed.');
      } else {
        // Check other conditions
        var fileExists = false; // Simulated condition for demonstration purposes
        if (fileExists) {
          e.preventDefault(); // Prevent the form from submitting
          alert('File already exists.');
        } else {
          // File upload logic
          conditionsMet = true; // Set conditionsMet to true if all conditions are met
          alert('File uploaded successfully.');
          return false; // Prevent form submission
        }
      }
    });

    $('#registrationForm').submit(function(e) {
      if (!buttonClicked) {
        e.preventDefault(); // Prevent the form from submitting if the button is not clicked
        alert('Please click the UPLOAD button and check all conditions before clicking the SUBMIT button.');
      } else if (!conditionsMet) {
        e.preventDefault(); // Prevent the form from submitting if conditions are not met
        alert('Please make sure all conditions are met before submitting the form.');
      }
    });
  });
