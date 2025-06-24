
<?php include('partial/menu.php');?>

     <!-- main content section start-->
     <div class="main-content">
     <div class="wrapper">
        <h1>Manage Admin</h1>
        <br>
        <br>
        <a href="add-admin.php" class="btnAddadmin">Add Admin</a>
        <br>
        <br>
        
       <table class="tablefull">
         <tr>
            <th>S.N</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
         </tr>
      <?php 
         $sql="SELECT * FROM tableadmin";

         $res=mysqli_query($conn,$sql);

         if($res==true)
         {
            $count=mysqli_num_rows($res);
            $sn=1;

            if($count>0)
            {
               while($rows=mysqli_fetch_assoc($res))
            {
               $ID=$rows['ID'];
               $Fullname=$rows['Fullname'];
               $Username=$rows['Username'];
              ?>
               <tr>
                  <td><?php echo$sn++;?></td>
                  <td><?php echo$Fullname;?></td>
                  <td><?php echo$Username;?></td>
               <td>
                  <a href="<?php echo SITEURL;?>Admin/update-admin.php?id=<?php echo $ID;?>" class="btnupdateadmin">Update Admin</a>
                  <a href="<?php echo SITEURL;?>Admin/delete-admin.php?id=<?php echo $ID;?>" class="btndeleteadmin">Delete Admin</a>
               </td>
              </tr>


              <?php
               if (isset($_SESSION['add']))
              {
               echo $_SESSION['add'];
               unset($_SESSION['add']);
            }
            if (isset($_SESSION['Delete']))
            {
             echo $_SESSION['Delete'];
             unset($_SESSION['Delete']);
          }
          if (isset($_SESSION['update']))
          {
           echo $_SESSION['update'];
           unset($_SESSION['update']);
        }
      }}
         }
      ?>

      
       </table>

        <div class="clearfix"></div>
     </div>
     </div>
     <!-- main content section start-->


    <!-- footer section start-->
     <div class="footer section">
        <div class="wrapper">
            <p class="txt-center">© 2023−2024 The Outer Clove Restaurant. All right reserved</p>
        </div>
     </div>
     <!-- footer section end-->