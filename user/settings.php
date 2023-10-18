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
$page = "settings";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title> Home</title>
    <?php include 'sheets.php'; ?>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <?php include 'sidebar.php' ?>
        <!-- Sidebar Navigation end-->

        <div class="page-content">
            <!-- Page Header-->
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Settings</h2>
                </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Settings </li>
                </ul>
            </div>

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
                icon: "error",
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

            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-11">
                            <?php

                            $userid = $_SESSION['Id'];
                            include '../api/viewAccountDetails.php';
                            ?>
                            <form action="../api/updateUserDetails.php" class="form-horizontal" method="POST">

                                <input type="hidden" name="userid" value="<?php echo $userid ?>">

                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">First Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="fname" value="<?php echo $result['first_name'] ?>"
                                            placeholder="Enter your first name" required class="form-control">
                                    </div>
                                </div>

                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Last Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="lname" value="<?php echo $result['last_name'] ?>"
                                            placeholder="Enter your last name" required class="form-control">
                                    </div>
                                </div>

                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Username</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="uname" value="<?php echo $result['username'] ?>"
                                            placeholder="Enter your username" required class="form-control">
                                    </div>
                                </div>

                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Birthday</label>
                                    <div class="col-sm-12">
                                        <input type="date" name="birthday" value="<?php echo $result['birthday'] ?>"
                                            required class="form-control">
                                    </div>
                                </div>

                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="email" name="email" value="<?php echo $result['email'] ?>"
                                            placeholder="Enter your email" class="form-control">
                                    </div>
                                </div>

                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Gender</label>
                                    <div class="col-sm-12">
                                        <div class="i-checks">
                                            <?php
                                            if ($result['gender'] == 'male') {
                                                ?>

                                            <input type="radio" checked value="male" name="gender"
                                                class="radio-template">
                                            <label class="col-sm-2 form-control-label">Male</label>

                                            <input type="radio" value="female" name="gender" class="radio-template">
                                            <label class="col-sm-3 form-control-label">Female</label>

                                            <?php
                                            } elseif ($result['gender'] == 'female') {
                                                ?>

                                            <input type="radio" value="male" name="gender" class="radio-template">
                                            <label class="col-sm-2 form-control-label">Male</label>

                                            <input type="radio" value="female" checked name="gender"
                                                class="radio-template">
                                            <label class="col-sm-3 form-control-label">Female</label>

                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Contact</label>
                                    <div class="col-sm-12">
                                        <input type="tel" name="contact" value="<?php echo $result['contact'] ?>"
                                            placeholder="Enter your phone number" class="form-control">
                                    </div>
                                </div>

                                <div class="line"></div>
                                <div class="form-group row">
                                    <div class="col-sm-12 ml-auto">
                                        <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
                                        <button type="submit" name="btnUpdate" class="btn btn-outline-success">Save
                                            changes</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <?php include 'footer.php'; ?>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js">
    </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js">
    </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
</body>

</html>