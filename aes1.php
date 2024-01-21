<?php
$pesan="Jangan Lupa Sholat !";
$algoaes="AES-128-CTR";
$kunci=substr(sha1('MrX'),0,16);
$iv='1234567891011121';
function aes($pesan,$algoaes,$kunci,$iv,$mode=1){
	if ($mode==1) { //jika enkrip maka 
		$hasil=openssl_encrypt($pesan,$algoaes,$kunci,$option=0,$iv,$tag);
	} else { //selain itu adalah dekrip maka 
		$hasil=openssl_decrypt($pesan,$algoaes,$kunci,$option=0,$iv);
	};
	return $hasil;
}
echo "Pesan plaintext : ".$pesan."<br>";
$chipertext=base64_encode(aes($pesan,$algoaes,$kunci,$iv,1));
echo "Pesan chipertext aesnya : ".$chipertext."<br>";
$plaintext=aes(base64_decode($chipertext),$algoaes,$kunci,$iv,0);
echo "Pesan plaintext hasil dekripsinya : ".$plaintext."<br>";
?>