<?php
session_start();
if(isset($_SESSION['aid'])){



?>


<?php
$con=mysqli_connect("localhost","root","","trip");

if(isset($_POST['submit'])){
    $package= $_POST['package'];
    $cost= $_POST['cost'];
    $descp=$_POST['descp'];
    $exe=mysqli_query($con,"insert into packages(name,cost,description)values('$package','$cost')");

}
if(isset($_POST['sub'])){
    $id= $_POST['sub'];
    $exe=mysqli_query($con,"delete from packages where id='$id'" );

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Packages</title>
    <!-- bootstrap link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="script.js"></script>
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
    <div>
        <div class="container seventh">
            <div class="text-center h1 gradient-text">Add Package</div>
            <div class="row justify-content-center aling-items-center mt-3">
                <div class="col-6 button">
                    <form action="" method="post">
                        <label for="package">Package Name</label>
                        <input type="text" class="form-control" id="package" name="package">

                        <label for="cost">Cost</label>
                        <input type="text" class="form-control" id="cost" name="cost">
                        <br>
                        <label for="descp">Description</label>
                        <textarea name="descp" id="" cols="30" rows="4" class="form-control"></textarea>
                        <br>

                        <button type="submit" value="submit" name="submit" class="btn rounded-pill px-3">Add</button>
                    </form>
                
                
                </div>
            </div>


            <br>
            <br>
            <div class="text-center h1 mt-3">No. of Package</div>
            <div class="row justify-content-center mt-2 text-center">
                <div class="col-12 text-center">
                    <div class="main-table ">
                    <ul class="d-flex list-unstyled justify-content-between mx-2">
                        <li>ID</li>
                        <li>Name</li>
                        <li>Cost</li>
                        <li>Description</li>
                        <li>Remove</li>
                    </ul>
                    <?php
                            
                            $exe=mysqli_query($con, "SELECT * FROM packages");
                            if($exe){
                                while($row=mysqli_fetch_array($exe)){
                                    
                             
                            ?>
                    <div class="row-cards d-flex justify-content-between ">
                        <div class="id">
                            <?php echo $row['id'];?>
                        </div>
                        <div class="Name">
                        <?php echo $row['name'];?>
                        </div>
                        <div class="Const">
                        <?php echo $row['cost'];?>
                        </div>
                        <div class="Des">
                            <?php echo $row['description'];?>
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