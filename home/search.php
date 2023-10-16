<?php
require_once '../includes/dbOperations.php';

session_start();
if (!isset($_GET['q'])) {
    header('Location: index.php');
    exit;
}
$keyWord = $_GET['q'];
$db = new DbOperations();

$result = $db->searchVehicles($keyWord);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title> Home</title>
    <?php include 'sheets.php'; ?>
</head>

<body>
    <div id="page">
        <?php include 'header.php'; ?>
        <!--container-->
        <div class="content" style="margin-top: 25px;">
            <!-- best Pro Slider -->
            <section class=" wow bounceInUp animated">
                <div class="hot_deals slider-items-products container">
                    <div class="new_title">
                        <h2>Search Result for '
                            <?php echo $keyWord; ?>'
                        </h2>
                    </div>

                    <div id="hot_deals" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 products-grid">
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                            <div class="item">

                                <div class="item-inner">

                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a href="details.php?vehicle_id=<?php echo $row['vehicle_id']; ?>"
                                                title="See details" class="product-image">
                                                <img src="../vehicleimages/<?php echo $row['image_link']; ?>"
                                                    alt="Vehicle image"></a>
                                            <?php $condition = $row['vehicle_condition'];
                                                    if ($condition == "Brand New") {
                                                        ?>
                                            <div class="new-label new-top-left">New</div>
                                            <?php
                                                    } elseif ($condition == "Recondition") {
                                                        ?>
                                            <div class="sale-label new-top-left">Used</div>
                                            <?php
                                                    }
                                                    ?>


                                        </div>
                                    </div>

                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title">
                                                <a href="details.php?vehicle_id=<?php echo $row['vehicle_id']; ?>"
                                                    title="See details">
                                                    <?php echo $row['name']; ?>
                                                    <?php echo $row['model']; ?>
                                                </a>
                                            </div>

                                            <div class="item-content">
                                                <div class="item-price">
                                                    <div class="price-box">
                                                        <span class="regular-price"><span class="price">$
                                                                <?php echo $row['price']; ?>
                                                            </span> </span>
                                                    </div>
                                                </div>

                                                <div class="other-info">
                                                    <div class="col-km"><i class="fa fa-tachometer"></i>
                                                        <?php echo $row['colour']; ?>
                                                    </div>
                                                    <div class="col-engine"><i class="fa fa-gear"></i>
                                                        <?php echo $row['transmission_type']; ?>
                                                    </div>
                                                    <div class="col-date"><i class="fa fa-calendar"
                                                            aria-hidden="true"></i>
                                                        <?php echo $row['year']; ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            } else {
                                ?>
                            <div>
                                <h2>No Vehicle found</h2>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>


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
                            <div class="col-sm-4 col-xs-12 coppyright"><span>
                                    <script>
                                    document.write(new Date().getFullYear())
                                    </script>
                                </span>EliteAutoEnclave &reg; | All
                                Rights Reserved.
                                &copy;</div>
                            <div class="col-xs-12 col-sm-4">
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
                <li><a href="#">Listing</a>
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
                                <li class="level2 nav-2-1-1 first"><a
                                        href="checkout-method.html"><span>Method</span></a></li>
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
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-slider.min.js"></script>
        <script src="js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="js/parallax.js"></script>
        <script type="text/javascript" src="js/revslider.js"></script>
        <script type="text/javascript" src="js/common.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/jquery.mobile-menu.min.js"></script>
        <script src="js/countdown.js"></script>
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