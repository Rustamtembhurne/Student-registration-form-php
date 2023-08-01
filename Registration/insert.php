<?php

include "./connection.php";

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



    // # checkbox...
    ////////////////////////////////////////////////////////////////////
    // name="[Hobbies1[]]" --------> orinal page wala used karna  nahi toh error through karega
    $Hobbies = $_POST['Hobbies1'];
    $view = implode(',', $Hobbies);


    // # File...
    /////////////////////////////////////////////////////////////////////
    $target_path = "image_uploaded/";
    $file = $_FILES['File']['name'];
    $target = $target_path . basename($_FILES['File']['name']);
    $fileupload = strtolower(pathinfo($target, PATHINFO_EXTENSION));    // jg & pdf format


    // # Date & Time...
    //////////////////////////////////////////////////////////////////////
    date_default_timezone_set('Asia/Kolkata');
    $Date_Time = date('Y-m-d H:i:sa');


    $insert = "INSERT INTO `student_registration_form`(`First_Name`, `Last_Name`, `Email`, `Number`, `Address`,`Gender`,`DOB`,`City`,`Pin_code`,`State`, `Country`, `Hobbies`, `File`, `login_time`) VALUES ('$First_Name', '$Last_Name', '$Email', '$Number', '$Address','$Gender','$DOB','$City', '$pin_code','$state', '$Country', '$view', '$file', '$Date_Time' )";






    $query = mysqli_query($conn, $insert);


    if ($query) {



        if ($_FILES['File']['size'] > 3 * 1024 * 1024) {   // 3mb
            echo "<script>
            alert('File size is too large.');
            window.location.href='Registration_page.php';
            </script>";
        }
        // else if (file_exists($target)) {
        //     echo "<script>
        //     alert('File already exists.');
        //     window.location.href='index.php';
        //     </script>";
        // }
        else if ($fileupload != "jpg" && $fileupload != "pdf") {
            echo "<script>
            alert('File must be in JPG or PDF format.');
            window.location.href='Registration_page.php';
            </script>";
        } else {
            if (move_uploaded_file($_FILES['File']['tmp_name'], $target)) {
                echo "<script>
                alert('Your Data Inserted Successfully'); window.location.href='select.php';
                </script>";
            } else {
                echo "<script>
                alert('Error in uploading file.');
                </script>";
            }
        }


    } else {
        echo "<script>alert('Data is NOT Inserted');</script>";
    }
}
