<?php
session_start();
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
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <!-- Slider -->
                    <div class="home-slider5">
                        <div id="thmg-slideshow" class="thmg-slideshow">
                            <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
                                <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
                                    <ul>
                                        <li data-transition='random' data-slotamount='7' data-masterspeed='1000'
                                            data-thumb='images/slide-img1.jpg'><img src='images/slide-img1.jpg'
                                                data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner" />
                                            <div class="container">
                                                <div class="content_slideshow">
                                                    <div class="row">
                                                        <div>
                                                            <div class="info">
                                                                <div class='tp-caption ExtraLargeTitle sft  tp-resizeme '
                                                                    data-endspeed='500' data-speed='500'
                                                                    data-start='1100' data-easing='Linear.easeNone'
                                                                    data-splitin='none' data-splitout='none'
                                                                    data-elementdelay='0.1' data-endelementdelay='0.1'
                                                                    style='z-index:2; white-space:nowrap;'>
                                                                    <span style="color:#B21C42;">Masterpiece of
                                                                        Modena</span>
                                                                </div>
                                                                <div class='tp-caption LargeTitle sfl  tp-resizeme '
                                                                    data-endspeed='500' data-speed='500'
                                                                    data-start='1300' data-easing='Linear.easeNone'
                                                                    data-splitin='none' data-splitout='none'
                                                                    data-elementdelay='0.1' data-endelementdelay='0.1'
                                                                    style='z-index:3; white-space:nowrap;'><span
                                                                        style="font-weight:normal; display:block">Maserati:
                                                                        The Symphony of Speed</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-transition='random' data-slotamount='7' data-masterspeed='1000'
                                            data-thumb='images/slide-img2.jpg'><img src='images/slide-img2.jpg'
                                                data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner" />
                                            <div class="container">
                                                <div class="content_slideshow">
                                                    <div class="row">
                                                        <div>
                                                            <div class="info">
                                                                <div class='tp-caption ExtraLargeTitle sft  tp-resizeme '
                                                                    data-endspeed='500' data-speed='500'
                                                                    data-start='1100' data-easing='Linear.easeNone'
                                                                    data-splitin='none' data-splitout='none'
                                                                    data-elementdelay='0.1' data-endelementdelay='0.1'
                                                                    style='z-index:2; white-space:nowrap;'><span
                                                                        style="color:#B21C42;">British
                                                                        Excellence Unleashed</span> </div>
                                                                <div class='tp-caption LargeTitle sfl  tp-resizeme '
                                                                    data-endspeed='500' data-speed='500'
                                                                    data-start='1300' data-easing='Linear.easeNone'
                                                                    data-splitin='none' data-splitout='none'
                                                                    data-elementdelay='0.1' data-endelementdelay='0.1'
                                                                    style='z-index:3; white-space:nowrap;'><span
                                                                        style="font-weight:normal; display:block">McLaren:
                                                                        Defining the Future of Supercars</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="tp-bannertimer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <section class="row mb-5 justify-content-center">
                    <div class="col-10 mx-auto">
                        <div class="card mt-5">
                            <div class="card-body">
                                <h1 class="card-title text-center">Find the right car for you</h1>
                                <div class="container bg-grey py-4">
                                    <h2 class="text-center mb-4"></h2>
                                    <form class="b-filter" action="find-car.php" method="post">
                                        <div class="row">
                                            <div class="col-md-4 form-group">
                                                <label for="manufacturer">Manufacturer</label>
                                                <select name="manufacturer" class="form-control " id="manufacturer">
                                                    <option>Select Manufacturer</option>
                                                    <?php
                                                    include '../api/getManufacturers.php';
                                                    if ($result) {
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                    <option value="<?php echo $row['make_id']; ?>">
                                                        <?php echo $row['name']; ?>
                                                    </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-md-4 form-group">
                                                <label for="status">Car Status</label>
                                                <select name="status" class="form-control " id="status">
                                                    <option>Select Car Status</option>
                                                    <option value="Brand New">Brand New</option>
                                                    <option value="Recondition">Recondition</option>
                                                </select>
                                            </div>

                                            <div class="col-md-4 form-group">
                                                <label for="type">Type</label>
                                                <select name="type" class="form-control " id="type">
                                                    <option>Select Type</option>
                                                    <option value="0">Coupe</option>
                                                    <option value="1">Spyder</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-4 form-group">
                                                <label for="colour">Colour</label>
                                                <select name="colour" class="form-control " id="colour">
                                                    <option>Select Colour</option>
                                                    <?php
                                                    include '../api/getColours.php';
                                                    if ($result) {
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                    <option value="<?php echo $row['id']; ?>">
                                                        <?php echo $row['colour']; ?>
                                                    </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-md-4 form-group">
                                                <label for="year">Year</label>
                                                <select name="year" class="form-control " id="year">
                                                    <option>Select Year</option>
                                                    <option>2023</option>
                                                    <option>2022</option>
                                                    <option>2021</option>
                                                    <option>2020</option>
                                                    <option>2019</option>
                                                    <option>2018</option>
                                                    <option>2017</option>
                                                    <option>2016</option>
                                                    <option>2015</option>
                                                    <option>2014</option>
                                                    <option>2013</option>
                                                    <option>2012</option>
                                                </select>
                                            </div>

                                            <div class="col-md-4 form-group">
                                                <label for="transamission">Transmission</label>
                                                <select name="transamission" class="form-control " id="transamission">
                                                    <option>Select Transmission</option>
                                                    <option value="1">Manual</option>
                                                    <option value="2">Automatic</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="text-center mt-4">
                                            <input type="submit" value="Search Car" class="btn btn-primary" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- best Pro Slider -->
                <section class=" wow bounceInUp animated">
                    <div class="hot_deals slider-items-products container">
                        <div class="new_title">
                            <h2>Up for Sale</h2>
                        </div>

                        <div id="hot_deals" class="product-flexslider hidden-buttons">
                            <div class="slider-items slider-width-col4 products-grid">
                                <?php
                                include '../api/getInStockVehicles.php';
                                if ($result) {
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
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- best seller Slider -->
                <section class=" wow bounceInUp animated">
                    <div class="hot_deals slider-items-products container">
                        <div class="new_title">
                            <h2>Best Seller Cars</h2>
                        </div>

                        <div id="hot_deals" class="product-flexslider hidden-buttons">
                            <div class="slider-items slider-width-col4 products-grid">
                                <?php
                                include '../api/getInStockVehicles.php';
                                if ($result) {
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
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
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