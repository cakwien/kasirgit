<div class="col-md-6">        
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">User Setting</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="">
              <div class="box-body">
                  
                   <div class="form-group">
                  <label class="col-sm-3 control-label">Nama User:</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo $nama; ?>">
                      <input type="hidden" name="iduser" value="<?php echo $iduser; ?>">
                  </div>
                  </div>
                  
                <div class="form-group">
                  <label class="col-sm-3 control-label">Username :</label>
                  <div class="col-sm-5">
                    
                    <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $username; ?>">
                  </div>
                  </div>
                  
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Password :</label>
                  <div class="col-sm-5">
                    <input type="password" class="form-control" name="pass" placeholder="Password" value="<?php echo $pass; ?>">
                  </div>
                  </div>
                  
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Hak Akses :</label>
                  <div class="col-sm-7">
                    
                   <select name="level" class="form-control">
                      <option value="">--- PILIH HAK AKSES ---</option>
                      <option value="des" <?php if ($level=="des"){echo "selected=selected";} ?> >Designer</option>
                      <option value="kas" <?php if ($level=="kas"){echo "selected=selected";} ?>>Kasir</option>
                      </select>
                  </div>
                  </div>
                  
                </div>
                <div class="box-footer">
               
                 <?php
                  if(empty($iduser))
                  {
                      echo '<input type="submit" class="btn btn-success" name="simpan" value="SIMPAN">';
                  }
                  else
                  {
                      echo '<input type="submit" class="btn btn-info" name="update" value="UPDATE">';
                  }
                  ?>
                   <a href="?p=setuser" class="btn btn-danger" type="reset">BATAL</a>
                  
              </div>
    </form>
    </div>
</div>

<div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                  
             
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama Lengkap</th>
                  <th>Username</th>
                  <th>Hak Akses</th>
                  <th>Option</th>
                </tr>
               <?php
                  $dt=$induk->tampiluser($con);
                  $no=1;
                  foreach($dt as $isi)
                  {
                ?>
                 <tr>
                  <td style="width: 10px"><?php echo $no; ?> </td>
                  <td><?php echo $isi['nama']; ?></td>
                  <td><?php echo $isi['username']; ?></td>
                  <td><?php if ($isi['level']=="des"){
                    
                    echo "<a class='btn-xs btn-success'>DESIGNER</a>";
                }else
                {
                     echo "<a class='btn-xs btn-warning'>KASIR</a>";
                }
                        
                      ?>
                      
                      
                      </td>
                  <td>
                      <a class="btn-xs btn-info" href="?p=setuser&edit=<?php echo $isi['iduser']; ?>">EDIT</a>
                      <a class="btn-xs btn-danger" href="?p=setuser&hapus=<?php echo $isi['iduser']; ?>">HAPUS</a>
                      </td>
                </tr>
                  <?php $no++; } ?>
              
                </table>
              </div>
    </div>
</div>
