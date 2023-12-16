<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOG IN PAGE</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>

  <body>
    
    <?php
   include 'db.php';  
   if(isset($_POST['submit'])){

       $emailaddress = $_POST['emailaddress'];
       $password = $_POST['password'];
  
       $emailaddress_search = "select * from registration where emailaddress = '$emailaddress'";
       $query = mysqli_query($con,$emailaddress_search);
 
       
       $emailaddress_count = mysqli_num_rows($query);

       if($emailaddress_count){

         $emailaddress_pass = mysqli_fetch_assoc($query);

         $db_pass = $emailaddress_pass['password'];

        //  $_SESSION['username'] = $emailaddress_pass['username'];

         $pass_decode = password_verify($password, $db_pass);

         if($pass_decode){
            echo "login successful";
            ?>
            <script>
                location.replace("index.php")
            </script>
            <?php
         }else{
            
        echo '<script type ="text/JavaScript">';  
        echo 'alert("password incorrect")';  
        echo '</script>';
                // echo "password incorrect";
              }

       }else{
             echo "Invalid Email";
       }
     }


?>

    <div class="container">
      <h1 style="text-align: center; margin-top: 40px;">Log in</h1>
      <p>New Here ? Sign up</p>
    </div>
   
    </div> 
    <div class="container">
      <form action="#" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" name="emailaddress" placeholder="Email-Id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" require>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" name="submit" value="Login" class="btn btn-primary">Submit</button>
    </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
  </body>
</html>