<?php

class ContactUsOperation
{

    private $con;

    function __construct()
    {

        require_once dirname(__FILE__) . '/dbConnection.php';

        $db = new DbConnect();

        $this->con = $db->connect();
    }

    function insertContactUsData($name, $email, $phone, $comment)
    {
        // Use prepared statements to avoid SQL injection
        $stmt = $this->con->prepare("INSERT INTO contact_us (name, email, phone, comment) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $comment);

        $result = $stmt->execute();

        // Close the prepared statement
        $stmt->close();

        return $result;
    }
}