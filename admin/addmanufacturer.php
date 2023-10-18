<?php
session_start();
if (!isset($_SESSION['User'])) {
    $_SESSION['error'] = "Session timed out. Please login to continue.";
    header('location:../login/login-page.php');
} elseif (isset($_SESSION['UserType'])) {
    $usertype = $_SESSION['UserType'];

    if ($usertype == 1) {
        header('location:../user/index.php');
    }
}
$page = 'addmanufacturer';
?>


<!doctype html>
<html lang="en">

<head>
    <title>Add Manufacturers</title>
    <?php include 'sheets.php'; ?>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <?php include 'sidebar.php'; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add manufacturer</li>
                        </ol>
                    </nav>
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

                <form id="addManufacturerForm" action="../api/addNewManufacturer.php" method="POST">

                    <div class="form-group">
                        <div class="form-group">
                            <label for="inputName">Name :</label>
                            <input type="text" name="name" class="form-control" id="inputName"
                                placeholder="Name of the company" required>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">Address :</label>
                            <input type="text" name="address" class="form-control" id="inputAddress"
                                placeholder="Address of the company" required>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail">Email :</label>
                            <input type="email" name="email" class="form-control" id="inputEmail"
                                placeholder="example@mail.com" required>
                        </div>

                        <div class="form-group">
                            <label for="inputContact">Contact :</label>
                            <input type="tel" name="contact" class="form-control" id="inputContact"
                                placeholder="0751245252" required>
                        </div>



                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="submit" value="Add Manufacturer" class="btn btn-success btn-block"
                                        id="btnAddManufacturer">
                                </div>
                            </div>
                        </div>

                    </div>

                </form>

            </main>
            <?php include 'footer.php' ?>
        </div>
    </div>
    <?php include 'scripts.php' ?>
</body>

</html>