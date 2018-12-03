  <div class="content-wrapper">
    <section class="content">
      <div class="row">
      <div class="col-md-12">
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Transaksi</h3>
            </div>
          <div class="box-body">
            <div class="col-sm-6">
              <div class="col-sm-3">
                  <label>No Transaksi</label>
              </div>
              <div class="col-sm-9">
                  <p>: <?php echo $trx->id_transaksi ?> </p>
              </div>
              <div class="col-sm-3">
                  <label>Kasir</label>
              </div>
              <div class="col-sm-9">
                  <p>: <?php echo $trx->nama_user ?> </p>
              </div>
              <div class="col-sm-3">
                  <label>Tanggal</label>
              </div>
              <div class="col-sm-9">
                  <p>: <?php echo $trx->tanggal ?> </p>
              </div>
              <div class="col-sm-3">
                <label>Total bayar</label>
              </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control input-lg" id="text" value="<?php echo $trx->total== 0 ? '' : number_format($trx->total, 0, ',', '.') ?>" name="text" readonly>
                </div>
              
            </div>  
            <div class="col-sm-6 form-horizontal">
              
              <form action="" method="POST">
              <div class="form-group">
                <label class="control-label col-sm-3">Nama Pembeli</label>
                <div class="col-sm-5">          
                  <input type="text" class="form-control" placeholder="Nama Pembeli" name="nama_pembeli" value="<?php echo $trx->nama_pembeli ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">No Telpon</label>
                <div class="col-sm-5">          
                  <input type="number" class="form-control" placeholder="No Telpon Pemblei" name="no_telpon" value="<?php echo $trx->no_telpon ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Dibayar</label>
                <div class="col-sm-5">          
                  <input type="text" class="form-control" placeholder="bayar" name="bayar" value="<?php echo $trx->bayar== 0 ? '' : number_format($trx->bayar, 0, ',', '.') ?>" readonly="">
                </div>
              </div>  
            </div> 
            <a href="<?php echo base_url('manager/laporan_transaksi') ?>"  class="btn btn-success pull-right">Kembali <span class="fa fa-level-down"></span></a>
            </form>
          
          </div>

        </div>



         <div class="box">
            <div class="box-header">
              <h4>Laporan Transaksi Detail</h4>
            </div>
            <div class="box-body">
              <table id="myTable" class="table table-bordered table-hover" width="100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Barcode</th>
                  <th>Nama Barang</th>
                  <th>Harga Jual</th>
                  <th>Harga Beli</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($transaksi_detail as $dt) { ?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $dt->barcode ?></td>
                  <td><?php echo $dt->nama_barang ?></td>
                  <td><?php echo $dt->harga_jual== 0 ? '' : number_format($dt->harga_jual, 0, ',', '.') ?></td>
                  <td><?php echo $dt->harga_beli== 0 ? '' : number_format($dt->harga_beli, 0, ',', '.') ?></td>
                  <td><?php echo $dt->jumlah ?></td>
                  <td><?php echo $dt->harga_jual*$dt->jumlah== 0 ? '' : number_format($dt->harga_jual*$dt->jumlah, 0, ',', '.') ?></td>
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
