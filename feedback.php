<?php
session_start();
if (isset($_REQUEST['sub'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $feed = $_POST['feed'];
    $con = mysqli_connect('localhost', 'root', '', 'trip');
    $exe = mysqli_query($con, "insert into feedback(name,email,contact,feed)values('$name','$email','$contact','$feed')");
    if ($exe) {
        header("location:index.php?p=1");
    } else {
        echo 'Something went wrong try later';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <style>
        <?php
        include "style.css";
        ?>
    </style>

</head>

<body>

    <div class="main-head">
        <div class="container">
            <div class="row pt-3 justify-content-around align-items-center main-nav">
                <div class="col-lg-2">LOGO</div>
                <div class="col-lg-7 menu text-center d-none d-lg-block">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="feedback.php">Feedback</a></li>
                        <li><a href="booking_status.php">Booking Status</a></li>
                        <li>
                            <span class="info">
                                <span id="bar" class="text-light">Join Us</span>
                                <div class="info-content">
                                    <div> <a href="login.php" class="text-light">Login</a></div>
                                    <hr>
                                    <div><a href="registration.php" class="text-light">signup</a></div>
                                    <!-- <hr> -->
                                    <!-- <div>  <a href="admin.php" class="text-dark">admin</a></div> -->
                                    <hr>
                                    <div><a href="logout.php" class="text-light">Logout</a></div>
                                </div>
                            </span>
                        </li>
                    </ul>
                </div>
                <d class="col-lg-3 text-center">
                    <i class="bi bi-person-circle text-light h4 "></i>
                    <span class="text-light h4 ms-2 ">
                        <?php

                        if (isset($_SESSION['id'])) {
                            echo $_SESSION['name'];
                        }

                        ?>
                    </span>
                </d>
            </div>
        </div>
    </div>


    <!-- feedback  -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-12 shadow mt-4 p-3 seventh">
                <p class="display-5 text-center gradient-text">Feedback form</p>
                <br>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" class="fifth" id="name" name="name">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="fifth" id="email" name="email">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="contact">contact Number</label>
                        <input type="text" class="fifth" id="contact" name="contact">
                        <span class="text-danger small">optional</span>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="feed">Enter your Feedback</label>
                        <textarea class="fifth" id="feed" name="feed"></textarea>

                    </div>

                    <br>
                    <div class="text-center button">
                        <button type="submit" class="btn rounded-pill" value="submit" name="sub">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>