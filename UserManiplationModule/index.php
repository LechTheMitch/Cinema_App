<?php 
$ERROR=0;
include 'connect.php';

//-----------------SIGN IN------------------------------------------
if(isset($_POST['signIn'])){
   $email=$_POST['email'];
   $password=$_POST['password'];
   $password=md5($password) ;
   
   $sql="SELECT * FROM users WHERE email='$email' and password='$password'";
   $result=$conn->query($sql);
   if($result->num_rows>0){
    session_start();
    $row=$result->fetch_assoc();
    $_SESSION['email']=$row['email'];
    header("Location: homepage.php");
    exit();
   }
   else{
  $ERROR=1;
    // echo '<p style="color=:red;">Not Found, Incorrect Email or Password</p>';
   }

  }
  //------------------------------------------------------------
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
 
    <div class="container" id="signIn">
        <h1 class="form-title">Sign In</h1>
       <?php if ($ERROR==1) { ?>
        <div class="error" style="padding-top:5px;   margin:10px 8% ;
    background-color: #ea9b9b;
    width: 340px;
    height: 30px;
    border-radius: 5px;">
          <p style="color: white;text-align:center;">    <i style="color:rgb(181, 20, 36)" class="fa fa-exclamation-triangle"></i>
          <?php echo "Incorrect Email or Password"; ?></p>
        </div>
        <?php } ?> 
        <form method="post" action="">
          <div class="input-group">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" id="email" placeholder="Email" required>
              <label for="email">Email</label>
          </div>
          <div class="input-group">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" id="password" placeholder="Password" required>
              <label for="password">Password</label>
          </div>
          <p class="recover">
            <a href="#">Recover Password</a>
          </p>
         <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
        <p class="or">
          ----------or--------
        </p>
        <div class="icons">
          <i class="fab fa-google"></i>
          <i class="fab fa-facebook"></i>
        </div>
        <div class="links">
          <p>Don't have account yet?</p>
          <button id="signUpButton"><a href="register.php">SIGN UP</a></button>
        </div>
      </div>
      <script src="login.js"></script>
</body>
</html>