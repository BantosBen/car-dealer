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
$page = "index";
?>
<!doctype html>
<html lang="en">

<head>
  <title>Vehicles</title>
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
              <li class="breadcrumb-item active" aria-current="page">Vehicles</li>
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
          <table id="data-table" class="table table-striped table-hover text-center">
            <thead>
              <tr>
                <th>#</th>
                <th>Make</th>
                <th>Model</th>
                <th>Transmission</th>
                <th>Condition</th>
                <th>Colour</th>
                <th>Convertible</th>
                <th>In Stock</th>
                <th>Price</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>
              <?php
              include '../api/getVehicles.php';
              if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                  ?>
                  <tr>
                    <td>
                      <?php echo $vehicle_id = $row['vehicle_id']; ?>
                    </td>
                    <td>
                      <?php echo $row['name']; ?>
                    </td>
                    <td>
                      <?php echo $row['model']; ?>
                    </td>
                    <td>
                      <?php echo $row['transmission_type']; ?>
                    </td>
                    <td>
                      <?php echo $row['vehicle_condition']; ?>
                    </td>
                    <td>
                      <?php echo $row['colour']; ?>
                    </td>
                    <td>
                      <?php $convertible = $row['convertible'];
                      if ($convertible == "0") {
                        ?>
                        <span class="text-danger">&times;</span>
                        <?php
                      } elseif ($convertible == "1") {
                        ?>
                        <span class="text-success">&radic;</span>
                        <?php
                      }
                      ?>
                    </td>
                    <td>
                      <?php $in_stock = $row['in_stock'];
                      if ($in_stock == "0") {
                        ?>
                        <span class="text-danger">&times;</span>
                        <?php
                      } elseif ($in_stock == "1") {
                        ?>
                        <span class="text-success">&radic;</span>
                        <?php
                      }
                      ?>
                    </td>
                    <td>
                      <?php echo $row['price']; ?>
                    </td>
                    <td>
                      <a href="viewvehicle.php?vehicle_id=<?php echo $vehicle_id; ?>" type="submit" name="view"
                        class="btn btn-outline-secondary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
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