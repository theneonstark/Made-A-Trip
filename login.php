<?php
if(isset($_POST['p'])){
if($_POST['p']==1){
    echo "<script>alert('sign up successful please login')</script>";
}else{
    echo "<script>alert('sign up unsuccessful please signup again')</script>";
}

}

if(isset($_POST['sub'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

$con=mysqli_connect('localhost','root','','trip');
$exe=mysqli_query($con,"select * from customer where email='$email' and pass='$password'");
$r=mysqli_query($con,"select * from admin where username='$email' and pass='$password'");
if($exe && $r) {

    if($row=mysqli_fetch_array($exe)){
        session_start();
        $_SESSION['id']=$row['c_id'];
        $_SESSION['name']=$row['name'];
        
        header("location:index.php");
    }else if($r2=mysqli_fetch_array($r)){
        session_start();
        $_SESSION['aname']=$r2['name'];
        $_SESSION['aid']=$r2['admin_id'];
        
        header("location:adminindex.php");
    }else{
        echo "<script>alert('Username Or Password is wrong')</script>";

    }
}else{
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
    <title>Login</title>

    <!-- bootstrap link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <style>
        <?php
        include "style.css";
        ?>
    </style>
</head>
<body>

    <div class="container"> 
    <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-12 shadow mt-4 p-3 seventh">
            <p class="display-5 text-center gradient-text">Login</p>
            <br>
            <form action="" method="post">
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
                </div>
                <br>
                <div class="text-center button">
                <button type="submit" class="btn rounded-pill" name="sub" value="submit">Submit</button>
                </div>
            </form>
            <br>
            <p class="text-center">For Sign up <a href="registration.php" class="text-decoration-none">click here</a></p>
        </div>
    </div>
    </div>
    
</body>
</html>