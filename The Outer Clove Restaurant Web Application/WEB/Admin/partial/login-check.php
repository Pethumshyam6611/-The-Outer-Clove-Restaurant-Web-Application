<?php 
    //authorization-accesscontrol
    //check whether the user is logged in or not
    if (!isset($_SESSION['user'])) 
    {
        //user is not logged in
        //redirect to login page with message
        $_SESSION['no-login-message']= "<div class='Success txt-center'> Please Login For Access Admin Panel</div>" ;
        //redirect to login page
        header('location:'.SITEURL.'Admin/login.php');
    }

?>