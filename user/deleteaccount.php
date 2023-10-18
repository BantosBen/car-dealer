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
$page = "deleteaccount";
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
                    <h2 class="h5 no-margin-bottom">Delete Account</h2>
                </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Delete My Account </li>
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

                            <form action="../api/deleteMyAccount.php" class="form-horizontal" method="POST">

                                <input type="hidden" name="userid" value="<?php echo $_SESSION['Id']; ?>">

                                <div class="line"></div>
                                <div class="form-group">
                                    <p class="col-sm-12 form-control-label">
                                        This action is irreversible.
                                        You will lose access to all your data in the site as well as access to your
                                        account.
                                        Are you sure you want to delete your account?</p>

                                    <div class="col-sm-12">
                                        <input type="checkbox" value="0" required name="confirm"
                                            class="checkbox-template">
                                        <label class="col-sm-11">I understand. Delete my account.</label>
                                    </div>
                                </div>

                                <div class="line"></div>
                                <div class="form-group row">
                                    <div class="col-sm-12 ml-auto">
                                        <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
                                        <input type="submit" value="Confirm" name="btnConfirm"
                                            class="btn btn-outline-success">
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