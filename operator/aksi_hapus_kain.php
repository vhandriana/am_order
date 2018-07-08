<?php
ob_start();

include 'konfig.php';
$idKain = $_GET['idKain'];
$query = "DELETE FROM m_kain WHERE idKain='$idKain'";
mysql_query($query)or die(mysql_error());

exit(header("location:operator.php?view=tampil_kain"));
ob_flush();
?>

