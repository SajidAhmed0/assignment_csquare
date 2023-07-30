<?php

    //creating the connection
    $conn = new mysqli("localhost:3306", "root", "sajid205", "assignment");

    //checking the connection
    if($conn->connect_error){
        die("Connection failed : ".$conn->connect_error);
    }

    $title = $_POST["title"];
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
	$lname = $_POST["lname"];
    $contactNum = $_POST["contactNum"];
    $district = $_POST["district"];



    $sql = "INSERT INTO Customer(title, first_name, middle_name, last_name, contact_no, district) VALUES('$title','$fname', '$mname', '$lname', '$contactNum', '$district')";

    $conn->query($sql);
    header("Location: viewCustomer.php");
?>