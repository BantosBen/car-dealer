<?php

require_once '../includes/dbOperations.php';

$response = array();

// check if the session is started
// if (isset($_SESSION['User'])) {

// db object
$db = new DbOperations();

$result = $db->getManufacturers();