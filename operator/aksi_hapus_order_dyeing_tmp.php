<?php
include '../konfig.php';

extract($_POST);

$query = "DELETE t_order_dyeing_d_tmp WHERE idODD = $idODD ";

mysql_query($query)or die(mysql_error());