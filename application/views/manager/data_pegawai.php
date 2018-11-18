  <div class="content-wrapper">
    <section class="content">
      <div class="row">
      <div class="col-md-12">
         <div class="box">
            <div class="box-header">
              <h4>Data Pegawai</h4>
            </div>
            <div class="box-body">
              <table id="myTable" class="table table-bordered table-hover" width="100%">
                <thead>
                <tr>
                  <th>No</th>
                  <th>username</th>
                  <th>Nama Pegawai</th>
                  <th>Telpon</th>
                  <th>Jabatan</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($pegawai as $p) { ?>
                <tr>
                  <td><?php echo $no++?></td>
                  <td><?php echo $p->username ?></td>
                  <td><?php echo $p->nama_user ?></td>
                  <td><?php echo $p->telpon ?></td>
                  <td><?php 
                  if ($p->status==1){
                    echo "<span>Admin</span>";
                  }elseif ($p->status==2) {
                    echo "<span>Manager</span>";
                  }elseif($p->status==3){
                    echo "<span>Kasir</span>";
                  } ?></td>
                </tr>
              <?php } ?>
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
