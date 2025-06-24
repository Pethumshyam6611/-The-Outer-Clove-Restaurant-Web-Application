<?php include('../config/dbconnect.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="">
	<div class="screen">
    <link rel="stylesheet" href="../CSS/login.css">
    <title>Login page</title>
</head>
<body>
    <div>
<h1 class="txt-center">Admin Login</h2>

<form action="" method="post">
  <div class="imgcontainer">
    <img src="../Images/—Pngtree—user vector avatar_4830521.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit" name="submit" value="login">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" >
    <button type="button" class="cancelbtn">Cancel</button>
    
  
</form>
</div>


</body>
</html>
<?php 
        
        if (isset($_SESSION['login']))
       {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
     }

     if (isset($_SESSION['no-login-message']))
       {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
     }
?>



<?php 

  if(isset($_POST['submit']))
  {
    //login process
    //get data fron the login
    $USERNAME=$_POST['uname'];
    $PASSWORD=$_POST['password'];

    //sql to check whether the user with username and password exists or not
    $sql = "SELECT * FROM tableadmin WHERE Username='$USERNAME' AND Password='$PASSWORD'";
    // execute the query
    $res=mysqli_query($conn,$sql);
    //count rows to check whether the user is exists or not
    $count=mysqli_num_rows($res);

    if($count==1)
    {
      //user available and login successful
      $_SESSION['login']="<div class='Success txt-center'> Login successful</div>";
      $_SESSION['user']= $USERNAME;

      //redirect to home page
      header('location:'.SITEURL.'Admin/');
    }
    else{
      //user not available
      $_SESSION['login']="<div class='Error txt-center'> Login Failed</div>";
      header('location:'.SITEURL.'Admin/login.php');
    }
  }

?>