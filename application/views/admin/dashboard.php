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
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>1002918278</td>
                  <td>TV LCD 21" POLYTRON</td>
                  <td>16</td>
                  <td>2.500.000</td>
                  <td>2.500.000</td>
                  <td><center>
                    <button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>
                    <a class="btn btn-danger btn-xs" href=""><i class="fa fa-times"></i></a></center></td>
                </tr>
                 <tr>
                  <td>2</td>
                  <td>1002918278</td>
                  <td>TV LCD 21" SHARP</td>
                  <td>17</td>
                  <td>2.000.000</td>
                  <td>2.500.000</td>
                  <td><center>
                    <button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>
                    <a class="btn btn-danger btn-xs" href=""><i class="fa fa-times"></i></a></center></td>
                </tr>
                 <tr>
                  <td>3</td>
                  <td>1002918278</td>
                  <td>TV LCD 25" SONY</td>
                  <td>14</td>
                  <td>4.000.000</td>
                  <td>4.000.000</td>
                  <td><center>
                    <button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>
                    <a class="btn btn-danger btn-xs" href=""><i class="fa fa-times"></i></a></center></td>
                </tr>
                 <tr>
                  <td>4</td>
                  <td>1002918278</td>
                  <td>TV LCD 25" POLYTRON</td>
                  <td>12</td>
                  <td>3.500.000</td>
                  <td>3.500.000</td>
                  <td><center>
                    <button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>
                    <a class="btn btn-danger btn-xs" href=""><i class="fa fa-times"></i></a></center></td>
                </tr>
                 <tr>
                  <td>5</td>
                  <td>1002918278</td>
                  <td>TV LCD 21" LG</td>
                  <td>15</td>
                  <td>2.500.000</td>
                  <td>7.500.000</td>
                  <td><center>
                    <button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>
                    <a class="btn btn-danger btn-xs" href=""><i class="fa fa-times"></i></a></center></td>
                </tr>
                 <tr>
                  <td>6</td>
                  <td>1002918271</td>
                  <td>TV LCD 21" SAMSUNG</td>
                  <td>10</td>
                  <td>2.500.000</td>
                  <td>5.000.000</td>
                  <td><center>
                    <button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>
                    <a class="btn btn-danger btn-xs" href=""><i class="fa fa-times"></i></a></center></td>
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
        "scrollCollapse": true
    } );
} );
</script>
