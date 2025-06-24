<?php 

include('../config/dbconnect.php');
include('login-check.php');

?>

<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="../CSS/admin.css">
<head>
    <title>OUTER CLOVE WEBSITE-HOME PAGE</title>
</head>
<body>
    <!-- MENU END-->
    <div class="menu">
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">OUTER CLOVE ADMIN PANEL</label>
      <ul>
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="manage-admin.php">Admin</a></li>
        <li><a href="../Admin/manage-reservation.php">RES</a></li>
        <li><a href="manage-promos.php">Promotions</a></li>
        <li><a href="manage-food.php">Food</a></li>
        <li><a href="manage-oder.php">Oder</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    </div>
     <!-- MENU END-->