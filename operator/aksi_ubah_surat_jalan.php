<?php
include '../konfig.php';
extract($_POST);
$query = "UPDATE t_surat_jalan_m SET nomor = '$nomor', no_external = '$no_external', tgl = '$tgl', idKain = '$idKain', idSupp = '$idSupp', qtyRoll = 'qtyRoll', qtyKillo = '$qtyKillo', ribRoll = '$ribRoll', ribKillo = '$ribKillo', krah = '$krah', manset = '$manset', keterangan = '$keterangan' WHERE idSJ='$idSJ' ";
mysql_query($query)or die(mysql_error());
header("location:../operator.php?view=tampil_surat_jalan");
?>