<?php include('partial/menu.php');
?>
<div class="main-content">
     <div class="wrapper">
        <h1>Add Food</h1>
        <br>
     
        <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Title:</td>
                <td><input type="text" name="Title" placeholder="Enter Food Title"></td>
            </tr>
            <tr>
                <td>Description:</td>
              <td><textarea cols="50" rows="10" name="Description" placeholder="Enter Food Desctiption"></textarea></td>
            </tr>
            <tr>
                <td>Price:</td>
                <td><input type="text" name="price" placeholder="Enter Price"></td>
            </tr>
            <tr>
                <td>Image:</td>
                <td><input type="file" name="image" ></td>
            </tr>
            <tr>
            <td>Category:</td>
                <td>Drink          <input type="radio" name="Category" value="1"> 
                Main Course        <input type="radio" name="Category" value="2">
                Dessert            <input type="radio" name="Category" value="3"></td>
                
       </tr>
      
            
            <tr>
                <td colspan="3">
                    <br>
                    <input type="submit" name="submit" value="Add Food" class="btnupdateadmin">
                </td>
            </tr>

        </table>

        <div class="clearfix"></div>
     </div>
     </div>






     <?php include('partial/footer.php');?>



<?php


if (isset($_POST['submit'])) {
    // Sanitize and assign the title value
    $title = mysqli_real_escape_string($conn, $_POST['Title']);
    $description = mysqli_real_escape_string($conn, $_POST['Description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $categoryid = mysqli_real_escape_string($conn, $_POST['Category']);
    
    // Check if an image file is uploaded
    if (isset($_FILES['image']['name'])) {
        // Upload image
        $imagename = $_FILES['image']['name'];
        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../Images/Foodimg/" . $imagename;

        // Move the uploaded image
        $upload = move_uploaded_file($source_path, $destination_path);

        // Check if the image upload was unsuccessful
        if (!$upload) {
            $_SESSION['upload'] = "<div class='error'>Image Upload Failed</div>";
            header('location: ' . SITEURL . 'Admin/manage-food.php');
            exit(); // Stop further execution
        }
    } else {
        // No image uploaded, set image_name as blank
        $imagename = "";
    }

    // Create SQL query to insert promotion into the database
    $sql = "INSERT INTO tblfood SET
        title='$title',
        description ='$description',
        imagename ='$imagename',
        price='$price',
        Categoryid='$categoryid'"; // You need to define $categoryid

    // Execute SQL query and save in the database
    $res = mysqli_query($conn, $sql);

    // Check if the query executed successfully and data was added
    if ($res) {
        $_SESSION['add'] = "Food Uploaded Successfully";
        header('location: ' . SITEURL . 'Admin/manage-food.php');
        exit(); // Stop further execution
    } else {
        $_SESSION['add'] = "Food Upload Failed";
        header('location: ' . SITEURL . 'Admin/manage-food.php');
        exit(); // Stop further execution
    }
}
?>