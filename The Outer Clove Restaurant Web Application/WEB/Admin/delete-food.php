
<?php
//include dbconnect
    include('../config/dbconnect.php');
    //1.get the id of admin to be deleted
    $ID= $_GET['id'];
    //2.create sql query to delete

    $sql="DELETE FROM tblfood WHERE id='$ID'";
    //3.redirect to manage admin page with message
    
    //execute query
    $res =mysqli_query($conn,$sql);


     if($res==true)
     {
       $_SESSION['Delete'] = "Food deleted successfully";
       header('location:'.SITEURL.'/Admin/manage-food.php');
     }
     else
     {
        $_SESSION['Delete'] = "Failed to delete successfully";
        header('location:'.SITEURL.'/Admin/manag-food.php');
    }
?>




