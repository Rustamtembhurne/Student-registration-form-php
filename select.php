<?php

include "./connection.php";


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Data & Display in page</title>


    <link rel="stylesheet" href="./style_select.css">
</head>

<body>

    <div class="img_container_select">
        <img src="./img/insert-data.jpg" alt="home pic" />
    </div>
    <div class="my-5 table_div" align="center">
        <h1>STUDENT INFORMATION </h1>
        <a href="./index.php" class="select_anchore_style">ADD DATA</a>

        <table border="5" cellspacing="5">
            <tr>
                <th>Sr. ID</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>EMAIL</th>
                <th>NUMBER</th>
                <th>ADDRESS</th>
                <th>GENDER</th>
                <th>DOB</th>
                <th>CITY</th>
                <th>PIN CODE</th>
                <th>STATE</th>
                <th>COUNTRY</th>
                <th>HOBBIES</th>

                <th>UPLOAD [img / file]</th>

                <th>LOGIN [Date & Time]</th>
                <th>EDIT & UPDATE [Date & Time]</th>

                <th>ACTION [Edit & Delete]</th>
            </tr>

            <?php

            $select = "SELECT * FROM `student_registration_form` ORDER BY `id` DESC";

            $query = mysqli_query($conn, $select);

            // $fetch = mysqli_fetch_assoc($query);   // ERROR yhape mat likhna 

            while ($fetch = mysqli_fetch_assoc($query)) {  // yaha hi likhna direct


            ?>
                <tr>
                    <td><?php echo $fetch['id'] ?></td>
                    <td><?php echo $fetch['First_Name'] ?></td>
                    <td><?php echo $fetch['Last_Name'] ?></td>
                    <td><?php echo $fetch['Email'] ?></td>
                    <td><?php echo $fetch['Number'] ?></td>
                    <td><?php echo $fetch['Address'] ?></td>
                    <td><?php echo $fetch['Gender'] ?></td>
                    <td><?php echo $fetch['DOB'] ?></td>
                    <td><?php echo $fetch['City'] ?></td>
                    <td><?php echo $fetch['Pin_code'] ?></td>
                    <td><?php echo $fetch['State'] ?></td>
                    <td><?php echo $fetch['Country'] ?></td>
                    <td><?php echo $fetch['Hobbies'] ?></td>


                    <!-- ...........img & pdf................. -->
                    <td>
                        <!-- yaha space mat dena    ( /image_uploaded/_< ) -->
                        <img src="./image_uploaded/<?php echo $fetch['File']; ?>" width="100px" height="100px" alt="YOUR PDF ">
                        <input name="File" id="fileInput" accept=" application/pdf" value="<?php echo $fetch['File']; ?>">
                    </td>







                    <td><?php echo $fetch['login_time'] ?></td>
                    <td><?php echo $fetch['update_time'] ?></td>


                    <td> <a href="./edit_information.php ? edit_id=<?php echo $fetch['id'] ?>">Edit</a> / <a href="./delete_information.php  ? delete_id=<?php echo $fetch['id'] ?>">Delete</a> </td>
                </tr>

            <?php
            }
            ?>

        </table>
    </div>







</body>

</html>