<?php include('partial/menu.php');?>
<div class="main-content">
     <div class="wrapper">
        <h1>Manage Promotions</h1>

        <br>
        <a href="add-promo.php" class="btnAddadmin"> Add Promotions</a>
        <br>
        <br>
        <?php 
        if (isset($_SESSION['Delete']))
            {
             echo $_SESSION['Delete'];
             unset($_SESSION['Delete']);
          }
          ?>
        <table class="tablefull">
         <tr>
            <th>S.N</th>
            <th>Title</th>
            <th>Promo Image</th>
            <th>Action</th>
           
         </tr>
         <?php 
         $sql6="SELECT * FROM promotions";

         $res6=mysqli_query($conn,$sql6);

         if($res6==true)
         {
            $count6=mysqli_num_rows($res6);
            $sn=1;

            if ($count6 > 0) {
               while ($rows6 = mysqli_fetch_assoc($res6)) {
                   $ID = $rows6['ID'];
                   $title = $rows6['Title'];
                   $image_name = $rows6['Imagename'];
                   ?>
                   <tr>
                       <td><?php echo $sn++; ?></td>
                       <td><?php echo $title; ?></td>
                       <td>
                           <?php
                           if ($image_name == "") {
                               echo "Image is not added";
                           } else {
                               ?>
                               <img src="<?php echo SITEURL; ?>Images/promoimg/<?php echo $image_name; ?>"
                                    width="100px" height="100px" alt="Promo Image">
                               <?php
                           }
                           ?>
                       </td>
                  
               <td>
                  <a href="<?php echo SITEURL;?>Admin/update-promo.php?id=<?php echo $ID;?>" class="btnupdateadmin">Update Promotions</a>
                  <a href="<?php echo SITEURL;?>Admin/delete-promo.php?id=<?php echo $ID;?>&image_name=" class="btndeleteadmin">Delete Promotions</a>
               </td>
              </tr>
       
        <?php if(isset($_SESSION['pro']))
        {
               echo $_SESSION['pro'];
               unset($_SESSION['pro']);


       } if(isset($_SESSION['remove']))
       {
              echo $_SESSION['remove'];
              unset($_SESSION['remove']);
      }
      if(isset($_SESSION['delete']))
      {
             echo $_SESSION['delete'];
             unset($_SESSION['delete']);
     }
     if(isset($_SESSION['update']))
     {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
    }}
       
       
       }}?>
        
       
         
       </table>

        <div class="clearfix"></div>
     </div>
     </div>

<?php include('partial/footer.php');?>