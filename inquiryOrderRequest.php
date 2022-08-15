	<?php 
	// Get data
	$bilref = $_GET["billReferenceNo"];
	$payeeid = $_GET["payeeId"];
	
	$content = file_get_contents("data/".$bilref.".txt");
	$arr_content = explode("#",$content);
	echo "
			<pg>
			<action>Query Order Request</action>
			<payeeId>".$payeeid."</payeeId>
			<billAccountNo>123019231231</billAccountNo>
			<billReferenceNo>".$bilref."</billReferenceNo>
			<amount>".$arr_content[4]."</amount>
			<items>
			<item>
			<name>".$arr_content[2]."</name>
			<price>".$arr_content[4]."</price>
			<quantity>".$arr_content[3]."</quantity>
			</item>
			</items>
			</pg>		
		";
?>
