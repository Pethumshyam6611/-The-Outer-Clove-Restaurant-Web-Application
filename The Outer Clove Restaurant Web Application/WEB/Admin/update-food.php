<?php include('partial/menu.php');?>
<?php include('../config/dbconnect.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br>
        <br>
        <?php
// Assuming SITEURL is defined somewhere in your code
// Example: define('SITEURL', 'http://yourwebsite.com/');

if (isset($_GET['id'])) {
    $ID = $_GET['id'];
    $sql = "SELECT * FROM tblfood WHERE id=$ID";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        $row = mysqli_fetch_assoc($res);

        if ($row) {
            $title = $row['title'];
            $imagename = $row['imagename'];
            $price = $row['price'];
            $description = $row['description'];
            $categoryid = $row['Categoryid'];
        } else {
            header('location:' . SITEURL . 'Admin/manage-food.php');
            exit();
        }
    } else {
        // Handle database query error
        die("Error in SQL query: " . mysqli_error($conn));
    }
} else {
    header('location:' . SITEURL . 'Admin/manage-food.php');
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
            <td>Description:</td>
            <td><textarea cols="50" rows="10" name="Description"><?php echo $description; ?></textarea></td>
        </tr>
        <tr>
            <td>Image:</td>
            <td><input type="file" name="existing_image"></td>
        </tr>
        <tr>
            <td>Price:</td>
            <td><input type="text" name="price" value="<?php echo $price; ?>"></td>
        </tr>
        <tr>
            <td>Category:</td>
            <td>
                Drink <input type="radio" name="Category" value="1" <?php if ($categoryid == '1') echo 'checked'; ?>>
                Main Course <input type="radio" name="Category" value="2" <?php if ($categoryid == '2') echo 'checked'; ?>>
                Dessert <input type="radio" name="Category" value="3" <?php if ($categoryid == '3') echo 'checked'; ?>>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <input type="hidden" name="id" value="<?php echo $ID; ?>">
                <input type="submit" name="submit" value="Update Food" class="btnupdateadmin">
            </td>
        </tr>
    </table>
</form>

<?php
if (isset($_POST['submit'])) {
    $ID = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['Description'];
    $price = $_POST['price'];
    $categoryid = $_POST['Category'];

    $imagename = $_FILES['existing_image']['name']; // Default to existing image name

    if (isset($_FILES['existing_image']['name'])) {
        $new_image_name = $_FILES['existing_image']['name'];

        if ($new_image_name != "") {
            $extension = pathinfo($new_image_name, PATHINFO_EXTENSION);
            $imagename = "FoodIMG." . rand(0000, 9999) . "." . $extension;

            $destination_path = "../Images/Foodimg/" . $imagename;

            if (!move_uploaded_file($_FILES['existing_image']['tmp_name'], $destination_path)) {
                $_SESSION['upload'] = "Uploading new Image has Failed";
                header('location:' . SITEURL . 'Admin/manage-promos.php');
                die();
            }
        }
    }

    $sql6 = "UPDATE tblfood SET title = '$title', Description='$description', Price='$price', Categoryid='$categoryid', Imagename = '$imagename' WHERE id=$ID";
    $res6 = mysqli_query($conn, $sql6);

    if ($res6) {
        $_SESSION['update'] = "Food Successfully Updated";
        header('location:' . SITEURL . 'Admin/manage-food.php');
        exit();
    } else {
        $_SESSION['update'] = "Failed to Update Food";
        header('location:' . SITEURL . 'Admin/manage-food.php');
        exit();
    }
}
?>
    </div>
</div>

<?php include('partial/footer.php');?>
