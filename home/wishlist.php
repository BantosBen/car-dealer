<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">


<head>
    <title>My Wish List</title>
    <?php include 'sheets.php' ?>
</head>

<body>
    <div id="page">
        <?php include 'header.php' ?>

        <div class="page-heading">
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <ul>
                                <li class="home"> <a href="index.php" title="Go to Home Page">Home</a> <span>&rsaquo;
                                    </span> </li>
                                <li class="category1601"> <strong>My Wishlist</strong> </li>
                            </ul>
                        </div>
                        <!--col-xs-12-->
                    </div>
                    <!--row-->
                </div>
                <!--container-->
            </div>
            <div class="page-title">
                <h2>MY WISHLIST</h2>
            </div>
        </div>

        <!-- BEGIN Main Container col2-right -->
        <section class="main-container col2-right-layout">
            <div class="main container">
                <div class="row">
                    <section class="col-main col-sm-9 col-xs-12 wow bounceInUp animated animated"
                        style="visibility: visible;">
                        <div class="my-account">

                            <?php
                            if (@$_SESSION['success'] == true) {
                              $success = $_SESSION['success'];
                              ?>
                              <script>
                              swal({
                                  title: "SUCCESS!",
                                  text: "<?php echo $success; ?>",
                                  icon: "success",
                                  button: "OK",
                              });
                              </script>
                              <?php
                              unset($_SESSION['success']);
                            } elseif (@$_SESSION['error'] == true) {
                              $error = $_SESSION['error'];
                              ?>
                              <script>
                              swal({
                                  title: "ERROR!",
                                  text: "<?php echo $error; ?>",
                                  icon: "warning",
                                  button: "OK",
                              });
                              </script>
                              <?php
                              unset($_SESSION['error']);
                            } elseif (@$_SESSION['missing'] == true) {
                              $missing = $_SESSION['missing'];
                              ?>
                              <script>
                              swal({
                                  title: "INFO!",
                                  text: "<?php echo $missing; ?>",
                                  icon: "info",
                                  button: "OK",
                              });
                              </script>
                              <?php
                              unset($_SESSION['missing']);
                            }
                            ?>

                            <div class="my-wishlist">
                                <fieldset>
                                    <input name="form_key" type="hidden" value="EPYwQxF6xoWcjLUr">
                                    <div class="table-responsive">
                                        <table class="clean-table linearize-table data-table table-striped"
                                            id="wishlist-table">
                                            <thead>
                                                <tr class="first last">
                                                    <th class="customer-wishlist-item-image"></th>
                                                    <th class="customer-wishlist-item-info"></th>
                                                    <th class="customer-wishlist-item-quantity">Quantity</th>
                                                    <th class="customer-wishlist-item-price">Price</th>
                                                    <th class="customer-wishlist-item-cart"></th>
                                                    <th class="customer-wishlist-item-remove"></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $user_id = $_SESSION['Id'];
                                                include '../api/getWishlist.php';
                                                if ($result) {
                                                  while ($row = mysqli_fetch_array($result)) {

                                                    $username = $row['username'];
                                                    $make = $row['name'];
                                                    $model = $row['model'];
                                                    $year = $row['year'];
                                                    $capacity = $row['engine_capacity'];
                                                    $horsepower = $row['horsepower'];
                                                    $condition = $row['vehicle_condition'];
                                                    $colour = $row['colour'];
                                                    $seats = $row['seats'];
                                                    $price = $row['price'];
                                                    $image_link = $row['image_link'];
                                                    $quantity = $row['quantity'];

                                                    $vehicle_id = $row['vehicle_id'];
                                                    $wishlist_id = $row['wishlist_id'];
                                                    $make_id = $row['make_id'];

                                                    $total = $price * $quantity;

                                                    ?>

                                                    <tr id="item_32" class="first odd">

                                                        <td class="wishlist-cell0 customer-wishlist-item-image">
                                                            <img src="../vehicleimages/<?php echo $image_link; ?>"
                                                                width="80" height="80" alt="Vehicle">
                                                        </td>

                                                        <td class="wishlist-cell1 customer-wishlist-item-info">
                                                            <h3 class="product-name"><?php echo $make; ?>
                                                                <?php echo $model; ?>
                                                                <?php echo $year; ?></h3>
                                                            <div class="description std">
                                                                <div class="inner">
                                                                    <?php echo $capacity; ?> leters <br>
                                                                    <?php echo $horsepower; ?> Hp <br>
                                                                    <?php echo $condition; ?> <br>
                                                                    <?php echo $colour; ?> <br>
                                                                    <?php echo $seats; ?> seats <br>
                                                                </div>
                                                            </div>
                                                        </td>



                                                        <td class="wishlist-cell2 customer-wishlist-item-quantity"
                                                            data-rwd-label="Quantity">
                                                            <div class="cart-cell">
                                                                <div class="add-to-cart-alt">
                                                                    <input type="text" pattern="\d*" readonly
                                                                        class="input-text qty validate-not-negative-number"
                                                                        name="qty[32]" value="<?php echo $quantity; ?>">
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="wishlist-cell3 customer-wishlist-item-price"
                                                            data-rwd-label="Price">
                                                            <div class="cart-cell">
                                                                <div class="price-box"> <span class="regular-price"
                                                                        id="product-price-2"> <span
                                                                            class="price">$<?php echo $total; ?></span>
                                                                    </span> </div>
                                                            </div>
                                                        </td>

                                                        <td class="wishlist-cell4 customer-wishlist-item-cart">
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic outlined example">
                                                                <form action="../api/addToCart.php" method="POST">
                                                                    <input type="hidden" name="userId"
                                                                        value="<?php echo $user_id; ?>">
                                                                    <input type="hidden" name="vehicleId"
                                                                        value="<?php echo $vehicle_id; ?>">
                                                                    <input type="hidden" name="makeId"
                                                                        value="<?php echo $make_id; ?>">
                                                                    <input type="hidden" name="quantity"
                                                                        value="<?php echo $quantity; ?>">
                                                                    <input type="hidden" name="total"
                                                                        value="<?php echo $total; ?>">
                                                                    <button type="submit" name="btnAddToCart"
                                                                        class="btn btn-outline-primary"><i
                                                                            class="fa fa-cart-plus"
                                                                            aria-hidden="true"></i></button>
                                                                </form>
                                                                <form action="../api/deleteFromWishlist.php" class="mx-3"
                                                                    method="post">
                                                                    <input type="hidden" name="formId"
                                                                        value="dealershipWishlist">
                                                                    <input type="hidden" name="wishlistId"
                                                                        value="<?php echo $wishlist_id; ?>">
                                                                    <button type="submit" name="deleteFromWishlist"
                                                                        class="btn btn-outline-danger"><i
                                                                            class="fa fa-trash"
                                                                            aria-hidden="true"></i></button>
                                                                </form>
                                                                <a href="details.php?vehicle_id=<?php echo $vehicle_id; ?>"
                                                                    type="submit" name="deleteFromWishlist"
                                                                    class="btn btn-outline-secondary"><i class="fa fa-eye"
                                                                        aria-hidden="true"></i></a>
                                                            </div>

                                                        </td>

                                                        <td class="wishlist-cell5 customer-wishlist-item-remove last">

                                                        </td>

                                                    </tr>

                                                    <?php
                                                  }
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </section>

                    <!--col-main col-sm-9 wow bounceInUp animated-->
                    <aside class="col-right sidebar col-sm-3 col-xs-12 wow bounceInUp animated animated"
                        style="visibility: visible;">
                        <div class="block block-account">
                            <div class="block-title"> My Account </div>
                            <div class="block-content">
                                <ul>
                                    <li><a href="../user/index.php"><span> Account Dashboard</span></a></li>
                                    <li><a href="../user/myorders.php"><span> My Orders</span></a></li>
                                    <li class="current"><a>My Wishlist</a></li>
                                </ul>
                            </div>
                            <!--block-content-->
                        </div>
                        <!--block block-account-->


                    </aside>
                    <!--col-right sidebar col-sm-3 wow bounceInUp animated-->
                </div>
                <!--row-->
            </div>
            <!--main container-->
        </section>
        <!--main-container col2-left-layout-->



        <footer>
            <!-- BEGIN INFORMATIVE FOOTER -->
            <div class="footer-inner">
                <div class="our-features-box wow bounceInUp animated animated">
                    <div class="container">
                        <ul>
                            <li>
                                <div class="feature-box">
                                    <div class="icon-truck"><img src="images/world-icon.png" alt="Image"></div>
                                    <div class="content">
                                        <h6>World's #1</h6>
                                        <p>Largest Auto portal</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="feature-box">
                                    <div class="icon-support"><img src="images/car-sold-icon.png" alt="Image"></div>
                                    <div class="content">
                                        <h6>Car Sold</h6>
                                        <p>Every 4 minute</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="feature-box">
                                    <div class="icon-money"><img src="images/tag-icon.png" alt="Image"></div>
                                    <div class="content">
                                        <h6>Offers</h6>
                                        <p>Stay updated pay less</p>
                                    </div>
                                </div>
                            </li>
                            <li class="last">
                                <div class="feature-box">
                                    <div class="icon-return"><img src="images/compare-icon.png" alt="Image"></div>
                                    <div class="content">
                                        <h6>Compare</h6>
                                        <p>Decode the right car</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12 col-lg-4">
                            <div class="co-info">
                                <h4>SHOWROOM</h4>
                                <address>
                                    <div><span>NSBM Green University, <br>
                                            Mahenwaththa, <br>
                                            Pitipana, <br>
                                            Homagama</span></div>
                                    <div> <span> 011 2 729 729</span></div>
                                    <div> <span><a href="#">harrier@nsbm.com</a></span></div>
                                    <div> <span>Mon - Fri : 09am to 06pm</span></div>
                                </address>
                            </div>
                        </div>
                        <div class="col-sm-8 col-xs-12 col-lg-8">
                            <div class="footer-column">
                                <h4>Quick Links</h4>
                                <ul class="links">
                                    <li><a title="FAQs" href="#">FAQs</a></li>
                                    <li><a title="Payment" href="#">Payment</a></li>
                                    <li><a title="Shipment" href="#">Shipment</a></li>
                                    <li><a title="Where is my order?" href="#">Where is my order?</a></li>
                                    <li class="last"><a title="Return policy" href="#">Return policy</a></li>
                                </ul>
                            </div>
                            <div class="footer-column">
                                <h4>Style Advisor</h4>
                                <ul class="links">
                                    <li class="first"><a title="Your Account" href="#">Your Account</a></li>
                                    <li><a title="Information" href="#">Information</a></li>
                                    <li><a title="Addresses" href="#">Addresses</a></li>
                                    <li><a title="Orders History" href="#">Orders History</a></li>
                                    <li class="last"><a title=" Additional Information" href="#"> Additional
                                            Information</a></li>
                                </ul>
                            </div>
                            <div class="footer-column">
                                <h4>Information</h4>
                                <ul class="links">
                                    <li class="first"><a title="Site Map" href="#">Site Map</a></li>
                                    <li><a title="Advanced Search" href="#">Advanced Search</a></li>
                                    <li><a title="History" href="#">About Us</a></li>
                                    <li><a title="History" href="#">Contact Us</a></li>
                                    <li><a title="Suppliers" href="#">Suppliers</a></li>
                                </ul>
                            </div>
                        </div>

                        <!--col-sm-12 col-xs-12 col-lg-8-->
                        <!--col-xs-12 col-lg-4-->
                    </div>
                    <!--row-->

                </div>

                <!--container-->
            </div>
            <!--footer-inner-->

            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="social">
                                <ul>
                                    <li class="fb">
                                        <a href="#"></a>
                                    </li>
                                    <li class="tw">
                                        <a href="#"></a>
                                    </li>
                                    <li class="googleplus">
                                        <a href="#"></a>
                                    </li>
                                    <li class="linkedin">
                                        <a href="#"></a>
                                    </li>
                                    <li class="youtube">
                                        <a href="#"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12 coppyright"><a target="_blank"
                                href="https://github.com/Harshana-Rathnayaka">2020 Dreeko Corporations &reg; | All
                                Rights Reserved.
                                &copy;</a></div>
                        <div class="payment-accept"> <img src="images/payment-1.png" alt=""> <img
                                src="images/payment-2.png" alt=""> <img src="images/payment-3.png" alt=""> <img
                                src="images/payment-4.png" alt=""> </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- BEGIN SIMPLE FOOTER -->
    </footer>
    <!-- End For version 1,2,3,4,6 -->

    </div>
    <!--page-->
    <!-- Mobile Menu-->
    <div id="mobile-menu">
        <ul>
            <li>
                <div class="mm-search">
                    <form id="search1" name="search">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
                            </div>
                            <input type="text" class="form-control simple" placeholder="Search ..." name="srch-term"
                                id="srch-term">
                        </div>
                    </form>
                </div>
            </li>
            <li class="active"> <a class="level-top" href="#"><span>Home</span></a></li>

            </li>
            <li><a href="#">Listing‎</a>
                <ul class="level1">
                    <li class="level1 first"><a href="grid.html"><span>Car Grid</span></a></li>
                    <li class="level1 nav-10-2">
                        <a href="list.html"> <span>Car List</span> </a>
                    </li>
                    <li class="level1 nav-10-3">
                        <a href="grid1.html"> <span>Accessories Grid</span> </a>
                    </li>
                    <li class="level1 nav-10-4">
                        <a href="list1.html"> <span>Accessories List</span> </a>
                    </li>
                    <li class="level1 first parent"><a href="car-detail.html"><span>Car Detail</span></a> </li>
                    <li class="level1 first parent"><a href="accessories-detail.html"><span>Accessories
                                Detail</span></a> </li>
                </ul>
            </li>

            <li><a href="#">Other</a>
                <ul class="level1">
                    <li class="level1">
                        <a href="about-us.html"> <span>About us</span> </a>
                    </li>
                    <li class="level1 nav-10-4">
                        <a href="shopping-cart.html"> <span>Cart Page</span> </a>
                    </li>
                    <li class="level1 first parent"><a href="checkout.html"><span>Checkout</span></a>
                        <!--sub sub category-->
                        <ul class="level2 right-sub">
                            <li class="level2 nav-2-1-1 first"><a href="checkout-method.html"><span>Method</span></a>
                            </li>
                            <li class="level2 nav-2-1-5 last"><a href="checkout-billing-info.html"><span>Billing
                                        Info</span></a></li>
                        </ul>
                        <!--sub sub category-->
                    </li>
                    <li class="level1 nav-10-4">
                        <a href="wishlist.html"> <span>Wishlist</span> </a>
                    </li>
                    <li class="level1">
                        <a href="dashboard.html"> <span>Dashboard</span> </a>
                    </li>
                    <li class="level1">
                        <a href="multiple-addresses.html"> <span>Multiple Addresses</span> </a>
                    </li>
                    <li class="level1"><a href="contact-us.html"><span>Contact us</span></a> </li>
                    <li class="level1"><a href="404error.html"><span>404 Error Page</span></a> </li>
                    <li class="level1"><a href="login.html"><span>Login Page</span></a> </li>
                    <li class="level1"><a href="quickview.html"><span>Quick View</span></a> </li>
                    <li class="level1"><a href="newsletter.html"><span>Newsletter</span></a> </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/parallax.js"></script>
    <script type="text/javascript" src="js/revslider.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/jquery.mobile-menu.min.js"></script>


</body>

</html>