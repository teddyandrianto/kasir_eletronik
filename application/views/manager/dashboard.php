  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-sm-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Rp <?=$perolehan->hasil== 0 ? '' : number_format($perolehan->hasil, 0, ',', '.')?></h3>

              <p>Keuntungan</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>

          </div>
        </div>

        <div class="col-lg-4 col-sm-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3> <?=$count_barang_kosong->hasil?> Brg 

              </h3>

              <p>Jumlah Barang Kosong</p>
            </div>
            <div class="icon">
              <i class="fa fa-cube"></i>
            </div>
           
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-4 col-sm-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$count_karyawan->hasil?> Org</h3>
              <p>Karyawan</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
