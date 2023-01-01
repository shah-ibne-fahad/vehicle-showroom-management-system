<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

$p_name = $_SESSION['p_name'];
$p_price = $_SESSION['p_price'];


if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['order'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $method = $_POST['method'];
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   $address = $_POST['address'] .' '. $_POST['houseno'] .' '. $_POST['area'] .' '. $_POST['city'] .' '. $_POST['region'] .' - '. $_POST['country'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $placed_on = date('d-M-Y');

  
      $insert_order = $connect->query("INSERT INTO `purchase`(user_id, name, number, email, method, address, total_vehicles, total_price, placed_on) 
      VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$p_name', '$p_price', '$placed_on')");
      $message[] = 'order placed successfully!';

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <section class="display-purchase">
        <?php
      if($p_name!=""){
   ?>
        <p> <?= $p_name; ?> </p>
        <?php
   }else{
      echo '<p class="empty">Vehicle is not available!</p>';
   }
   ?>

        <div class="grand-total">Total Price : <span>Tk <?= $p_price; ?>/-</span></div>
    </section>

    <section class="checkout-purchase">

        <form action="" method="POST">

            <h3>Delivery Information</h3>

            <div class="flex">
                <div class="inputBox">
                    <span>your name :</span>
                    <input type="text" name="name" placeholder="enter your name" class="box" required>
                </div>
                <div class="inputBox">
                    <span>your number :</span>
                    <input type="number" name="number" placeholder="enter your number" class="box" required>
                </div>
                <div class="inputBox">
                    <span>your email :</span>
                    <input type="email" name="email" placeholder="enter your email" class="box" required>
                </div>
                <div class="inputBox">
                    <span>payment method :</span>
                    <select name="method" class="box" required>
                        <option value="cash on delivery">cash on delivery</option>
                        <option value="credit card">credit card</option>
                        <option value="Bkash">Bkash</option>
                        <option value="Nagad">Nagad</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>Region :</span>
                    <input type="text" name="region" placeholder="Enter your region" class="box" required>
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" name="city" placeholder="Enter your city" class="box" required>
                </div>
                <div class="inputBox">
                    <span>Area :</span>
                    <input type="text" name="area" placeholder="Enter your area" class="box" required>
                </div>
                <div class="inputBox">
                    <span>Building / House No / Floor / Street :</span>
                    <input type="text" name="houseno" placeholder="Enter your Building/House No/Floor/Street"
                        class="box" required>
                </div>
                <div class="inputBox">
                    <span>Address :</span>
                    <input type="text" name="address" placeholder="For Example: House# 123, Street# 123, ABC Road"
                        class="box" required>
                </div>
                <div class="inputBox">
                    <span>Country :</span>
                    <input type="text" name="country" placeholder="Enter your country" class="box" required>
                </div>
            </div>
            <input type="submit" name="order" class="btn <?= ($p_name != "")?'':'disabled'; ?>" value="place order">
        </form>

    </section>



    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>

</body>

</html>