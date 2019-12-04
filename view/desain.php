<?php
$q=mysqli_query($con,"select * from client order by idclient desc limit 1");
$cek=mysqli_fetch_array($q);
$id=$cek['idclient'];


if(empty($idclient))
{
    $idclient=$id;
    $nmclient=$cek['nmclient'];
    $wktdesain=date('Y-m-d');
}



?>

<section class="content">
      <div class="row">
<div class="col-md-12">        
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Input Project</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="">
              <div class="box-body">
                    <div class="form-group">
                  <label class="col-sm-2 control-label">Waktu :</label>
                  <div class="col-sm-3">
                     
                    <input type="text" class="form-control"  placeholder="---" value="<?php echo tgl_indo($wktdesain); ?>" readonly>
                    <input type="hidden" class="form-control"  placeholder="---" name="wktdesain" value="<?php echo $wktdesain; ?>" readonly>
                    <input type="hidden" class="form-control" name="iduser" value="<?php echo $aktif['iduser']; ?>">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Client :</label>
                  <div class="col-sm-4">
                      <select class="form-control select2" name="idclient">
                          <?php 
                          $dt=$member->tampil($con);
                          echo '<option> Pilih Member </option>';
                          foreach ($dt as $isi)
                          {
                          ?>
                        <option value="<?php echo $isi['idclient']; ?>"><?php 
                              echo $isi['nmclient']." | ".$isi['alamat'];
                            ?> 
                          
                          </option>
                          <?php } ?>
                      </select>
                    
                  </div>
                    <div class="col-sm-1">
                         <a href="?p=inclient" class="btn btn-warning">Tambah Client</a>
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Item :</label>
                    <div class="col-sm-4">
                      <select class="form-control select2" name="iditem">
                          <?php
                            $data=$item->tampil($con);
                            echo '<option> Pilih Item </option>';
                            foreach ($data as $isi)
                            {
                          ?>
                          <option value="<?php echo $isi['iditem']; ?>" <?php if($iditem==$isi['iditem']){echo "selected=selected";}else{echo $isi['iditem'];} ?>><?php echo $isi['nmitem']; ?></option>
                          <?php } ?>
                      </select>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-2 control-label">Panjang (cm) :</label>
                 <div class="col-sm-2">
                     <input type="text" class="form-control"  placeholder="..." name="panjang" value="<?php echo $panjang; ?>">
                 </div>
                </div>
                  
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Lebar (cm) :</label>
                 <div class="col-sm-2">
                     <input type="text" class="form-control"  placeholder="..." name="lebar" value="<?php echo $lebar; ?>">
                 </div>
                </div>
                  
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Keterangan :</label>
                 <div class="col-sm-5">
                     <input type="text" class="form-control"  placeholder="Keterangan" name="ket" value="<?php echo $ket; ?>">
                 </div>
                </div>
                   
              
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                  <?php
                  if(empty($iddesain))
                  {
                      echo '<input type="submit" class="btn btn-success" name="simpan" value="SIMPAN">';
                  }
                  else
                  {
                      echo '<input type="submit" class="btn btn-success" name="update" value="UPDATE">';
                  }
                  ?>
                  
                 <a onClick="window.history.back(-1)" class="btn btn-danger" type="reset"> BATAL</a>
                
               
              </div>
         
            </form>
          </div>
</div>


     
    </div>

  <div class="row">   
<div class="col-xs-12">
          <div class="box">
             <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
            <thead>      
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Waktu</th>
                  <th>Atas Nama</th>
                  <th>Jenis</th>
                  <th>Keterangan</th>
                  <th>P X L</th>
                 <th>Option</th>
                </tr>
                  </thead>  
                  <tbody>
                  <?php
                  $iduser=$aktif['iduser'];
                  $data = $desain->tampil($con,$iduser);
                  $no=1;
                  foreach($data as $isi){
                  ?>
                  
                <tr>
                  <td> <?php echo $no; ?> </td>
                  <td> <?php echo tgl_indo($isi['wktdesain']); ?> </td>
                  <td> <?php echo $isi['nmclient']; ?> </td>
                  <td><?php echo $isi['nmitem']; ?></td>
                  <td><?php echo $isi['ket']; ?></td>
                  <td><?php echo $isi['p']; ?> x <?php echo $isi['l']; ?> (<?php echo $isi['satuan']; ?>)</td>
                    <td>
                        <?php 
                     
                        if ($isi['status']=="0")
                        {
                        ?>
                        <a href="?p=indes&edit=<?php echo $isi['iddesain']; ?>" class="btn-xs btn-info"> EDIT</a> 
                        <a href="?p=dtdes&hapus=<?php echo $isi['iddesain']; ?>"class="btn-xs btn-danger">HAPUS</a>  
                        <?php
                      }
                      else
                      {
                          echo '<a class="btn-sm btn-success">LUNAS</a>';
                      }
                        ?>
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

