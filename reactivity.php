<?php include('reserver.php') ?>
<?php include('server2.php') ?>

<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>kaydol</title>

    <style>
        table {
            border-collapse: collapse;
            font-family: monospace;
            font-size: 25px;
            width: 54%;
            margin: 50px auto 0px;
            color: black;
            background: #A6C7E1;
            text-align: center;
            border: 1px solid #B0C4DE;
            border-bottom: none;
            border-radius: 5px 5px 5px 5px;
            padding: 10px 2px 0 0;
            height: 10px;

        }

        th {
            background-color: #887000;
            color: white;
            height: 10px;
        }

        tr:nth-child(even) {
            background-color: #ffe57e;
            height: 10px;
        }
    </style>
</head>

<body>

<div align="center" class="header">
    <h3>Event Properties</h3>
    <?php
    include "connection.php";
    $last_query=mysqli_query($db,"SELECT max(id) FROM activity");
    $last_ids=mysqli_fetch_array($last_query);

    foreach ($last_ids as $last_id){

    }
    $sql = "SELECT activityname, location, date1,count1,clock FROM activity where id='$last_id'";
    $sql1 = "SELECT id, username, phone FROM users";
    $result = $db->query($sql);
    $result1 = $db->query($sql1);
    $row2 =$result1->fetch_assoc();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<br>"."Activityname:" . $row["activityname"].
                 "<br>"."Location: " . $row["location"].
                 "<br>"."Date: " . $row["date1"].
                 "<br>"."Count: " . $row["count1"].
                 "<br>"."Clock: " . $row["clock"]. "<br>";

        }
    } else {
        echo "0 results";
    }
    $db->close();

    ?>
<!--
    <p>Register or Cancel the activity</p>
    <div class="input-group">
        <button id='button_register' type=\"submit\" class=\"btn\"  name=\"register\" onclick = createRow()>Register</button>
        <button  type=\"submit\" class=\"btn\"  name=\"regi\" onclick = close()>Cancel</button>
    </div>
-->
</div>

<form method="post" action="reactivity.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
        <label>Username:</label>
        <h3><?php
            include ("connection.php");
            var_dump($row[0]);
            $sql = "SELECT username FROM users where id='$row[0]'";

            $result = $db->query($sql);
            $row2 =$result->fetch_all();
            echo $row2;
            ?></h3>
    </div
    <div class="input-group">
        <label>Phone:</label>
        <h3> sfndskgn</h3>
    </div>

    <div class="input-group">
        <button type="submit" class="btn" name="re_activity" >Register</button>
    </div>

</form>

<div class="header2">
    <h3>List Of Players</h3>
</div>


 <table >
     <thead>
     <tbody id="tableToModify">
    <tr>
        <th>id</th>
        <th>username</th>
        <th>phone</th>
    </tr>
    <?php
    include "connection.php";
    $sql = "SELECT id,username, phone FROM mail2";

    $result = $db->query($sql);
    $rows = $result->fetch_all();
    if ($result->num_rows > 0) {
        // output data of each row

        foreach ($rows as $key => $row) {
            for ($i = 0; $i <1; $i++){
                echo "
                     <tr id='team_list' >

                     <td>$row[0] </td>
                     <td>$row[1]</td>
                     <td>$row[2]</td>
                     
                     </tr>
                     
                  ";
            }

        }
    }
    $db->close();
    ?>
     </tbody>
     </thead>
</table>

</body>
</html>