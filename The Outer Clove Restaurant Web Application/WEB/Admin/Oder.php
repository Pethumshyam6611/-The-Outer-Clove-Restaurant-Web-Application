<?php include('../config/dbconnect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OUTER CLOVE FOOD MENU</title>
    <link rel="stylesheet" href="../CSS/home-page.css">
    <link rel="stylesheet" href="../CSS/oder.css">
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
    <li><a href='../Admin/RESERVATION.php'>Reservation</a></li>
    <li class="signup-button"><a href='#'>Login</a></li>
</ul>
</nav>
<?php 
    // check whether food id is set or not
    if(isset($_GET['food_id']))
    {
        //get the food id and details of the selected food
        $food_id=$_GET['food_id'];
        
        //get the details of the selected food
        $sql=" SELECT * FROM tblfood WHERE id=$food_id";
        //Execute the query
        $res =mysqli_query($conn,$sql);
        //count the number of rows
        $count=mysqli_num_rows($res);
        //check whether the data is avaialable
        if($count==1)
        {
            //data is avaialable
            //Get the data from the database
          $row=mysqli_fetch_assoc($res);
          $title=$row['title'];
          $price=$row['price'];
          $imagename=$row['imagename'];
        }
    }


    else
    {
        //redirect to homepage
        header('Location:'.SITEURL.'../Admin/oder');
    }

  ?>

<div class=ODER>
    <div class="container">
        <form action="" method="POST">
        <div class="food-details">
            <h2><?php echo $title?></h2>
            <p>Rs.<?php echo $price?></p>
            <?php 
                //check whether the image is available or not
                if ($imagename == "") {
                    echo "Image is not added";
                } else {
                   //image is available
                   ?>
                    <img src="<?php echo SITEURL;?>Images/Foodimg/<?php echo $imagename;?>"
                         width="100px" height="100px" alt="Promo Image">
                    <?php
                }
              ?>
            <p>Quantity: <input type="number" value="1" name="qty"></p>
        </div>

        <div class="order-form">
            <h2>Order Form</h2>
        
                <div class="form-group">
                    <label for="Name">Name:</label>
                    <input type="text" id="Name" name="Name" required>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number:</label>
                    <input type="tel" id="phoneNumber" name="phoneNumber" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" required></textarea>
                </div>
                <div class="form-group">
                <td>Dining Options:</td>
                <br>
                Takeout          <input type="radio" name="DINOP" value="Takeout"> 
                Dinein        <input type="radio" name="DINOP" value="Dinein">
                Dilivery            <input type="radio" name="DINOP" value="Dilivery">    
            </div>
                <button type="submit" name="submit"  class="confirm-order-btn">Confirm Order</button>
            </form>


            <?php 
            //check whether submit button is clicked or nont
            if(isset($_POST['submit']))
            {
                //submit button is clicked
                $food = $title;
                $qty=$_POST['qty'];
                $price= $price;
                $total=$price*$qty;
                $oderdatedate= date("y-m-d H:i:sa");//oderdate
                $status="odered";
                $cusname= $_POST['Name'];
                $phonenumber= $_POST['phoneNumber'];
                $email= $_POST['email'];
                $address= $_POST['address'];
                $DINOP= $_POST['DINOP'];
                
                //save the order in the Database
                //Create sql to save the data
                $sql2="INSERT INTO tbloder SET
                food='$food',
                price='$price',
                qt='$qty',
                total='$total',
                oderdate='$oderdatedate',
                status='$status',
                customername='$cusname',
                customerconact='$phonenumber',
                customeremail='$email',
                customeradress='$address',
                DineinOP='$DINOP'";
                //execute the query
                $res2=mysqli_query($conn,$sql2);

                //check whether query  execution succeeded
                if($res2==true)
                {
                    //query execution succeeded
                    $_SESSION['order'] = "";
                    echo '<script>';
                    echo 'alert("Oder Submited Successfully!");';
                    echo 'window.location.href = "' . SITEURL . 'Admin/FOODMENU.php";';
                    echo '</script>';
                    exit(); //stop further execution
                }
                else
                {
                    //query execution failed
                    $_SESSION['order'] = "Order Placed Failed";
                    header('location: '. SITEURL. 'Admin/HOME-PAGE.php');
                    exit(); //stop further execution
            }}
            ?>
        </div>
    </div>
    </div>
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