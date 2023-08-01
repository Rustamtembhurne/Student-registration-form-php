<?php
include "./Registration/connection.php";


if (isset($_POST['Submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];


    $insert = "INSERT INTO `login_page`(`username`, `password`) VALUES ('$username','$password')";

    $query = mysqli_query($conn, $insert);


    if ($query) {
        echo "<script>alert('Data is enter');
         window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Data is not enter');
         window.location.href='SingUp.php';</script>";
    }
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Animated Login From</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="./style_homepage.css" />

    <style>
        .input_group1 {
            margin-top: 40px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: start;
        }

        #login_button .custom_button {
            position: absolute;
            width: 100%;
            height: 100%;
            text-decoration: none;
            z-index: 10;
            cursor: pointer;
            font-size: 22px;
            letter-spacing: 2px;
            border: 1px solid #00ccff;
            border-radius: 50px;
            background-color: #0c1022;
            display: flex;
            justify-content: center;
            align-items: center;
            /* Additional styles for button elements */
            padding: 10px 20px;
            /* Customize the padding to your preference */
            color: #00ccff;
            /* Text color */
        }
    </style>
</head>

<body>
    <div class="login_form_container">
        <form action="" method="POST">
            <div class="login_form">
                <h2>SingUp</h2>
                <div class="input_group">
                    <i class="fa fa-user"></i>
                    <input type="text" name="username" placeholder="Username" class="input_text" autocomplete="off" />
                </div>
                <div class="input_group">
                    <i class="fa fa-unlock-alt"></i>
                    <input type="password" name="password" placeholder="Password" class="input_text" autocomplete="off" />
                </div>
                
                <div class="input_group" id="login_button">
                    <button type="submit" name="Submit" class="custom_button">SingUp</button>
                </div>

            </div>

        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="./script_homepage.js"></script>
</body>

</html>