<?include('../config/dbconnect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="../CSS/home-page.css">
    <link rel="stylesheet" href="../CSS/Reservation.css">
</head>
<body>
<!-- Nav Bar-->
<nav id='menu'>
    <img src="../Images/HOME/2-removebg-preview (2).png">
  <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>
  <ul>
  <li><a href='../Admin/HOME-PAGE.php'>Home</a></li>
    <li><a href='../Admin/FOODMENU.php'>Menu</a></li>
    <li><a href='../Admin/HOME-PAGE.php #Promotions'>Promotions</a></li>
    <li><a href='../Admin/HOME-PAGE.php #aboutus'>About Us</a></li>
    <li><a href=''>Reservation</a></li>
    <li class="signup-button"><a href='../Admin/CustomerLogin.php'>Login</a></li>
  </ul>
</nav>
<div class="RES">
<div class="reservation-form">
        <h2>Book Your Table</h2>
        <?php
               if (isset($_SESSION['res']))
              {
               echo $_SESSION['res'];
               unset($_SESSION['res']);
            }
         
      ?>

        <form action="#" method="post">
            <div class="form-group">
                <label for="customer-name">Customer Name:</label>
                <input type="text" id="customer-name" name="customer-name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone-number">Phone Number:</label>
                <input type="tel" id="phone-number" name="phone-number" required>
            </div>

            <div class="form-group">
                <label for="reservation-date">Reservation Date:</label>
                <input type="date" id="reservation-date" name="reservation-date" required>
            </div>

            <div class="form-group">
                <label for="reservation-time">Reservation Time:</label>
                <input type="time" id="reservation-time" name="reservation-time" required>
            </div>

            <input type="submit" name="Submit" value="Submit" class="submit-btn">
        </form>
    </div>

</div>

<?php
include('../config/dbconnect.php');

// Processes Of Data Save To The Database//
if(isset($_POST['Submit']))
{
    $Cusname = $_POST['customer-name'];
    $EmailAdress = $_POST['email']; 
    $Phonenumber = $_POST['phone-number']; 
    $Reservationdate = $_POST['reservation-date']; 
    $Reservationtime = $_POST['reservation-time']; 

    $query = mysqli_query($conn, "INSERT INTO reservations (CustomerName, Email, Phonenumber, Reservationdate, Reservationtime) VALUES ('$Cusname', '$EmailAdress', '$Phonenumber', '$Reservationdate', '$Reservationtime')");

    if ($query) {

        $_SESSION['res'] = " Reservation Added";
        echo '<script>';
        echo 'alert("Reservation Submited Successfully!");';
        echo 'window.location.href = "' . SITEURL . 'Admin/HOME-PAGE.php";';
        echo '</script>';
    } 

    else
    {
        $_SESSION['res'] = "Reservation Submitted Failed";
        header('location:'.SITEURL.'Admin/CUSRESERVATION.php');
        exit(); // Stop further execution
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