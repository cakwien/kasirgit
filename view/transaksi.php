<section class="content">
  <div class="row">   
<div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">DATA TRANSAKSI
                <br>
                <br>
                  <a href="?p=laptransaksi1" class="btn-sm btn-info"><i class="fa fa-print"></i> CETAK DATA TRANSAKSI</a>
                <br>
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
                  <th>Harga</th>
                  <th>Diskon</th>
                  <th>Total Harga</th>
                  <th>Bayar</th>
                  <th>Kembali</th>
                </tr>
                  </thead>                               
                  <?php
                   $data = $transaksi->tptrans($con);
                  $no=1;
                  foreach($data as $isi){
                  ?>
                  <tbody>
                <tr>
                  <td><?php echo $no; ?> </td>
                  <td><?php echo tgl_indo($isi['tanggal']); ?> </td>
                  <td><?php echo $isi['nmclient']; ?> </td>
                  <td><?php 
                      $id=$isi['idclient'];  
                      $tgl=$isi['tanggal'];
                      $q=mysqli_query($con,"select * from desain where idclient='$id' and wktdesain='$tgl'");
                      while($tp=mysqli_fetch_array($q))
                      {
                         echo "<li>",$tp['ket'],"</li>";
                      }
                      ?></td>
                    
                    <td><?php echo number_format($isi['harga'],0,',','.'); ?>  </td>
                    <td><?php echo number_format($isi['diskon'],0,',','.'); ?>  </td>
                    <td><?php echo number_format($isi['hargabayar'],0,',','.'); ?>  </td>
                    <td><?php echo number_format($isi['bayar'],0,',','.');  ?></td>
                    <td><?php echo number_format($isi['kembali'],0,',','.');  ?></td>
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