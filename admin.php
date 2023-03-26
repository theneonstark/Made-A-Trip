<?php
$con=mysqli_connect("localhost","root","","trip");
if(isset($_REQUEST['sub'])){
    
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $exe=mysqli_query($con,"SELECT * from admin where username='$user' and pass='$pass'");
    if($exe){
        if($row=mysqli_fetch_array($exe)){
            session_start();
            $_SESSION['name']=$row['name'];
            $_SESSION['id']=$row['admin_id'];
            header("location:adminindex.php");
        }else{
        echo "<script>alert('username or password is wrong')</script>";
        }
    }else{
    echo "<script>alert('something went wrong try later')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- bootstrap link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</head>
<body>
<div class="container"> 
    <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-12 shadow mt-4 p-3">
            <p class="display-5 text-center">Admin Login</p>
            <br>
            <form action="" method="post">
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <br>
                <div class="text-center">
                <button type="submit" class="btn btn-primary" name="sub" value="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>