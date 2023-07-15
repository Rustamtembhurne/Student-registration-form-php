<?php
include "./connection.php";
include "./insert.php";


?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <link rel="stylesheet" href="./style.css" />


</head>

<body>

  <div class="img_container">
    <img src="./img/1 (1).jpg" alt="home pic" />
  </div>

  <form class="row g-3 container text-white font-weight-bold " id="registrationForm" action="./insert.php" method="POST" enctype="multipart/form-data" style="margin: auto; width: 750px;">
    <!-- <form class="row g-3 container text-white font-weight-bold " action="./insert.php" method="POST" enctype="multipart/form-data" style="margin: auto; width: 750px;"> -->

    <h2 class="d-flex justify-content-center text-warning my-5 "> ꧁༒☬ STUDENT REGISTRATION FORM ☬༒꧂</h2>

    <div class="col-md-6 col-sm-6">
      <label for="Name" class="form-label ">First Name</label>
      <input type="text" name="First_Name" class="form-control text-dark" id="inputEmail4" placeholder="Enter your first name" required />
    </div>
    <div class="col-md-6 col-sm-6">
      <label for="inputPassword4" class="form-label">Last Name</label>
      <input type="text" name="Last_Name" class="form-control" id="inputPassword4" placeholder="Enter your Last name" required />
    </div>


    <!-- ================================================================ -->

    <div class="col-md-6">
      <label for="email" class="form-label ">Email ID</label>
      <input type="email" name="Email" class="form-control " id="inputEmail4" placeholder="Enter your email id" required />
    </div>
    <div class="col-md-6">
      <label for="number" class="form-label">Mobile Number</label>
      <input type="number" name="Number" class="form-control" id="inputPassword4" placeholder="Enter your mobile number" required />
    </div>



    <!-- ============================================================ -->



    <div class="col-12">
      <label for="inputAddress" class="form-label">Address</label>
      <textarea rows="4" cols="20" type="text" name="Address" class="form-control" id="inputAddress" placeholder="Enter your address" required></textarea>
    </div>



    <!-- ============================================================ -->



    <div class="col-md-6 ">
      <fieldset class="row mb-3 container">
        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
        <div class="row">
          <div class="col-sm-10 form-control">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="Gender" id="gridRadios1" value="Male" checked>
              <label class="form-check-label" for="gridRadios1">Male</label>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="Gender" id="gridRadios2" value="Female">
              <label class="form-check-label" for="gridRadios2">Female</label>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="Gender" id="gridRadios3" value="Other">
              <label class="form-check-label" for="gridRadios3">Other</label>
            </div>
          </div>
        </div>
      </fieldset>
    </div>



    <!--#  Date Of Birth -->
    <div class="col-md-3">
      <label for="inputAddress" class="form-label">DOB </label>
      <input type="date" name="DOB" class="date_style form-control " id="birthdate" max="2023-12-31" required>

    </div>



    <!-- ============================================================ -->



    <!-- # City -->
    <div class="col-md-6">
      <label for="inputCity" class="form-label">City</label>
      <input type="text" name="City" class="form-control" id="inputCity" placeholder="Enter your city name" />
    </div>



    <!-- # Pin Code -->
    <div class="col-md-3">
      <label for="inputZip" class="form-label">Pin Code</label>
      <input type="text" name="Pin_code" class="form-control" id="inputZip" placeholder="Enter your pin code number" />
    </div>




    <!-- ============================================================ -->



    <!-- # State -->
    <div class="col-md-6">
      <label for="inputState" class="form-label">State</label>
      <input type="text" name="State" class="form-control" id="inputState" placeholder="Enter your state name" />
    </div>



    <!-- # Select Country -->
    <div class="col-md-6">
      <label for="inputState" class="form-label">Country</label>
      <select id="inputState" name="Country" class="form-select">
        <option selected>Choose your country...</option>
        <option value="India">India</option>
        <option value="Russia">Russia</option>
        <option value="Canada">Canada</option>
        <option value="America">America</option>
        <option value="Qatar">Qatar</option>
      </select>
    </div>




    <!-- ============================================================= -->




    <!-- # Hobbise -->
    <div class="col-md-6">
      <fieldset class="row mb-3 container">
        <legend class="col-form-label col-sm-2 pt-0">Hobbies</legend>
        <div class="row">
          <div class="col-sm-10 form-control">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="Hobbies1[]" id="checkbox1" value="Chase" checked>
              <label class="form-check-label" for="checkbox1"> Chase</label>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="Hobbies1[]" id="checkbox2" value="Swiming">
              <label class="form-check-label" for="checkbox2">Swiming</label>
            </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="Hobbies1[]" id="checkbox3" value="Cricket">
              <label class="form-check-label" for="checkbox3">Cricket</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="Hobbies1[]" id="checkbox3" value="Hockey">
              <label class="form-check-label" for="checkbox3">Hockey</label>
            </div>

            <!-- <div class="form-group ">
              <label for="otherInput">Other...</label>
              <input type="text" class="form-control" id="otherInput" name="Hobbies">
            </div> -->

          </div>
        </div>
      </fieldset>
    </div>





    <!-- ============================================================= -->




    <!-- # File Uploading [pic & pdf] -->
    <div class="col-md-6">
      <fieldset class="row mb-3 container">
        <legend class="col-form-label  pt-0">Upload File</legend>
        <div class="row">
          <div class="col-sm-10 form-control">
            <label class="custom-file-label" for="fileInput">Choose File : [ Under 3mb ] JPG, PNG, & PDF Format Only</label>
            <div class="custom-file">
              <img id="previewImage" src="#" width="100px" height="100px" style="display: none;">
              <embed id="previewPDF" src="#" width="100%" height="300px" style="display: none;">

              <input type="file" name="File" class="custom-file-input" id="fileInput" accept="image/jpeg, image/png, application/pdf" onchange="previewFile(event)" required>
              <button type="submit" name="Upload_file_btn" class="btn btn-primary mt-2" id="uploadButton" required>Upload</button>
            </div>
          </div>
        </div>
      </fieldset>
    </div>


    <!-- # file upload all condition ex [file under 3mb & only jpg&pdf file upload....] -->
    <!--  # file ke liye ye dono link requried hi hai... -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./file_all_upload_conditions.js"></script>
    <!--************************************************************* -->


    <!-- # file image & pdf show ( display ) javascript -->
    <script src='./registrationFrn_pic_show.js'></script>
    <!--**************************************************************-->






    <!-- ============================================================= -->




    <div class="col-12 d-flex justify-content-center my-5">
      <button type="submit" name="Submit" class="btn btn-primary mx-5">Submit</button>
      <button type="reset" class="btn btn-info mx-5">Reset</button>
    </div>
    </fieldset>
    </div>

  </form>


  <!-- ============================================================== -->



  <!-- # Bootstrap link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <!-- //////////////////////////////////////////////////////////////// -->





</body>

</html>