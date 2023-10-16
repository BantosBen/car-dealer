<?php
session_start();
if (!isset($_SESSION['User'])) {
    $_SESSION['error'] = "Session timed out. Please login to continue.";
    header('location:../login/login-page.php');
} elseif (isset($_SESSION['UserType'])) {
    $usertype = $_SESSION['UserType'];

    if ($usertype == 0) {
        header('location:../admin/index.php');
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title> Home</title>
    <?php include 'sheets.php'; ?>
    <style>
    @media (min-width: 1025px) {
        .h-custom {
            height: 100vh !important;
        }
    }

    .bg-primary-custom {
        background-color: #B21C42;
    }
    </style>
</head>

<body>
    <div id="page">
        <?php include 'header.php'; ?>

        <!--container-->
        <div class="content">
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
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-9 mx-auto">
                        <section>
                            <div class="container py-5 h-100">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body p-4">
                                                <?php
                                                include '../api/getCart.php';
                                                $cartAmount = 0;
                                                ?>

                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <h5 class="mb-3"><a href="vehicle-list.php" class="text-body"><i
                                                                    class="fa fa-long-arrow-left"
                                                                    aria-hidden="true"></i> Continue shopping</a></h5>
                                                        <hr>

                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-4">
                                                            <div>
                                                                <p class="mb-1">Shopping cart</p>
                                                                <p class="mb-0">You have
                                                                    <?php echo $result->num_rows; ?>
                                                                    items in your cart
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <?php
                                                        if ($result) {
                                                            while ($row = mysqli_fetch_array($result)) {

                                                                $user_id = $_SESSION['Id'];

                                                                $cart_id = $row['cart_id'];
                                                                $vehicle_id = $row['vehicle_id'];

                                                                $make = $row['name'];
                                                                $model = $row['model'];
                                                                $year = $row['year'];
                                                                $quantity = $row['quantity'];
                                                                $total = $row['total_price'];

                                                                $cartAmount += $total;

                                                                $image_link = $row['image_link'];
                                                                $condition = $row['vehicle_condition'];
                                                                $engine = $row['engine_capacity'];

                                                                ?>

                                                        <div class="card mb-3">
                                                            <div class="card-body">
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex flex-row align-items-center">
                                                                        <div>
                                                                            <img src="../vehicleimages/<?php echo $row['image_link']; ?>"
                                                                                class="img-fluid rounded-3"
                                                                                alt="Shopping item"
                                                                                style="width: 65px;">
                                                                        </div>
                                                                        <div class="ms-3">
                                                                            <a
                                                                                href="details.php?vehicle_id=<?php echo $vehicle_id;?>">
                                                                                <h5>
                                                                                    <?php echo $make; ?>
                                                                                    <?php echo $model; ?>
                                                                                </h5>
                                                                            </a>

                                                                            <p class="small mb-0">
                                                                                <?php echo $year; ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex flex-row align-items-center">
                                                                        <div style="width: 40px;">
                                                                            <h5 class="fw-normal mb-0">
                                                                                <?php echo $quantity; ?>
                                                                            </h5>
                                                                        </div>
                                                                        <div style="width: 100px;" class="mx-4">
                                                                            <h5 class="mb-0">$
                                                                                <?php echo $total; ?>
                                                                            </h5>
                                                                        </div>
                                                                        <a href="../api/deleteFromCart.php?cartId=<?php echo $cart_id; ?>"
                                                                            style="color: #FF0000;"><i
                                                                                class="fa fa-trash"
                                                                                aria-hidden="true"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php }
                                                        } else { ?>
                                                        <h4>Cart is empty</h4>
                                                        <?php } ?>

                                                    </div>
                                                    <div class="col-lg-5">

                                                        <div class="card bg-primary-custom text-white rounded-3">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center mb-4">
                                                                    <h5 class="mb-0">Card details</h5>
                                                                    <img src="images/avatar.jpg"
                                                                        class="img-fluid rounded-3" style="width: 47px;"
                                                                        alt="Avatar">
                                                                </div>

                                                                <p class="small mb-2">Card type</p>
                                                                <a href="#!" type="submit" class="text-white"><i
                                                                        class="fa fa-cc-mastercard fa-2x me-2"></i></a>
                                                                <a href="#!" type="submit" class="text-white"><i
                                                                        class="fa fa-cc-visa fa-2x me-2"></i></a>
                                                                <a href="#!" type="submit" class="text-white"><i
                                                                        class="fa fa-cc-amex fa-2x me-2"></i></a>
                                                                <a href="#!" type="submit" class="text-white"><i
                                                                        class="fa fa-cc-paypal fa-2x"></i></a>

                                                                <form action="../api/checkoutCart.php" method="POST"
                                                                    class="mt-4">
                                                                    <div class="form-outline form-white mb-4">
                                                                        <input name="name" required type="text"
                                                                            id="typeName"
                                                                            class="form-control form-control-lg"
                                                                            siez="17" placeholder="Cardholder's Name" />
                                                                        <label class="form-label"
                                                                            for="typeText">Cardholder Name</label>
                                                                    </div>

                                                                    <div class="form-outline form-white mb-4">
                                                                        <input required type="text" id="typeText"
                                                                            class="form-control form-control-lg"
                                                                            siez="17" placeholder="1234 5678 9012 3457"
                                                                            minlength="16" maxlength="16" />
                                                                        <label class="form-label" for="typeText">Card
                                                                            Number</label>
                                                                    </div>

                                                                    <div class="row mb-4">
                                                                        <div class="col-md-6">
                                                                            <div class="form-outline form-white">
                                                                                <input required type="text" id="typeExp"
                                                                                    class="form-control form-control-lg"
                                                                                    placeholder="MM/YYYY" size="5"
                                                                                    id="exp" minlength="5"
                                                                                    maxlength="5" />
                                                                                <label class="form-label"
                                                                                    for="typeExp">Expiration</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-outline form-white">
                                                                                <input required type="password"
                                                                                    id="typeText"
                                                                                    class="form-control form-control-lg"
                                                                                    placeholder="&#9679;&#9679;&#9679;"
                                                                                    size="1" minlength="3"
                                                                                    maxlength="3" />
                                                                                <label class="form-label"
                                                                                    for="typeText">Cvv</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>



                                                                    <hr class="my-4">

                                                                    <div class="d-flex justify-content-between">
                                                                        <p class="mb-2">Subtotal</p>
                                                                        <p class="mb-2">$
                                                                            <?php echo number_format($cartAmount); ?>
                                                                        </p>
                                                                    </div>

                                                                    <?php
                                                                    $shipping = $cartAmount * 0.1107;
                                                                    ?>

                                                                    <div class="d-flex justify-content-between">
                                                                        <p class="mb-2">Shipping</p>
                                                                        <p class="mb-2">$
                                                                            <?php echo number_format($shipping); ?>
                                                                        </p>
                                                                    </div>
                                                                    <?php
                                                                    $tax = $cartAmount * 0.085;
                                                                    $total = ($shipping + $tax + $cartAmount);
                                                                    ?>
                                                                    <div class="d-flex justify-content-between mb-4">
                                                                        <p class="mb-2">Total(Incl. taxes)</p>
                                                                        <p class="mb-2">$
                                                                            <?php echo number_format($total); ?>
                                                                        </p>
                                                                    </div>

                                                                    <input type="hidden" name="user_id"
                                                                        value="<?php echo $_SESSION['Id']; ?>">
                                                                    <input type="hidden" name="total"
                                                                        value="<?php echo $total; ?>">

                                                                    <button type="submit"
                                                                        class="btn btn-success btn-block">
                                                                        <div class="d-flex justify-content-between">
                                                                            <span>Checkout <i
                                                                                    class="fa fa-long-arrow-right ms-2"></i></span>
                                                                        </div>
                                                                    </button>
                                                                </form>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>


            <?php include 'footer.php'; ?>
            <!-- End For version 1,2,3,4,6 -->

        </div>
        <!--page-->
        <!-- Mobile Menu-->
        <?php include 'mobile-menu.php' ?>
        <!-- JavaScript -->
        <?php include 'scripts.php'; ?>
        <script>
        jQuery(document).ready(function() {
            jQuery('#rev_slider_4').show().revolution({
                dottedOverlay: 'none',
                delay: 5000,
                startwidth: 1170,
                startheight: 650,

                hideThumbs: 200,
                thumbWidth: 200,
                thumbHeight: 50,
                thumbAmount: 2,

                navigationType: 'thumb',
                navigationArrows: 'solo',
                navigationStyle: 'round',

                touchenabled: 'on',
                onHoverStop: 'on',

                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,

                spinner: 'spinner0',
                keyboardNavigation: 'off',

                navigationHAlign: 'center',
                navigationVAlign: 'bottom',
                navigationHOffset: 0,
                navigationVOffset: 20,

                soloArrowLeftHalign: 'left',
                soloArrowLeftValign: 'center',
                soloArrowLeftHOffset: 20,
                soloArrowLeftVOffset: 0,

                soloArrowRightHalign: 'right',
                soloArrowRightValign: 'center',
                soloArrowRightHOffset: 20,
                soloArrowRightVOffset: 0,

                shadow: 0,
                fullWidth: 'on',
                fullScreen: 'off',

                stopLoop: 'off',
                stopAfterLoops: -1,
                stopAtSlide: -1,

                shuffle: 'off',

                autoHeight: 'off',
                forceFullWidth: 'on',
                fullScreenAlignForce: 'off',
                minFullScreenHeight: 0,
                hideNavDelayOnMobile: 1500,

                hideThumbsOnMobile: 'off',
                hideBulletsOnMobile: 'off',
                hideArrowsOnMobile: 'off',
                hideThumbsUnderResolution: 0,

                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                startWithSlide: 0,
                fullScreenOffsetContainer: ''
            });
        });
        </script>
        <script>
        $(document).ready(function() {
            $('.navbar-collapse form').click(function(e) {
                e.stopPropagation();
            });
        });


        var dthen1 = new Date("12/25/17 11:59:00 PM");
        start = "08/04/15 03:02:11 AM";
        start_date = Date.parse(start);
        var dnow1 = new Date(start_date);
        if (CountStepper > 0)
            ddiff = new Date((dnow1) - (dthen1));
        else
            ddiff = new Date((dthen1) - (dnow1));
        gsecs1 = Math.floor(ddiff.valueOf() / 1000);

        var iid1 = "countbox_1";
        CountBack_slider(gsecs1, "countbox_1", 1);
        </script>
</body>

</html>

</html>