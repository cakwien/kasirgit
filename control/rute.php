<?php 

if(!empty($_GET["p"]))
{
	$p = strtolower($_GET["p"]);

	if($p == "login")
	{
		//PROSES LOGIN
		if (!empty($_POST["user"]) && !empty($_POST["pass"])) 
		{
			$user = $_POST["user"];
			$pass = $_POST["pass"];
            $waktu = date('Y-m-d H:i:s');
            $induk -> login($con,$user,$pass);
            
		}
		include("view/login.php");
	}
    else if ($p=="logout")
    {
        
        session_start();
        $kejadian="Logout";
         $loginfo=date('d-m-Y H:i:s').' - '.$user.' - '.$kejadian;
         tulisLog($loginfo);
        session_destroy();
        
        header('location:?p=login');
            
    }

    else if ($p=="des")
    {
        
        include("view/des.php");
        
    }
    else if ($p=="kas")
    {
        include("view/kas.php");
    }
    
    else if ($p=="adm")
    {
        include("view/admin.php");
    }
    
    else if ($p=="inclient")
    {
        if (!empty($_POST['submit']))
        {
            $nmclient=$_POST['nmclient'];
            $tgl=$_POST['tgl'];
            $alamat=$_POST['alamat'];
            $nohp=$_POST['nohp'];
            $status=$_POST['status'];
            $input=$member->simpan($con,$nmclient,$alamat,$nohp,$tgl,$status);
        }
        
        include("view/des.php");
    }
    
    //KASIR
    
    else if ($p=="transaksi")
    {
        include("view/kas.php");
    }
    else if ($p=="project")
    {
        include("view/kas.php");
    }
    
    else if ($p=="bayar")
    {
        
        $id=$_GET['id'];
        $tgl=$_GET['tgl'];
        if (!empty($_POST['bayar']))
        {
            $idclient=$_POST['idclient'];
            $tanggal=$_POST['tanggal'];
            $diskon=$_POST['diskon'];
            $harga=$_POST['harga'];
            $hargabayar=$_POST['hargabayar'];
            $bayar=$_POST['bayar'];
            $kembali=$bayar - $hargabayar;
            $input=$transaksi->bayar($con,$tanggal,$idclient,$harga,$diskon,$hargabayar,$bayar,$kembali);
            //$input2=$desain->GantiSt($con,$iddesain);
        }
        include("view/kas.php");
    }
    
    else if ($p=="tes")
    {
        include("view/kas.php");
    }
    
    else if ($p=="initem")
    {
        if (!empty($_POST['simpan']))
        {
            $nmitem=$_POST['nmitem'];
            $jenis=$_POST['jenis'];
            $satuan=$_POST['satuan'];
            $harga=$_POST['harga'];
            $user=$_SESSION["username"];
            $input=$item->simpan($con,$nmitem,$jenis,$satuan,$harga);
            
        }
        
        if (!empty($_GET['edit']))
        {
            $iditem=$_GET['edit'];
            $dt=$item->edit($con,$iditem);
            $nmitem=$dt['nmitem'];
            $jenis=$dt['jenis'];
            $satuan=$dt['satuan'];
            $harga=$dt['harga'];
        }else
        {
            $iditem="";
            $nmitem="";
            $jenis="";
            $satuan="";
            $harga="";
        }
        
        if (!empty($_POST['update']))
        {
            $iditem=$_POST['iditem'];
            $nmitem=$_POST['nmitem'];
            $jenis=$_POST['jenis'];
            $satuan=$_POST['satuan'];
            $harga=$_POST['harga'];
            $input=$item->rubah($con,$nmitem,$jenis,$satuan,$harga,$iditem);
        }
        
        if(!empty($_GET['hapus']))
        {
            $iditem=$_GET['hapus'];
            $item->hapus($con,$iditem);
        }
        include("view/kas.php");
    }
    
    else if ($p=="indes")
    {
        if (!empty($_POST['simpan']))
        {
            $idclient=$_POST['idclient'];
            $wktdesain=$_POST['wktdesain'];
            $iduser=$_POST['iduser'];
            $iditem=$_POST['iditem'];
            $panjang=$_POST['panjang'];
            $lebar=$_POST['lebar'];
            $ket=$_POST['ket'];
            $input=$desain->simpan($con,$wktdesain,$iduser,$idclient,$iditem,$panjang,$lebar,$ket);
        }
        
        if (!empty($_POST['update']))
        {
            $nmclient=$_POST['nmclient'];
            $wktdesain=$_POST['wktdesain'];
            $iduser=$_POST['iduser'];
            $iditem=$_POST['iditem'];
            $panjang=$_POST['panjang'];
            $lebar=$_POST['lebar'];
            $ket=$_POST['ket'];
            $iddesain=$_POST['iddesain'];
            $input=$desain->update($con,$wktdesain,$iduser,$nmclient,$iditem,$panjang,$lebar,$ket,$iddesain);
        }
        
        if (!empty($_GET['edit']))
        {
            $iddesain=$_GET['edit'];
            $dt=$desain->edit($con,$iddesain);
            $nmclient=$dt['nmclient'];
            $iditem=$dt['iditem'];
            $panjang=$dt['p'];
            $lebar=$dt['l'];
            $iduser=$dt['iduser'];
            $ket=$dt['ket'];
            $wktdesain=$dt['wktdesain'];
        }else
        {
            $iddesain="";
            $nmclient="";
            $iditem="";
            $panjang="";
            $lebar="";
            $iduser="";
            $ket="";
            $wktdesain="";
        }
        
        
        include("view/des.php");
    }
    
    else if ($p=="wes")
    {
        include("view/udah.php");
    }
    
    
    else if ($p=="dtdes")
    {
        
        if(!empty($_GET['hapus']))
        {
            $iddesain=$_GET['hapus'];
            $desain->hapus($con,$iddesain);
        }
        
        
        include("view/des.php");
        
    }
    
    else if ($p=="nota")
    {
        $dt=$transaksi->ctnota($con);
        $nmclient=$dt['nmclient'];
        $idclient=$dt['idclient'];
        $id=$dt['idclient'];
        $tgl=$dt['tanggal'];
        $harga="Rp " . number_format($dt['harga'],2,',','.');
        $hargabayar="Rp " . number_format($dt['hargabayar'],2,',','.');
        $bayar= "Rp " . number_format($dt['bayar'],2,',','.');
        $diskon= "Rp " . number_format($dt['diskon'],2,',','.');
        $kembali= "Rp " . number_format($dt['kembali'],2,',','.');
            
        include("view/cetaknota.php");
    }
    
    else if ($p=="laptransaksi1")
    {
        include("view/kas.php");
    }
    
    else if ($p=="laptransaksiall")
    {
        include("view/laptransaksiall.php");
    }
    
    else if ($p=="laptransaksi")
    {
        $tgl1=$_POST['tgl1'];
        $tgl2=$_POST['tgl2'];
        include("view/laptransaksi.php");
              
    }
    
    else if($p=="setuser")
    {
        if(!empty($_POST['simpan']))
        {
            $nama=$_POST['nama'];
            $username=$_POST['username'];
            $pass=$_POST['pass'];
            $level=$_POST['level'];
            $input=$induk->simpanuser($con,$nama,$username,$pass,$level);
        }
        
        if (!empty($_GET['edit']))
        {
            $iduser=$_GET['edit'];
            $dt=$induk->edituser($con,$iduser);
            $nama=$dt['nama'];
            $username=$dt['username'];
            $pass=$dt['pass'];
            $level=$dt['level'];
        }else
        {
            $nama="";
            $username="";
            $pass="";
            $level="";
        }
        
        if(!empty($_GET['hapus']))
        {
            $iduser=$_GET['hapus'];
            $induk->hapususer($con,$iduser);
        }
        
        if (!empty($_POST['update']))
        {
            $iduser=$_POST['iduser'];
            $nama=$_POST['nama'];
            $username=$_POST['username'];
            $pass=$_POST['pass'];
            $level=$_POST['level'];
            $input=$induk->updateuser($con,$nama,$username,$pass,$level,$iduser);
        }
        
        include("view/kas.php");
    }
    
    else 
    {
        include("view/404.php");
    }
}
else
{
    include("awal.php");
}
?>