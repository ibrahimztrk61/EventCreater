<?php
include "connection.php";
session_start();

$username="";
$phone="";
$errors = array();


$b = mysqli_query($db,"SELECT * FROM  mail2");

$user = $b->fetch_all();

if (isset($_POST['re_activity'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "user name is required"); }
    if (empty($phone)) { array_push($errors, "phone is required"); }


    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO mail2 (username,phone ) 
  			  VALUES('$username','$phone')";



        $result = mysqli_query($db, $query);
        $users = mysqli_fetch_assoc($result);
        // mysqli_num_rows($query)echo


        header('location: reactivity.php');
    }


}

?>

