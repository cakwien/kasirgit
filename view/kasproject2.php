<section class="content">
  <div class="row">   
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">DATA PROJECT DESAIN 2
                </h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
            <thead>      
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Waktu</th>
                  <th>Atas Nama</th>
                  <th>Macam Order</th>
                 <th>Option</th>
                </tr>
                  </thead>                               
                  <?php
                   $data=mysqli_query($con,"select wktdesain from desain order by wktdesain desc");
                  $no=1;    
                    while($isi1=mysqli_fetch_array($data))
                    {
                  ?>
                  <tbody>
                <tr>
                  <td> <?php echo $no; ?> </td>
                  <td> <?php echo tgl_indo($isi1['wktdesain']); ?> </td>
                  <td> <?php 
                        $w1=$isi1['wktdesain'];
                        $q1=mysqli_query($con,"select distinct * from desain join client on desain.idclient=client.idclient where desain.wktdesain='$w1'");
                        $d1=mysqli_fetch_array($q1);
                        echo $d1['nmclient'];
                      ?> </td>
                  <td> 
                      <?php 
                        $id=$d1['idclient'];
                        $q=mysqli_query($con,"select ket from desain where idclient='$id'");
                        while($dt=mysqli_fetch_array($q))
                        { ?>
                            <li><?php echo $dt['ket']; ?></li>
                       <?php }
                      
                      ?>
                    
                    
                    </td>
                    <td>
                        <?php 
                            $id=$isi['idclient'];
                            $cekstatus=mysqli_query($con,"select * from desain where idclient='$id'");
                            $cek=mysqli_fetch_array($cekstatus);
                            if ($cek['status']=="0")
                            {
                                $st="danger";
                                $tst="BAYAR";
                                $ref="";
                            }else
                            {
                                $st="success";
                                $tst="LUNAS";
                            }   
                        ?>
                        <a href="?p=<?php if($cek['status']=="0"){ echo "bayar&idclient=". $id; } else {echo "wes";} ?>"class="btn btn-<?php echo $st; ?>"><?php echo $tst; ?></a> 
                        
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