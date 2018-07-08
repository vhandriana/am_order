<?php
if (isset($_GET)) {
    include './konfig.php';
    $id_ubah_supplier = $_GET['idSupp'];
    $query = "SELECT * FROM m_supplier where idSupp = '$id_ubah_supplier'";
    $result = mysql_query($query);
    if (mysql_num_rows($result)) {
        while ($row = mysql_fetch_array($result)) {
            ?>
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Edit Data Kain</h4>
            </div>
            <div class="modal-body">
                <form name="edit_supplier" id="edit_supplier" method="POST" action="operator/aksi_ubah_supplier.php">
                    <input type="hidden" name="id_supplier" value="<?php echo $id_ubah_supplier; ?>"/>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" name="kode" placeholder="Kode Supplier" class="form-control input-lg" value="<?php echo $row['kode'] ?>" required autofocus  />
                    </div>
                    
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" name="nama" placeholder="Nama Supplier" class="form-control input-lg" value="<?php echo $row['nama'] ?>" required autofocus  />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-phone"></i>
                        </span>
                        <input type="text" name="noTelp1" placeholder="No Telepon 1" class="form-control input-lg" value="<?php echo $row['noTelp1'] ?>" required autofocus  />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-phone"></i>
                        </span>
                        <input type="text" name="noTelp2" placeholder="No Telepon 2" class="form-control input-lg" value="<?php echo $row['noTelp2'] ?>" required autofocus  />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-phone"></i>
                        </span>
                        <input type="text" name="noTelp3" placeholder="No Telepon 3" class="form-control input-lg" value="<?php echo $row['noTelp3'] ?>" required autofocus  />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-question-sign"></i>
                        </span>
                        <textarea name="alamat" class="col-lg-8" rows="5" required>
                        <?php echo $row['alamat'];?>
                        </textarea>
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