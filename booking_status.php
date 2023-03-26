<?php
session_start();
if(isset($_SESSION['id'])){
$id=$_SESSION['id'];
$con=mysqli_connect("localhost","root","","trip");
$exe=mysqli_query($con,"select * from booking where customer_id='$id' ")
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Status</title>
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
                                    <!-- <div>  <a href="admin.php" class="text-light">admin</a></div> -->
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


<!-- booking_status  -->
    <div class="container">

    <p class="text-center h1 mt-4 gradient-text">Your Booking Status</p>
    <hr>
        <div class="row justify-content-center mt-5 ">
            <div class="col">
            
            <table class="table" border="2">
                <tr>
                    <th>Name</th>
                    <th>Family member</th>
                    <th>Cost</th>
                    <th>Package</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>status</th>
                </tr>

                <?php
                while($row = mysqli_fetch_array($exe)){
                ?>
                <tr>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['family_mem']?></td>
                    <td><?php echo $row['cost']?></td>
                    <td><?php echo $row['package']?></td>
                    <td><?php echo $row['contact']?></td>
                    <td><?php echo $row['address']?></td>
                    <td><?php echo $row['status']?></td>
                </tr>

                <?php
                }
                ?>
            </table>
            </div>
        </div>
    </div>
    <script>
        <?php
        include "script.js";
        ?>
    </script>
</body>
</html>
<?php
}
else{
    header("location:login.php");
}
?>