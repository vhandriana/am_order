<?php
include '../konfig.php';

extract($_POST);

$query = "DELETE t_order_printing_d_tmp WHERE idOPD = $idOPD ";

mysql_query($query)or die(mysql_error());