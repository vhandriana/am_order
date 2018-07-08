<?php
ob_start();

include 'konfig.php';
$idSupp = $_GET['idSupp'];
$query = "DELETE FROM m_supplier WHERE idSupp='$idSupp'";
mysql_query($query)or die(mysql_error());

exit(header("location:operator.php?view=tampil_supplier"));
ob_flush();
?>

