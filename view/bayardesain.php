<?php 
    
$tp=$transaksi->clientbayar($con,$id);
if ($tp['stclient']=="aktif")
{
    $dis="10"/"100";
    $stclient="Member Aktif";
    $btn="success";
}else
{
    $dis="0";
    $stclient="Member Non Aktif";
    $btn="danger";
}


?>

<section class="content">
<div class="row">
<div class="col-md-12">        
<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Pembayaran</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="">
              <div class="box-body">
                  
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control"  value="<?php echo tgl_indo($tgl); ?>" readonly>
                    <input type="hidden" class="form-control"  placeholder="Atas Nama" name="tanggal" value="<?php echo $tgl; ?>">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label class="col-sm-2 control-label">Atas Nama :</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control"  placeholder="Atas Nama" name="nmclient" value="<?php echo $tp['nmclient']; ?>" readonly>
                      
                      
                  </div>
                    <div class="col-sm-4">
                    <label class="btn btn-<?= $btn ?>"><?= $stclient?></label>
                  </div>
                </div>
                              
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Bayar (Rp) :</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control"  placeholder="Bayar" name="bayar" >
                  </div>
                </div>
                                    
              </div>
                
                  
                
              <!-- /.box-body -->
              <div class="box-footer">
                  <?php
                  if(empty($idtrans))
                  {
                      echo '<input type="submit" class="btn btn-success" name="simpan" value="BAYAR">';
                  }
                  else
                  {
                      echo '<input type="submit" class="btn btn-success" name="update" value="UPDATE">';
                  }
                  ?>
                  
                 <a href="?p=project" class="btn btn-danger" type="reset"> BATAL</a>
                
               
              </div>
         
            
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
                  <th>Nama Item</th>
                  <th>Jenis Item</th>
                  <th>Dimensi</th>
                  <th>Harga Satuan</th>
                  <th>Total Harga</th>
                
                </tr>
                  </thead>                               
                  <?php
                   $list=$transaksi->orderanclient($con,$id,$tgl);
                  $no=1;
                  foreach ($list as $isi)
                  {
                  ?>
                  <tbody>
                <tr>
                  <td> <?php echo $no; ?> </td>
                  <td> <?php echo $isi['ket']; ?></td>
                  <td> <?php echo $isi['nmitem']," - ", $isi['jenis']; ?> </td>
                  <td><?php echo $isi['p']," x ",$isi['l']," ",$isi['satuan']; ?></td>
                  <td>Rp. <?php echo number_format($isi['harga'],0,',','.') ?></td>
                  <td>
                    <?php 
                      $id=$isi['iddesain'];
                      $cek=mysqli_query($con,"select (p * l)*harga as jumlah from desain join item on desain.iditem = item.iditem where iddesain='$id'");
                      while($nah=mysqli_fetch_array($cek))
                      {
                          $totalnya[]=$nah['jumlah'];
                          echo "Rp. ",number_format($nah['jumlah'],0,',','.');
                      }
                      
                      ?>
                    </td>
                </tr>
                  </tbody>
                  <?php $no++; } ?>
                  <tfoot>
                  <tr>
                      <td colspan="5" align="right"><b>Jumlah</b></td>
                      <td><b>
                       <?php 
                                         $jumlahnya=array_sum($totalnya);
                          echo "Rp " . number_format($jumlahnya,0,',','.');

                                      ?>
                         
                      
                      </b></td>
                  <td></td>
                      </tr>
                      
                      <tr>
                          <td colspan="5" align="right">
                          <b>Discount (10% untuk member aktif)</b>
                          </td>
                          <td>
                          <b><?php $dis2 = $dis * $jumlahnya; echo "Rp " . number_format($dis2,0,',','.'); ?></b>
                          </td>
                      </tr>
                      
                       
                      <tr>
                          <td colspan="5" align="right">
                          <b>Harus Dibayar</b>
                          </td>
                          <td>
                          <b><u><?php $db = $jumlahnya - $dis2; echo "Rp " . number_format($db,0,',','.');  ?></u></b>
                          </td>
                      </tr>
                  </tfoot>
                  
              </table>
                <input name="idclient" type="hidden" value="<?php echo $isi['idclient']; ?>">
                <input name="diskon" type="hidden" value="<?php echo $dis2; ?>">
                <input name="hargabayar" value="<?php echo $db; ?>" type="hidden">
                <input name="harga" value="<?php echo $jumlahnya; ?>" type="hidden">
            </div>
            <!-- /.box-body -->
        </div>
</div>
    </div>
    </form>
</section>


