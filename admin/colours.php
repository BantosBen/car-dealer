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
$page = 'colours';
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
                            <li class="breadcrumb-item active" aria-current="page">Colours</li>
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



                <!-- Add data modal -->
                <div class="modal fade" id="addColourModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addColourModal">Add New Colour</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="../api/addNewColour.php" method="POST">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="colourText">Colour</label>
                                        <input type="text" class="form-control" id="colourText" required
                                            name="colourText" placeholder="Enter a colour">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="btnAddColour" class="btn btn-success">Save</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>



                <!-- ################################################################################################################## -->

                <!-- Edit data modal -->
                <div class="modal fade" id="editColourModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editColourModal">Edit Colour</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="../api/updateColour.php" method="POST">
                                <div class="modal-body">
                                    <div class="form-group">

                                        <input type="hidden" name="colourid" id="colourId">

                                        <label for="colourText">Colour</label>
                                        <input type="text" class="form-control" id="updateColourText" required
                                            name="colourText" placeholder="Enter a colour">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="btnEditColour" class="btn btn-success">Update</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>


                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addColourModal">
                    Add New Colour
                </button>

                <div class="row my-2 justify-content-center">
                    <div class="col-md-8 mx-auto">
                        <div class="table-responsive">
                            <table id="data-table" class="table table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Colour</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                  include '../api/getColours.php';
                  if ($result) {
                    while ($row = mysqli_fetch_array($result)) {
                      ?>
                                    <tr>
                                        <td>
                                            <?php echo $colour_id = $row['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['colour']; ?>
                                        </td>
                                        <td>
                                            <button type="submit" name="view"
                                                class="btn btn-outline-primary btn-sm btnEdit"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    <?php
                    }
                  }
                  ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php include 'footer.php' ?>
        </div>
    </div>
    <?php include 'scripts.php' ?>
</body>

<script>
$('.btnEdit').on('click', function() {

    $('#editColourModal').modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children('td').map(function() {
        return $(this).text();
    }).get();

    console.log(data);

    $('#colourId').val(data[0]);
    $('#updateColourText').val(data[1]);
});
</script>
</body>

</html>