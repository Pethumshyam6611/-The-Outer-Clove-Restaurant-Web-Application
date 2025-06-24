<?php include('../config/dbconnect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OUTER CLOVE</title>
    <link rel="stylesheet" href="../CSS/home-page.css">
    <link rel="stylesheet" href="../CSS/slider.css">
    <script src="../JS/script.js"></script>
   
</head>
<body>
    
<!-- Nav Bar-->
    <nav id='menu'>
    <img src="../Images/HOME/2-removebg-preview (2).png">
  <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>
  <ul>
    <li><a href='#'>Home</a></li>
    <li><a href='../Admin/FOODMENU.php'>Menu</a></li>
    <li><a href='#Promotions'>Promotions</a></li>
    <li><a href='#aboutus'>About Us</a></li>
    <li><a href='../Admin/CUSRESERVATION.php'>Reservation</a></li>
    <li class="signup-button"><a href='../Admin/CustomerLogin.php'>Login</a></li>
  </ul>
</nav>
<!-- Home Section-->
<section class="home" id="home">
    <div class="content">
    <h2>Welcome to Outer Clove</h2>
    <br>
    <p>Savor diverse culinary artistry at Outer Clove. <br>Our fusion menu invites you on a delightful journey, <br>offering exquisite flavors and an ambiance that elevates your dining experience..</p>
    <br>
    <a href="../Admin/FOODMENU.php" class="oder-button">ODER NOW</a>
    </div>
    <div class="imagehero">
    <img src="../Images/HOME/delicious-burger-with-many-ingredients-isolated-white-background-tasty-cheeseburger-splash-sauce-removebg.png" alt="">

    </div>
</section>             
<!-- Speaciality Section-->
    <section class="Speaciality" id="Speaciality">
        <h1 class="heading">our<span> Speciality </span></h1>   
    <div class="box-container">
    <div class="box">
        <img class="Image" src="../Images/HOME/glass-of-faluda-drink-for-website-908230750.png" alt="">
        <div class="content">
            <img src="../Images/HOME/lemon-juice_7695150 (1).png" alt="">
            <h3>Drinks</h3>
            <p>Sip into bliss with our tantalizing elixirs, a taste symphony awaits.. </p>

        </div>
    </div>
    <div class="box">
        <img class="Image"   src="../Images/HOME/noodles-for-website-588863765.png" alt="">
        <div class="content">
            <img src="../Images/HOME/breakfast_6540381.png" alt="">
            <h3>Main Course</h3>
            <p>Indulge in flavorful main courses, a culinary adventure awaits! </p>
            
        </div>
    </div>
    <div class="box">
        <img class="Image" src="../Images/HOME/2150727591.jpg" alt="">
        <div class="content">
            <img src="../Images/HOME/icecream_2148058 (1).png" alt="">
            <h3>Dessert</h3>
            <p>Delectable desserts that captivate your senses, pure indulgence awaits!"</p>
            
        </div>
    </div>
</section>  
<br>
<br>
<section>
    <H1 style="text-align: center; font-family:'poppins'; color:#333; font-size: 1.5em; font-weight: bold;" id="Promotions">Promotions</H1></style>
</section>
<br>
<br>
<section class="slider">
    <?php
    $sql = "SELECT * FROM promotions";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $count = mysqli_num_rows($res);
        $sn = 1;

        if ($count > 0) {
            echo '<div class="list">';
            while ($rows = mysqli_fetch_assoc($res)) {
                $ID = $rows['ID'];
                $Title = $rows['Title'];
                $imagename = $rows['Imagename'];

                echo '<div class="item">';
                if ($imagename == "") {
                    echo "No Promotions available";
                } else {
                    echo '<img src="' . SITEURL . 'Images/promoimg/' . $imagename . '" width="100px" height="100px" alt="Promo Image">';
                }
                echo '</div>';
            }
            echo '</div>';
        }
    }
    ?>



    <div class="buttons">
        <button id="prev">&lt;</button>
        <button id="next">&gt;</button>
    </div>
    <ul class="dots">
        <?php
        for ($i = 0; $i < $count; $i++) {
            echo '<li' . ($i == 0 ? ' class="active"' : '') . '></li>';
        }
        ?>
    </ul>
</section>

<script>
    let slider = document.querySelector('.slider .list');
    let items = document.querySelectorAll('.slider .list .item');
    let next = document.getElementById('next');
    let prev = document.getElementById('prev');
    let dots = document.querySelectorAll('.slider .dots li');

    let lengthItems = items.length - 1;
    let active = 0;

    next.onclick = function () {
        active = active + 1 <= lengthItems ? active + 1 : 0;
        reloadSlider();
    };

    prev.onclick = function () {
        active = active - 1 >= 0 ? active - 1 : lengthItems;
        reloadSlider();
    };

    let refreshInterval = setInterval(() => {
        next.click();
    }, 3000);

    function reloadSlider() {
        slider.style.left = -items[active].offsetLeft + 'px';

        let last_active_dot = document.querySelector('.slider .dots li.active');
        last_active_dot.classList.remove('active');
        dots[active].classList.add('active');

        clearInterval(refreshInterval);
        refreshInterval = setInterval(() => {
            next.click();
        }, 3000);
    }

    dots.forEach((li, key) => {
        li.addEventListener('click', () => {
            active = key;
            reloadSlider();
        });
    });

    window.onresize = function (event) {
        reloadSlider();
    };
</script>

<br>
<br>
      
<!-- About Us Section -->
    <section class="about-container" id="aboutus">
    <div class="text-container">
        <h2>About Us</h2>
        <p>
        At Outer Clove, dining is more than a meal—it's an experience.
        </p>
        <p>
        Nestled in the vibrant heart of [your city or specific location], Outer Clove Restaurant is a culinary haven where exquisite flavors, warm ambiance, and exceptional service converge. Our passion for [insert cuisine type or unique culinary approach] drives our commitment to crafting a dining experience that transcends the ordinary.
        </p>
    </div>
    <div class="image-container">
        <img src="../Images/HOME/lifestyle-people-learning-make-sushi.jpg" alt="Team Photo">
    </div>
    </section>
      
<!-- Services Cards -->
        <section class="card-container" id="aboutus">
             <div class="card">
               <img src="../Images/HOME/happy-waiter-serving-food-group-cheerful-friends-pub.jpg" alt="Image 1">
               <div class="content">
                 <h3>facilities</h3>
                 <p>Immerse yourself in comfort at outer clove. Our top-notch facilities enhance your dining pleasure, from cozy interiors to a welcoming ambiance.</p>
               </div>
             </div>

             <div class="card">
               <img src="../Images/HOME/hallway-garage.jpg" alt="Image 2">
               <div class="content">
                 <h3>Parking</h3>
                 <p>"Enjoy hassle-free visits with ample parking at outer clove. Easy accessibility for a stress-free dining experience!</p>
               </div>
             </div>

        <div class="card">
            <img src="../Images/HOME/restaurant-interior.jpg" alt="Image 3">
            <div class="content">
            <h3>Seating Capacities</h3>
            <p>From intimate dinners to group celebrations, We offers versatile seating options to suit every occasion. Discover the perfect setting for your culinary experience.</p>
            </div>
         </div>
                </section>











    
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