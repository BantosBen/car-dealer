<?php

session_start();
require_once '../includes/dbOperations.php';

$response = array();

if (!isset($_POST['updateVehicleButton'])) {
    // some fields are missing
    $_SESSION['missing'] = "Some fields are missing.";
    $response['error'] = true;
    $response['message'] = "Please fill in all the details";
    header("location:../admin/index.php");
} else {

    // getting the values
    $vehicle_id = trim($_POST['vehicleId']);
    $model = trim($_POST['model']);
    $year = trim($_POST['year']);
    $engine = trim($_POST['engine']);
    $horsepower = trim($_POST['horsepower']);
    $condition = trim($_POST['condition']);
    $transmission = trim($_POST['transmission']);
    $seats = trim($_POST['seats']);
    $price = trim($_POST['price']);
    $in_stock = trim($_POST['inStock']);

    // db object
    $db = new DbOperations();

    $result = $db->updateVehicleDetails($vehicle_id, $model, $year, $engine, $transmission, $horsepower, $condition, $seats, $price, $in_stock);

    if ($result == 1) {
        // some error
        $_SESSION['error'] = "Something went wrong, please try again.";
        $response['error'] = true;
        $response['message'] = "Some error occured, please try again.";
        header("location:../admin/index.php");
    } elseif ($result == 0) {
        // success
        $_SESSION['success'] = "Vehicle details updated successfully!";
        $response['error'] = false;
        $response['message'] = "Vehicle details updated successfully";
        header("location:../admin/index.php");
    }
}

echo json_encode($response);