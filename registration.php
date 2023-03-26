<?php
if(isset($_REQUEST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];

    $con=mysqli_connect("localhost","root","","trip");
    $query="insert into customer (name,email,pass,phone,gender,address) values('$name','$email','$password','$phone','$gender','$address')";
    $exe=mysqli_query($con,$query);
    if($exe){
        header("location:login.php?s=1");
    }else{
        echo "<script>alert('something went wrong')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

     <!-- bootstrap link  -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <style>
        <?php include "style.css";?>
    </style>
</head>
<body>

<div class="container"> 
    <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-12 shadow mt-4 p-3 seventh">
            <p class="display-6 text-center gradient-text">Registration form</p>
    
            <form action="" method="post">
                
                <div class="form-group">
        <label for="name">Name</label>
                    <input type="name" class="form-control" id="name" name="name">
                </div>
                <br>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" class="form-control"  name="email" id="email">
                </div>
                <br>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control"  name="password" id="password">
                </div>
                <br>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control"  name="phone" id="phone">
                </div>
                
                <br>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <br>
                    <label for="male">Male</label>
                    <input type="radio" class=""  name="gender" id="male" value="male">
                    <label for="female">Female</label>
                    <input type="radio" class=""  name="gender" id="female" value="female">
                    <label for="others">Others</label>
                    <input type="radio" class=""  name="gender" id="others" value="others">
                </div>
                <br>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control"  name="address" id="address" style="height:50px;">
                </div>
                
                <br>
                <div class="text-center button">
                <button type="submit" class="btn" name="submit" value="submit">Submit</button>
                </div>
            </form>
            </form>
        </div>
    </div>
    </div>

    
</body>
</html>