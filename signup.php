<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIGN UP PAGE</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>

  <body>
    <?php
   include 'db.php';  
   if(isset($_POST['submit'])){
   
    $first = mysqli_real_escape_string($con, $_POST['first']);
    $last = mysqli_real_escape_string($con, $_POST['last']);
    $emailaddress = mysqli_real_escape_string($con, $_POST['emailaddress']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirmpassword  = mysqli_real_escape_string($con, $_POST['confirmpassword']);

    // $con=mysqli_connect('$localhost','$root',' ','$form');

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($confirmpassword, PASSWORD_BCRYPT);

    $emailaddressquery = "select * from  register2 where emailaddress='$emailaddress'";
    $query = mysqli_query($con,$emailaddressquery);

    $emailaddresscount = mysqli_num_rows($query);
    
    if($emailaddresscount>0){
        
        echo '<script type ="text/JavaScript">';  
        echo 'alert("email already exists")';  
        echo '</script>';
 

              // echo "email already exists";
        
    }else{
        if($password === $confirmpassword){

            $insertquery = "INSERT INTO `register2`(`first`, `last`, `emailaddress`, `password`, `confirmpassword`) 
            VALUES ('$first','$last','$emailaddress','$pass','$cpass')";

            $query = mysqli_query($con, $insertquery);

            if($query){
                ?> 
                   <script>
                     alert("Inserted sussesful");
                   </script>
                <?php
                }else    
                ?>
                   <script>
                      alert("No Inserted");
                  </script>
                <?php
            }
        else{
               ?>
                   <script>
                       alert("password are not matching");
                   </script>
               <?php
            }
    }
     }


?>
    <div class="container">
      <h1 style="text-align: center; margin-top: 40px;">Sign up</h1>
      <p>Already a member ? Log In</p>
    </div>
   
    </div> 
    <div class="container">
      <form action="#" method="POST">
        <div class="form-group col-xs-4">
          <label for="exampleInputEmail1">First Name</label>
          <input type="text" name="first" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="first">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Last Name</label>
          <input type="text" name="last" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="last">
        </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="emailaddress" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="emailaddress">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="password">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1"> Confirm Password</label>
        <input type="password"  name="confirmpassword" class="form-control" id="exampleInputPassword1" placeholder="confirmpassword">
      </div>
  
      <button type="submit" name="submit" value="Signup" class="btn btn-primary">Submit</button>
    </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
  </body>
</html>
