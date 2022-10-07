<?php

function encryptX($text) {
//enkripsi algoritma RSA
$text=(string)$text;
$n=1349;
$e=29;
$hasil="";

//pesan dikodekan menjadi kode ascii, kemudian di enkripsi per karakter

	for($a=0;$a<strlen($text);++$a) {
// rumus enkripsi <enkripsi>=<pesan>^<e><mod><n>
	$hasil =gmp_strval(gmp_mod(gmp_pow(ord($text[$a]),$e),$n));

//antar tiap karakter dipisahkan dengan "."
	if($a!=strlen($text)-1) {
		$hasil.=".";
	}

}

return $hasil;

}
//function encryptX($text) {
//	return base64_encode($text);
//}

//function decryptX($text) {
//	return base64_decode($text);
//}