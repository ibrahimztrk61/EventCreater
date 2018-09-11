<?php
include('connection.php');
session_start();

$activityname ="";
$location ="";
$date ="";
$count ="";
$clock="";
$errors = array();

$b = mysqli_query($db,"SELECT * FROM  activity");




$user = $b->fetch_all();


    if (isset($_POST['ekle'])) {
        $sorgu= mysqli_query($db,"SELECT * FROM users");


    }

    if (isset($_POST['create'])) {
        // receive all input values from the form
        $activityname = mysqli_real_escape_string($db, $_POST['activityname']);
        $location = mysqli_real_escape_string($db, $_POST['location']);
        $count = mysqli_real_escape_string($db, $_POST['count']);
        $date = mysqli_real_escape_string($db, $_POST['date']);
        $clock = mysqli_real_escape_string($db, $_POST['clock']);



        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($activityname)) { array_push($errors, "Activity name is required"); }
        if (empty($location)) { array_push($errors, "Location is required"); }
        if (empty($count)) { array_push($errors, "Count is required"); }
        if (empty($date)) { array_push($errors, "Date is required"); }
        if (empty($clock)) { array_push($errors, "Clock is required"); }



        // Finally, register user if there are no errors in the form


        if (count($errors) == 0) {
            $query = "INSERT INTO activity (activityname,location,date1, count1,clock ) 
  			  VALUES('$activityname','$location', '$date','$count','$clock')";


            $result = mysqli_query($db, $query);
            $users = mysqli_fetch_assoc($result);

            $selectQuery = "SELECT * FROM activity where activityname='".$activityname."'";
            $result = mysqli_query($db, $selectQuery);
            $activity = mysqli_fetch_assoc($result);



            header('location: showlist.php?activity_id='.$activity['id']);
        }


}

?>
