<div align="center">
    <h1><label class="label label-success">Data Kain Terdaftar</label></h1>
    <br>
    <button class="btn btn-primary btn-large" data-toggle="modal" data-target="#tambahModal">
        <i class="glyphicon glyphicon-plus-sign"></i> Tambah Data Kain
    </button>
</div>
<br>
<table id="datatable" class="display stripe">
    <thead>
    <th>No</th>
    <th>Kode</th>
    <th>Nama</th>
    <th>Keterangan</th>
    <th>Aksi</th>
</thead>
<tbody>
    <?php
    $query = "SELECT * FROM m_kain order by idKain desc";
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
                <td><?php echo $row['keterangan']; ?> </td>
                <td><?php echo "<a class='btn btn-info btn-sm' href='operator.php?view=tampil_ubah_kain&idKain=" . $row['idKain'] . "'><i class='glyphicon glyphicon-edit'></i></a> | 
                    <a class='btn btn-danger btn-sm' href='operator.php?view=aksi_hapus_kain&idKain=" . $row['idKain'] . "' onclick='return confirm(&quot;Apakah anda yakin akan menghapus data kain tersebut?&quot;)'><i class='glyphicon glyphicon-trash'></i></a>";
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
<th hidden="yes">Keterangan</th>
<th hidden="yes">Aksi</th></tfoot>
</table>

<!---------------------------- tambah ------------------------->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button>
                <h4 class="modal-title" id="myModalLabel"> <i class="glyphicon glyphicon-edit"></i> Data Kain Baru</h4>
            </div> 
            <div class="modal-body">
                <form name="tambah_kain" id="tambah_kain" method="POST">

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input type="text" name="kode" placeholder="Kode Kain" class="form-control input-lg" required autofocus  />
                    </div>
                    
                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <input type="text" name="nama" value="" placeholder="Nama Kain" class="form-control input-lg" required />
                    </div>

                    <div class="input-group input-lg">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-phone"></i>
                        </span>
                        <textarea name="keterangan" placeholder="Keterangan" class="form-control" rows="5" required></textarea>
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
                url: "operator/aksi_tambah_kain.php",
                data: $('form#tambah_kain').serialize(),
                success: function (msg) {
                    $("#tambahModal").modal('hide')
                    location.href = 'operator.php?view=tampil_kain';
                    ;
                },
                error: function () {
                    alert("Gagal menambah kain baru");
                }
            });
        });
    });
</script>

