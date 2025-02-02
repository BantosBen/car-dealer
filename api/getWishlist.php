<?php

require_once '../includes/dbOperations.php';

$response = array();

// check if the session is started
if (isset($_SESSION['User']) && isset($_SESSION['Id'])) {

    $userid = $_SESSION['Id'];

    // db object
    $db = new DbOperations();

    $result = $db->getWishlistByUserId($userid);
} else {
    // session not started
    $_SESSION['error'] = "Session Expired. Please login to continue";
    $response['error'] = true;
    $response['message'] = "Session Expired. Please login to continue";
    header("location:../login/login-page.php");
}

// echo json_encode($response);