<header>
    <div class="container">
        <div class="row">
            <div id="header">
                <div class="header-container">
                    <div class="header-logo">
                        <a href="index.php" title="Car HTML" class="logo">
                            <div><img src="images/logo.png" alt="Car Store"></div>
                        </a>
                    </div>
                    <div class="header__nav">
                        <div class="header-banner">
                            <div class="col-lg-6 col-xs-12 col-sm-6 col-md-6">
                                <div class="assetBlock">
                                    <div style="height: 20px; overflow: hidden;" id="slideshow">
                                        <p style="display: block;">Our Special: Enjoy <span
                                                style="color: #FFD700; font-weight: bold; padding: 5px;">50%
                                                Off!</span>

                                            Gear up for better days.</p>
                                        <p style="display: none;">Exclusive Deal: Save up to <span
                                                style="color: #FFD700; font-weight: bold; padding: 5px;">50%!</span>
                                            Don't miss out - limited time only!</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-lg-6 col-xs-12 col-sm-6 col-md-6 call-us"><i
                                    class="fa fa-clock-o"></i> Mon - Fri : 09am to 06pm <i class="fa fa-phone"></i>
                                +1234567890</div>
                        </div>
                        <div class="fl-header-right">
                            <div class="fl-links">
                                <div class="no-js">
                                    <a title="" class="clicker"></a>
                                    <div class="fl-nav-links">
                                        <h3>My Acount</h3>
                                        <ul class="links">
                                            <?php
                                            if (isset($_SESSION['User'], $_SESSION['Email'])) {
                                                ?>
                                            <li>
                                                <?php echo $_SESSION['FirstName']; ?>
                                                <?php echo $_SESSION['LastName']; ?>
                                            </li>
                                            <li>
                                                <?php echo $_SESSION['Email']; ?>
                                            </li>
                                            <br>
                                            <li><a href="../logout.php?logout" title="Log out">Log out</a></li>
                                            <?php
                                            } else {
                                                ?>
                                            <li><a href="../login/login-page.php" title="Login">Login</a></li>
                                            <li><a href="../register/index.php" title="Register">Register</a>
                                            </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!--mini-cart-->
                            <!--mini-cart-->
                            <form action="search.php" method="get" class="navbar-form" role="search"
                                style="display: flex; justify-content: flex-end;">
                                <div class="input-group">
                                    <input name="q" type="text" class="form-control" placeholder="Search">

                                </div>
                            </form>

                            <!--links-->
                        </div>

                        <div class="fl-nav-menu">
                            <nav>
                                <div class="mm-toggle-wrap">
                                    <div class="mm-toggle"><i class="fa fa-bars"></i><span class="mm-label">Menu</span>
                                    </div>
                                </div>

                                <div class="nav-inner">
                                    <!-- BEGIN NAV -->
                                    <ul id="nav" class="hidden-xs">
                                        <li class="active"> <a class="level-top" href="index.php"><span>Home</span></a>
                                        </li>
                                        <li class="level0 parent drop-menu"> <a class="level-top"
                                                href="vehicle-list.php"><span>Listing</span></a> </li>
                                        <li class="mega-menu hidden-sm"> <a class="level-top"
                                                href="contact-us.php"><span>Contact</span></a> </li>
                                        <li class="mega-menu hidden-sm"> <a class="level-top"
                                                href="about-us.php"><span>About us</span></a> </li>
                                        <?php
                                        if (isset($_SESSION['Id']) && isset($_SESSION['UserType'])) {

                                            $usertype = $_SESSION['UserType'];
                                            if ($usertype == 1) {
                                                ?>
                                        <li class="mega-menu hidden-sm"> <a class="level-top"
                                                href="wishlist.php"><span>Wishlist</span></a> </li>
                                        <li class="mega-menu hidden-sm"> <a class="level-top"
                                                href="../user/index.php"><span>Dashboard</span></a> </li>
                                        <li class="mega-menu hidden-sm"> <a class="level-top" href="cart.php"
                                                title="View my cart"><span class="fa fa-shopping-cart"></span></a> </li>
                                        <li class="mega-menu hidden-sm"> <a class="level-top"
                                                href="../logout.php?logout"><span>Logout</span></a> </li>
                                        <?php
                                            } elseif ($usertype == 0) {
                                                ?>
                                        <li class="mega-menu hidden-sm"> <a class="level-top"
                                                href="../logout.php?logout"><span>Logout</span></a> </li>
                                        <?php
                                            }
                                        } else {
                                            ?>
                                        <li class="mega-menu hidden-sm"> <a class="level-top"
                                                href="../login/login-page.php"><span>Login</span></a> </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                    <!--nav-->

                                </div>
                            </nav>
                        </div>
                    </div>

                    <!--row-->

                </div>
            </div>
        </div>
    </div>
</header>