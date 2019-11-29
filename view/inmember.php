<section class="content">
      <div class="row">
<div class="col-md-12">        
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Input Member</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="">
              <div class="box-body">
                    <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Member</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control"  placeholder="Nama Client" name="nmclient">
                    <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="tgl">
                  </div>
                </div>
                  
                
              <!-- /.box-body -->
              <div class="box-footer">
                  <input type="submit" value="SIMPAN" name="submit" class="btn btn-success">
                  <a onClick="history.go(-1)" class="btn btn-danger" type="reset"> BATAL</a>
                
               
              </div>
         
            </form>
          </div>
</div>


     
    </div>
</section>


