<script>
    window.print();
    //setTimeout(function(){window.location.href='?p=laptransaksi1'},3000)
</script>

<TITLE>Invoice</TITLE>
<style type="text/css">
 table.minimalistBlack {
  font-family: "Trebuchet MS", Helvetica, sans-serif;
  border: 1px solid #000000;
  width: 800px;
  text-align: left;
  border-collapse: collapse;
}
table.minimalistBlack td, table.minimalistBlack th {
  border: 1px solid #000000;
  padding: 2px 2px;
}
table.minimalistBlack tbody td {
  font-size: 12px;
}
table.minimalistBlack thead {
  background: #CFCFCF;
  background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  border-bottom: 1px solid #000000;
    text-align: center;
}
table.minimalistBlack thead th {
  font-size: 12px;
  font-weight: bold;
  color: #000000;
  text-align: center;
  border-left: 1px solid #D0E4F5;
}
table.minimalistBlack thead th:first-child {
  border-left: none;
}

table.minimalistBlack tfoot {
  font-size: 12px;
  font-weight: bold;
  color: #000000;
  background: #CFCFCF;
  background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  border-top: 1px solid #000000;
}
table.minimalistBlack tfoot td {
  font-size: 12px;
}
    </style>

<?php 
include("mod/tglindo.php");
 ?>

           <body onfocus="window.close();" >
               
               <h3>LAPORAN TRANSAKSI</h3>
               
          <table class="minimalistBlack">
              <thead>
                  <tr>
                      <td >No</td>
                      <td >Tanggal</td>
                      <td >Client</td>
                      <td >Det. Order</td>
                      <td >Harga</td>
                      <td >Diskon</td>
                      <td >Total <br> Harga</td>
                 </tr>
                  
              </thead>
              
              <?php 
             // $tgl1=$_POST['tgl1'];
              //$tgl2=$_POST['tgl2'];
              $dt=$transaksi->laptransaksiall($con);
              $no=1;
                
              foreach($dt as $isi)
              {
              ?>
              <tbody>
                  
                  <tr>
                      <td><?= $no ?></td>
                      <td><?= tgl_indo($isi['tanggal']) ?></td>
                      <td><?= $isi['nmclient'] ?></td> 
                      <td>
                        
                          <?php 
                          $id=$isi['idclient'];
                          $tgl=$isi['tanggal'];
                            $q=$transaksi->orderanclient($con,$id,$tgl);
                            foreach($q as $item)
                            {
                                $a=$item['p'];
                                $b=$item['l'];
                                $h=($a * $b) * $item['harga'];
                            ?>
                                <li><?= $item['nmitem'], " - ", $item['p'],"x",$item['l']," ",$item['satuan']," @ ","Rp " . number_format($item['harga'],0,',','.'), " = ", "Rp " . number_format($h,0,',','.') ?></li>    
                          
                          <?php  
                            }                          
                          ?>
                          
                      </td> 
                      <td><?= "Rp " . number_format($isi['harga'],2,',','.') ?></td> 
                      <td><?= "Rp " . number_format($isi['diskon'],2,',','.') ?></td> 
                      <td><?= "Rp " . number_format($isi['hargabayar'],2,',','.') ?></td> 
                      
                  </tr>
                  
                  
                 
                 
                  
                 
                </tbody>
               <?php $no++; } ?>
             
          </table>
               </body>