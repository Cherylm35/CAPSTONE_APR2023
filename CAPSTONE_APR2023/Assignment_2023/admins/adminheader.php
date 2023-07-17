<header class="header">

<section class="flex">

    <a href="../admins/dashboard.php" class="logo">Admin<span>Panel</span></a>

    <nav class="navbar">
        <a href="../admins/dashboard.php">home</a>
        <a href="../admins/products.php">products</a>
        <a href="../admins/orders.php">orders</a>
        <a href="../admins/admins.php">admins</a>
        <a href="../admins/users.php">users</a>
        <a href="../admins/messages.php">messages</a>
    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="user-btn" class="fas fa-user-cog"></div>
    </div>

    <div class="profile">
        <?php
            $id = $_SESSION["id"];
            $result = mysqli_query($conn, "SELECT * FROM admins WHERE id = $id");
            $row = mysqli_fetch_assoc($result);
         ?>
         <p><?php echo $row['name']; ?></p>
        <p></p>
        <a href="../admins/editprofile.php" class="btn">Edit Profile</a>
        <div class="flex-btn">
            <a href="../admins/registers.php" class="option-btn">Register</a>
            <a href="../admins/orders.php" class="option-btn">Order</a>
        </div>
        <a href="../admins/logout.php" class="delete-btn" onclick="return confirm('Are you sure you want to log out?');">Logout</a> 
    </div>

</section>

</header>
