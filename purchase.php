<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>purchase</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <section class="placed-purchase">

        <h1 class="title">placed purchase</h1>

        <div class="box-container">

            <?php
      $select_purchase = $connect->query("SELECT * FROM `purchase` WHERE user_id = '$user_id'");
      if(mysqli_num_rows($select_purchase) > 0){
         while($fetch_purchase = mysqli_fetch_assoc($select_purchase)){ 
   ?>
            <div class="box">
                <p> placed on : <span><?= $fetch_purchase['placed_on']; ?></span> </p>
                <p> name : <span><?= $fetch_purchase['name']; ?></span> </p>
                <p> number : <span><?= $fetch_purchase['number']; ?></span> </p>
                <p> email : <span><?= $fetch_purchase['email']; ?></span> </p>
                <p> address : <span><?= $fetch_purchase['address']; ?></span> </p>
                <p> payment method : <span><?= $fetch_purchase['method']; ?></span> </p>
                <p> your orders : <span><?= $fetch_purchase['total_vehicles']; ?></span> </p>
                <p> total price : <span>$<?= $fetch_purchase['total_price']; ?>/-</span> </p>
                <p> payment status : <span
                        style="color:<?php if($fetch_purchase['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_purchase['payment_status']; ?></span>
                </p>
            </div>
            <?php
      }
   }else{
      echo '<p class="empty">no purchase placed yet!</p>';
   }
   ?>

        </div>

    </section>









    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>

</body>

</html>