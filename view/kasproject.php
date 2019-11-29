<section class="content">
  <div class="row">   
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">DATA PROJECT DESAIN
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
                  <th>Designer</th>
                 <th>Option</th>
                </tr>
                  </thead>                               
                  <?php
                   $data = $desain->tampilall($con);
                  $no=1;
                  foreach($data as $isi){
                  ?>
                  <tbody>
                <tr>
                  <td> <?php echo $no; ?> </td>
                  <td> <?php echo tgl_indo($isi['wktdesain']); ?> </td>
                  <td> <?php echo $isi['nmclient']; ?> </td>
                  <td><?php echo $isi['nmitem']; ?></td>
                  <td><?php echo $isi['ket']; ?></td>
                  <td><?php echo $isi['p']; ?> x <?php echo $isi['l']; ?> (<?php echo $isi['satuan']; ?>)</td>
                    <td><?php echo $isi['nama']; ?></td>
                    <td><?php 
                        if ($isi['status']=="0")
                        {
                            $st="danger";
                            $tst="Blm Lunas";
                            $ref="";
                        }else
                        {
                            $st="success";
                            $tst="Lunas";
                        }
                        
                        ?>
                        <a href="?p=<?php if($isi['status']=="0"){ echo "bayar&id=". $isi['iddesain'];} else {echo "wes";} ?>"class="btn-xs btn-<?php echo $st; ?>"><?php echo $tst; ?></a>  
                    </td>
                </tr>
                  </tbody>
                  <?php $no++; } ?>
                  
              </table>
            </div>
            <!-- /.box-body -->
        </div>
</div>
    </div>
</section>