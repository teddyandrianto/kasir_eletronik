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
                  <p>: TR00000001</p>
              </div>
              <div class="col-sm-3">
                  <label>Kasir</label>
              </div>
              <div class="col-sm-9">
                  <p>: Choddy</p>
              </div>
              <div class="col-sm-3">
                  <label>Tanggal</label>
              </div>
              <div class="col-sm-9">
                  <p>: 10-10-2018</p>
              </div>
            </div>  
            <div class="col-sm-6 form-horizontal">
              <div class="form-group">
                <label class="control-label col-sm-3" for="text">Total bayar</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control input-lg" id="text" value="200.000" name="text" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3">Dibayar</label>
                <div class="col-sm-5">          
                  <input type="password" class="form-control" id="" placeholder="Kembalian" name="">
                </div>
              </div>  
            </div> 
          </div>
        </div>
      </div>
      <div class="col-md-12">
         <div class="box">
            <div class="box-header">
              <div class="col-md-3">
                <input class="form-control" type="" name="" placeholder="Cari Barang" >
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
                <tr>
                  <td>1</td>
                  <td>1002918278</td>
                  <td>TV LCD 21" POLYTRON</td>
                  <td>1</td>
                  <td>2.500.000</td>
                  <td>2.500.000</td>
                  <td><center><a class="btn btn-danger btn-xs" href=""><i class="fa fa-times"></i></a></center></td>
                </tr>
                 <tr>
                  <td>2</td>
                  <td>1002918278</td>
                  <td>TV LCD 21" SHARP</td>
                  <td>1</td>
                  <td>2.000.000</td>
                  <td>2.500.000</td>
                  <td><center><a class="btn btn-danger btn-xs" href=""><i class="fa fa-times"></i></a></center></td>
                </tr>
                 <tr>
                  <td>3</td>
                  <td>1002918278</td>
                  <td>TV LCD 25" SONY</td>
                  <td>1</td>
                  <td>4.000.000</td>
                  <td>4.000.000</td>
                  <td><center><a class="btn btn-danger btn-xs" href=""><i class="fa fa-times"></i></a></center></td>
                </tr>
                 <tr>
                  <td>4</td>
                  <td>1002918278</td>
                  <td>TV LCD 25" POLYTRON</td>
                  <td>1</td>
                  <td>3.500.000</td>
                  <td>3.500.000</td>
                  <td><center><a class="btn btn-danger btn-xs" href=""><i class="fa fa-times"></i></a></center></td>
                </tr>
                 <tr>
                  <td>5</td>
                  <td>1002918278</td>
                  <td>TV LCD 21" LG</td>
                  <td>3</td>
                  <td>2.500.000</td>
                  <td>7.500.000</td>
                  <td><center><a class="btn btn-danger btn-xs" href=""><i class="fa fa-times"></i></a></center></td>
                </tr>
                 <tr>
                  <td>6</td>
                  <td>1002918271</td>
                  <td>TV LCD 21" SAMSUNG</td>
                  <td>2</td>
                  <td>2.500.000</td>
                  <td>5.000.000</td>
                  <td><center><a class="btn btn-danger btn-xs" href=""><i class="fa fa-times"></i></a></center></td>
                </tr>
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
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         false,
        "searching": false
    } );
} );
</script>
