<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vehicle List </title>

    <title> Home</title>
    <?php include 'sheets.php'; ?>
</head>

<body>
    <div id="page">
        <?php include 'header.php'; ?>
        <div class="page-heading">
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <ul>
                                <li class="home"> <a href="index.php" title="Go to Home Page">Home</a> <span>&rsaquo;
                                    </span> </li>
                                <li class="category1601"> <strong>Vehicles</strong> </li>
                            </ul>
                        </div>
                        <!--col-xs-12-->
                    </div>
                    <!--row-->
                </div>
                <!--container-->
            </div>
            <div class="page-title">
                <h2>VEHICLE LISTING</h2>
            </div>
        </div>
        <!--breadcrumbs-->

        <!-- BEGIN Main Container col2-left -->
        <section class="main-container col2-left-layout bounceInUp animated">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 mt-5 mx-auto">
                        <?php
                        include '../api/getInStockVehicles.php';
                        if ($result) {
                            ?>

                        <!-- Table Start -->
                        <div class="table-responsive">
                            <table id="vehicles" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name & Model</th>
                                        <th>Engine Capacity</th>
                                        <th>Transmission</th>
                                        <th>Horsepower</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                    <tr>
                                        <td>
                                            <a href="details.php?vehicle_id=<?php echo $row['vehicle_id']; ?>"
                                                title="See details">
                                                <img src="../vehicleimages/<?php echo $row['image_link']; ?>"
                                                    alt="Vehicle image" style="width:100px;">
                                            </a>
                                        </td>
                                        <td>
                                            <?php echo $row['name'] . " " . $row['model']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['engine_capacity']; ?> liters
                                        </td>
                                        <td>
                                            <?php echo $row['transmission_type']; ?> transmission
                                        </td>
                                        <td>
                                            <?php echo $row['horsepower']; ?>Hp
                                        </td>
                                        <td>$
                                            <?php echo $row['price']; ?>
                                        </td>
                                        <td>
                                            <a href="details.php?vehicle_id=<?php echo $row['vehicle_id']; ?>"
                                                class="btn btn-outline-secondary" title="See details">
                                                <i class="fa fa-eye" aria-hidden="true"></i>

                                            </a>
                                        </td>

                                    </tr>
                                    <?php
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>

                        <?php
                        }
                        ?>
                        <!--	///*///======    End article  ========= //*/// -->
                    </div>

                    <!--col-right sidebar-->
                </div>
                <!--row-->
            </div>
            <!--container-->
        </section>
        <!--main-container col2-left-layout-->

        <?php include 'footer.php'; ?>
        <!-- End For version 1,2,3,4,6 -->

    </div>
    <!--page-->
    <!-- Mobile Menu-->
    <?php include 'mobile-menu.php' ?>
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

    function HideMe() {
        jQuery('.popup1').hide();
        jQuery('#fade').hide();
    }
    $(document).ready(function() {
        $('#vehicles').DataTable({
            "lengthMenu": [3, 5, 10],
        });
    });
    </script>
    </script>

</body>

</html>