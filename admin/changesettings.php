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
$page = 'changesettings';

?>


<!doctype html>
<html lang="en">

<head>
    <title>App Settings</title>
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
                            <li class="breadcrumb-item active" aria-current="page">Settings</li>
                        </ol>
                    </nav>
                </div>

                <div class="container">
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
                    include '../api/viewAccountDetails.php';
                    ?>
                    <div class="row justify-content-center">
                        <div class="col-md-7 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Account Details</h5>
                                    <form id="myform" action="../api/updateAdminDetails.php" method="POST"
                                        enctype="multipart/form-data">

                                        <input type="hidden" name="userid" value="<?php echo $_SESSION['Id']; ?>">
                                        <div class="form-group">
                                            <label>First Name :</label>
                                            <input type="text" class="form-control"
                                                value="<?php echo $result['first_name'] ?>" name="fname">
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name :</label>
                                            <input type="text" class="form-control"
                                                value="<?php echo $result['last_name'] ?>" name="lname">
                                        </div>
                                        <div class="form-group">
                                            <label>Username :</label>
                                            <input type="text" class="form-control"
                                                value="<?php echo $result['username'] ?>" name="uname">
                                        </div>
                                        <div class="form-group">
                                            <label>Email :</label>
                                            <input type="email" class="form-control"
                                                value="<?php echo $result['email'] ?>" name="email">
                                        </div>

                                        <button name="btnUpdate" type="submit"
                                            class="btn btn-primary text-white btn-block">Update</button>

                                    </form>
                                    <span id="result"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

            </main>
            <?php include 'footer.php' ?>
        </div>
    </div>
    <?php include 'scripts.php' ?>
</body>

</html>