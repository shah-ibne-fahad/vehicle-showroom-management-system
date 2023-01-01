<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['update_vehicle'])){

   $pid = $_POST['pid'];
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $category = $_POST['category'];
   $category = filter_var($category, FILTER_SANITIZE_STRING);
   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;
   $old_image = $_POST['old_image'];

   $update_vehicle = mysqli_query($connect,"update vehicles SET name='$name',category='$category',details='$details',price='$price'
   WHERE id='$pid'");

   $message[] = 'vehicle updated successfully!';

   if(!empty($image)){
      if($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{

         $update_image= mysqli_query($connect,"update vehicles SET image='$image' WHERE id='$pid'");

         if($update_image){
            move_uploaded_file($image_tmp_name, $image_folder);
            unlink('uploaded_img/'.$old_image);
            $message[] = 'image updated successfully!';
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update vehicles</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

    <?php include 'admin_header.php'; ?>

    <section class="update-vehicle">

        <h1 class="title">update vehicle</h1>
        <?php
    $update_id = $_GET['update'];
         $sql= (" SELECT * FROM vehicles WHERE id = '$update_id'");
         $query=$connect->query($sql);
         if(mysqli_num_rows($query) > 0){
         while($fetch_vehicles = mysqli_fetch_array($query)){  
   ?>


        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="old_image" value="<?= $fetch_vehicles['image']; ?>">
            <input type="hidden" name="pid" value="<?= $fetch_vehicles['id']; ?>">
            <img src="uploaded_img/<?= $fetch_vehicles['image']; ?>" alt="">
            <input type="text" name="name" placeholder="enter vehicle name" required class="box"
                value="<?= $fetch_vehicles['name']; ?>">
            <input type="number" name="price" min="0" placeholder="enter vehicle price" required class="box"
                value="<?= $fetch_vehicles['price']; ?>">
            <select name="category" class="box" required>
                <option selected><?= $fetch_vehicles['category']; ?></option>
                <option value="cars">vegitables</option>
                <option value="motorbikes">fruits</option>
                <option value="cycles">meat</option>
            </select>
            <textarea name="details" required placeholder="enter vehicle details" class="box" cols="30"
                rows="10"><?= $fetch_vehicles['details']; ?></textarea>
            <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
            <div class="flex-btn">
                <input type="submit" class="btn" value="update vehicle" name="update_vehicle">
                <a href="admin_vehicles.php" class="option-btn">go back</a>
            </div>
        </form>
        <?php
         }
      }else{
         echo '<p class="empty">no vehicles found!</p>';
      }
   ?>

    </section>


    <script src="js/script.js"></script>

</body>

</html>