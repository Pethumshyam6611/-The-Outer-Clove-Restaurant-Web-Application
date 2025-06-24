<?php include('../config/dbconnect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OUTER CLOVE FOOD MENU</title>
    <link rel="stylesheet" href="../CSS/home-page.css">
    <link rel="stylesheet" href="../CSS/CustomerLogin.css">
    <script src="../JS/script.js"></script>
</head>
<body>
    
   
<nav id='menu'>
    <img src="../Images/HOME/2-removebg-preview (2).png">
    <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>
<ul>
  <li><a href='../Admin/HOME-PAGE.php'>Home</a></li>
    <li><a href='../Admin/FOODMENU.php'>Menu</a></li>
    <li><a href='../Admin/HOME-PAGE.php #Promotions'>Promotions</a></li>
    <li><a href='../Admin/HOME-PAGE.php #aboutus'>About Us</a></li>
    <li><a href='../Admin/CUSRESERVATION.php'>Reservation</a></li>
    <li class="signup-button"><a href='#'>Login</a></li>
</ul>
</nav>
<div class="LOGIN">
<div class="login-container">
<form action="CustomerLogin.php" method="post">
  <h2>Customer Login</h2>
  <div class="form-group">
    <label for="username">User Name:</label>
    <input type="text" name="username" placeholder="Enter your username" required>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" name="password" placeholder="Enter your password" required>
  </div>
  <p>Don't have an account? <a href="../Admin/CustomerReg.php">Register Now</a></p>
  <div class="btn-container">

  <button type="submit" name="submit" value="login" class="btn login-btn">Login</button>
    <a href='../Admin/HOME-PAGE.php' class="btn cancel-btn" >Cancel</a> 
</form>
    <?php 

  if(isset($_POST['submit']))
  {
    //login process
    //get data fron the login
    $USERNAME=$_POST['username'];
    $PASSWORD=$_POST['password'];

    //sql to check whether the user with username and password exists or not
    $sql = "SELECT * FROM customer WHERE Username='$USERNAME' AND Password='$PASSWORD'";
    // execute the query
    $res=mysqli_query($conn,$sql);
    //count rows to check whether the user is exists or not
    $count=mysqli_num_rows($res);

    if($count==1)
    {
      //user available and login successful
      $_SESSION[''] = $row2['id'];
      $_SESSION['Login'] = " Login successful";
        echo '<script>';
        echo 'alert("login Successfully!");';
        echo 'window.location.href = "' . SITEURL . 'Admin/HOME-PAGE.php";';
        echo '</script>';
    }
      //redirect to home page
    
    else{
      //user not available
     
      $_SESSION['Login'] = " Login failed";
      echo '<script>';
      echo 'alert("login failed!");';
      echo 'window.location.href = "' . SITEURL . 'Admin/CustomerLogin.php";';
      echo '</script>';
    }
  }

?>
  </div>
</div>
</div>
<?php 
        
        if (isset($_SESSION['Login']))
       {
        echo $_SESSION['Login'];
        unset($_SESSION['Login']);
     }
?>

<!-- FOOTER START -->
<footer>
<div class="footer">
<div class="row">
<a href="https://www.instagram.com/accounts/login/"><img src="../Images/HOME/socialicons/instagram_3955024.png"></a>
<a href="https://web.facebook.com/login/?_rdc=1&_rdr"><img src="../Images/HOME/socialicons/facebook_4494475.png"></a>
<a href="https://twitter.com/?lang=en"><img src="../Images/HOME/socialicons/twitter_4494477.png"></a>
</div>

<div class="row">
<ul>
<li><a href="#">Contact us</a></li>
<li><a href="#">Our Services</a></li>
<li><a href="#">Privacy Policy</a></li>
<li><a href="#">Terms & Conditions</a></li>
<li><a href="#">Career</a></li>
</ul>
</div>

<div class="row">
© 2023−2024 The Outer Clove Restaurant. All right reserved 
</div>
</div>
</footer>  
<!-- END OF FOOTER -->
</body>
</html>