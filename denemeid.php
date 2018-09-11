

<?php
include ("connection.php");




$result = mysqli_query($db,"SELECT max(id) FROM users");
var_dump($result);
if (!$result) {
    die('Could not query:' . mysqli_error());
}

$id = mysqli_result($result, 0, 'id');
var_dump($id);exit;
?>
