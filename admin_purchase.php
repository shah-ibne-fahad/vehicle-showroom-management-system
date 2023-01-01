<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['update_order'])){
    $order_id = $_POST['order_id'];
    $update_payment = $_POST['update_payment'];
    $update_payment = filter_var($update_payment, FILTER_SANITIZE_STRING);
    mysqli_query($connect,"update purchase SET payment_status='$update_payment' WHERE id='$order_id'");
    $message[] = 'payment has been updated!';

};

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_vehicles=mysqli_query($connect,"DELETE  FROM purchase WHERE id='$delete_id'");
   header('location:admin_purchase.php');

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>purchase</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/admin_style.css">

</head>

<body>

    <?php include 'admin_header.php'; ?>

    <section class="placed-purchase">

        <h1 class="title">placed purchase</h1>

        <div class="box-container">
            <?php
         $sql= (" SELECT * FROM purchase ");
         $query=$connect->query($sql);
         if(mysqli_num_rows($query) > 0){
         while($fetch_purchase = mysqli_fetch_array($query)){  
      ?>
            <div class="box">
                <p> user id : <span><?= $fetch_purchase['user_id']; ?></span> </p>
                <p> placed on : <span><?= $fetch_purchase['placed_on']; ?></span> </p>
                <p> name : <span><?= $fetch_purchase['name']; ?></span> </p>
                <p> email : <span><?= $fetch_purchase['email']; ?></span> </p>
                <p> number : <span><?= $fetch_purchase['number']; ?></span> </p>
                <p> address : <span><?= $fetch_purchase['address']; ?></span> </p>
                <p> total vehicles : <span><?= $fetch_purchase['total_vehicles']; ?></span> </p>
                <p> total price : <span>$<?= $fetch_purchase['total_price']; ?>/-</span> </p>
                <p> payment method : <span><?= $fetch_purchase['method']; ?></span> </p>
                <form action="" method="POST">
                    <input type="hidden" name="order_id" value="<?= $fetch_purchase['id']; ?>">
                    <select name="update_payment" class="drop-down">
                        <option value="" selected disabled><?= $fetch_purchase['payment_status']; ?></option>
                        <option value="pending">pending</option>
                        <option value="completed">completed</option>
                    </select>
                    <div class="flex-btn">
                        <input type="submit" name="update_order" class="blue-btn" value="udate">
                        <a href="admin_purchase.php?delete=<?= $fetch_purchase['id']; ?>" class="delete-btn"
                            onclick="return confirm('delete this order?');">delete</a>
                    </div>
                </form>
            </div>
            <?php
         }
      }else{
         echo '<p class="empty">no purchase placed yet!</p>';
      }
      ?>

        </div>

    </section>












    <script src="js/script.js"></script>

</body>

</html>