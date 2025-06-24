<?php include('partial/menu.php');?>
<?php include('../config/dbconnect.php');?>
<div class="main-content">
     <div class="wrapper">
        <h1>Add Promotions</h1>
        <br>
     <?php 
        if(isset($_SESSION['upload']))
        {
               echo $_SESSION['upload'];
               unset($_SESSION['upload']);
        }
      ?>
        <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Title:</td>
                <td><input type="text" name="title" placeholder="Enter Your Name"></td>
            </tr>
            <tr>
                <td>Select Image:</td>
                <td><input type="file" name="image"></td>
            <tr>
                <td colspan="3">
                    <input type="submit" name="submit" value="Add Promo" class="btnupdateadmin">
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
    $title = mysqli_real_escape_string($conn, $_POST['title']);

    // Check if an image file is uploaded
    if (isset($_FILES['image']['name'])) {
        // Upload image
        $image_name = $_FILES['image']['name'];
        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../Images/promoimg/" . $image_name;

        // Move the uploaded image
        $upload = move_uploaded_file($source_path, $destination_path);

        // Check if the image upload was unsuccessful
        if (!$upload) {
            $_SESSION['upload'] = "<div class='error'>Image Upload Failed</div>";
            header('location: ' . SITEURL . 'Admin/add-promo.php');
            exit(); // Stop further execution
        }
    } else {
        // No image uploaded, set image_name as blank
        $image_name = "";
    }

    // Create SQL query to insert promotion into the database
    $sql = "INSERT INTO promotions SET
            Title ='$title',
            Imagename ='$image_name'";

    // Execute SQL query and save in the database
    $res = mysqli_query($conn, $sql);

    // Check if the query executed successfully and data was added
    if ($res) {
        $_SESSION['pro'] = "Image Uploaded Successfully";
        header('location: ' . SITEURL . 'Admin/manage-promos.php');
        exit(); // Stop further execution
    } else {
        $_SESSION['pro'] = "Image Upload Failed";
        header('location:'.SITEURL.'Admin/manage-promos.php.php');
        exit(); // Stop further execution
    }
}
?>

