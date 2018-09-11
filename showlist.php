<?php include('reserver2.php') ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Table with database</title>

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
            border-radius: 5px 5px 0px 0px;
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

<div class="header2 ">
    <h2>CREATE TEAM</h2>
</div>

<script>




 function deleteRow1($id) {
     var btn = document.getElementById("button_"+$id);
     btn.innerText="delete";
     // document.body.appendChild(btn);
 }


        var rowIds = [];
        function cloneRow($id) {

            // if(rowIds.contains()){
            if (rowIds.includes($id)) {
                alert("Already Existing")
            } else {
                rowIds.push($id);

                var row = document.getElementById("team_list_" + $id);
                // var row = document.getElementById(team_list_$i); // find row to
                var table = document.getElementById("tableToModify"); // find table to append to
                var clone = row.cloneNode(true); // copy children too
                clone.id = "tabId"; // change id or other attributes/contents
                table.appendChild(clone); // add new row to end of table
                //  var button =document.getElementById("button_"+$id);
                //   console.log(button.onclick);
                deleteRow1($id);

            }

        }
        function some($id) {
            cloneRow($id);
            deleteRow1($id);

        }

    function deleteAllRow() {
            var rowCount = tableToModify.rows.length;
            for (var i = rowCount - 1; i > 0; i--) {
               tableToModify.deleteRow(i);
            }

    }
    function deleteRow(){
        tableToModify.deleteRow(1);
    }
/*
  function deleteRow($id)
    {
        var row = document.getElementById("team_list_" + $id);
        tableToModify.deleteRow($j);
    }
*/
    function createRow() {
        var row = document.createElement('tr'); // create row node
        var col = document.createElement('td'); // create column node
        var col1 = document.createElement('td'); // create second column node
        var col2 = document.createElement('td'); // create second column node
        row.appendChild(col); // append first column to row
        row.appendChild(col1); // append second column to row
        row.appendChild(col2); // append second column to row
        col.innerHTML = "61"; // put data in first column
        col1.innerHTML = "qwe"; // put data in first column
        col2.innerHTML = "qwe";
        var table = document.getElementById("tableToModify"); // find table to append to
        table.appendChild(row); // append row to table
    }
</script>


<table>
    <tr>
        <th>id</th>
        <th>username</th>
        <th>phone</th>
        <th>option</th>
    </tr>
    <?php

    include ('connection.php');

    $sql = "SELECT id, username, phone FROM users";
    $sqlmail = "SELECT mail FROM users";

    $sorgu="SELECT id FROM users inner join activity on ";


    $result = $db->query($sql);
    $rows = $result->fetch_all();
   // $rows['id'] = "selam";
    // print_r($rows["id"]);
    if ($result->num_rows > 0) {
        // output data of each row
        foreach ($rows as $key => $row) {
            for ($i = 0; $i < 1; $i++) {
                echo "
                     <tr id='team_list_$row[0]' >

                     <td>$row[0] </td>
                     <td>$row[1]</td>
                     <td>$row[2]</td>
                    <td>
                    

                       <div class=\"input-group\">
                           <button id='button_$row[0]' type=\"submit\" class=\"btn\"  name=\"ekle\"onclick=some($row[0])  >Add</button>
                       </div>
                     </td>
                     
                   
                     </tr>
                     
                  ";

               $news= array();
               if (in_array($row[0],$news)){


               }else{

                   array_push($news,$row[0]);


                   $sor=mysqli_query($db ,"select * from users where id='$row[0]'");

                   $result=mysqli_fetch_array($sor);

                   $idNew=$result["id"];
                   $last_id = $_GET['activity_id'];



                   $query = "INSERT INTO user_to_activity (user_id,activity_id ) 
  			       VALUES('$idNew','$last_id')";



                   $result = mysqli_query($db, $query);
                   $users = mysqli_fetch_assoc($result);
               }

            }
        }


    } else {
        echo "0 results";
    }


    $db->close();
    ?>

</table id="tableID">

<?php

    $userToActivityQuery = "SELECT user_id FROM user_to_activity INNER JOIN users ON users.id=user_to_activity.user_id WHERE activity_id=24";
    $result=mysqli_query($db ,$userToActivityQuery);

     while ($row = mysql_fetch_all($result)) {

}
 ?>
<div class="header2">
<h3>List Of Players</h3>
</div>

    <table id = "list" cellpadding = "10px">
        <thead>
        <tbody id="tableToModify">
        <tr>
            <th>id</th>
            <th>username</th>
            <th>phone</th>
            <th>option</th>
        </tr>


        </tbody>
        </thead>
    </table>


    <div class="header3">
        <a href="http://localhost/reactivity.php"><input style="color:darkred"  type="button" name="button2"  value="Send Mail" /></a>
    </div>
<button onclick="deleteRow()">delete</button>
<button onclick="createRow()"> add</button>
<button onclick="deleteAllRow()"> delete all rows</button>


</body>
</html>