<?php
ob_start();

include 'konfig.php';
$idPel = $_GET['idPel'];
$query = "DELETE FROM m_pelanggan WHERE idPel='$idPel'";
mysql_query($query)or die(mysql_error());

exit(header("location:admin.php?view=tampil_pelanggan"));
ob_flush();
?>

