<?php 
include("bar128.php");
include("aes1.php");
$pesan="Harry W.1311094102";
$number=base64_encode(aes($pesan,$algoaes,$kunci,$iv,1));
echo bar128($number);
?>