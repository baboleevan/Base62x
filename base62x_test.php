<?php

include("./base62x.class.php");
include("./tools.function.php");

$s = Wht::get($_REQUEST, 'mystring');
$isenc = Wht::get($_REQUEST, 'isenc');

if($isenc == '1'){
	$enc = Base62x::encode($s);
	#print "s:[$s] enc:[$enc]";
	print $enc;
}
else{
	$dec = Base62x::decode($s);
	print $dec;
}

$sArr = array('100', '1000', '10000', '1000001', 'abc', 'abc123', 
	'ccbbaa1122ffa', 'a1122334eeeffb', '1a2b3c4d5e6f0a', 'aabbcc11223344');

$ibase = 20;
foreach($sArr as $k=>$v){
	$enc = Base62x::encode($s=$v, $ibase);
	$dec = Base62x::decode($enc, $ibase);
	print "\n$s enc:[".$enc."] dec:[$dec]";
}

$ibase = 16;
foreach($sArr as $k=>$v){
	$enc = Base62x::encode($s=$v, $ibase);
	$dec = Base62x::decode($enc, $ibase);
	print "\n$s enc:[".$enc."] dec:[$dec]";
}
$ibase = 32;
foreach($sArr as $k=>$v){
	$enc = Base62x::encode($s=$v, $ibase);
	$dec = Base62x::decode($enc, $ibase);
	print "\n$s enc:[".$enc."] dec:[$dec]";
}

$enc = "a123bc45";
$s = Base62x::decode($enc);
$enc2 = Base62x::encode($s);
if($enc == $enc2){
	print __FILE__.": enc:$enc enc2:$enc2 succ.";	
}
else{
	print __FILE__.": enc:$enc enc2:$enc2 fail.";	
}

/*

$s = "abcd1234";
$s2 = "abc中文123";
$s3 = "\"Tcler's Wiki: UTF-8 bit by bit (Revision 6)\". 2009-04-25. Retrieved 2009-05-22."
	."In orthodox UTF-8, a NUL byte (\\x00) is represented by a NUL byte. […] But […] we "
	."[…] want NUL bytes inside […] strings […] | ① ② ③ ④ ⑤ ⑥ ⑦ |  Ⅰ Ⅱ Ⅲ Ⅳ Ⅴ Ⅵ Ⅶ Ⅷ Ⅸ Ⅹ | "
	."!  # $ % & ' ( ) * + , - . /";

print "[$s] encoded:[".($s_enc=Base62x::encode($s))."]\n";
print "[$s_enc] decoded:[".($s_dec=Base62x::decode($s_enc))."]\n";

print "\n[$s2] encoded:[".($s2_enc=Base62x::encode($s2))."]\n";
print "[$s2_enc] decoded:[".($s2_dec=Base62x::decode($s2_enc))."]\n";

print "\n[$s3] encoded:[".($s3_enc=Base62x::encode($s3))."]\n";
print "[$s3_enc] decoded:[".($s3_dec=Base62x::decode($s3_enc))."]\n";

$s = "d=03a19e897ffc3c8e23adbe8267b02c89;ci:A3464;oi:ou_497535;nt:IN;ai:server_to_server_cache_udid;price:0.28;union:OU;";
#print implode("','", str_split($s));
print "[$s] encoded:[".($s_enc=Base62x::encode($s))."]\n";

*/

?>

