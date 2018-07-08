<?php
include '../konfig.php';
extract($_POST);
$query = "UPDATE m_supplier SET kode = '$kode', nama = '$nama', noTelp1 = '$noTelp1', noTelp2 = '$noTelp2', noTelp3 = '$noTelp3', alamat = '$alamat' WHERE idSupp='$id_supplier' ";
mysql_query($query)or die(mysql_error());
header("location:../operator.php?view=tampil_supplier");
?>