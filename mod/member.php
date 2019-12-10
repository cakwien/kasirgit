<?php
 
class member{
    
    function simpan($con,$nmclient,$alamat,$nohp,$tgl,$status)
    {
        $q=mysqli_query($con,"insert into client value('','$nmclient','$alamat','$nohp','$tgl','$status')");
        if($q)
        {
            echo '<script>alert("Data Member ditambahkan");window.location.href="?p=indes";</script>';
        }else
        {
             echo '<script>alert("Data Member Gagal ditambahkan");window.location.href="?p=indes";</script>'; 
        }
            
    }
    
    function tampil($con)
    {
        $list=array();
        $q=mysqli_query($con,"select * from client");
        while($data=mysqli_fetch_array($q))
        {
            $list[] = $data;
        }
        return $list;
    }
    
    function hapus($con,$idclient)
    {
        $q=mysqli_query($con,"delete from client where idclient='$idclient'");
        if($q)
        {
            $msg="Member berhasil di hapus";
        }else
        {
            $msg="Member gagal dihapus";
        }
    }
    
    function edit($con,$idclient)
    {
        $q=mysqli_query($con,"select * from client where idclient='$idclient'");
        $data=mysqli_fetch_array($q);
        return $data;
    }
    
    function update($con,$nmclient,$alamat,$nohp,$status,$idmember)
    {
        $q=mysqli_query($con,"update client set nmclient='$nmclient', alamat='$alamat', nohp='$nohp' , status='$status' where idclient='$idclient'");
        if($q)
        {
            $msg="Member berhasil diupdate";
        }else
        {
            $msg="Member gagal diupdate";
        }
    }
    
    function cekmember($con,$idclient)
    {
        $q=mysqli_query($con,"select stclient from client where idclient='$idclient'");
        $st=mysqli_fetch_array($q);
        return $st;
    }
    
    function nmclient($con,$idclient)
    {
        $q=mysqli_query($con,"select nmclient from client where idclient='$idclient'");
        $nm=mysqli_fetch_array($q);
        return $nm;
    }
    
   
}

?>