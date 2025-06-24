<?php include('partial/menu.php');?>

     <!-- main content section start-->
     <div class="main-content">
     <div class="wrapper">
        <h1>Manage Food</h1>
        <br>
        <br>
        <a href="add-food.php" class="btnAddadmin">Add Food</a>
        <br>
        <br>
       <?php if (isset($_SESSION['add']))
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
            ?>
       <table class="tablefull">
         <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Price</th>
            <th>Action</th>
         </tr>
      <?php 
         $sql="SELECT * FROM tblfood";

         $res=mysqli_query($conn,$sql);

         if($res==true)
         {
            $count=mysqli_num_rows($res);
            $sn=1;

            if($count>0)
            {
               while($rows=mysqli_fetch_assoc($res))
            {
               $ID=$rows['id'];
               $Title=$rows['title'];
               $description=$rows['description'];
               $imagename=$rows['imagename'];
               $Price=$rows['price']
              ?>
               <tr>
                  <td><?php echo$sn++;?></td>
                  <td><?php echo$Title;?></td>
                  <td><?php echo$description;?></td>
                  <td>
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
                       </td>
                  <td><?php echo$Price;?></td>
               <td>
                  <a href="<?php echo SITEURL;?>Admin/update-food.php?id=<?php echo $ID;?>" class="btnupdateadmin">Update Admin</a>
                  <a href="<?php echo SITEURL;?>Admin/delete-food.php?id=<?php echo $ID;?>" class="btndeleteadmin">Delete Admin</a>
               </td>
              </tr>


              <?php
             
           
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