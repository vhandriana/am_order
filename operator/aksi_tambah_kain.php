<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../konfig.php';
extract($_POST);
$query = "insert into m_kain values(null,'$kode','$nama', '$keterangan', '{$_SESSION['id_user']}') ";
mysql_query($query);