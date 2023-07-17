<?php
include "./connection.php";



date_default_timezone_set('Asia/Kolkata');
$time = date('H:i:sa');    // a ---> am / pm 


if (isset($_GET["edit_id"])) {

    if (isset($_POST['Submit'])) {

        $First_Name = $_POST['First_Name'];
        $Last_Name = $_POST['Last_Name'];
        $Email = $_POST['Email'];
        $Number = $_POST['Number'];
        $Address = $_POST['Address'];
        $Gender = $_POST['Gender'];
        $DOB = $_POST['DOB'];
        $City = $_POST['City'];
        $pin_code = $_POST['Pin_code'];
        $state = $_POST['State'];
        $Country = $_POST['Country'];


        // checkbox...
        //////////////////////////////////////////////////////////////////
        // name="Hobbi[]" ------> yaha ka used karna --- nahi toh error through karega
        $Hobbies = $_POST['Hobbi'];    // ye Array show karega 
        $HobbiesConvert = implode(',', $Hobbies);  // isiliye hm usko isme convert kar 


        // # File...
        //////////////////////////////////////////////////////////////////
        $target_path = "image_uploaded/";
        $file = $_FILES['File']['name'];
        $target = $target_path . basename($_FILES['File']['name']);
        $fileupload = strtolower(pathinfo($target, PATHINFO_EXTENSION));    // jg & pdf format

        // # Time...
        //////////////////////////////////////////////////////////////////
        date_default_timezone_set('Asia/Kolkata');
        $Date_Time = date('Y-m-d H:i:sa');  // a --->(am / pm) ke liye hai 





        if (empty($file)) {
            $update = "UPDATE `student_registration_form` SET `First_Name`='$First_Name',`Last_Name`='$Last_Name',`Email`='$Email',`Number`='$Number',`Address`='$Address', `Gender`='$Gender', `City`='$City',`Pin_code`='$pin_code',`State`='$state',`DOB`='$DOB', `Country`='$Country', `Hobbies`='$HobbiesConvert', `update_time`='$Date_Time' WHERE id='" . $_GET['edit_id'] . "'";

            $update_query = mysqli_query($conn, $update);
            if ($update_query) {
                echo "<script>alert('Your Data is update'); window.location.href='select.php';</script>";
            } else {

                echo "<script>alert('Your Data is NOT update');</script>";
            }
        } else {
            $update = "UPDATE `student_registration_form` SET `First_Name`='$First_Name',`Last_Name`='$Last_Name',`Email`='$Email',`Number`='$Number',`Address`='$Address', `Gender`='$Gender', `City`='$City',`Pin_code`='$pin_code',`State`='$state',`DOB`='$DOB', `Country`='$Country', `Hobbies`='$HobbiesConvert', `File`='$file', `update_time`='$Date_Time' WHERE id='" . $_GET['edit_id'] . "'";
            $update_query = mysqli_query($conn, $update);

            if ($update_query) {

                if ($_FILES['File']['size'] > 3 * 1024 * 1024) { // 3MB in bytes
                    echo "
                    <script>
                    alert('File size is too large. Please choose a file under 3MB.');
                    return false;
                    </script>";
                }

                // else if (file_exists($target)) {
                //     echo "<script>
                //     alert('File already exists.');
                //     window.location.href='registration_form.php';
                //     </script>";
                // }
                else if ($fileupload != "jpg" && $fileupload != "pdf") {
                    echo "<script>
                    alert('File must be in JPG or PDF format.');
                    return false;
                    </script>";
                } else {
                    if (move_uploaded_file($_FILES['File']['tmp_name'], $target)) {
                        echo "<script>
                        alert('Your Data Inserted & Updated Successfully'); 
                        window.location.href='select.php';
                        </script>";
                    } else {
                        echo "<script>
                        alert('Error in uploading file.');
                        return false;
                        </script>";
                    }
                }
            } else {

                echo "<script>
                alert('Your Data is NOT update');
                window.location.href='select.php';
                return false;
                </script>";
            }
        }
    }






    // # Previous Data is display query....
    //////////////////////////////////////////////////////////////////////

    $previousData = "SELECT * FROM `student_registration_form` WHERE  id = '" . $_GET['edit_id'] . "'";

    $previousData_query = mysqli_query($conn, $previousData);

    $fetch = mysqli_fetch_assoc($previousData_query);


    // Checkbox display karwane ke liye ye query likhna hi padta hai...
    // ['Hobbies] --> ye data base se name lena...
    $hobi = $fetch['Hobbies'];
    $hobbies_display = explode(',', $hobi);




    // if ($fetch) {
    //     echo "<script>alert('Your previous Data is display');</script>";
    // } else {
    //     echo "<script>alert('Your previous Data is NOT display');</script>";
    // }

}

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

    <form class="row g-3 container text-white font-weight-bold " action=" " method="POST" enctype="multipart/form-data" style="margin: auto; width: 750px;">



        <!---=====================Heading==============================-->


        <div class="row container">

            <h3 class=" container-fluid d-flex justify-content-center text-warning my-5 "> ꧁༒☬ STUDENT REGISTRATION FORM ☬༒꧂</h3>

        </div>




        <!-- ===========First Name & Last Name======================= -->

        <div class="row my-2">

            <div class="col-6">
                <label for="Name" class="form-label ">First Name</label>
                <input type="text" name="First_Name" value="<?php echo $fetch['First_Name']; ?>" class="form-control text-dark" id="inputEmail4" placeholder="Enter your first name" required />
            </div>
            <div class="col-6">
                <label for="inputPassword4" class="form-label">Last Name</label>
                <input type="text" name="Last_Name" value="<?php echo $fetch['Last_Name']; ?>" class="form-control" id="inputPassword4" placeholder="Enter your Last name" required />
            </div>

        </div>


        <!-- ========================================================= -->




        <div class="row my-2">

            <!-- # Email Id.... -->
            <div class="col-6">
                <label for="email" class="form-label ">Email ID</label>
                <input type="email" name="Email" value="<?php echo $fetch['Email']; ?>" class="form-control " id="inputEmail4" placeholder="Enter your email id" required />
            </div>



            <!-- # Mobile Number.... -->

            <div class="col-6">
                <label for="number" class="form-label">Mobile Number</label>
                <input type="number" name="Number" value="<?php echo $fetch['Number']; ?>" class="form-control" id="inputPassword4" placeholder="Enter your mobile number" required />
            </div>

        </div>




        <!-- ========================================================= -->



        <div class="row my-2">

            <!-- # Address......... -->
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <textarea rows="4" cols="20" name="Address" class="form-control" id="inputAddress" placeholder="Enter your address" required><?php echo $fetch['Address']; ?></textarea>
            </div>

        </div>




        <!-- ========================================================= -->



        <div class="row my-2">

            <!-- # Gender............ -->
            <!-- Radio Button me [ checked ] used karna padta hai.... -->
            <div class="col-7">
                <fieldset class=" container">
                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                    <div class="row">
                        <div class="col-sm-10 form-control">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Gender" id="gridRadios1" value="Male" <?php if ($fetch['Gender'] == "Male") {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                <label class="form-check-label" for="gridRadios1">Male</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Gender" id="gridRadios2" value="Female" <?php if ($fetch['Gender'] == "Female") {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                <label class="form-check-label" for="gridRadios2">Female</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Gender" id="gridRadios3" value="Other" <?php if ($fetch['Gender'] == "Other") {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                <label class="form-check-label" for="gridRadios3">Other</label>
                            </div>
                        </div>
                    </div>

                </fieldset>

            </div>





            <!--# DOB CITY PINCODE..................-->

            <div class="col-5">
                <label for="inputAddress" class="form-label">DOB </label>
                <input type="date" name="DOB" value="<?php echo $fetch['DOB']; ?>" class="date_style form-control " id="birthdate" max="2023-12-31" required>

            </div>

        </div>




        <!-- ========================================================= -->




        <div class="row my-2">

            <!-- # City............. -->

            <div class="col-7">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" name="City" value="<?php echo $fetch['City']; ?>" class="form-control" id="inputCity" placeholder="Enter your city name" required />
            </div>



            <!-- # Pin Code............. -->

            <div class="col-5">
                <label for="inputZip" class="form-label">Pin Code</label>
                <input type="text" name="Pin_code" value="<?php echo $fetch['Pin_code']; ?>" class="form-control" id="inputZip" placeholder="Enter your pin code number" required />
            </div>

        </div>




        <!-- ========================================================= -->


        <div class="row my-2">

            <!-- # State........... -->
            <div class="col-7">
                <label for="inputState" class="form-label">State</label>
                <input type="text" name="State" value="<?php echo $fetch['State']; ?>" class="form-control" id="inputState" placeholder="Enter your state name" required />


            </div>

            <!-- # Country............. -->

            <!-- Select option me [ selected ] used karna padta hai.. -->
            <div class="col-5">
                <label for="inputState" class="form-label">Country</label>
                <select id="inputState" name="Country" class="form-select">
                    <option selected>Choose your country...</option>
                    <option value="India" <?php if ($fetch['Country'] == "India") {
                                                echo "selected";
                                            } ?>>India</option>
                    <option value="Russia" <?php if ($fetch['Country'] == "Russia") {
                                                echo "selected";
                                            } ?>>Russia</option>
                    <option value="Canada" <?php if ($fetch['Country'] == "Canada") {
                                                echo "selected";
                                            } ?>>Canada</option>
                    <option value="America" <?php if ($fetch['Country'] == "America") {
                                                echo "selected";
                                            } ?>>America</option>
                    <option value="Qatar" <?php if ($fetch['Country'] == "Qatar") {
                                                echo "selected";
                                            } ?>>Qatar</option>
                </select>
            </div>


        </div>



        <!-- ========================================================= -->



        <div class="row my-2">


            <!-- # Hobbise................... -->

            <div class="col-md-12">
                <fieldset class="container">
                    <legend class="col-form-label col-sm-2 pt-0">Hobbies</legend>
                    <div class="row">
                        <div class="col-sm-10 form-control">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="Hobbi[]" id="checkbox1" value="Chase" <?php if (in_array('Chase', $hobbies_display)) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>

                                <label class="form-check-label" for="checkbox1"> Chase</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="Hobbi[]" id="checkbox2" value="Swiming" <?php if (in_array('Swiming', $hobbies_display)) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                                <label class="form-check-label" for="checkbox2">Swiming</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="Hobbi[]" id="checkbox3" value="Cricket" <?php if (in_array('Cricket', $hobbies_display)) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                                <label class="form-check-label" for="checkbox3">Cricket</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="Hobbi[]" id="checkbox3" value="Hockey" <?php if (in_array('Hockey', $hobbies_display)) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                                <label class="form-check-label" for="checkbox3">Hockey</label>
                            </div>

                            <!-- <div class="form-group ">
                                <label for="otherInput">Other...</label>
                                <input type="text" class="form-control" id="otherInput" name="Hobbi">
                            </div> -->

                        </div>
                    </div>
                </fieldset>
            </div>

        </div>





        <div class="row my-2">

            <!--# Uploading File............... -->

            <div class="col-md-12">
                <fieldset class="container">
                    <legend class="col-form-label pt-0">Upload File</legend>
                    <div class="row">
                        <div class="col-sm-10 form-control">
                            <label class="custom-file-label" for="fileInput">Choose File : [ Under 3mb ] JPG, PNG, & PDF Format Only</label>
                            <div class="custom-file">

                                <?php
                                $previewImage = isset($fetch['File']) ? './image_uploaded/' . $fetch['File'] : '';
                                ?>

                                <img id="previewImage" src="<?php echo $previewImage; ?>" width="100px" height="100px">

                                <input type="file" name="File" id="fileInput" accept="image/jpeg, image/png, application/pdf" value="<?php echo $previewImage; ?>">


                                <embed id="previewPDF" src="#" width="100%" height="300px" style="display: none;">
                                <button type="submit" name="Upload_file_btn" class="btn btn-info mt-2" id="uploadButton" required>Upload</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

        </div>



        <!--*******************************************************->
        
            <!--  # file ke liye ye dono link requried hi hai... -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="./file_upload_all_condition2.js"></script>


        <!-- **********************************************************-->

        <!-- .....# pic & pdf display javascript code ........ -->
        <script src="./edit_ display_pic_pdf.js"></script>
        <!-- .................................................. -->







        <!-- ========================================================= -->




        <!--# Submit Button........... -->

        <div class="col-12 d-flex justify-content-center my-5">
            <button type="submit" name="Submit" class="btn btn-primary mx-5">Submit</button>
        </div>
        </fieldset>
        </div>





    </form>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>