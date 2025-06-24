<?php include('partial/menu.php');?>
<?php include('../config/dbconnect.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Promos</h1>
        <br>
        <br>
        <?php


if (isset($_GET['id'])) {
    $ID = $_GET['id'];
    $sql = "SELECT * FROM promotions WHERE id=$ID";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $row = mysqli_fetch_assoc($res);

        if ($row) {
            $title = $row['Title'];
            $imagename = $row['Imagename'];
        } else {
            header('location:' . SITEURL . 'Admin/manage-promos.php');
            exit();
        }
    } else {
        // Handle database query error
        die("Error in SQL query: " . mysqli_error($conn));
    }
} else {
    header('location:' . SITEURL . 'Admin/manage-promos.php');
    exit();
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <table class="tbl-30">
        <tr>
            <td>Title:</td>
            <td><input type="text" name="title" value="<?php echo $title; ?>"></td>
        </tr>
        <tr>
            <td>Select Image:</td>
            <td>
                <input type="file" name="image">
                <input type="hidden" name="existing_image" value="<?php echo $imagename; ?>">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <input type="hidden" name="id" value="<?php echo $ID; ?>">
                <input type="submit" name="submit" value="Update Promotion" class="btnupdateadmin">
            </td>
        </tr>
    </table>
</form>

<?php
if (isset($_POST['submit'])) {
    $ID = $_POST['id'];
    $title = $_POST['title'];
    
    $imagename = $_POST['existing_image']; // Default to existing image name

    if (isset($_FILES['image']['name'])) {
        $new_image_name = $_FILES['image']['name'];

        if ($new_image_name != "") {
            $extension = pathinfo($new_image_name, PATHINFO_EXTENSION);
            $imagename = "Promotion-Name." . rand(0000, 9999) . "." . $extension;

            $destination_path = "../Images/promoimg/" . $imagename;

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $destination_path)) {
                $_SESSION['upload'] = "Uploading new Image has Failed";
                header('location:' . SITEURL . 'Admin/manage-promos.php');
                die();
            }
        }
    }

    $sql6 = "UPDATE promotions SET title = '$title', Imagename = '$imagename' WHERE id=$ID";
    $res6 = mysqli_query($conn, $sql6);

    if ($res6) {
        $_SESSION['update'] = "Promotion Successfully Updated";
        header('location:' . SITEURL . 'Admin/manage-promos.php');
        exit();
    } else {
        $_SESSION['update'] = "Failed to Update Promotion";
        header('location:' . SITEURL . 'Admin/manage-promos.php');
        exit();
    }
}
?>
    </div>
</div>

<?php include('partial/footer.php');?>
