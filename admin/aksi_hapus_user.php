<?php
ob_start();

include 'konfig.php';
$id_user = $_GET['id_user'];
$query = "DELETE FROM tbl_user WHERE id_user='$id_user'";
mysql_query($query)or die(mysql_error());

exit(header("location:operator.php?view=tampil_user"));
ob_flush();
?>

