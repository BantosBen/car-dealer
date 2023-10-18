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
$page = 'allmanufacturers';
?>


<!doctype html>
<html lang="en">

<head>
  <title>All Manufacturers</title>
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
              <li class="breadcrumb-item active" aria-current="page">Manufacturers</li>
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

        <!-- ################################################################################################################## -->

        <!-- Edit data modal -->
        <div class="modal fade" id="editManufacturerModal" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editManufacturerModal">Edit Manufacturer Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="../api/updateManufacturer.php" method="POST">
                <div class="modal-body">

                  <input type="hidden" name="manufacturerid" id="manufacturerId">

                  <div class="form-group">
                    <label for="nameText">Name</label>
                    <input type="text" class="form-control" id="nameText" required name="name"
                      placeholder="Enter manufacturer name">
                  </div>

                  <div class="form-group">
                    <label for="addressText">Address</label>
                    <input type="text" class="form-control" id="addressText" required name="address"
                      placeholder="Enter the address">
                  </div>

                  <div class="form-group">
                    <label for="emailText">Email</label>
                    <input type="email" class="form-control" id="emailText" required name="email"
                      placeholder="Enter the email">
                  </div>

                  <div class="form-group">
                    <label for="contactText">Contact</label>
                    <input type="text" class="form-control" id="contactText" required name="contact"
                      placeholder="Enter the phone number">
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="btnEditManufacturer" class="btn btn-success">Update</button>
                </div>
              </form>

            </div>
          </div>
        </div>

        <div class="table-responsive">
          <table id="data-table" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../api/getManufacturers.php';
              if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                  ?>
                  <tr>
                    <td>
                      <?php echo $row['make_id']; ?>
                    </td>
                    <td>
                      <?php echo $row['name']; ?>
                    </td>
                    <td>
                      <?php echo $row['address']; ?>
                    </td>
                    <td>
                      <?php echo $row['email']; ?>
                    </td>
                    <td>
                      <?php echo $row['contact']; ?>
                    </td>
                    <td>
                      <button type="submit" name="view" class="btn btn-outline-primary btnEdit"><i
                          class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </button>
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
  <script>
    $('.btnEdit').on('click', function () {

      $('#editManufacturerModal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children('td').map(function () {
        return $(this).text();
      }).get();

      console.log(data);

      $('#manufacturerId').val(data[0]);
      $('#nameText').val(data[1]);
      $('#addressText').val(data[2]);
      $('#emailText').val(data[3]);
      $('#contactText').val(data[4]);
    });
  </script>

</body>

</html>