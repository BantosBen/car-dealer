<?php
require_once '../includes/dbOperations.php';

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Fetch the form data
    $manufacturer = $_POST['manufacturer'];
    $status = $_POST['status'];
    $type = $_POST['type'];
    $colour = $_POST['colour'];
    $year = $_POST['year'];
    $transmission = $_POST['transamission']; // Note: Typo in original form: "transamission" instead of "transmission"

    // Construct the base SQL query
    $sql = "SELECT * FROM `vehicles`
            INNER JOIN `manufacturers` ON manufacturers.make_id = vehicles.make
            INNER JOIN `colours` ON colours.id = vehicles.colour
            INNER JOIN `transmissions` ON transmissions.id = vehicles.transmission
            WHERE 1=1"; // This is a placeholder to make appending additional WHERE conditions easier

    // Add additional conditions based on the form data
    if (!empty($manufacturer) && $manufacturer != 'Select Make') {
        $sql .= " AND manufacturers.name='$manufacturer'";
    }
    if (!empty($status) && $status != 'Select Car Status') {
        $sql .= " AND vehicles.vehicle_condition='$status'";
    }
    if (!empty($colour) && $colour != 'Select Colour') {
        $sql .= " AND colours.colour='$colour'";
    }
    if (!empty($year) && $year != 'Select Year') {
        $sql .= " AND vehicles.year='$year'";
    }
    if (!empty($transmission) && $transmission != 'Select Transmission') {
        $sql .= " AND transmissions.transmission_type='$transmission'";
    }
    if (!empty($type) && $type != 'Select Type') {
        $sql .= " AND vehicles.convertible='$type'";
    }

    // Append the ORDER BY clause
    $sql .= " ORDER BY RAND()";

    $db = new DbOperations();

    $result = $db->findVehicles($sql);

} else {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <title>Find Best Car </title>
    <?php include 'sheets.php' ?>
</head>

<body>
    <div id="page">
        <?php include 'header.php' ?>

        <!--container-->
        <div class="content" style="margin-top: 25px;">
            <!-- best Pro Slider -->
            <section class=" wow bounceInUp animated">
                <div class="hot_deals slider-items-products container">
                    <div class="new_title">
                        <h2>Find the right car for you</h2>
                    </div>

                    <div id="hot_deals" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 products-grid">
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                            <div class="item">

                                <div class="item-inner">

                                    <div class="item-img">
                                        <div class="item-img-info">
                                            <a href="details.php?vehicle_id=<?php echo $row['vehicle_id']; ?>"
                                                title="See details" class="product-image">
                                                <img src="../vehicleimages/<?php echo $row['image_link']; ?>"
                                                    alt="Vehicle image"></a>
                                            <?php $condition = $row['vehicle_condition'];
                                                    if ($condition == "Brand New") {
                                                        ?>
                                            <div class="new-label new-top-left">New</div>
                                            <?php
                                                    } elseif ($condition == "Recondition") {
                                                        ?>
                                            <div class="sale-label new-top-left">Used</div>
                                            <?php
                                                    }
                                                    ?>


                                        </div>
                                    </div>

                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title">
                                                <a href="details.php?vehicle_id=<?php echo $row['vehicle_id']; ?>"
                                                    title="See details">
                                                    <?php echo $row['name']; ?>
                                                    <?php echo $row['model']; ?>
                                                </a>
                                            </div>

                                            <div class="item-content">
                                                <div class="item-price">
                                                    <div class="price-box">
                                                        <span class="regular-price"><span class="price">$
                                                                <?php echo $row['price']; ?>
                                                            </span> </span>
                                                    </div>
                                                </div>

                                                <div class="other-info">
                                                    <div class="col-km"><i class="fa fa-tachometer"></i>
                                                        <?php echo $row['colour']; ?>
                                                    </div>
                                                    <div class="col-engine"><i class="fa fa-gear"></i>
                                                        <?php echo $row['transmission_type']; ?>
                                                    </div>
                                                    <div class="col-date"><i class="fa fa-calendar"
                                                            aria-hidden="true"></i>
                                                        <?php echo $row['year']; ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            } else {
                                ?>
                            <div>
                                <h5>No Vehicle found</h5>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>


            <?php include 'footer.php'; ?>
            <!-- End For version 1,2,3,4,6 -->

        </div>
        <!--page-->
        <!-- Mobile Menu-->
        <?php include 'mobile-menu.php'; ?>

        <?php include 'scripts.php'; ?>
        <script>
        var dthen1 = new Date("12/25/17 11:59:00 PM");
        start = "08/04/15 03:02:11 AM";
        start_date = Date.parse(start);
        var dnow1 = new Date(start_date);
        if (CountStepper > 0)
            ddiff = new Date((dnow1) - (dthen1));
        else
            ddiff = new Date((dthen1) - (dnow1));
        gsecs1 = Math.floor(ddiff.valueOf() / 1000);

        var iid1 = "countbox_1";
        CountBack_slider(gsecs1, "countbox_1", 1);
        </script>
</body>

</html>

</html>