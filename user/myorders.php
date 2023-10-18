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
$page = "orders";
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

        <!-- Sidebar Navigation end-->

        <div class="page-content">
            <!-- Page Header-->
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Orders</h2>
                </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">My Orders </li>
                </ul>
            </div>

            <section class="no-padding-top">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="block">
                                <div class="table-responsive">
                                    <table id="ordersTable" class="table">
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
                                            include '../api/getOrdersById.php';
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
    <!-- JavaScript files-->
    <?php include 'scripts.php'; ?>
    <script>
    $(document).ready(function() {
        $('#ordersTable').DataTable({
            "lengthMenu": [3, 5, 10],
        });
    });
    </script>
</body>

</html>