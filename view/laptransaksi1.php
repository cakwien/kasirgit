<section class="content">
      <div class="row">
<div class="col-md-12">        
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Cetak Laporan Transaksi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="?p=laptransaksi">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Dari Tanggal :</label>
                  <div class="col-sm-3">
                    <input type="date" class="form-control"   name="tgl1" required>
                  </div>
                </div>
                  
                     <div class="form-group">
                  <label class="col-sm-2 control-label">Sampai Tanggal :</label>
                  <div class="col-sm-3">
                    <input type="date" class="form-control"  name="tgl2" required>
                  </div>
                </div>


                         
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
            <input type="submit" class="btn btn-success" name="simpan" value="CETAK">;
                  <a href="?p=laptransaksiall" class="btn btn-info">CETAK SEMUA</a>
                  
               
              </div>
         
            </form>
          </div>
</div>
    </div>

</section>

