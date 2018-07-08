<?php
if (isset($_GET)) {
    include './konfig.php';
    $id_ubah_user = $_GET['id_user'];
    $query = "SELECT * FROM tbl_user where id_user = '$id_ubah_user'";
    $result = mysql_query($query);
    if (mysql_num_rows($result)) {
        while ($row = mysql_fetch_array($result)) {
            ?>
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Edit Data User</h4>
            </div>
            <div class="modal-body">
                <form name="edit_user" id="edit_user" method="POST" action="admin/aksi_ubah_user.php">
                    <input type="hidden" name="id_user"vhan value="<?php echo $id_ubah_user; ?>"/>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" name="username" placeholder="Username" class="form-control input-lg" value="<?php echo $row['username'] ?>" required autofocus  />
                    </div>
                    
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <input type="text" name="password" placeholder="Password" class="form-control input-lg" value="<?php echo $row['password'] ?>" required autofocus  />
                    </div>

                    <div class="input-group input-lg ">

                        <span class="input-group-addon">
                            <i class="fa fa-hospital-o fa-lg"></i>
                        </span>
                        <select name="hak_akses" id="hak_akses" class="form-control input-lg">
                            <option <?php if($row['hak_akses']=='Admin'){echo "selected"; } ?> value='Admin'>Admin</option>
                            <option <?php if($row['hak_akses']=='Follow Up'){echo "selected"; } ?> value='Follow Up'>Follow Up</option>
                            <option <?php if($row['hak_akses']=='Operator'){echo "selected"; } ?> value='Operator'>Operator</option>
                            <option <?php if($row['hak_akses']=='Marketing'){echo "selected"; } ?> value='Marketing'>Marketing</option>

                        </select>    
                    </div>

                    <div align="center">
                        <button type="reset" class="btn btn-inverse btn-lg"><i class="glyphicon glyphicon-refresh"></i> Reset </button>
                        <button type="submit" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-floppy-disk"></i>  Simpan </button>
                    </div>
                </form>
            </div>





            <?php
        }
    }
}
?>