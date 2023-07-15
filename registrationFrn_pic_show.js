function previewFile(event) {
    var input = event.target;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        var fileExtension = input.files[0].name.split('.').pop().toLowerCase();

        if (fileExtension === 'pdf') {
          document.getElementById('previewImage').style.display = 'none';
          document.getElementById('previewPDF').src = e.target.result;
          document.getElementById('previewPDF').style.display = 'block';
        } else {
          document.getElementById('previewPDF').style.display = 'none';
          document.getElementById('previewImage').src = e.target.result;
          document.getElementById('previewImage').style.display = 'block';
        }
      };
      reader.readAsDataURL(input.files[0]);
    }
  }