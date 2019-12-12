<section>
<div class="row">  
<div class="col-xs-12">
          <div class="box">
              <div class="box-header">
              <h3 class="box-title">DATA CLIENT  <br><br><a href="?p=inclient" class="btn-sm btn-info" type="reset"><I class="fa fa-plus-circle"></I> TAMBAH DATA</a>
                  
               
                </h3>
            </div>
             <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
            <thead>      
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Atas Nama</th>
                  <th>Alamat</th>
                  <th>No. HP</th>
                  <th>Status Client</th>
                  <th>Option</th>
                </tr>
                  </thead>  
                  <tbody>
                  <?php
                  $iduser=$aktif['iduser'];
                  $data = $member->tampil($con,$iduser);
                  $no=1;
                  foreach($data as $isi){
                  ?>
                  
                <tr>
                  <td> <?php echo $no; ?> </td>
                  <td> <?php echo $isi['nmclient']; ?> </td>
                  <td> <?php echo $isi['alamat']; ?> </td>
                  <td><?php echo $isi['nohp']; ?></td>
                  <td><?php echo $isi['stclient']; ?></td>
                    <td>
                        <a href="?p=indes&idclient=<?php echo $isi['idclient']; ?>" class="btn-sm btn-info"> Pilih</a>
                        <a href="?p=client&hapus=<?php echo $isi['idclient']; ?>" class="btn-sm btn-danger"> Hapus</a>
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
