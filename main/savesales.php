<?php
ini_set("display_errors", "On");
?>
<?php

session_start();
include('../connect.php');
$a = $_POST['invoice'];
$b = $_POST['cashier'];
$c = date('Y-m-d');
$d = $_POST['ptype'];
$e = round($_POST['amount']);
$z = ($_POST['profit']);
$xx = $_POST['reset'];
if($d=='credit') {
$f = $_POST['due'];
$sql = "INSERT INTO sales (invoice_number,cashier,date,type,amount,profit,due_date,paid) VALUES (:a,:b,:c,:d,:e,:z,:f,:xx)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':z'=>$z,':f'=>$f,':xx'=>$xx));
header("location: preview.php?invoice=$a");
exit();
}
if($d=='cash') {
$f = $_POST['cash'];
$sql = "INSERT INTO sales (invoice_number,cashier,date,type,amount,profit,cashtendered,paid) VALUES (:a,:b,:c,:d,:e,:z,:f,:xx)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':z'=>$z,':f'=>$f,':xx'=>$xx));
header("location: preview.php?invoice=$a");
exit();
}
?>
