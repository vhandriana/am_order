<?php
include '../konfig.php';
extract($_POST);
$query = "UPDATE m_kain SET kode = '$kode', nama = '$nama', keterangan = '$keterangan' WHERE idKain='$idKain' ";
mysql_query($query)or die(mysql_error());
header("location:../operator.php?view=tampil_kain");
?>

