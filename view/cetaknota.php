<script>
// window.print();
    //setTimeout(function(){window.location.href='?p=project'},3000)
</script>

<TITLE>Invoice</TITLE>
<style type="text/css">
 table.minimalistBlack {
  font-family: "Trebuchet MS", Helvetica, sans-serif;
  border: 1px solid #000000;
  
  text-align: left;
  border-collapse: collapse;
}
table.minimalistBlack td, table.minimalistBlack th {
  border: 1px solid #000000;
  padding: 2px 2px;
}
table.minimalistBlack tbody td {
  font-size: 11px;
}
table.minimalistBlack thead {
  background: #CFCFCF;
  background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  border-bottom: 1px solid #000000;
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

           <body onblur="">
          <table class="minimalistBlack">
              <thead>
                  <tr>
                  <th colspan="4">BUKTI PEMBAYARAN</th>
                 </tr>
              </thead>
              <tbody>
              <tr>
                <td colspan="4">Tanggal : <?php echo tgl_indo($tgl); ?>
                  <br>
                    Yth Kepada :<br> <?= $nmclient ?>
                   <br> <?= $idclient ?>
                  </td>    
              </tr>
                  <tr bgcolor="#CFCFCF">
                  <td>Nama Item</td>
                  <td>Dimensi</td>
                  <td>Hrg Satuan</td>
                  <td>Total</td>
                  </tr>
                  <?php
                        $dt=$transaksi->notaitem($con,$id,$tgl);
                        foreach($dt as $item)
                        {
                    ?>
                  <tr>
                  <td><?= $item['ket']?></td>
                  <td><?= $item['p'] , " x " , $item['l']?></td>
                  <td><?= "Rp " . number_format($item['harga'],2,',','.');?></td>
                  <td><?php $a=$item['p'];
                            $b=$item['l'];
                            $c=$item['harga'];
                            $x= ($a * $b) * $c;
                            echo "Rp " . number_format($x,2,',','.'); ?>
                      
                      
                      </td>
                     
                  </tr>
                  
                   <?php } ?>
                  
                  <tr>
                    <td colspan="3"><b>TOTAL :</b> </td>
                    <td><b><?= $harga ?></b></td>
                    
                  </tr>
                  <tr>
                  <td colspan="3"><b>DISKON :</b> </td>
                    <td><b><?= $diskon ?></b></td>
                  </tr>
                   <tr>
                  <td colspan="3"><b>TOTAL HARGA :</b> </td>
                   <td><b><?= $hargabayar ?></b></td>
                     
                  </tr>
                  
                  <tr>
                  <td colspan="4">Bayar : <?= $bayar ?><br> Kembali : <?= $kembali ?></td>
                  </tr>
                  <tr>
                      <td colspan="4">Terimakasih atas kepercayaan anda, <br>Barang yang sudah dibeli tidak dapat di tukar / dikembalikan. Terimakasih</td>
                  </tr>
                </tbody>
               
             
          </table>
               </body>
        
  