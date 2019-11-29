<section class="content">
  <div class="row">   
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">DATA PROJECT DESAIN</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
            <thead>      
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Waktu</th>
                  <th>Atas Nama</th>
                  <th>Macam Order</th>
                 <th>Status</th>
                </tr>
                  </thead>                               
                  <?php
                   $data=mysqli_query($con,"select * from desain join client on desain.idclient=client.idclient group by wktdesain desc");
                  $no=1;    
                    while($isi1=mysqli_fetch_array($data))
                    {
                  ?>
                  <tbody>
                <tr>
                  <td><?php echo $no; ?> </td>
                  <td><?php echo tgl_indo($isi1['wktdesain']); ?> </td>
                  <td><?php echo $isi1['nmclient']; ?> </td>
                  <td>
                      <?php 
                        $id=$isi1['idclient'];
                        $tgl=$isi1['wktdesain'];
                        $listorder=$desain->listorder($con,$id,$tgl);
                        foreach($listorder as $o)
                        { ?>
                      
                           <li><?php echo $o['ket']; ?></li> 
                      
                        <?php } ?>
                      
                      
                      </td>
                  <td>  <?php
                            $dt=$transaksi->cekbayar($con,$id,$tgl);
                            if($dt['status']=="0")
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
                        <a href="?p=<?php if($dt['status']=="0"){ echo "bayar&id=". $id ."&tgl=".$tgl; } else {echo "wes";} ?>"class="btn btn-<?php echo $st; ?>"><?php echo $tst; ?></a> 
                        
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