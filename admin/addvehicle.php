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
$page = "addvehicle";
?>


<!doctype html>
<html lang="en">

<head>
  <title>Add Vehicles</title>
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
              <li class="breadcrumb-item active" aria-current="page">Add vehicle</li>
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

        <form id="addVehicleForm" action="../api/addNewVehicle.php" method="POST" enctype="multipart/form-data">

          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="inputMake">Make :</label>
              <select class="form-control" id="inputMake" name="make" required>
                <option value="0">Select the make</option>
                <?php
                include '../api/getManufacturers.php';
                if ($result) {
                  while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?php echo $row['make_id']; ?>">
                      <?php echo $row['name']; ?>
                    </option>
                    <?php
                  }
                }
                ?>
              </select>
            </div>

            <div class="form-group col-md-3">
              <label for="inputModel">Model :</label>
              <input type="text" name="model" class="form-control" id="inputModel" placeholder="ex: Corolla" required>
            </div>

            <div class="form-group col-md-3">
              <label for="inputYear">Year :</label>
              <input type="text" name="year" class="form-control" id="inputYear" placeholder="ex: 2015" required>
            </div>

            <div class="form-group col-md-3">
              <label for="inputEngine">Engine :</label>
              <input type="text" name="engine" class="form-control" id="inputEngine" placeholder="ex: 2.0" required>
            </div>

            <div class="form-group col-md-3">
              <label for="inputHorsepower">Horsepower :</label>
              <input type="text" name="horsepower" class="form-control" id="inputHorsepower" placeholder="ex: 720hp"
                required>
            </div>

            <div class="form-group col-md-3">
              <label for="inputCondition">Condition :</label>
              <input type="text" name="condition" class="form-control" id="inputCondition"
                placeholder="ex: Brand New or Recondition" required>
            </div>

            <div class="form-group col-md-3">
              <label for="inputTransmission">Transmission :</label>
              <select class="form-control" id="inputTransmission" name="transmission" required>
                <option value="0">Select the transmission</option>
                <option value="1">Manual</option>
                <option value="2">Automatic</option>
              </select>
            </div>

            <div class="form-group col-md-3">
              <label for="inputColour">Colour :</label>
              <select class="form-control" id="inputColour" name="colour" required>
                <option value="0">Select the colour</option>
                <?php
                include '../api/getColours.php';
                if ($result) {
                  while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <option value="<?php echo $row['id']; ?>">
                      <?php echo $row['colour']; ?>
                    </option>
                    <?php
                  }
                }
                ?>
              </select>
            </div>

            <div class="form-group col-md-4">
              <label for="inputSeats">Number of Seats :</label>
              <input type="text" name="seats" class="form-control" id="inputSeats" placeholder="ex: 2/4/5" required>
            </div>

            <div class="form-group col-md-4">
              <label for="inputSeats">Price :</label>
              <input type="text" name="price" class="form-control" id="inputPrice" placeholder="ex: 4000000.00"
                required>
            </div>

            <div class="form-group col-md-4">
              <label for="inputImage">Image :</label>
              <input type="file" name="image" class="form-control btn btn-sm btn-outline-info" id="inputImage"
                placeholder="Price of the vehicle" required>
            </div>

            <div class="form-group col-3">
              <label>Convertible :</label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="yesRadio" name="convertible" class="custom-control-input" value="1" required>
                <label class="custom-control-label" for="yesRadio">Yes</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="noRadio" name="convertible" class="custom-control-input" value="0" required>
                <label class="custom-control-label" for="noRadio">No</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-3">
                  <button id="addVehicleButton" type="submit" class="btn btn-success btn-block">Publish Car</button>
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