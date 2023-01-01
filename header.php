<header class="header">

   <div class="flex">

      <a href="admin_index.php" class="logo">Vehicle<span>showroom</span></a>

      <nav class="navbar">
         <a href="index.php">home</a>
         <a href="showroom.php">showroom</a>
         <a href="purchase.php">purchase list</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <a href="search_page.php" class="fas fa-search"></a>
       
      </div>

      <div class="profile">
         <?php
            $select_profile = $connect->query("SELECT * FROM `users` WHERE id = '$user_id'");
            $fetch_profile = mysqli_fetch_assoc($select_profile);
         ?>
         <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
         <p><?= $fetch_profile['name']; ?></p>
         <a href="user_profile_update.php" class="btn">update profile</a>
         <a href="logout.php" class="delete-btn">logout</a>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
         </div>
      </div>

   </div>

</header>