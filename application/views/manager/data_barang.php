  <div class="content-wrapper">
    <section class="content">
      <div class="row">
      <div class="col-md-12">
         <div class="box">
            <div class="box-header">
              <h4>Data Barang</h4>
           
            </div>
            <div class="box-body">
              <table id="myTable" class="table table-bordered table-hover" width="100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Barcode</th>
                  <th>Nama Barang</th>
                  <th>Stok</th>
                  <th>Harga Jual</th>
                  <th>Harga Beli</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($barang as $b) { ?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $b->barcode ?></td>
                  <td><?php echo $b->nama_barang ?></td>
                  <td><?php echo $b->stok ?></td>
                  <td><?php echo $b->harga_jual ?></td>
                  <td><?php echo $b->harga_beli ?></td>
                  
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
