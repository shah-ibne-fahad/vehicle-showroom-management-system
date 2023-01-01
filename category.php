<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};


if(isset($_POST['purchase'])){
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $_SESSION['p_name'] =  $p_name;
   $_SESSION['p_price'] =  $p_price;
   header('location:checkout.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <section class="p-category">

        <a href="category.php?category=cars">cars</a>
        <a href="category.php?category=motorbikes">motorbikes</a>
        <a href="category.php?category=cycles">cycles</a>

    </section>

    <section class="vehicles">

        <h1 class="title">vehicles categories</h1>

        <div class="box-container">

            <?php
      $category_name = $_GET['category'];
      $select_vehicles = $connect->query("SELECT * FROM `vehicles` WHERE category = '$category_name'");
      if( mysqli_num_rows($select_vehicles) > 0){
         while($fetch_vehicles = mysqli_fetch_assoc($select_vehicles)){ 
   ?>
            <form action="" class="box" method="POST">
                <img src="uploaded_img/<?= $fetch_vehicles['image']; ?>" alt="">
                <div class="name"><?= $fetch_vehicles['name']; ?></div>
                <input type="hidden" name="pid" value="<?= $fetch_vehicles['id']; ?>">
                <input type="hidden" name="p_name" value="<?= $fetch_vehicles['name']; ?>">
                <input type="hidden" name="p_price" value="<?= $fetch_vehicles['price']; ?>">
                <input type="hidden" name="p_image" value="<?= $fetch_vehicles['image']; ?>">
                <div class="name">Tk <?= $fetch_vehicles['price']; ?>/-</div>
                <a href="view_page.php?pid=<?= $fetch_vehicles['id']; ?>" class="btn">View Details</a>
                <input type="submit" value="Buy Now" class="btn" name="purchase">
            </form>
            <?php
         }
      }else{
         echo '<p class="empty">no vehicles available!</p>';
      }
   ?>

        </div>

    </section>

    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>

</body>

</html>