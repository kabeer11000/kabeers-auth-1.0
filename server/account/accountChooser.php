<?php
/*
function encrypt($string,$encryption_key){

    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption = openssl_encrypt($string, $ciphering,
        $encryption_key, $options, $encryption_iv);
    return $encryption;
}
$actual_link = "http://auth.kabeersnetwork.rf.gd/server/account/";
$uniqueId = urlencode(base64_encode(uniqid()));
header('Location:http://auth.kabeersnetwork.rf.gd/?redirect='.$actual_link.'&clientId='.encrypt("6546648",$uniqueId).'&action=login&key='.$uniqueId.'');
//echo base64_encode(urlencode(encrypt("6546648",$uniqueId)));*/
?>
<?php class KAuth{private $w8698d0a787db='';private $x59be46dc0c59='';private $a572d4e421e5e='';function init($h4b43b0aee356,$xb80bb7740288,$b6f8f57715090){function encrypt($hb45cffe084dd,$v5a2df070a0d1){$wd0b25ea2515b=base64_decode('QUVTLTEyOC1DVFI=');$bd0caf57b7902=openssl_cipher_iv_length($wd0b25ea2515b);$a93da65a9fd00=0;$da66a1455a419=base64_decode('MTIzNDU2Nzg5MTAxMTEyMQ==');$t5bdf74912a51=openssl_encrypt($hb45cffe084dd,$wd0b25ea2515b,$v5a2df070a0d1,$a93da65a9fd00,$da66a1455a419);return $t5bdf74912a51;}$this->$x59be46dc0c59=urlencode(base64_encode(uniqid()));$s9dd4e461268c=$this->$x59be46dc0c59;$this->$w8698d0a787db=$h4b43b0aee356;$this->$a572d4e421e5e=base64_decode('aHR0cDovL2F1dGgua2FiZWVyc25ldHdvcmsucmYuZ2QvP3JlZGlyZWN0PQ==').$this->$w8698d0a787db.base64_decode('JmNsaWVudElkPQ==').encrypt($xb80bb7740288,$s9dd4e461268c).base64_decode('JmFjdGlvbj0=').$b6f8f57715090.base64_decode('JmtleT0=').$s9dd4e461268c;}function go(){header(base64_decode('TG9jYXRpb246').$this->$a572d4e421e5e);}function render($r2510c39011c5,$gf1290186a5d0,$if484570d7cf5){$y435bc32dcf9e=uniqid();if($if484570d7cf5==base64_decode('ZGFyaw==')){echo base64_decode('PGRpdiBjbGFzcz0iay1uZXQtbG9naW4tYnRuLQ==').$y435bc32dcf9e.base64_decode('Ij48YSBocmVmPSI=').$this->$a572d4e421e5e.base64_decode('Ij48aW1nIGFsdD0iTG9naW4gV2l0aCBLYWJlZXJzIE5ldHdvcmsiIHNyYz0iaHR0cDovL2g4aDduNXkzLmhvc3RyeWNkbi5jb20vUHJpdmF0ZS91cGxvYWRzL2RmMTM5Y2Y3NDVhYTE5NDIzNTdiZDM1NGY0ZjAwYWZhZTI0NDU3OTRrLWJ0bi5zdmciIHN0eWxlPSJ3aWR0aDo=').$gf1290186a5d0.base64_decode('O2hlaWdodDo=').$r2510c39011c5.base64_decode('OyI+PC9hPjwvZGl2Pg==');}else{echo base64_decode('PGRpdiBjbGFzcz0iay1uZXQtbG9naW4tYnRuLQ==').$y435bc32dcf9e.base64_decode('Ij48YSBocmVmPSI=').$this->$a572d4e421e5e.base64_decode('Ij48aW1nIGFsdD0iTG9naW4gV2l0aCBLYWJlZXJzIE5ldHdvcmsiIHNyYz0iaHR0cDovL2g4aDduNXkzLmhvc3RyeWNkbi5jb20vUHJpdmF0ZS91cGxvYWRzLzg4ZGVhY2VjNTNkMDcwYzJkYjZhYjY1OWZjZmI3YmM4N2U0NzNjZmFrLWJ0bi1saWdodC5zdmciIHN0eWxlPSJ3aWR0aDo=').$gf1290186a5d0.base64_decode('O2hlaWdodDo=').$r2510c39011c5.base64_decode('OyI+PC9hPjwvZGl2Pg==');}}}?>
<?php
$auth = new KAuth();
$auth->init('http://auth.kabeersnetwork.rf.gd/server/account/', '6546648', 'login');
$auth->go();