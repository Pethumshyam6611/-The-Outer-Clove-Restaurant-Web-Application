<?php include('partial/menu.php');?>

<div class="main-content">
     <div class="wrapper">
        <h1>Manage Reservation</h1>
        <br>
        <br>
        <br>
        <br>
        
       <table class="tablefull">
         <tr>
            <th>S.N</th>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Date</th>
            <th>Time</th>
            <th>Actions</th>
         </tr>
      <?php 
         $sql="SELECT * FROM reservations";

         $res=mysqli_query($conn,$sql);

         if($res==true)
         {
            $count=mysqli_num_rows($res);
            $sn=1;

            if($count>0)
            {
               while($rows=mysqli_fetch_assoc($res))
            {
               $Resid=$rows['RESID'];
               $cusname=$rows['CustomerName'];
               $Email=$rows['Email'];
               $phone=$rows['Phonenumber'];
               $date=$rows['ReservationDate'];
               $time=$rows['ReservationTime'];
              ?>
               <tr>
                  <td><?php echo$sn++;?></td>
                  <td><?php echo$cusname;?></td>
                  <td><?php echo$Email;?></td>
                  <td><?php echo$phone;?></td>
                  <td><?php echo$date;?></td>
                  <td><?php echo$time;?></td>
               <td>
                  <a href="<?php echo SITEURL;?>Admin/delete-reservation.php?id=<?php echo $Resid;?>" class="btndeleteadmin">Delete Reservation</a>
               </td>
              </tr>


              <?php
            if (isset($_SESSION['delete']))
            {
             echo $_SESSION['delete'];
             unset($_SESSION['delete']);
          }
      }}
         }
      ?>

      
       </table>

        <div class="clearfix"></div>
     </div>
     </div>








<?php include('partial/footer.php');?>