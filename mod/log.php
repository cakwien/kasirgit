<?php

 function tulisLog($log_info)
    {
        $myfile=fopen("log.txt","a") or die ("unable to open file !");
        $txt=$log_info."\n";
        fwrite($myfile, $txt);
        fclose($myfile);
    }


?>