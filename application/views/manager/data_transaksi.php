  <div class="content-wrapper">
    <section class="content">
      <div class="row">
      <div class="col-md-12">
         <div class="box">
            <div class="box-header">
              <h4>Laporan Transaksi</h4>
            </div>
            <div class="box-body">
              <table id="myTable" class="table table-bordered table-hover" width="100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Waktu</th>
                  <th>No Trx</th>
                  <th>Nama Kasir</th>
                  <th>Nama Pembeli</th>
                  <th>Total</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($transaksi as $t) { ?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $t->tanggal ?></td>
                  <td><?php echo $t->id_transaksi ?></td>
                  <td><?php echo $t->nama_user ?></td>
                  <td><?php echo $t->nama_pembeli ?></td>
                  <td><?php echo $t->total ?></td>
                  <td></td>
                </tr>
              <?php } ?>
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable( {
        "scrollCollapse": true
    } );
} );
</script>
