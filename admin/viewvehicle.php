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
$page = 'index';
?>


<!doctype html>
<html lang="en">

<head>
    <title> Vehicle Details</title>
    <?php include 'sheets.php'; ?>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    </ul>
            </nav>

            <div class="container-fluid">
                <div class="row">
                    <?php include 'sidebar.php'; ?>

                    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="index.php">Vehicles</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Vehicle Details</li>
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

                        <div class="container">
                            <?php
                            require_once '../includes/dbOperations.php';
                            $vehicle_id = $_REQUEST['vehicle_id'];
                            $db = new DbOperations();
                            $result = $db->getVehicleByID($vehicle_id);
                            ?>
                            <div class="col-md-12 mb-5">
                                <div class="row">
                                    <div class="col-md-3">
                                        <form action="editVehicle.php" method="POST">
                                            <input type="hidden" name="vehicleId"
                                                value="<?php echo $result['vehicle_id']; ?>">
                                            <button class="btn btn-success form-control" name="btnEdit"> Edit </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-4">
                                <div class="card">
                                    <div class="card-header">
                                        Vehicle Details
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <strong>Vehicle ID:</strong> <?php echo $result['vehicle_id'] ?>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Make:</strong>
                                                <?php echo $result['name']; ?>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <strong>Model:</strong>
                                                <?php echo $result['model']; ?>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Year:</strong>
                                                <?php echo $result['year']; ?>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <strong>Engine Capacity:</strong>
                                                <?php echo $result['engine_capacity']; ?>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Transmission:</strong>
                                                <?php echo $result['transmission_type']; ?>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <strong>Horsepower:</strong>
                                                <?php echo $result['horsepower']; ?> Hp
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Condition:</strong>
                                                <?php echo $result['vehicle_condition']; ?>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <strong>Colour:</strong>
                                                <?php echo $result['colour']; ?>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Convertible:</strong>
                                                <?php echo $result['convertible'] ? 'YES' : 'NO'; ?>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <strong>Number of Seats:</strong>
                                                <?php echo $result['seats']; ?>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Price:</strong>
                                                <?php echo $result['price']; ?>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <strong>In Stock:</strong>
                                                <?php echo $result['in_stock'] ? 'YES' : 'NO'; ?>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-md-12 text-center">
                                                <img src="../vehicleimages/<?php echo $result['image_link']; ?>"
                                                    class="img-fluid rounded"
                                                    style="max-width: 800px; max-height: 300px;" alt="Vehicle Image">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </main>
                    <?php include 'footer.php' ?>
                </div>
            </div>
            <?php include 'scripts.php' ?>
</body>

</html>