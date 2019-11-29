<?php 
class induk{

function login($con,$user,$pass)
	{
		$q=mysqli_query($con,"select * from user where username='$user' and pass='$pass'");
        $cek=mysqli_fetch_array($q);
        if (!empty($cek[0]))
        {
            $a=mysqli_query($con,"select level from user where username='$user'");
            $b=mysqli_fetch_array($a);
            if ($b['level']=="des")
            {
                session_start();
                $_SESSION["username"] = $user;
                $_SESSION["level"]= $b['level'];
                header("location:?p=des");
                
            }else if ($b['level']=="kas")
            {
                session_start();
                $_SESSION["username"] = $user;
                $_SESSION["level"]= $b['level'];
                header("location:?p=kas");
                
            }else if ($b['level']=="adm")
            {
                session_start();
                $_SESSION["username"]=$user;
                $_SESSION["level"]=$b['level'];
                header("location:?p=kas");
                    
            }
            
        }else
        {
            echo '<script>alert("MAAF, USERNAME/PASSWORD SALAH, SILAHKAN ULANGI KEMBALI ATAU HUBUNGI ADMIN");window.location.href=""</script>';
        }
    }
    
    function tampiluser($con)
    {
       $list=array();
        $q=mysqli_query($con,"select * from user");
        while($data=mysqli_fetch_array($q))
        {
            $list[]=$data;
        }
        return $list;
    }
    
    function edituser($con,$iduser)
    {
        $q=mysqli_query($con,"select * from user where iduser='$iduser'");
        $data=mysqli_fetch_array($q);
        return $data;
            
    }
    
    function simpanuser($con,$nama,$username,$pass,$level)
    {
        $q=mysqli_query($con,"insert into user value('','$nama','$username','$pass','$level','')");
        if ($q)
        {
            echo '<script>alert("DATA BERHASIL SIMPAN");window.location.href=""</script>';
        }else
        {
            echo '<script>alert("DATA GAGAL SIMPAN");window.location.href=""</script>';
        }
    }
    
    function hapususer($con,$iduser)
    {
        $q=mysqli_query($con,"delete from user where iduser='$iduser'");
        if($q)
        {
             echo '<script>alert("DATA BERHASIL DIHAPUS");window.location.href=""</script>';
        }else
        {
             echo '<script>alert("DATA GAGAL DIHAPUS");window.location.href=""</script>';
        }
    }
    
    function updateuser($con,$nama,$username,$pass,$level,$iduser)
    {
        $q=mysqli_query($con,"update user set nama='$nama', username='$username',pass='$pass',level='$level',foto='' where iduser='$iduser'");
        if($q)
        {
            echo '<script>alert("DATA BERHASIL DIUPDATE");window.location.href="?p=setuser"</script>';
        }else
        {
            echo '<script>alert("DATA GAGAL UPDATE");window.location.href=""</script>';
        }
    }
    
    
    
    
	
	}
    


?>