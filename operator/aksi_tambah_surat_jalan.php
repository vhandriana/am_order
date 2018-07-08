<?php
include '../konfig.php';

extract($_POST);
$query = "insert into t_surat_jalan_m values(null,'$nomor', '$no_external', '$tgl', '$idKain', '$idSupp', '$qtyRoll', '$qtyKillo', '$ribRoll', '$ribKillo', '$krah','$manset', '$keterangan', '{$_SESSION['id_user']}') ";
mysql_query($query);