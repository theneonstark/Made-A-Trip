<?php
session_start();
if(isset($_SESSION['aid'])){



?>


<?php
$con=mysqli_connect('localhost','root','','trip');
if(isset($_POST['sub'])){
    $email= $_POST['sub'];
    $exe=mysqli_query($con,"delete from feedback where email='$email'" );

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Feedback</title>
    <!-- bootstrap link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <style>
        <?php include "style.css";?>
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
                 <span class="text-light lead ms-2"> <?php echo $_SESSION['aname'];?></span>
                </d>
            </div>
    </div>
</div>
    <br>
    <div class="container">
        <div class="text-center display-5 gradient-text">Feedback</div>
    <div class="row justify-content-center mt-4">
                <div class="col-12 text-center">
                <div class="main-table ">
                    <ul class="d-flex list-unstyled justify-content-between mx-2">
                        <li>Name</li>
                        <li>Email</li>
                        <li>Contact</li>
                        <li>Feed</li>
                        <li>Remove</li>
                    </ul>
                    <?php
                            
                            $exe=mysqli_query($con, "SELECT * FROM feedback");
                            if($exe){
                                while($row=mysqli_fetch_array($exe)){
                                    
                             
                            ?>
                    <div class="row-cards d-flex justify-content-between rows">
                        <div class="id">
                            <?php echo $row['name'];?>
                        
                        </div>
                        <div class="Name">
                            <?php echo $row['email'];?>
                        </div>
                        <div class="contact">
                            <?php echo $row['contact'];?>
                        </div>
                        <div class="feed w-20">
                        <?php echo $row['feed'];?>
                        </div>
                        <div class="rbtn">
                        <form action="" method="post">
                                        
                                        <button type="submit" value="<?php echo $row['email'];?>" name="sub" class="btn px-3">Remove</button>
                                    </form>
                        </div>
                    </div>
                    <?php
                       }
                    }
                 ?>
                </div>
            </div>
    </div>
</body>
</html>
<?php

}else{
    header("location:login.php");
}
?>