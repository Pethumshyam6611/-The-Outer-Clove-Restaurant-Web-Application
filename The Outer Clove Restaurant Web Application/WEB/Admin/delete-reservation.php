<?php include('partial/menu.php');?>
<?php
//include dbconnect
    include('../config/dbconnect.php');
    //1.get the id of admin to be deleted
    $Resid= $_GET['id'];
    //2.create sql query to delete

    $sql="DELETE FROM reservations WHERE RESID='$Resid'";
    //3.redirect to manage Reservation page with message
    
    //execute query
    $res =mysqli_query($conn,$sql);


     if($res==true)
     {
       $_SESSION['delete'] = " Reservation Deleted Successfully";
       header('location:'.SITEURL.'/Admin/manage-reservation.php');
     }
     else
     {
        $_SESSION['delete'] = "Failed to delete successfully";
        header('location:'.SITEURL.'/Admin/manage-reservation.php');
    }
?>