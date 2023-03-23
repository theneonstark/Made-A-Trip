<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "trip");
$exe = mysqli_query($con, "SELECT * FROM packages");


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
        <div class="box bg-warning text-end d-lg-none"></div>
        <div class="container">
            <div class="row  justify-content-around align-items-center main-nav ">

                <div class="col-2" style="font-size: 20px;">LOGO</div>
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
                <div class="col-lg-3 text-end d-none d-lg-block" >
                <span class="text-light" style="font-size: 20px;">
                        <?php

                        if (isset($_SESSION['id'])) {
                            echo $_SESSION['name'];
                        }

                        ?> 
                        
                    </span>    
                <i class="bi bi-person-circle text-light h4 "></i>
                    
                </div>

                <div class="col-4 text-end d-lg-none  ">
                    <h1 class=""><i class="bi bi-list text-light" onclick="side_bar()"></i></h1>
                </div>
            </div>
        </div>
        </div>
    <div class="header">
        

            <!-- header content  -->
            <div class="container">
            <div class="header-content text-light text-lg-right  mt-4 first">
                <p class="display-4 pt-4 text-center text-uppercase fw-bold">Discover</p>
                <p class="lead text-center" data-aos="fade-up">
                    the Delhi
                    <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam alias natus non maiores ab eum nostrum vitae iure modi! Ad voluptatum modi ipsum eaque dolorum molestiae accusantium nisi quae alias?

                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi vero eveniet ipsum culpa minus a rerum pariatur quam. Odit obcaecati aliquid nostrum optio illum nihil dolore adipisci recusandae aspernatur eius. -->
                </p>  
                <p class="text-center"><a href="#package" class="px-5 pt-2 ">Book</a href="#package"></p>  
            </div>
        </div>
        <div class="d-flex justify-content-around align-items-center w-50 second">
            <div class="third">
            <i class="bi bi-airplane-engines"></i>
            <p class="text-center">Plane</p>
            </div>
            <div class="third">
            <i class="bi bi-train-freight-front"></i>
            <p class="text-center">Train</p>
            </div>
            <div class="third">
            <i class="bi bi-car-front-fill"></i>
            <p class="text-center">Car</p>
            </div>
            <div class="third">
            <i class="bi bi-bicycle"></i>
            <p class="text-center">Bike</p>
            </div>
            
            
            
        </div>
    </div>

    <p class="display-5 my-4 text-center">
        <span><u>Start Your Journey</u></span>
 
    </p>

    <!-- search box -->
    <div class="row justify-content-center aling-items-center">
        <div class="col-lg-8 col-md-12">
        <form action="" method="post">
            <div class="input-group mb-3">
              
                <input type="text" class="form-control" placeholder="Search here" name="search">
                <button class="input-group-text" id="basic-addon1" name="sub" value="submit"><i class="bi bi-search"></i></button>
                
            </div>
            </form>
        </div>
    </div>
    <!-- packages to book  -->

    <div class="card-div container" id="package">

        <div class="row justify-content-lg-between justify-content-sm-center ">
            <?php
            if(isset($_REQUEST['sub'])){
                $name=$_POST['search'];
                $e=mysqli_query($con,"select * from packages where name like '$name%'");
                while($r = mysqli_fetch_array($e)){
                          
            
            ?>

<div class="forcard col-lg-4 col-md-5 col-sm-10 mb-4">
                    <div class="card">
                        <img src="images/<?php echo $r['name']; ?>.jpg" alt="" class="card-img-top" style="height:250px;">
                        <div class="card-body" data-aos="fade-up">
                            <h5 class="card-title"><?php echo $r['name']; ?></h5>

                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam alias natus non maiores ab eum nostrum vitae iure modi! Ad voluptatum modi ipsum eaque dolorum molestiae accusantium nisi quae alias?
                            <br>
                            <div class="row justify-content-between align-items-center">
                                <a href="<?php echo "booking.php?c=" . $r['id']; ?>" class="btn bg-warning mx-2 my-3 col-4">Book</a>
                                <span class="col-3"><?php echo $r['cost']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

            <?php

            }
            }else{
            while ($row = mysqli_fetch_array($exe)) {


            ?>
                <div class="forcard col-lg-4 col-md-5 col-sm-10 mb-4">
                    <div class="card">
                        <img src="images/<?php echo $row['name']; ?>.jpg" alt="" class="card-img-top" style="height:250px;">
                        <div class="card-body" data-aos="fade-up">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>

                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam alias natus non maiores ab eum nostrum vitae iure modi! Ad voluptatum modi ipsum eaque dolorum molestiae accusantium nisi quae alias?
                            <br>
                            <div class="row justify-content-between align-items-center">
                                <a href="<?php echo "booking.php?c=" . $row['id']; ?>" class="btn bg-warning mx-2 my-3 col-4">Book</a>
                                <span class="col-3"><?php echo $row['cost']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
        }
            ?>
        </div>
    </div>
    </div>
    </div>

    <hr>
    <!-- feedback  -->
    <div class="container">
        <p class="display-4 text-center">Feedback</p>
        <?php

        $fe = mysqli_query($con, "SELECT * FROM feedback");

        while ($r = mysqli_fetch_array($fe)) {


        ?>
            <div class=" p-3">
                <p class="h3"><i class="bi bi-person-circle me-2"> </i><?php echo $r['name'] ?></p>
                <p><?php echo $r['feed'] ?></p>
            </div>
            <hr>

        <?php
        }
        ?>
    </div>




    <!-- footer  -->
    <div class="bg-dark text-light ">
        <div class="container ">
            <div class="row justify-content-between align-items-center mt-4">
                <div class="col-lg-6 mt-4">
                    <p class="h4"><u>About us</u></p>
                    <p class="muted">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam alias natus non maiores ab eum nostrum vitae iure modi! Ad voluptatum modi ipsum eaque dolorum molestiae accusantium nisi quae alias?
                    </p>
                </div>
                <div class="col-lg-4 mt-4">
                <p class="h4"><u>Join us</u></p>
                    <ul>
                        <li class="d-inline"><i class="bi bi-facebook me-2"></i>facebook</li><br>
                        <li class="d-inline"><i class="bi bi-instagram me-2"></i></i>instagram</li><br>
                        <li class="d-inline"><i class="bi bi-whatsapp me-2"></i>whatsapp</li><br>
                        <li class="d-inline"><i class="bi bi-linkedin me-2"></i></i>linkedin</li><br>

                    </ul>
                  
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p class="text-center text-light font-weight-bold">Copyright 2023 &copy; Made A Trip</p>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
  AOS.init();
</script>
    <script>
        <?php
        include "script.js";
        ?>
    </script>

</body>

</html>