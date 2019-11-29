<?php 

class transaksi{
    
    function bayar($con,$tanggal,$idclient,$harga,$diskon,$hargabayar,$bayar,$kembali)
    {
        $q=mysqli_query($con,"insert into transaksi value('','$tanggal','$idclient','$harga','$diskon','$hargabayar','$bayar','$kembali')");
        if ($q)
        {
            echo '<script>alert("PEMBAYARAN BERHASIL");window.location.href="?p=nota";</script>';
            $q2=mysqli_query($con,"update desain set status='1' where idclient='$idclient' and wktdesain='$tanggal'");
        }else
        {
            echo '<script>alert("PEMBAYARAN GAGAL");window.location.href="";</script>';
        }
    }
    
    function tptrans($con)
    {
        $list=array();
        $q=mysqli_query($con,"select * from transaksi join client on transaksi.idclient=client.idclient");
        while($data=mysqli_fetch_array($q))
        {
            $list[] = $data;
        }
        return $list;
            
    }
   
    
    function tampil($con)
    {
        $list=array();
        $q=mysqli_query($con,"select * from transaksi
                                join desain on transaksi.iddesain=desain.iddesain
                                join user on desain.iduser=user.iduser
                                join item on desain.iditem=item.iditem");
        while($data=mysqli_fetch_array($q))
        {
            $list[]=$data;
        }
        return $list;
    }
    
    function ctnota($con)
    {
        $q=mysqli_query($con,"select * from transaksi
                                join client on transaksi.idclient=client.idclient
                                ORDER BY idtrans
                                DESC LIMIT 1");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    function notaitem($con,$id,$tgl)
    {
        $list=array();
        $q=mysqli_query($con,"select * from desain join item on desain.iditem=item.iditem where desain.idclient='$id' and wktdesain='$tgl'");
        while($data=mysqli_fetch_array($q))
        {
            $list[]=$data;
        }
        return $list;
        
    }
    
    function laptransaksi($con,$tgl1,$tgl2)
    {
        $list=array();
        $q=mysqli_query($con,"select * from transaksi join client on client.idclient=transaksi.idclient
                                where tanggal between '$tgl1' and '$tgl2'
                                ORDER BY tanggal DESC");
        while($data=mysqli_fetch_array($q))
        {
            $list[]=$data;
        }
        return $list;
    }
    
    function laptransaksiall($con)
    {
        $list=array();
            $q=mysqli_query($con,"select * from transaksi join client on client.idclient=transaksi.idclient
                                    ORDER BY tanggal DESC");
        while($data=mysqli_fetch_array($q))
        {
            $list[]=$data;
        }
        return $list;
    }
    
    function lapitem($con,$id)
    {
        
        $list=array();
            $q=mysqli_query($con,"select * from desain join item on desain.iditem=item.iditem where idclient='$id'");
        while($data=mysqli_fetch_array($q))
        {
            $list[]=$data;
        }
        return $list;
    }
    
    function clientbayar($con,$id)
    {
        $q=mysqli_query($con,"select * from desain join client on desain.idclient=client.idclient where desain.idclient='$id'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    function orderanclient($con,$id,$tgl)
    {
        $list=array();
        $q=mysqli_query($con,"select * from desain join item on desain.iditem=item.iditem where idclient='$id' and wktdesain='$tgl'");
        while($data=mysqli_fetch_array($q))
        {
            $list[]=$data;
        }
        return $list;
    }
    
    function cekbayar($con,$id,$tgl)
    {
        $q=mysqli_query($con,"select status from desain where idclient='$id' and wktdesain='$tgl' limit 1");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
}

?>