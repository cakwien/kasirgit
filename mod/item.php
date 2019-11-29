<?php 

class item{
    
    function simpan($con,$nmitem,$jenis,$satuan,$harga)
    {
        
        $q=mysqli_query($con,"insert into item values('','$nmitem','$jenis','$satuan','$harga')");
        if ($q)
        {
            echo '<script>alert("DATA ITEM BERHASIL DISIMPAN");window.location.href="";</script>';
            $kejadian="berhasil simpan item";
            $loginfo=date('d-m-Y H:i:s').'-'.$user.'-'.$kejadian;
            tulisLog($loginfo);
        }else
        {
            echo '<script>alert("DATA GAGAL DISIMPAN, ULANGI LAGI");window.location.href="";</script>';
            $kejadian="gagal simpan item";
            $loginfo=date('d-m-Y H:i:s').'-'.$user.'-'.$kejadian;
            tulisLog($loginfo);
        }
    }
    
    function tampil($con)
    {
        $list=array();
        $q=mysqli_query($con,"select * from item");
        while($dt=mysqli_fetch_array($q))
        {
            $list[]=$dt;
        }
        return $list;
    }
    
    function edit($con,$iditem)
    {
        $q=mysqli_query($con,"select * from item where iditem='$iditem'");
        $data=mysqli_fetch_array($q);
        return $data;
    }
    
    function hapus($con,$iditem)
    {
        $q=mysqli_query($con,"delete item where iditem='$iditem'");
        if($q)
        {
            echo '<script>alert("DATA BERHASIL DIHAPUS");window.location.href="";</script>';
        }else
        {
            echo '<script>alert("DATA GAGAL DIHAPUS, ULANGI LAGI");window.location.href="";</script>';
        }
    }
    
    function rubah($con,$nmitem,$jenis,$satuan,$harga,$iditem)
    {
        $q=mysqli_query($con,"update item set nmitem='$nmitem',jenis='$jenis',satuan='$satuan',harga='$harga' where iditem='$iditem'");
        if($q)
        {
           echo '<script>alert("DATA BERHASIL DIUPDATE");window.location.href="?p=initem";</script>';
        }else
        {
            echo '<script>alert("DATA GAGAL DIUPDATE");window.location.href="";</script>';
        }
    }
}

?>