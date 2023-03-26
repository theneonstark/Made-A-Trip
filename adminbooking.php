<?php
session_start();
if (isset($_SESSION['aid'])) {


?>


    <?php
    $con = mysqli_connect("localhost", "root", "", "trip");

    if (isset($_REQUEST['confirm'])) {
        $id = $_POST['confirm'];
        $up = mysqli_query($con, "update booking set status='confirm' where b_id='$id'");
        if ($up) {
            echo "<script>alert('updated successful');</script>";
        } else {
            echo "<script>alert('update failed');</script>";
        }
    }
    if (isset($_REQUEST['cancel'])) {
        $id = $_POST['cancel'];
        $up = mysqli_query($con, "update booking set status='cancel' where b_id='$id'");
        if ($up) {
            echo "<script>alert('updated successful');</script>";
        } else {
            echo "<script>alert('update failed');</script>";
        }
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Booking</title>
        <!-- bootstrap link  -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <style>
            <?php include "style.css"; ?>
        </style>
    </head>

    <body>
        <div class="main-head">
            <div class="container">
                <div class="row pt-3 justify-content-around align-items-center main-nav">
                    <div class="col-lg-2">LOGO</div>
                    <div class="col-lg-7 menu text-center d-none d-lg-block">
                        <ul>
                            <li><a href="adminindex.php">Home</a></li>
                            <li><a href="adminpackages.php">packages</a></li>
                            <li><a href="adminfeedback.php">Feedback</a></li>
                            <li><a href="adminbooking.php">Booking</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <d class="col-lg-3 text-center ">
                        <i class="bi bi-person-circle text-light h4"></i>
                        <span class="text-light lead ms-2"> <?php echo $_SESSION['aname']; ?></span>
                    </d>
                </div>
            </div>
        </div>

        <br>
<div class="container">
        <div class="text-center mt-5">
            <span class="h1 gradient-text">Enter id to check status</span>
            <br>
            <form action="" method="post" class="mb-4 button">
                <input type="text" name="check">
                <button class="btn btn-primary px-3 b" value="sub" name="sub">Check</button>
            </form>
        </div>
        <div class="main-table ">
                    <ul class="d-flex list-unstyled justify-content-between mx-2">
                        <li>ID</li>
                        <li>Name</li>
                        <li>Family member</li>
                        <li>cost</li>
                        <li>Package</li>
                        <li>Contact</li>
                        <li>Address</li>
                        <li>Status</li>
                    </ul>
                    <?php
            if (isset($_POST['sub'])) {
                $ch = $_POST['check'];
                $check = mysqli_query($con, "SELECT * FROM booking where b_id=$ch");
                $r = mysqli_fetch_array($check);
                if ($r) {

            ?>
                    <div class="row-cards d-flex justify-content-between ">
                        <div class="id">
                        <?php echo $r['b_id']; ?>
                        </div>
                        <div class="Name">
                        <?php echo $r['name']; ?>
                        </div>
                        <div class="Const">
                        <?php echo $r['family_mem']; ?>
                        </div>
                        <div class="Des">
                        <?php echo $r['cost']; ?>
                        </div>
                        <div class="Des">
                        <?php echo $r['package']; ?>
                        </div>
                        <div class="Des">
                        <?php echo $r['contact']; ?>
                        </div>
                        <div class="Des">
                        <?php echo $r['address']; ?>
                        </div>
                        <div class="Des">
                        <?php echo $r['status']; ?>
                        </div>
                        <div class="rbtn">
                            <form action="" method="post">
                                        
                                        <button type="submit" value="<?php echo $row['id'];?>" name="sub" class="btn px-3">Remove</button>
                                    </form>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
                </div>
        </div>
        <br>
        <div class="container">
            <div class="text-center h1 my-2 gradient-text">Customer Booking</div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="main-table ">
                                <ul class="d-flex list-unstyled justify-content-between mx-2">
                                    <li>Id</li>
                                    <li>Name</li>
                                    <li>Family member</li>
                                    <li>cost</li>
                                    <li>Package</li>
                                    <li>Contact</li>
                                    <li>Address</li>
                                    <li>Confirm</li>
                                    <li>Cancel</li>
                                </ul>
                                <?php
                                    $exe = mysqli_query($con, "SELECT * FROM booking where status='wait for confirmation'");
                                    while ($row = mysqli_fetch_array($exe)) {
            
                                    ?>
                                <div class="row-cards d-flex justify-content-between ">
                                    <div class="id">
                                    <?php echo $row['b_id']; ?>
                                    </div>
                                    <div class="Name">
                                    <?php echo $row['name']; ?>
                                    </div>
                                    <div class="Const">
                                    <?php echo $row['family_mem']; ?>
                                    </div>
                                    <div class="Des">
                                    <?php echo $row['cost']; ?>
                                    </div>
                                    <div class="Des">
                                    <?php echo $row['package']; ?>
                                    </div>
                                    <div class="Des">
                                    <?php echo $row['contact']; ?>
                                    </div>
                                    <div class="Des">
                                    <?php echo $row['address']; ?>
                                    </div>
                                    <div class="d-flex btns">
                                    <form action="" method="post">
                                                    <button class="btn confirm px-3" value="<?php echo $row['b_id']; ?>" name="confirm">Confirm</button>
                                                </form>
                                                <form action="" method="post">
                                                                <button class="btn btn-danger px-3" value="<?php echo $row['b_id']; ?>" name="cancel">Cancel</button>
                                                            </form>
                                    </div>
                                </div>
                                <?php
                                    }
                                    ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <br>


    </body>

    </html>

<?php

} else {
    header("location:login.php");
}
?>