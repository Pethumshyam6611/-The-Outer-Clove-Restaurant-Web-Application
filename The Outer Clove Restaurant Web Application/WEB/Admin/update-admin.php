<?php include('partial/menu.php');?>
<div class="main-content">
     <div class="wrapper">
        <h1>Update Admin</h1>
        <br>
        <br>
        <?php


$ID=$_GET['id'];


$sql="SELECT * FROM tableadmin WHERE id=$ID";

//
$res=mysqli_query($conn,$sql);

if($res==TRUE)
{
    $count=mysqli_num_rows($res);

    if($count==1)
    {
        //get the details
        $row=mysqli_fetch_assoc($res);
        $fullname=$row['Fullname'];
        $usename=$row['Username'];
        $password=$row['Password'];
    }
    else
    {
        //
        header('location:'.SITEURL.'Admin/manage-admin.php');
    }
}


?>
        <form action="" method="post">
        <table class="tbl-30">
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="fullname" value="<?php echo $fullname;?>"></td>
            </tr>
            <tr>
                <td>User Name:</td>
                <td><input type="text" name="usename" value="<?php echo $usename;?>"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="text" name="password" value="<?php echo $password;?>"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="hidden" name="id" value=<?php echo $ID;?>>
                    <input type="submit" name="submit" value="update admin" class="btnupdateadmin">
                </td>
            </tr>
        </table>
     </div>
</div>



<?php
if (isset($_POST['submit'])){


    $ID=$_POST['id'];
    $fullname=$_POST['fullname'];
    $usename=$_POST['usename'];
    $password=$_POST['password'];
    

    $sql="UPDATE tableadmin SET
    Fullname='$fullname',
    Username='$usename',
    Password='$password'
    WHERE id=$ID";
    
    $res=mysqli_query($conn,$sql);

    if($res==TRUE)
    {
        $_SESSION['update'] = "updated data";
        header('location:'.SITEURL.'Admin/manage-admin.php');
    }
    else
    {
        $_SESSION['update'] = "error";
        header('location:'.SITEURL.'Admin/manage-admin.php');
    }

}
?>

<?php include('partial/footer.php');?>

