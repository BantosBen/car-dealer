<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="col col-lg-12 col-sm-12 justify-content-center align-items-center">
            <div class=" avatar">
                <img src="../home/images/avatar.jpg" title="Profile picture" alt="..." class="img-fluid rounded-circle">
            </div>
            <div class="title mt-2">
                <h1 class="h5" title="Name">
                    <?php echo $_SESSION['FirstName']; ?>
                    <?php echo $_SESSION['LastName']; ?>
                </h1>
                <p title="Email">
                    <?php echo $_SESSION['Email']; ?>
                </p>
            </div>
        </div>
    </div>
    <!-- Sidebar Navidation Menus-->
    <span class="heading">Main</span>
    <ul class="list-unstyled">
        <li <?php if ($page == "home")
            echo 'class="active"'; ?>>
            <a href="index.php" title="Home"> <i class="fa fa-home"></i>Dashboard </a>
        </li>
        <li <?php if ($page == "orders")
            echo 'class="active"'; ?>>
            <a href="myorders.php" title="Orders"> <i class="fa fa-history"></i>My Orders </a>
        </li>
    </ul>

    <span class="heading" title="More actions">Actions</span>

    <ul class="list-unstyled">
        <li <?php if ($page == "settings")
            echo 'class="active"'; ?>>
            <a href="settings.php" title="Settings"> <i class="fa fa-wrench"></i>Settings </a>
        </li>
        <li <?php if ($page == "deleteaccount")
            echo 'class="active"'; ?>>
            <a href="deleteaccount.php" title="Delete account"> <i class="fa fa-minus-circle"></i>Delete My Account </a>
        </li>
    </ul>


</nav>