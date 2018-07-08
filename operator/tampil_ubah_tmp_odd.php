<table class="table table-striped">
        <thead>
            <b>
            <tr>
                <td>Warna</td>
                <td>Nomor Resep</td>
                <td>Klasifikasi Warna</td>
                <td>Ongkos Celup</td>
                <td>Qty Roll</td>
                <td>Qty Killo</td>
                <td>Rib Roll</td>
                <td>Rib Killo</td>
                <td>Krah</td>
                <td>Manset</td>
                <td>Keterangan</td>
                <td></td>
            </tr>
            </b>
        </thead>

        <tbody>
            <?php
                $query = "SELECT * FROM t_order_dyeing_d WHERE noODM = '$nomor' ";
                $result = mysql_query($query);
                $no = 1;
                while ($row = mysql_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['warna']; ?> </td>
                        <td><?php echo $row['noResep']; ?> </td>
                        <td><?php echo $row['klasifikasi_warna']; ?> </td>
                        <td><?php echo $row['ongkos_clp']; ?> </td>
                        <td><?php echo $row['qtyRoll']; ?> </td>
                        <td><?php echo $row['qtyKillo']; ?> </td>
                        <td><?php echo $row['ribRoll']; ?> </td>
                        <td><?php echo $row['ribKillo']; ?> </td>
                        <td><?php echo $row['krah']; ?> </td>
                        <td><?php echo $row['manset']; ?> </td>
                        <td><?php echo $row['keterangan']; ?> </td> 
                    </tr>
                    <?php
                    $no ++;
                }
            ?>
        </tbody>
</table>