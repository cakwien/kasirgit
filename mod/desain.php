<?php 
class desain{
    
    //TAMPILKAN DATA DESAIN
    function tampil($con,$iduser)
    {
        $list=array();
        $q=mysqli_query($con,"select * from desain join client on desain.idclient=client.idclient join user on desain.iduser=user.iduser join item on item.iditem=desain.iditem where user.iduser='$iduser'");
        while($data=mysqli_fetch_array($q))
        {
            $list[]=$data;
        }
        return $list;
        
       
    }
    //TAMPILKAN CLIENT PER MASING-MASING DESAIN
    function tpclient($con)
    {
        $list=array();
        $q=mysqli_query($con,"select * from desain left outer join client on client.idclient=desain.idclient join user on desain.iduser=user.iduser join item on item.iditem=desain.iditem where user.iduser='$iduser'");
        while($data=mysqli_fetch_array($q))
        {
            $list[]=$data;
        }
        return $list;
    }
    
    function tpdesclient($con,$idclient)
    {
        $list=array();
        $q=mysqli_query($con,"select * from desain join item on desain.iditem=item.iditem where idclient='$idclient'");
        while($data=mysqli_fetch_array($q))
        {
            $list[]=$data;
        }
        return $list;
    }
    // TAMPILKAN DATA PEMBAYARAN
    function tpbayar($con,$iddesain)
    {
        $q=mysqli_query($con,"select * from desain join user on desain.iduser=user.iduser join item on item.iditem=desain.iditem where desain.iddesain='$iddesain'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    
    
    function itungharga($panjang,$lebar,$harga)
    {
        $dimensi = $panjang * $lebar;
        $hasil = $harga * $dimensi;
        return $hasil;
    }
    
    function tampilall($con)
    {
        $list=array();
        $q=mysqli_query($con,"select * from desain join user on desain.iduser=user.iduser join item on item.iditem=desain.iditem");
        while($data=mysqli_fetch_array($q))
        {
            $list[]=$data;
        }
        return $list;
    }
    
    function edit($con,$iddesain)
    {
        $q=mysqli_query($con,"select * from desain where iddesain='$iddesain'");
        $data=mysqli_fetch_array($q);
        return $data;
    }
    
    function simpan($con,$wktdesain,$iduser,$nmclient,$iditem,$panjang,$lebar,$ket)
    {
        $q=mysqli_query($con,"insert into desain value('','$wktdesain','$iduser','$nmclient','$iditem','$panjang','$lebar','$ket','0')");
        if ($q)
        {
            echo '<script>alert("DATA BERHASIL DISIMPAN");window.location.href="";</script>';
        }else
        {
            echo '<script>alert("DATA GAGAL DISIMPAN");window.location.href="";</script>';
        }
    }
    
    function hapus($con,$iddesain)
    {
        $q=mysqli_query($con,"delete from desain where iddesain='$iddesain'");
        if($q)
        {
            echo '<script>alert("DATA BERHASIL DIHAPUS");window.location.href="?p=dtdes";</script>';
        }else
        {
            echo '<script>alert("DATA GAGAL DIHAPUS, ULANGI LAGI");window.location.href="?p=dtdes";</script>';
        }
    }
    
    function update($con,$wktdesain,$iduser,$nmclient,$iditem,$panjang,$lebar,$ket,$iddesain)
    {
        $q=mysqli_query($con,"update desain set wktdesain='$wktdesain',iduser='$iduser',nmclient='$nmclient',iditem='$iditem',p='$panjang',l='$lebar', ket='$ket' where iddesain='$iddesain'");
        if($q)
        {
             echo '<script>alert("DATA BERHASIL DIUPDATE");window.location.href="?p=dtdes";</script>';
        }else
        {
             echo '<script>alert("DATA GAGAL DIUPDATE");window.location.href="";</script>';
        }
    }
    
    function GantiSt($con,$iddesain)
    {
        $q=mysqli_query($con,"update desain set status='1' where iddesain='$iddesain'");
    }
    
    function spclient($con,$nmclient,$tgl,$status)
    {
        
        $q=mysqli_query($con,"insert into client value('','$nmclient','$tgl')");
        if ($q)
        {
            echo '<script>alert("CUST DITAMBAH");window.location.href="?p=indes";</script>';
        }else
        {
            echo '<script>alert("GAGAL DITAMBAHKAN");window.location.href="?p=indes";</script>';
        }
    }
    
    function ceklunas($con,$id)
    {
        $q=mysqli_query($con,"select status from desain where iddesain='$id'");
        $st=mysqli_fetch_array($q);
        return $q;
    }
    
    function cekbayarbyclient($con,$id)
    {
        $q=mysqli_query($con,"select status from desain where idclient='$id'");
        $st=mysqli_fetch_array($q);
        return $q;
    }
    
    function listorder($con,$id,$tgl,$id2)
    {
        $list=array();
        $q=mysqli_query($con,"select * from desain join item on desain.iditem=item.iditem join client on desain.idclient=client.idclient where desain.idclient='$id' and wktdesain='$tgl' and iduser='$id2'");
        while($data=mysqli_fetch_array($q))
        {
            $list[]=$data;
        }
        return $list;
    }
}
?>