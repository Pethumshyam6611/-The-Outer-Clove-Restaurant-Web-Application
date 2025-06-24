<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OUTER CLOVE FOOD MENU</title>
    <link rel="stylesheet" href="../CSS/home-page.css">
    <link rel="stylesheet" href="../CSS/foodmenu.css">
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
    <li class="signup-button"><a href='../Admin/CustomerLogin.php'>Login</a></li>
</ul>
</nav>
<?php include('../config/dbconnect.php');?>

<!--Search Section Start Here-->

<section class="Search">
<div class="search-container">
<form action="food-search.html" method="POST">
    <input type="text" id="search" placeholder="Search...">
    <button type="button" id="search-btn">Search</button>
</form>
</div>
</section>



<!-- fOOD MEnu Section Starts Here -->

    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Foods</h2>
<!-- Create Sql Query to Get foods based on admin panel-->
        <?php
            //get the search keywords from the menu searchbar
            $search=$_POST['search'];
            //sql query to get foods based on search keyword
            $sql = "SELECT * FROM tblfood WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

            //execute query
            $res=mysqli_query($conn,$sql);

            //cont rows
            $count=mysqli_num_rows($res);
            //check whether food available or not
            if($count>0)
            {
                //food available
                while($row=mysqli_fetch_assoc($res))
                {
                    //get the details
                    $ID=$row['id'];
                    $title=$row['title'];
                    $description=$row['description'];
                    $price=$row['price'];
                    $imagename=$row['imagename'];
                    ?>

<div class="food-menu-box">
            <div class="food-menu-img">
            <?php
            if ($imagename == "") {
                echo "Image is not added";
            } else {
                ?>
                <img src="<?php echo SITEURL; ?>Images/Foodimg/<?php echo $imagename; ?>"
                     width="100px" height="100px" alt="Promo Image">
                <?php
            }
            ?>
            </div>
            <form action="" method="post">
            <div class="food-menu-desc">
                <h4><?php echo $title; ?></h4>
                <input type="hidden" name ="food" value="<?php echo $title; ?>">
                <p><?php echo $description; ?></p>
                <p><b>Rs.<?php echo $price; ?></b></p>
                <input type="hidden" name ="price" value="<?php echo $price; ?>">

                <a href="<?php echo SITEURL;?>Admin/Oder.php?food_id=<?php echo $ID;?>" class="btn btn-primary"><B>BUY NOW</B></a>
            </div>
        </form>
        </div>
                    <?php

                }
            }
            else
            {
                //food not available
                echo "No food items found";
            }
?>
            </div>
           
      

         

           
          

            <div class="clearfix"></div>

</section>      

    <!-- fOOD Menu Section Ends Here -->

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