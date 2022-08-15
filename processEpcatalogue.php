<?php 

// create a new cURL resource
$ch = curl_init();
$bilref = date("YzHis");
$payid = "099001";
$keysTrxEcomm = hash("sha256",$payid+$bilref);
$amount = $_GET["amount"];
$name = $_GET["name"];
$total = $_GET["total"];

$headers = array(
    "Content-type: text/xml",
);

//echo "Bilref = ".$bilref." - Payee ID = ".$payid." - KeysTrxEcomm ".$keysTrxEcomm."<br />";

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "http://10.35.65.18/payment_gateway/InsertPaymentParameters?payeeId=".$payid."&billReferenceNo=".$bilref."&keysTrxEcomm=".$keysTrxEcomm);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// grab URL and pass it to the browser
$result = simplexml_load_string(curl_exec($ch));
if($result->respond == "00"){
	echo "<form action='https://ibdev.bri.co.id/pg/ePayment' method='post' name='frm'>";
	// echo "<form action='https://10.35.65.18/pg/ePayment' method='post' name='frm'>";
	echo "<input type='hidden' value='".$keysTrxEcomm."' name='keysTrxEcomm'/>";
	echo '</form><script language="JavaScript">document.frm.submit();</script>';
	$content = $keysTrxEcomm."#".$bilref."#".$name."#".$total."#".$amount;
	file_put_contents("data/".$bilref.".txt",$content);
}
print_r($result);

// close cURL resource, and free up system resources
curl_close($ch);
?>