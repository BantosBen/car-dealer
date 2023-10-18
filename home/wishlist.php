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
                                                                <h3 class="product-name">
                                                                    <?php echo $make; ?>
                                                                    <?php echo $model; ?>
                                                                    <?php echo $year; ?>
                                                                </h3>
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
                                                                            id="product-price-2"> <span class="price">$
                                                                                <?php echo $total; ?>
                                                                            </span>
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
        <?php include 'footer.php'; ?>
        <!-- End For version 1,2,3,4,6 -->
    </div>
    <!--page-->
    <?php include 'mobile-menu.php' ?>
    <!-- JavaScript -->
    <?php include 'scripts.php'; ?>

</body>

</html>