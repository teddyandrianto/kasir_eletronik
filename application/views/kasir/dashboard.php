  <div class="content-wrapper">
    <section class="content">
      <?php 
                $trx = $this->db->query("SELECT * FROM tbl_transaksi WHERE status=0 AND id_kasir='".$_SESSION['login']['id_user']."' ")->row();
               ?>
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
                  <p>: <?php echo $trx->id_transaksi ?></p>
              </div>
              <div class="col-sm-3">
                  <label>Kasir</label>
              </div>
              <div class="col-sm-9">
                  <p>: <?php echo $_SESSION['login']['nama_user'] ?></p>
              </div>
              <div class="col-sm-3">
                  <label>Tanggal</label>
              </div>
              <div class="col-sm-9">
                  <p>: <?php echo date("d-m-Y")?> <span  id="watch"></span></p>
              </div>
              <div class="col-sm-3">
                <label>Total bayar</label>
              </div>
                <div class="col-sm-6">
                  <?php   $data_jumlah_bayar = $this->db->query("SELECT SUM(harga_jual*jumlah) AS bayar FROM tbl_detail_transaksi WHERE tbl_detail_transaksi.id_transaksi='".$trx->id_transaksi."' ")->row();
                  $no=1;?>
                  <input type="text" class="form-control input-lg" id="text" value="<?php echo $data_jumlah_bayar->bayar== 0 ? '' : number_format($data_jumlah_bayar->bayar, 0, ',', '.') ?>" name="text" readonly>
                </div>
              
            </div>  
            <div class="col-sm-6 form-horizontal">
              
              <form action="<?php echo base_url('kasir/input_transaksi/').$trx->id_transaksi."/".$data_jumlah_bayar->bayar ?>" method="POST">
              <div class="form-group">
                <label class="control-label col-sm-3">Nama Pembeli</label>
                <div class="col-sm-5">          
                  <input type="text" class="form-control" placeholder="Nama Pembeli" name="nama_pembeli" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">No Telpon</label>
                <div class="col-sm-5">          
                  <input type="number" class="form-control" placeholder="No Telpon Pemblei" name="no_telpon" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Dibayar</label>
                <div class="col-sm-5">          
                  <input type="number" class="form-control" placeholder="bayar" name="bayar" required>
                </div>
              </div>  
            </div> 
            <button style="margin-left: 30px;margin-right: 150px;" class="btn btn-success pull-right">Selesai</button>
            </form>
          <a style="margin-right: : 10px" class="btn btn-danger pull-right" href="<?php echo base_url('Kasir/batal_transaksi/').$trx->id_transaksi ?>">Batal</a>
          
          </div>

        </div>
      </div>
      <div class="col-md-12">
         <div class="box">
            <div class="box-header">
              <div class="col-md-8">
                <input name="search_data" class="form-control"  id="search_data" type="text" onkeyup="ajaxSearch();" autofocus placeholder="Cari barang">               
                <div id="suggestions">
                        <table id="autoSuggestionsList" class="table table-bordered table-hover">
                        </table>
              </div>  
      
      </div>
            </div>
            
            <div class="box-body">
              <table id="myTable" class="table table-bordered table-hover" width="100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Barcode</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Total</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $data_pembelian = $this->db->query("SELECT * FROM tbl_detail_transaksi JOIN tbl_barang ON tbl_detail_transaksi.id_barang=tbl_barang.id_barang WHERE tbl_detail_transaksi.id_transaksi='".$trx->id_transaksi."' ")->result();
                  $no=1;
                   foreach ($data_pembelian as $pmb ){
                   ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $pmb->barcode ?></td>
                  <td><?php echo $pmb->nama_barang ?></td>
                  <td><?php echo $pmb->jumlah ?></td>
                  <td><?php echo $pmb->harga_jual== 0 ? '' : number_format($pmb->harga_jual, 0, ',', '.') ?></td>
                  <td><?php echo $pmb->harga_jual*$pmb->jumlah== 0 ? '' : number_format($pmb->harga_jual*$pmb->jumlah, 0, ',', '.')?></td>
                  <td><center><a class="btn btn-danger btn-xs" href="<?php echo base_url('kasir/hapus_beli/').$pmb->id_detail_tr ?>"><i class="fa fa-times"></i></a></center></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
  </section>

        <!-- start (JS code) -->
        <script type="text/javascript">
            function ajaxSearch()
            {
                var input_data = $('#search_data').val();

                if (input_data.length === 0)
                {
                    $('#suggestions').hide();
                }
                else
                {

                    var post_data = {
                        'search_data': input_data,
                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                    };

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('/kasir/caribarang/').$trx->id_transaksi ?>",
                        data: post_data,
                        success: function (data) {
                            // return success
                            if (data.length > 0) {
                                $('#suggestions').show();
                                $('#autoSuggestionsList').addClass('auto_list');
                                $('#autoSuggestionsList').html(data);
                            }
                        }
                    });

                }
            }
        </script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable( {
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         false,
        "searching": false
    } );
} );
</script>

<script type="text/javascript">
    $(document).ready(function(){
        function clock() {
          var now = new Date();
          var secs = ('0' + now.getSeconds()).slice(-2);
          var mins = ('0' + now.getMinutes()).slice(-2);
          var hr = now.getHours();
          var Time = hr + ":" + mins + ":" + secs;
          document.getElementById("watch").innerHTML = Time;
          requestAnimationFrame(clock);
        }

        requestAnimationFrame(clock);
    });
</script>