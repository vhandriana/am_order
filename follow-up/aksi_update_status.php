<?php
include '../konfig.php';

extract($_POST);
$query = "UPDATE t_order_dyeing_m SET tgl_job = '$tgl_job', no_job = '$no_job', inspect = '$inspect', preset = '$preset', celup = '$celup', santex = '$santex', dryer = '$dryer', compact = '$compact', finish = '$finish', packing = '$packing', idUserJob = '{$_SESSION['id_user']}', tgl_krm = '$tgl_krm' WHERE idODM ='$idODM' ";

mysql_query($query)or die(mysql_error());
header("location:../follow-up.php?view=tampil_order_dyeing");

