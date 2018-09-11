<?php include('connection.php') ?>

<?php


/*$veri = $db->prepare("SELECT * FROM users WHERE id=?;");
$veri ->execute(array(9));
$islem =$veri->fetch();
  echo $islem["username"];*/

$sql=mysql_query("Select * from users where id=?;"); // Veritabanını seçtik.
$sql ->execute(array(5));
$cek=mysql_fetch_array($sql); // Seçtiğimiz veritabanını $cek adından bir değişkene atadık.

echo $cek["username"];
?>

