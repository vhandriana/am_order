<?php
ob_start();

include 'konfig.php';
$idSJ = $_GET['idSJ'];
$query = "DELETE FROM t_surat_jalan_m WHERE idSJ='$idSJ'";
mysql_query($query)or die(mysql_error());

exit(header("location:operator.php?view=tampil_surat_jalan"));
ob_flush();
?>

