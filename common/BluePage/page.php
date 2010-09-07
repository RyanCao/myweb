<?php
include ( "BluePage.class.php" ) ;

$intCount    = 1000 ; 
$intShowNum  = 10 ;


header("Content-Type:text/html;charset=gb2312") ;

$pBP  = new BluePage( $intCount , $intShowNum  ) ;
$aPDatas = $pBP->get();
$intOffset = $aPDatas[offset] ;
$strHtml =  $pBP->getHTML( $aPDatas);

echo $strHtml ;

?>
