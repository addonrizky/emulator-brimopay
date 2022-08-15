<?php

if(isset($_GET["type"]) && $_GET["type"] != null){
	exec_payment($_GET["type"]);
}

$billamt = "250000";
$feeamt  = "5000";
$poinamt = "150000";


function exec_payment($type){
echo "EXECUTED TYPE ".$type."<br />";
$ws_url = "http://10.35.65.18:8080/InternetBankingWS/services/InternetBankingWSPort?wsdl";
$client = new SoapClient($ws_url,array('trace' => 1));

// VALUE DATA
global $payeeid,$billref,$billamt,$feeamt,$poinamt,$username,$paysource,$accnumber,$accmerchant,$accpoin,$cardnum,$pwd;

$payeeid = "099001";
$billref = "2934$$11234123";
$billamt = "250000";
$feeamt  = "5000";
$poinamt = "150000";
$username= "mangga1212";
$paysource = $type;
$accnumber = "020601000006531";
$accmerchant = "020601000002309";
$accpoin = "020601000536308";
$cardnum = "5221849000000317";
$pwd 	= "de56b32d48122811bdb515b5dec87b3b1e38ace2872f275719200e6c2861bcfb";

$param = array(
	'payeeId'=>$payeeid,
	'billReference'=>$billref,
	'billAmount'=>$billamt."$$".$feeamt."$$".$poinamt,
	'username'=>$username,
	'password'=>'',
	'paymentSource' => $paysource,
	'accountNumber'=>$accnumber."$$".$accmerchant."$$".$accpoin,
	'cardNumber'=>$cardnum,
	'encPassword'=>$pwd);

$result = $client->ibNewEcommerce($param);
print_r($result);
}

echo "
	<br />Amount User : ".$billamt.".Amount Poin : ".$poinamt."
	<br />EMULATOR EXEC PAYMENT EPAY:<br />
	<a href='?type=A'>EXEC TIPE A</a>
	<a href='?type=B'>EXEC TIPE B</a>
	<a href='?type=C'>EXEC TIPE C</a>
";
?>