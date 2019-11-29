<section class="content">
  <div class="row">   
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">DATA PROJECT DESAIN  <br><br><a href="?p=indes" class="btn-sm btn-info" type="reset"><I class="fa fa-plus-circle"></I> TAMBAH DATA</a>
                  
               
                </h3>
            </div>
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