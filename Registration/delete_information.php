<?php

include "./connection.php";

$Delete = "DELETE FROM `student_registration_form` WHERE id='".$_GET['delete_id']."'";

$query = mysqli_query($conn, $Delete);

if($query){
      echo "<script> alert('your data is deleted & id no is : $_GET[delete_id]'); window.location.href='select.php';</script>";
// header("location:select.php");
} else {
    echo "<script> alert('your data is NOT deleted $_GET[delete_id]');</script>";
}

?>