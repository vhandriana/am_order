<?php
session_start();
extract($_POST);
include './konfig.php';
$query = "select * from tbl_user where username = '$username' and password = '$password'";
$result = mysql_query($query);
if (mysql_num_rows($result)) {
    while ($row = mysql_fetch_array($result)) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['hak_akses'] = $row['hak_akses'];
        $_SESSION['grup'] = $row['grup'];
        
        if ($row['hak_akses'] == "Admin") {
            header("location:admin.php?view=tampil_user");
        } elseif ($row['hak_akses'] == "Follow Up") {
            header("location:follow-up.php?view=tampil_order_dyeing");
        } elseif ($row['hak_akses'] == "Operator") {
            header("location:operator.php?view=tampil_sj");
        } elseif ($row['hak_akses'] == "Marketing") {
            header("location:marketing.php?view=tampil_order_dyeing");
        } else {
            echo '<script>href.location</script>';
            session_destroy();
        }
    }
}else{
    echo "<script>
	location.href='index.php?error=salah';
	</script>";
}
?>