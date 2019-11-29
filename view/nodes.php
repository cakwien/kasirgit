<?php 
    
    $con=mysqli_connect('localhost','root','','appkasir');
    $cek=mysqli_query($con,"select * from nodes limit 1 DESC");
    $dcek=mysqli_fetch_array($cek);
    $tbno=1;
    $nodes1=$dcek['nodes'];
    $nodes2= $nodes1 + $tbno;



?>