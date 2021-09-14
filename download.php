<?php

/**
 * Script auto download
 * Author : BENON_
 * Source : PHP 7
 * usage : domain.com/download.php?dir=[nama folder]&file=[nama file]
 *         OR
 *         domain.com/download.php?file=[nama file]
 * Example link : domain.com/download.php?dir=upload&file=foto.jpg
 *                domain.com/download.php?file=foto.jpg
 */
 
 function download()
 {
   $DIR = $_GET['dir'];
   $params = $_GET['file'];
   $basefile = $DIR.'/'.$params;
   if( $DIR && $params )
   {
     if( !empty( $basefile ) && file_exists( $basefile ) )
     {
       header("Pragma:public");
       header("Expired:0");
       header("Cache-Control:must-revalidate");
       header("Content-Control:public");
       header("Content-Description: File Transfer");
       header("Content-Type: application/octet-stream");
       header("Content-Disposition:attachment; filename=\"".basename($basefile)."\"");
       header("Content-Transfer-Encoding:binary");
       header("Content-Length:".filesize($basefile));
       flush();
       readfile($basefile);
       exit();
     }else{
       echo " FILE TIDAK DI TEMUKAN! ";
     }
   }elseif( $params ){
     $basefile = $params;
     if( !empty( $basefile ) && file_exists( $basefile ) )
     {
       header("Pragma:public");
       header("Expired:0");
       header("Cache-Control:must-revalidate");
       header("Content-Control:public");
       header("Content-Description: File Transfer");
       header("Content-Type: application/octet-stream");
       header("Content-Disposition:attachment; filename=\"".basename($basefile)."\"");
       header("Content-Transfer-Encoding:binary");
       header("Content-Length:".filesize($basefile));
       flush();
       readfile($basefile);
       exit();
     }else{
       echo " FILE TIDAK DI TEMUKAN! ";
     }
   }else{
     echo "MASUKAN PARAMETER YANG BENAR!";
   }
 }
 echo download();
?>
