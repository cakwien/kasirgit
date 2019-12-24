<section class="content">
      <div class="row">
<div class="col-md-12">        
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Input Jenis Item</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Item :</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control"  placeholder="Nama Item" name="nmitem" value="<?php echo $nmitem; ?>" required>
                    <input type="hidden" class="form-control" name="iditem" value="<?php echo $iditem; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Item :</label>
                    <div class="col-sm-4">
                      <select class="form-control select2" name="jenis">
                         <option readonly>Pilih Jenis Item</option>
                         <option value="Indoor" <?php if ($jenis=="Indoor"){echo "selected=selected";} ?> >Indoor</option>
                         <option value="Outdoor" <?php if ($jenis=="Outdoor"){echo "selected=selected";} ?> >Outdoor</option>
                      </select>
                  </div>
                </div>
                  
                   <div class="form-group">
                  <label class="col-sm-2 control-label">Satuan :</label>
                    <div class="col-sm-4">
                      <select class="form-control select2" name="satuan">
                          <option>Pilih Satuan Item</option>
                         <option value="m" <?php if ($satuan=="m"){echo "selected=selected";} ?> >Meter</option>
                         <option value="cm" <?php if ($satuan=="cm"){echo "selected=selected";} ?> >Centimeter</option>
                      </select>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-2 control-label">Harga (Rp) :</label>
                 <div class="col-sm-2">
                     <input type="text" class="form-control"  placeholder="IDR" name="harga" value="<?php echo $harga; ?>">
                 </div>
                </div>
                  
                                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <?php
                  if(empty($iditem))
                  {
                      echo '<input type="submit" class="btn btn-success" name="simpan" value="SIMPAN">';
                  }
                  else
                  {
                      echo '<input type="submit" class="btn btn-success" name="update" value="UPDATE">';
                  }
                  ?>
                  
                 <a href="?p=initem" class="btn btn-danger" type="reset"> BATAL</a>
                
               
              </div>
         
            </form>
          </div>
</div>
    </div>

  <div class="row">   
<div class="col-xs-12">
             <div class="box">
              
                <div class="box-header with-border">
             
                <input type="submit" name="del" value="Hapus" class="btn btn-danger">
                    
            </div>
              
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
            <thead>      
                <tr>
                  <th style="width: 10px">#</th>
                  <th style="width: 10px">No</th>
                  <th>Nama Item</th>
                  <th>Jenis Item</th>
                  <th>Satuan</th>
                  <th>Harga</th>
                 <th>Option</th>
                </tr>
                  </thead>                               
               
                  <tbody>
                      <?php
                   $data = $item->tampil($con);
                  $no=1;
                  foreach($data as $isi){
                  ?>
                <tr>
                    
                       
                    
                  <td> <input type="checkbox" name="iditem[]" value="<?php echo $isi['iditem']; ?>"></td>
                  <td> <?php echo $no; ?></td>
                  <td> <?php echo $isi['nmitem']; ?></td>
                  <td> <?php echo $isi['jenis']; ?> </td>
                  <td><?php echo $isi['satuan']; ?></td>
                  <td>Rp. <?php echo $isi['harga']; ?></td>
                    <td><a href="?p=initem&edit=<?php echo $isi['iditem']; ?>" class="btn-xs btn-info"> EDIT</a> 
                        <a href="?p=initem&hapus=<?php echo $isi['iditem']; ?>"class="btn-xs btn-danger">HAPUS</a>  
                    </td>
                    
                </tr>
                       <?php $no++; } ?>
                  </tbody>
                 
                  
              </table>
            </div>
            <!-- /.box-body -->
        </div>
</div>
    </div>
</section>

