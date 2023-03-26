 <?php
session_start();
if(isset($_SESSION['id'])){


?>


<?php






if(isset($_REQUEST['sub'])){
    $id=$_SESSION['id'];
    $name=$_POST['name'];
    $family_member=$_POST['family_member'];
    $cost=$_POST['cost'];
    $packages=$_POST['packages'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];

$con=mysqli_connect('localhost','root','','trip');
$exe=mysqli_query($con,"insert into booking(name,family_mem,cost,package,contact,address,customer_id)values('$name','$family_member','$cost','$packages','$contact','$address','$id')");
if($exe){
    header("location:index.php");
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
    <title>Booking</title>
    <!-- bootstrap link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
<div class="container"> 
    <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-12 shadow mt-4 p-3">
            <p class="display-6 text-center">booking form</p>
    
            <form action="" name="booking" method="post">
                
                <div class="form-group">
        <label for="name">Booking Name</label>
                    <input type="name" class="form-control" id="name" name="name" >
                </div>
                <br>
                <div class="form-group">
                <?php
                if(isset($_REQUEST['c'])){
                    $con=mysqli_connect('localhost','root','','trip');
                    $i=$_REQUEST['c'];
                    $ex=mysqli_query($con,"SELECT * FROM packages where id='$i'");
                    $c=mysqli_fetch_array($ex);       
                }
                if($c){
                    $k=$c['cost'];
                
                ?>
                    <label for="family_member">no. of Family Member</label>
                    <input type="text" class="form-control" value="1" name="family_member" id="family_member"  onchange="change(<?php echo $k;?>)">
                </div>
                <br>
                <div class="form-group">
                    <label for="cost">cost</label>
                    <input type="text" class="form-control" name="cost" id="cost" value="<?php echo $c['cost'] ?>" readonly>
                </div>

                <br>
                <div class="form-group">
                    <label for="packages">Your destination Packages</label>
                    <input type="text" class="form-control"  name="packages" id="packages"  value="<?php echo $c['name'];?>" readonly>
                </div>
                <?php
                }else{
                    header("location:index.php");
                }
                ?>
                
                <br>
                <div class="form-group">
                    <label for="contact">Your Contact</label>
                    <input type="text" class="form-control"  name="contact" id="contact" style="height:50px;">
                </div>
                
                <br>
                <div class="form-group">
                    <label for="address">Pickup Destination</label>
                    <input type="text" class="form-control"  name="address" id="address" style="height:50px;">
                </div>
                <br>
                <div class="text-center">
                <button type="submit" class="btn btn-primary" name="sub" value="submit">Submit</button>
                </div>
            </form>
            </form>
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
}else{
    header("location:login.php");
}
?>