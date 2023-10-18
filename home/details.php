<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">


<head>
    <title> About Us </title>
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
                                <li class="category1601"> <strong>Details</strong> </li>
                            </ul>
                        </div>
                        <!--col-xs-12-->
                    </div>
                    <!--row-->
                </div>
                <!--container-->
            </div>
            <div class="page-title">
                <h2>DETAILS</h2>
            </div>
        </div>

        <!-- BEGIN Main Container -->
        <div class="main-container col1-layout wow bounceInUp animated">
            <div class="main">
                <div class="col-main">
                    <!-- Endif Next Previous Product -->

                    <div class="product-view container wow bounceInUp animated my-4">
                        <div id="messages_product_view"></div>

                        <?php

                        $vehicle_id = $_REQUEST['vehicle_id'];
                        require_once '../includes/dbOperations.php';
                        $db = new DbOperations();
                        $result = $db->getVehicleByID($vehicle_id);

                        $vehicle_id = $result['vehicle_id'];
                        $make_id = $result['make'];

                        $make = $result['name'];
                        $model = $result['model'];
                        $year = $result['year'];
                        $capacity = $result['engine_capacity'];
                        $transmission = $result['transmission_type'];
                        $horsepower = $result['horsepower'];
                        $condition = $result['vehicle_condition'];
                        $colour = $result['colour'];
                        $convertible = $result['convertible'];
                        $seats = $result['seats'];
                        $price = $result['price'];
                        $image_link = $result['image_link'];

                        ?>


                        <div class="row">
                            <!-- Image Section -->
                            <div class="col-lg-5 col-md-6 mb-4">
                                <div class="card border-0">
                                    <img id="product-zoom" class="card-img-top"
                                        src="../vehicleimages/<?php echo $image_link; ?>" alt="product-image">
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-5 mx-auto justify-content-center">
                                        <div class="card">
                                            <!-- Quantity Controls -->
                                            <div class="add-to-cart">
                                                <div class="pull-left">
                                                    <div class="custom pull-left">
                                                        <button
                                                            onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && qty > 0 ) result.value--;return false;"
                                                            class="reduced items-count" type="button"><i
                                                                class="fa fa-minus">&nbsp;</i></button>
                                                        <input type="text" class="input-text qty" title="Qty" value="1"
                                                            maxlength="12" id="qty" name="qty">
                                                        <button
                                                            onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;"
                                                            class="increase items-count" type="button"><i
                                                                class="fa fa-plus">&nbsp;</i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-3 mx-auto mt-5">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button id="btnAddCart" type="button" class="btn btn-outline-primary"><i
                                                        class="fa fa-cart-plus" aria-hidden="true"></i></button>
                                            </div>
                                            <div class="col-md-6"><button id="btnWishlist" type="button"
                                                    class="btn btn-outline-secondary"><i class="fa fa-heart"
                                                        aria-hidden="true"></i>
                                                </button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Details Section -->
                            <div class="col-lg-7 col-md-6">

                                <div class="card border-0">
                                    <div class="card-body">

                                        <!-- Title -->
                                        <h2 class="card-title">
                                            <?php echo $make; ?>
                                            <?php echo $model; ?>
                                            <?php echo $year; ?>
                                        </h2>

                                        <!-- Price & Stock Info -->
                                        <div class="mb-3">
                                            <span class="text-success font-weight-bold">In Stock</span> |
                                            <span class="price h4">$
                                                <?php echo $price; ?>
                                            </span>
                                        </div>

                                        <!-- Product Description -->
                                        <div class="short-description mb-3">
                                            <ul class="list-unstyled">
                                                <li><b>Engine Capacity:</b>
                                                    <?php echo $capacity; ?> liters
                                                </li>
                                                <br>
                                                <li><b>Transmission:</b>
                                                    <?php echo $transmission; ?> transmission
                                                </li>
                                                <br>
                                                <li><b>Horsepower:</b>
                                                    <?php echo $horsepower; ?>Hp
                                                </li>
                                                <br>
                                                <li><b>Condition:</b>
                                                    <?php echo $condition; ?>
                                                </li>
                                                <br>
                                                <li><b>Colour:</b>
                                                    <?php echo $colour; ?>
                                                </li>
                                                <br>
                                                <li><b>Seats:</b>
                                                    <?php echo $seats; ?> seats
                                                </li>
                                                <br>
                                                <li><b>Type:</b>
                                                    <?php echo $convertible ? 'Spyder' : 'Coupe'; ?>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Additional Info -->
                                        <div class="mt-3">
                                            <h6>Additional Info:</h6>
                                            <ul class="shipping-pro">
                                                <li>Test Rides</li>
                                                <?php
                                                if ($condition == 'Brand New') {
                                                    echo '<li>Brand New</li><li>Lifetime Warranty</li>';
                                                } elseif ($condition == 'Recondition') {
                                                    echo '<li>Recondition</li><li>No Defects</li><li>One Year Warranty</li>';
                                                }
                                                ?>
                                            </ul>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <input type="hidden" id="price" value="<?php echo $price; ?>">
                            <input type="hidden" id="vehicleId" value="<?php echo $vehicle_id; ?>">
                            <input type="hidden" id="makeId" value="<?php echo $make_id; ?>">
                            <?php
                            if (isset($_SESSION['User'])) {
                                ?>
                                <input type="hidden" id="userSession" value="<?php echo $_SESSION['User']; ?>">
                                <input type="hidden" id="userId" value="<?php echo $_SESSION['Id']; ?>">
                                <?php
                            } else {
                                ?>
                                <input type="hidden" id="userSession" value="noSession">
                                <input type="hidden" id="userId" value="-1">

                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <?php include 'footer.php'; ?>
    <!-- End For version 1,2,3,4,6 -->

    </div>
    <!--page-->
    <!-- Mobile Menu-->
    <?php include 'mobile-menu.php'; ?>



    <!-- JavaScript -->
    <?php include 'scripts.php'; ?>

    <script type="text/javascript">
        // jQuery function to send data to the wishlist
        $(document).ready(function () {
            $('#btnWishlist').on('click', function () {

                var vehicle_id = $('#vehicleId').val();
                var make_id = $('#makeId').val();
                var quantity = $('#qty').val();
                var user_id = $('#userId').val();
                var userSession = $('#userSession').val();

                if (userSession == 'noSession') {
                    console.log('Session not started');
                    window.location.replace('../login/login-page.php');
                } else {

                    $.post('../api/addToWishlist.php', {
                        vehicle_id: vehicle_id,
                        make_id: make_id,
                        quantity: quantity,
                        user_id: user_id,
                    }, function (data) {
                        console.log('added to wishlist');
                        window.location.replace('wishlist.php');
                    });

                }
            });
            $('#btnAddCart').on('click', function () {

                var vehicle_id = $('#vehicleId').val();
                var price = $('#price').val();
                var make_id = $('#makeId').val();
                var quantity = $('#qty').val();
                var user_id = $('#userId').val();
                var userSession = $('#userSession').val();
                var total = price * quantity;

                if (userSession == 'noSession') {
                    console.log('Session not started');
                    window.location.replace('../login/login-page.php');
                } else {

                    $.post('../api/addToCart.php', {
                        vehicleId: vehicle_id,
                        makeId: make_id,
                        quantity: quantity,
                        userId: user_id,
                        total: total,
                    }, function (data) {
                        console.log('added to wishlist');
                        window.location.replace('cart.php');
                    });

                }
            });
        });
    </script>

</body>

</html>