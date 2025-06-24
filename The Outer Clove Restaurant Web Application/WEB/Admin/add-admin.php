<?php include('partial/menu.php');
?>
<div class="main-content">
     <div class="wrapper">
        <h1>Add Admin</h1>
        <br>
     
        <form action="" method="post">
        <table>
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="fullname" placeholder="Enter Your Name"></td>
            </tr>
            <tr>
                <td>User Name:</td>
                <td><input type="text" name="usename" placeholder="Enter Your User Name"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="text" name="password" placeholder="Enter Your Passowrd"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" name="submit" value="Add" class="btnupdateadmin">
                </td>
            </tr>

        </table>

        <div class="clearfix"></div>
     </div>
     </div>






<?php include('partial/footer.php');?>


<?php
include('../config/dbconnect.php');
// Processes Of Data Save To The Database//
if(isset($_POST['submit']))
{
    $fullname = $_POST['fullname'];
    $usename = $_POST['usename'];
    $password = $_POST['password']; 

    $query=mysqli_query($conn,"INSERT INTO tableadmin(Fullname,Username,Password) values('$fullname','$usename','$password')");
    if($query){

        $_SESSION['add'] = "Admin Added Successfully";
        echo "<script>alert('Admin Added Successfully');</script>";
        header('location:'.SITEURL.'Admin/manage-admin.php');
      }  
      else
      {
        $_SESSION['add'] = "Admin Added Unsuccessful";
        echo"<script>alert('there is an error');</script>";
        header('location:'.SITEURL.'Admin/manage-admin.php');
      }
    }




?>