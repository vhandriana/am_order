<?php
if (isset($_GET)) {
    include './konfig.php';
    $idSJ = $_GET['idSJ'];
    $query = "SELECT sj.idSJ, sj.nomor, sj.tgl, mk.nama as namaKain, ms.nama as namaSupplier, sj.no_external, sj.qtyRoll, sj.qtyKillo, sj.ribRoll, sj.ribKillo, sj.krah, sj.manset, sj.keterangan, sj.idUser FROM t_surat_jalan_m sj JOIN m_kain mk ON mk.idKain = sj.idKain LEFT JOIN m_supplier ms ON ms.idSupp = sj.idSupp where idSJ = '$idSJ' ";
    $result = mysql_query($query);
    if (mysql_num_rows($result)) {
        while ($row = mysql_fetch_array($result)) {
            ?>
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Edit Data Surat Jalan</h4>
                <br/>
                <a class="btn" href="operator.php?view=tampil_surat_jalan"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
            </div>
            <div class="modal-body">
                <form name="edit_surat_jalan" id="edit_surat_jalan" method="POST" action="operator/aksi_ubah_surat_jalan.php">
                    <input type="hidden" name="idSJ" value="<?php echo $idSJ; ?>"/>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Tanggal
                        </span>
                        <input type="date" id="tgl" name="tgl" placeholder="Tanggal" class="form-control input-lg" value="<?php echo $row['tgl'] ?>" required style="width: 50%;" />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Nomor
                        </span>
                        <input type="text" name="nomor" placeholder="Nomor" class="form-control input-lg" value="<?php echo $row['nomor'] ?>" required disabled/>
                    </div>
                    
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Nama Kain
                        </span>
                        <input type="text" name="idKain" placeholder="Nama Kain" class="form-control input-lg" value="<?php echo $row['namaKain'] ?>" required disabled/>
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Nama Supplier
                        </span>
                        <select name='idSupp' id='idSupp' class="form-control input-lg">
                            <option value=''>Pilih Supplier</option>
                            <?php
                            $query2 = "SELECT distinct idSupp, nama from m_supplier";
                            $result2 = mysql_query($query2);
                            if (mysql_num_rows($result2)) {
                                while ($row2 = mysql_fetch_array($result2)) {
                                    echo '<option ';
                                    if ($row['namaSupplier'] == $row2['nama']) {
                                        echo 'selected';
                                    }
                                    echo '>' . $row2['nama'] . '</option>';
                                }
                            }
                            ?>
                        </select>    
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            No SJ Supplier
                        </span>
                        <input type="text" name="no_external" placeholder="Nomor SJ Supplier" class="form-control input-lg" value="<?php echo $row['no_external'] ?>" />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Qty Roll
                        </span>
                        <input type="text" name="qtyRoll" placeholder="Qty Roll" class="form-control input-lg" value="<?php echo $row['qtyRoll'] ?>"/>
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Qty Killo
                        </span>
                        <input type="text" name="qtyKillo" placeholder="Qty Killo" class="form-control input-lg" value="<?php echo $row['qtyKillo'] ?>"/>
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Rib Roll
                        </span>
                        <input type="text" name="ribRoll" placeholder="Rib Roll" class="form-control input-lg" value="<?php echo $row['ribRoll'] ?>"/>
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Rib Killo
                        </span>
                        <input type="text" name="ribKillo" placeholder="Rib Killo" class="form-control input-lg" value="<?php echo $row['ribKillo'] ?>"/>
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Krah
                        </span>
                        <input type="text" name="krah" placeholder="Krah" class="form-control input-lg" value="<?php echo $row['krah'] ?>"/>
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Manset
                        </span>
                        <input type="text" name="manset" placeholder="Manset" class="form-control input-lg" value="<?php echo $row['manset'] ?>"/>
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            Keterangan
                        </span>
                        <textarea name="keterangan" placeholder="Keterangan" class="form-control" value="<?php echo $row['keterangan'] ?>" rows="5"></textarea>
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