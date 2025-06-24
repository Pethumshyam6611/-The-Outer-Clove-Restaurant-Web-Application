<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OUTER CLOVE FOOD MENU</title>
    <link rel="stylesheet" href="../CSS/home-page.css">
    <link rel="stylesheet" href="../CSS/CustomerReg.css">
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
    <li><a href='#aboutus'>About Us</a></li>
    <li><a href='../Admin/RESERVATION.php'>Reservation</a></li>
    <li class="signup-button"><a href='#'>Login</a></li>
</ul>
</nav>

<div class="REG">
  <div class="REG-container">
    <div class="REG-header">
      Registration Form
    </div>
    <?php
               if (isset($_SESSION['ADDCUS']))
              {
               echo $_SESSION['ADDCUS'];
               unset($_SESSION['ADDCUS']);
            }
    ?>
    <form action="#" method="post">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      
      <div class="form-group">
        <label for="username">User Name:</label>
        <input type="text" id="username" name="username" required>
      </div>
      
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      
      <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>
      </div>
      
      <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>
      </div>

      <div class="form-group">
        <label for="Adress">Address:</label>
        <input type="Adress" id="Adress" name="Adress" required>
      </div>
      <div class="btn-container">
        <input type="submit" name="Register" value="Register" class="btn REGISTER-btn" ></a>
        <a href='../Admin/HOME-PAGE.php' class="btn cancel-btn" >Cancel</a>
      </div>
    </form>
    
  </div>
</div>
<?php
include('../config/dbconnect.php');
// Processes Of Data Save To The Database//
if(isset($_POST['Register']))
{
    $Name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $EmailAdress = $_POST['email']; 
    $Phonenumber = $_POST['phone']; 
    $Adress = $_POST['Adress']; 

    $query=mysqli_query($conn,"INSERT INTO Customer(Name,Username,Password,Emailadress,Phonenumber,Adress) values('$Name','$username','$password','$EmailAdress','$Phonenumber','$Adress')");
    if($query){

      $_SESSION['ADDCUS'] = " Customer Added to Database";
      echo '<script>';
      echo 'alert("Registration Successfully!");';
      echo 'window.location.href = "' . SITEURL . 'Admin/CustomerLogin.php";';
      echo '</script>';
      }  
      else
      {
        $_SESSION['ADDCUS'] = "Registratio Unsuccessful";
        header('location:'.SITEURL.'Admin/CustomerReg.php');
      }
    }




?>
<!-- FOOTER START -->
<footer>
<div class="footer">
<div class="row">
<a href="#"><img src="../Images/HOME/socialicons/instagram_3955024.png"></a>
<a href="#"><img src="../Images/HOME/socialicons/facebook_4494475.png"></a>
<a href="#"><img src="../Images/HOME/socialicons/twitter_4494477.png"></a>
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