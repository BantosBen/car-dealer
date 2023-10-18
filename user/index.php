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
$page = "home";
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
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Home</h2>
                </div>
            </div>

            <?php

            require_once '../includes/dbOperations.php';
            $user_id = $_SESSION['Id'];

            $db = new DbOperations();

            $vehicle_count = $db->getVehicleCount();
            $cart_count = $db->getCartCountByUserId($user_id);
            $wishlist_count = $db->getWishlistCountByUserId($user_id);
            $orders_count = $db->getOrdersCountByUserId($user_id);

            ?>
            <section class="no-padding-top no-padding-bottom">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="statistic-block block" title="Vehicles currently on sale">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="fa fa-car"></i></div><strong>Vehicles On
                                            Sale</strong>
                                    </div>
                                    <div class="number dashtext-1">
                                        <?php echo $vehicle_count; ?>
                                    </div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar" style="width: <?php echo $vehicle_count; ?>%"
                                        aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"
                                        class="progress-bar progress-bar-template dashbg-3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="statistic-block block" title="My orders">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="fa fa-history"></i></div><strong>My Orders</strong>
                                    </div>
                                    <div class="number dashtext-2">
                                        <?php echo $orders_count; ?>
                                    </div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar" style="width: <?php echo $orders_count; ?>%"
                                        aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                        class="progress-bar progress-bar-template dashbg-1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="statistic-block block" title="My cart">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="fa fa-shopping-cart"></i></div><strong>My
                                            Cart</strong>
                                    </div>
                                    <div class="number dashtext-3">
                                        <?php echo $cart_count; ?>
                                    </div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar" style="width: <?php echo $cart_count; ?>%"
                                        aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"
                                        class="progress-bar progress-bar-template dashbg-5"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="statistic-block block" title="My wishlist">
                                <div class="progress-details d-flex align-items-end justify-content-between">
                                    <div class="title">
                                        <div class="icon"><i class="fa fa-shopping-basket"></i></div><strong>My
                                            Wishlist</strong>
                                    </div>
                                    <div class="number dashtext-4">
                                        <?php echo $wishlist_count; ?>
                                    </div>
                                </div>
                                <div class="progress progress-template">
                                    <div role="progressbar" style="width: <?php echo $wishlist_count; ?>%"
                                        aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"
                                        class="progress-bar progress-bar-template dashbg-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="block">
                                <div class="table-responsive">
                                    <table id="pendingOrderTable" class="table">
                                        <thead>
                                            <tr>
                                                <th class="text-info"><i class="fa fa-list-ol"></i></th>
                                                <th class="text-info">Make</th>
                                                <th class="text-info">Model</th>
                                                <th class="text-info">Quantity</th>
                                                <th class="text-info">Paid</th>
                                                <th class="text-info">Timestamp</th>
                                                <th class="text-info">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include '../api/getPendingOrdersById.php';
                                            if ($result && mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $order_id = htmlspecialchars($row['order_id']);
                                                    $make = htmlspecialchars($row['make']);
                                                    $model = htmlspecialchars($row['model']);
                                                    $quantity = htmlspecialchars($row['quantity']);
                                                    $total = htmlspecialchars($row['paid_amount']);
                                                    $timestamp = date("F j, Y, g:i a", strtotime($row['timestamp']));
                                                    $order_status = $row['order_status'];
                                                    ?>

                                            <tr>
                                                <td>
                                                    <?php echo $order_id ?>
                                                </td>
                                                <td>
                                                    <?php echo $make ?>
                                                </td>
                                                <td>
                                                    <?php echo $model ?>
                                                </td>
                                                <td>
                                                    <?php echo $quantity ?>
                                                </td>
                                                <td>
                                                    <?php echo $total ?>
                                                </td>
                                                <td>
                                                    <?php echo $timestamp ?>
                                                </td>
                                                <td>
                                                    <?php if ($order_status == 0) { ?>
                                                    <span class="text-warning">Pending</span>
                                                    <?php } ?>
                                                </td>
                                            </tr>

                                            <?php
                                                }
                                            } else {
                                                echo "<tr><td colspan='7'>No pending orders found.</td></tr>";
                                            }
                                            ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <?php include 'footer.php'; ?>
        </div>
    </div>
    <?php include 'scripts.php'; ?>
    <script>
    $(document).ready(function() {
        $('#pendingOrderTable').DataTable({
            "lengthMenu": [3, 5, 10],
        });
    });
    </script>
</body>

</html>