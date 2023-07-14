<?php

//  pic / pdf file sepret aise upload karte hai...

include "./connection.php";


if (isset($_POST['Upload_file_btn'])) {

    // # File...
    $target_path = "image_uploaded/";
    $file = $_FILES['File']['name'];
    $target = $target_path . basename($_FILES['File']['name']);
    $fileupload = strtolower(pathinfo($target, PATHINFO_EXTENSION));    // jg & pdf format


    $insert_img = "INSERT INTO `student_registration_form`( `File`) VALUES ('$file')";

    $query = mysqli_query($conn, $insert_img);


    if ($query) {

        if (file_exists($target)) {
            echo "<script>
            alert('File already exists.');
            </script>";
        } else if ($_FILES['File']['size'] > 10000000000) {   // 1mb
            echo "<script>
            alert('File size is too large.');
            </script>";
        } else if ($fileupload != "jpg" && $fileupload != "pdf") {
            echo "<script>
            alert('File must be in JPG or PDF format.');
            </script>";
        } else {
            if (move_uploaded_file($_FILES['File']['tmp_name'], $target)) {
                echo "<script>
                alert('File uploaded successfully.');
                window.location.href='registration_form.php';
                </script>";
            } else {
                echo "<script>
                alert('Error in uploading file.');
                </script>";
            }
        }

        echo "<script>alert(' Your IMG Uploaded Successfully'); windo.locatin.href='registration_form'; </script>";
    } else {
        echo "<script>alert('Your IMG is NOT Uploaded');</script>";
    }
}


