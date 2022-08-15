<html>
<head>
<!-- Written by Rifa -->
</head>
<body>

	<h4>E-PAY Shop adalah Simulator untuk transaksi e-Pay</h4><br />
	<form action="processEpay.php" method="GET">
	<!-- <form action="processEpcatalogue.php" method="GET"> -->
	
	PRODUCT :<br />
	<input type="text" value="Kopi Gingseng" name="name"><br />
	TOTAL :<br />
	<input type="text" value="1" name="total"><br />
	AMOUNT :<br />
	<input type="text" value="15000" name="amount"><br />
	URL REDIRECT :<br />
        <input type="text" value="https://10.35.65.18/pg-new/ePayment" name="url_redirect"><br />
	<!--<input type="text" value="https://epayment.bri.co.id/pg-new/ePayment" name="url_redirect"><br />-->
	
	<input type="submit" value="PAY USING E-PAY!"/>
	</form>



</body>

</html>
