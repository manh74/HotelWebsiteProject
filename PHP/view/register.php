<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="../../CSS/style.css">
  <link href="../../CSS/font-awesome.css" rel="stylesheet"> 
  <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="../../JS/js.js" type="text/javascript"></script>
</head>
<body class="bg">
  <?php 
  session_start();
  include 'connect.php'; 
  if (isset($_SESSION["log-in"])) {
    header("location:index.php");
  }
  else {
   ?>
   <form method="post">
    <div class="login-form">
      <div class="login-title">
       <h1>Grand Tourane Hotel</h1>
     </div>
     <div class="login w3_login">
      <h2 class="login-header w3_header">REGISTER</h2>
      <div class="w3l_grid">
        <div class="form-group">
          <label>Full name:</label>
          <input type="text" name="fullName"  class="form-control" id="fullName" placeholder="Enter name">
        </div>
        <div class="form-group">
          <label>Email address:</label>
          <input type="email" name="email"  class="form-control" id="email" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label>Phone number:</label>
          <input type="text" name="phone"  class="form-control" id="email" placeholder="Enter phone number">
        </div>
        <div class="form-group">
          <label>Birthday:</label>
          <input type="date" name="date"  class="form-control" id="date" placeholder="Enter birthday">
        </div>
        <div class="form-group">
          <label>Password:</label>
          <input type="password" name="password" id="password"  class="form-control" placeholder="Enter password">
        </div>
        <div class="form-group">
          <label>Re-password:</label>
          <input type="password" name="re-password" id="re-password"  class="form-control" placeholder="Enter password one more time!">
        </div>
        <div class="form-group">
          <p class="text-center">By creating an account you agree to our <a href="#">Terms Of Use</a></p>
        </div>
        <div class="col-md-12 text-center ">
          <button type="submit" name="rgt" class=" btn btn-block mybtn btn-primary tx-tfm">Register</button>
        </div>
        <?php 
        if (isset($_POST["rgt"])) {
          if(isset($_POST["fullName"])&&isset($_POST["phone"])&&isset($_POST["date"])&&isset($_POST["email"])&&isset($_POST["password"])&&isset($_POST["re-password"])){
            if ($_POST["password"]!=$_POST["re-password"]) {
              ?>
              <script>alert("Repassword have problem!")</script>
              <?php
            }
            else{
              $user_insert = "INSERT INTO user (fullName,password,email,phone,birthday) values ('".$_POST["fullName"]."','".$_POST["password"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["date"]."')";
              $db->query($user_insert);
              ?>
              <script>alert("Register's succesful!")</script>
              <?php
              header("Location:login.php");
            }
          }
          else if(!isset($_POST["fullName"])||!isset($_POST["phone"])||!isset($_POST["date"])||!isset($_POST["email"])||!isset($_POST["password"])||!isset($_POST["re-password"])){
            ?>
            <script>alert("Please enter all form!")</script>
            <?php
          } }?>
          
          <div class="form-group">
            <p class="text-center">You have account? <a href="login.php" id="login">Log in here</a></p>
          </div>
          <div class="second-section w3_section">
           <div class="bottom-header w3_bottom">
            <h3>OR</h3>
          </div>
          <div class="social-links w3_social">
           <ul>
             <li> <a class="facebook" href="#" target="blank"><i class="fa fa-facebook"></i></a></li>
             <li> <a class="twitter" href="#" target="blank"><i class="fa fa-twitter"></i></a></li>
             <li> <a class="googleplus" href="#" target="blank"><i class="fa fa-google-plus"></i></a></li>
           </ul>
         </div>
       </div>

       <div class="bottom-text w3_bottom_text">
        <h4> <a href="forgotPassword.php">Forgot your password?</a></h4>
      </div>

    </div>
  </div>

</div>
</form>
<?php } ?>

<?php include 'footer.php'; ?>
</body>
</html>