<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact Us</title>
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
                                <li class="category1601"> <strong>Contact Us</strong> </li>
                            </ul>
                        </div>
                        <!--col-xs-12-->
                    </div>
                    <!--row-->
                </div>
                <!--container-->
            </div>
            <div class="page-title">
                <h2>CONTACT US</h2>
            </div>
        </div>
        <!--breadcrumbs-->

        <!-- BEGIN Main Container col2-right -->
        <div class="main-container col2-right-layout">
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
            <div class="main container">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-9 mx-auto" style="visibility: visible;">
                        <form action="../api/sendContactUs.php" id="contactForm" method="post">
                            <div class="static-contain">
                                <fieldset class="group-select">
                                    <ul>
                                        <li id="billing-new-address-form">
                                            <fieldset class="">
                                                <ul>
                                                    <li>
                                                        <div class="customer-name">
                                                            <div class="input-box name-firstname">
                                                                <label for="name">Name<em
                                                                        class="required">*</em></label>
                                                                <br>
                                                                <input required name="name" id="name" title="Name"
                                                                    class="input-text required-entry" type="text">
                                                            </div>
                                                            <div class="input-box name-firstname">
                                                                <label for="email">Email<em
                                                                        class="required">*</em></label>
                                                                <br>
                                                                <input required name="email" id="email" title="Email"
                                                                    class="input-text required-entry validate-email"
                                                                    type="text">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <label for="telephone">Phone</label>
                                                        <br>
                                                        <input required name="phone" id="telephone" title="Telephone"
                                                            value="" class="input-text" type="text">
                                                    </li>
                                                    <li>
                                                        <label for="comment">Comment<em class="required">*</em></label>
                                                        <br>
                                                        <textarea required name="comment" id="comment" title="Comment"
                                                            class="required-entry input-text" cols="5"
                                                            rows="3"></textarea>
                                                    </li>
                                                </ul>
                                            </fieldset>
                                        </li>
                                        <p class="require"><em class="required">* </em>Required Fields</p>
                                        <input type="text" name="hideit" id="hideit" value=""
                                            style="display:none !important;">
                                        <input type="submit" value="Send Message" class="btn btn-outline-secondary" />

                                    </ul>
                                </fieldset>
                            </div>
                        </form>

                    </div>
                    <!--col-right sidebar-->
                </div>
                <!--row-->
            </div>
            <!--main-container-inner-->
        </div>
        <!--main-container col2-left-layout-->



    </div>
    <!-- For version 1,2,3,4,6 -->
    <?php include 'footer.php'; ?>
    <!-- End For version 1,2,3,4,6 -->

    </div>
    <!--page-->
    <!-- Mobile Menu-->
    <?php include 'mobile-menu.php'; ?>
    <!-- JavaScript -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
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