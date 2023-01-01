<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

    <?php include 'admin_header.php'; ?>

    <section class="dashboard">

        <h1 class="title">dashboard</h1>

        <div class="box-container">

            <div class="box">
                <?php
         $total_pendings = 0;

         $sql= (" SELECT * FROM purchase WHERE payment_status='pending' ");
         $query=$connect->query($sql);

         while($fetch_pendings = mysqli_fetch_array($query)){
            $total_pendings += $fetch_pendings['total_price'];
         };
      ?>
                <h3>$<?= $total_pendings; ?>/-</h3>
                <p>total pendings</p>
                <a href="admin_purchase.php" class="option-btn">pending list</a>
            </div>

            <div class="box">
                <?php
         $total_completed = 0;
         $sql= (" SELECT * FROM purchase WHERE payment_status='completed' ");
         $query=$connect->query($sql);

         while($fetch_completed = mysqli_fetch_array($query)){
            $total_completed += $fetch_completed['total_price'];
         };
      ?>
                <h3>$<?= $total_completed; ?>/-</h3>
                <p>completed purchase</p>
                <a href="admin_purchase.php" class="option-btn">complete purchase list</a>
            </div>

            <div class="box">
                <?php

         $sql= (" SELECT * FROM purchase");
         $query=$connect->query($sql);
         $number_of_purchase = mysqli_num_rows($query);

      ?>
                <h3><?= $number_of_purchase; ?></h3>
                <p>Total purchase</p>
                <a href="admin_purchase.php" class="option-btn">Total purchase list</a>
            </div>
            <br>
            <!--------------------vehicles add------------------------->
            <div class="box">
                <?php

         $sql= (" SELECT * FROM vehicles");
         $query=$connect->query($sql);
         $number_of_vehicles = mysqli_num_rows($query);

      ?>
                <h3><?= $number_of_vehicles; ?></h3>
                <p>vehicles added</p>
                <a href="admin_vehicles.php" class="option-btn">add vehicles</a>
            </div>
            <!--------------------------------------------->

            <div class="box">
                <?php

         $sql= (" SELECT * FROM users where user_type='user'");
         $query=$connect->query($sql);
         $number_of_users = mysqli_num_rows($query);

      ?>
                <h3><?= $number_of_users; ?></h3>
                <p>total users</p>
                <a href="admin_users.php" class="option-btn">see accounts</a>
            </div>


        </div>

    </section>

    <script src="js/script.js"></script>

</body>

</html>