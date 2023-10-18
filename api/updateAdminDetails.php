<?php

session_start();
require_once '../includes/dbOperations.php';

$response = array();

if (!isset($_POST['btnUpdate'])) {

    // some fields are missing
    $_SESSION['missing'] = "Please fill in all the details!";

    $response['error'] = true;
    $response['message'] = "Please fill in all the details";
    header("location:../admin/changesettings.php");
} else {

    $userid = trim($_POST['userid']);
    $firstname = trim($_POST['fname']);
    $lastname = trim($_POST['lname']);
    $username = trim($_POST['uname']);
    $email = trim($_POST['email']);

    if ((empty($userid)) && (empty($firstname)) && (empty($lastname)) && (empty($username)) && (empty($email))) {

        // some fields are missing
        $_SESSION['missing'] = "Please fill in all the details!";

        $response['error'] = true;
        $response['message'] = "Please fill in all the details";
        header("location:../admin/changesettings.php");
    } else {

        // db object
        $db = new DbOperations();

        $result = $db->updateAdminAccountDetails($userid, $firstname, $lastname, $username, $email);

        // success
        if ($result == 0) {

            $_SESSION['success'] = "Your account details are updated!";

            $response['error'] = false;
            $response['message'] = "Account details updated successfully!";
            header("location:../admin/changesettings.php");

            // some error
        } elseif ($result == 1) {

            $_SESSION['error'] = "Something went wrong, please try again.";

            $response['error'] = true;
            $response['message'] = "Something went wrong, please try again.";
            header("location:../admin/changesettings.php");
        }
    }
}

// echo json_encode($response);