<div align="center">
    <h1><label class="label label-success">Data Pelanggan Terdaftar</label></h1>
    <br>
    <button class="btn btn-primary btn-large" data-toggle="modal" data-target="#tambahModal">
        <i class="glyphicon glyphicon-plus-sign"></i> Tambah Data Pelanggan
    </button>
</div>
<br>
<table id="datatable" class="display stripe">
    <thead>
    <th>No</th>
    <th>Kode</th>
    <th>Nama</th>
    <th>No Telepon 1</th>
    <th>No Telepon 2</th>
    <th>No Telepon 3</th>
    <th>Alamat</th>
    <th>Aksi</th>
</thead>
<tbody>
    <?php
    $query = "SELECT * FROM m_pelanggan order by idPel desc";
    $result = mysql_query($query);
    if (mysql_num_rows($result)) {
        //echo"ada isinya"; 
        $no = 1;
        while ($row = mysql_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $no; ?> </td>
                <td><?php echo $row['kode']; ?> </td>
                <td><?php echo $row['nama']; ?> </td>
                <td><?php echo $row['noTelp1']; ?> </td>
                <td><?php echo $row['noTelp2']; ?> </td>
                <td><?php echo $row['noTelp3']; ?> </td>
                <td><?php echo $row['alamat']; ?> </td>
                <td><?php echo "<a class='btn btn-info btn-sm' href='operator.php?view=tampil_ubah_pelanggan&idPel=" . $row['idPel'] . "'><i class='glyphicon glyphicon-edit'></i></a> | 
                    <a class='btn btn-danger btn-sm' href='operator.php?view=aksi_hapus_pelanggan&idPel=" . $row['idPel'] . "' onclick='return confirm(&quot;Apakah anda yakin akan menghapus data pelanggan tersebut?&quot;)'><i class='glyphicon glyphicon-trash'></i></a>";
            ?></td>
        </tr>
        <?php
        $no ++;
    }
} else {
    echo"kosong";
}
?>
</tbody>
<tfoot>
<th hidden="yes">No</th>
<th hidden="yes">Kode</th>
<th hidden="yes">Nama</th>
<th hidden="yes">No Telepon 1</th>
<th hidden="yes">No Telepon 2</th>
<th hidden="yes">No Telepon 3</th>
<th hidden="yes">Alamat</th>
<th hidden="yes">Aksi</th></tfoot>
</table>

<!---------------------------- tambah ------------------------->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Data Pelanggan Baru</h4>
            </div> 
            <div class="modal-body">
                <form name="tambah_pelanggan" id="tambah_pelanggan" method="POST">

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" name="kode" placeholder="Kode Pelanggan" class="form-control input-lg" required autofocus  />
                    </div>
                    
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <input type="text" name="nama" value="" placeholder="Nama Pelanggan" class="form-control input-lg" required />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-phone"></i>
                        </span>
                        <input type="text" name="noTelp1" value="" placeholder="No Telepon 1" class="form-control input-lg" required />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-phone"></i>
                        </span>
                        <input type="text" name="noTelp2" value="" placeholder="No Telepon 2" class="form-control input-lg" required />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-phone"></i>
                        </span>
                        <input type="text" name="noTelp3" value="" placeholder="No Telepon 3" class="form-control input-lg" required />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <textarea name="alamat" placeholder="Alamat" class="form-control" rows="5" required></textarea>
                    </div>   

                </form>

            </div>
            <div class="modal-footer"> 
                <button type="reset" class="btn btn-inverse"><i class="glyphicon glyphicon-refresh"></i> Reset </button>
                <button type="submit" class="btn btn-primary" id="submit"><i class="glyphicon glyphicon-floppy-disk"></i>  Simpan </button>

            </div>

        </div> 
    </div><!-- /.modal-content --> 
</div><!-- /.modal -->
<!------------------------- edit -------------------->

<script type="text/javascript">
    $(document).ready(function () {
        $("button#submit").click(function () {
            $.ajax({
                type: "POST",
                url: "operator/aksi_tambah_pelanggan.php",
                data: $('form#tambah_pelanggan').serialize(),
                success: function (msg) {
                    $("#tambahModal").modal('hide')
                    location.href = 'operator.php?view=tampil_pelanggan';
                    ;
                },
                error: function () {
                    alert("Gagal menambah pelanggan baru");
                }
            });
        });
    });
</script>

