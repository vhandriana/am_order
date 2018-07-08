<?php
include '../konfig.php';
extract($_POST);
$query = "UPDATE m_pelanggan SET kode = '$kode', nama = '$nama', noTelp1 = '$noTelp1', noTelp2 = '$noTelp2', noTelp3 = '$noTelp3', alamat = '$alamat' WHERE idPel='$id_pelanggan' ";
mysql_query($query)or die(mysql_error());
header("location:../admin.php?view=tampil_pelanggan");
?>