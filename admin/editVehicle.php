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

if (isset($_POST['btnEdit'])) {
    require_once '../includes/dbOperations.php';
    $vehicle_id = $_POST['vehicleId'];
    $db = new DbOperations();
    $result = $db->getVehicleByID($vehicle_id);
} else {
    header('location:index.php');
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Edit Vehicles</title>
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
                            <li class="breadcrumb-item"><a href="index.php">Vehicles</a></li>
                            <li class="breadcrumb-item"><a
                                    href="viewvehicle.php?vehicle_id=<?php echo $result['vehicle_id'] ?>">Vehicle
                                    Details</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Vehicle Details</li>
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

                <form id="updateVehicleForm" action="../api/updateVehicleDetails.php" method="POST"
                    enctype="multipart/form-data">

                    <div class="form-row">
                        <input type="hidden" name="vehicleId" value="<?php echo $result['vehicle_id']; ?>">

                        <div class="form-group col-md-3">
                            <label for="inputModel">Model :</label>
                            <input type="text" name="model" value="<?php echo $result['model']; ?>" class="form-control"
                                id="inputModel" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputYear">Year :</label>
                            <input type="text" name="year" value="<?php echo $result['year']; ?>" class="form-control"
                                id="inputYear" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputEngine">Engine :</label>
                            <input type="text" name="engine" value="<?php echo $result['engine_capacity']; ?>"
                                class="form-control" id="inputEngine" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputHorsepower">Horsepower :</label>
                            <input type="text" name="horsepower" value="<?php echo $result['horsepower']; ?>"
                                class="form-control" id="inputHorsepower" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputCondition">Condition :</label>
                            <input type="text" name="condition" value="<?php echo $result['vehicle_condition']; ?>"
                                class="form-control" id="inputCondition" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputTransmission">Transmission :</label>
                            <select class="form-control" id="inputTransmission" name="transmission" required>
                                <option value="<?php echo $result['id']; ?>">
                                    <?php echo $result['transmission_type']; ?>
                                    (Selected)
                                </option>
                                <option value="1">Manual</option>
                                <option value="2">Automatic</option>
                            </select>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="inputSeats">Number of Seats :</label>
                            <input type="text" name="seats" value="<?php echo $result['seats']; ?>" class="form-control"
                                id="inputSeats" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputSeats">Price :</label>
                            <input type="text" name="price" value="<?php echo $result['price']; ?>" class="form-control"
                                id="inputPrice" required>
                        </div>

                        <?php
                        $in_stock = $result['in_stock'];
                        if ($in_stock == 1) {
                            ?>
                        <div class="form-group col-md-8">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" value="0" name="inStock" checked class="custom-control-input"
                                    id="inStock">
                                <label class="custom-control-label" for="inStock">Out of Stock</label>
                            </div>
                        </div>
                        <?php
                        } else {
                            ?>
                        <div class="form-group col-md-8">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" value="1" name="inStock" class="custom-control-input"
                                    id="inStock">
                                <label class="custom-control-label" for="inStock">Out of Stock</label>
                            </div>
                        </div>
                        <?php
                        }
                        ?>

                    </div>
                    <div class="col-md-12 mb-5">
                        <div class="row">
                            <div class="col-md-3">
                                <button name="updateVehicleButton" type="submit"
                                    class="btn btn-success btn-block">Save</button>

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