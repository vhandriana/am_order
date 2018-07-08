<?php
if (isset($_GET)) {
    include './konfig.php';
    $id_ubah_kain = $_GET['idKain'];
    $query = "SELECT * FROM m_kain where idKain = '$id_ubah_kain'";
    $result = mysql_query($query);
    if (mysql_num_rows($result)) {
        while ($row = mysql_fetch_array($result)) {
            ?>
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Edit Data Kain</h4>
            </div>
            <div class="modal-body">
                <form name="edit_kain" id="edit_kain" method="POST" action="operator/aksi_ubah_kain.php">


                    <input type="hidden" name="id_kain" value="<?php echo $id_ubah_kain; ?>"/>
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" name="kode" placeholder="Kode Kain" class="form-control input-lg" value="<?php echo $row['kode'] ?>" required autofocus  />
                    </div>
                    
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" name="nama" placeholder="Nama Kain" class="form-control input-lg" value="<?php echo $row['nama'] ?>" required autofocus  />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-question-sign"></i>
                        </span>
                        <textarea name="keterangan" class="col-lg-8" rows="5" required>
                        <?php echo $row['keterangan'];?>
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