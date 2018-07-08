<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../konfig.php';
extract($_POST);
$query = "INSERT INTO tbl_user (username, password, hak_akses) VALUES('$username','$password', '$hak_akses') ";
mysql_query($query)or die(mysql_error()); 