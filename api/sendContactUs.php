<?php

session_start();

require_once '../includes/contactUsOperation.php';

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $comment = $_POST["comment"];

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($comment)) {

        $db = new ContactUsOperation();

        $result = $db->insertContactUsData($name, $email, $phone, $comment);

        if ($result == 1) {
            // success
            $_SESSION['success'] = "Message sent successfully";
            header('location:../home/contact-us.php');
            exit();
        } else {
            // error
            $_SESSION['error'] = "Something went wrong, Couldn't send message";
            header('location:../home/contact-us.php');
            exit();
        }
    } else {
        // some fields are missing
        $_SESSION['missing'] = "Some fields are missing.";
        header('location:../home/contact-us.php');
        exit();
    }
}

// echo json_encode($response);