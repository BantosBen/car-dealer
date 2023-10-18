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
$page = 'pendingorders';
?>


<!doctype html>
<html lang="en">

<head>
    <title>Pending Orders</title>
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
                                    <li class="breadcrumb-item active" aria-current="page">Pending Orders</li>
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


                        <div class="table-responsive">
                            <table id="data-table" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Make</th>
                                        <th>Model</th>
                                        <th>Quantity</th>
                                        <th>Timestamp</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include '../api/getAllPendingOrders.php';
                                    if ($result) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['order_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['username']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['make']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['model']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['quantity']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['timestamp']; ?>
                                        </td>

                                        <?php
                                                $order_status = $row['order_status'];
                                                if ($order_status == 0) {
                                                    ?>
                                        <td class="text-warning"><strong>Pending</strong></td>
                                        <?php
                                                }
                                                ?>
                                        <td>
                                            <form action="../api/updateOrderStatus.php" method="POST">
                                                <input type="hidden" name="orderId"
                                                    value="<?php echo $row['order_id']; ?>" <div class="form-group">
                                                <div>
                                                    <select class="form-control col-10" name="process" required>
                                                        <option value="3">Update order</option>
                                                        <option value="1">Confirm</option>
                                                        <option value="2">Refund</option>
                                                    </select>
                                                </div>
                                                <br>
                                                <button type="submit" name="btnUpdateOrderStatus"
                                                    class="btn btn-info">Update</button>
                                            </form>
                                        </td>

                                    </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </main>
                    <?php include 'footer.php' ?>
                </div>
            </div>
            <?php include 'scripts.php' ?>

</body>

</html>