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
$page = 'allusers';
?>


<!doctype html>
<html lang="en">

<head>
  <title>Users</title>
  <?php include 'sheets.php'; ?>
</head>

<body>
  <?php include 'navbar.php'; ?>

  <div class="container-fluid">
    <div class="row">
      <div class="container-fluid">
        <div class="row">
          <?php include 'sidebar.php'; ?>
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div
              class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include '../api/getUsers.php';
                  if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                      ?>
                      <tr>
                        <td>
                          <?php echo $row['id']; ?>
                        </td>
                        <td>
                          <?php echo $row['name']; ?>
                        </td>
                        <td>
                          <?php echo $row['username']; ?>
                        </td>
                        <td>
                          <?php echo $row['email']; ?>
                        </td>
                        <td>
                          <?php echo $row['contact']; ?>
                        </td>
                        <?php
                        $user_status = $row['user_status'];
                        if ($user_status == 1) {
                          ?>
                          <td class="text-success"><strong>Online</strong></td>
                          <?php
                        } else {
                          ?>
                          <td class="text-danger"><strong>Offline</strong></td>
                          <?php
                        }
                        ?>
                        <td>
                          <form action="../api/updateUserStatus.php" method="POST">
                            <input type="hidden" name="userId" value="<?php echo $row['id']; ?>" <div class="form-group">
                            <div>
                              <select class="form-control col-10" name="process" required>
                                <option value="2">Update user status</option>
                                <option value="1">Activate</option>
                                <option value="0">Deactivate</option>
                              </select>
                            </div>
                            <br>
                            <button type="submit" name="btnUpdateUserStatus" class="btn btn-info">Update</button>
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