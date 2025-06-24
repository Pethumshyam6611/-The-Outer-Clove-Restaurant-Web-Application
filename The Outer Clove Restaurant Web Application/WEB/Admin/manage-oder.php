<?php include('partial/menu.php');?>
<div class="main-content">
     <div class="wrapper">
        <h1>Manage Oder</h1>
        <?php 
        if (isset($_SESSION['DeleteOD']))
            {
             echo $_SESSION['DeleteOD'];
             unset($_SESSION['DeleteOD']);
          }
          ?>
        <table class="tablefull">
         <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Price</th>
            <th>Qauntity</th>
            <th>Total</th>
            <th>Order Date & Timea</th>
            <th>Status</th>
            <th>Customer Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Dine In OP</th>
            <th>Action</th>
         </tr>
      <?php 
         $sql="SELECT * FROM tbloder";

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
               $Title=$rows['food'];
               $Quantity=$rows['qt'];
               $total=$rows['total'];
               $Price=$rows['price'];
               $orderdate=$rows['oderdate'];

               $status=$rows['status'];
               $cusname=$rows['customername'];
               $phonenumber=$rows['customerconact'];
               $email=$rows['customeremail'];
               $address=$rows['customeradress'];
               $DINOP=$rows['DineinOP'];
              ?>
               <tr>
                  <td><?php echo$sn++;?></td>
                  <td><?php echo$Title;?></td>
                  <td><?php echo$Price;?></td>
                  <td><?php echo$Quantity;?></td>
                  <td><?php echo$total;?></td>
                  <td><?php echo$orderdate;?></td>
                  <td><?php echo$status;?></td>
                  <td><?php echo$cusname;?></td>
                  <td><?php echo$phonenumber;?></td>
                  <td><?php echo$email;?></td>
                  <td><?php echo$address;?></td>
                  <td><?php echo$DINOP;?></td>
               <td>
                  <a href="<?php echo SITEURL;?>Admin/Deleteorder.php?id=<?php echo $ID;?>" class="btndeleteadmin">Delete Order</a>
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
<?php include('partial/footer.php');?>