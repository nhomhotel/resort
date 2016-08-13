<?php
	include("Payment.php");
	$payment = new Payment();
	$payment->setSecureSecret("198BE3F2E8C75A53F38C1C4A5B6DBA27");
	$payment->checkSum($_GET);
	if ($payment->isEmptySecureSecret()) {
		$hashValidated = "<FONT color='orange'><strong>Not Calculated - No 'SECURE_SECRET' present.</strong></FONT>";
	} else {
		if ($payment->isValidSecureHash()) {
			$hashValidated = "<FONT color='#00AA00'><strong>CORRECT</strong></FONT>";
		} else {
			$hashValidated = "<FONT color='#FF0066'><strong>INVALID HASH</strong></FONT>";
		}
	}
	
	$txnResponseCode = $payment->getParameter("vpc_ResponseCode");
	$errorTxt = "";
	// Show this page as an error page if vpc_ResponseCode doesn't exist or doesn't equals '0'
	if ($txnResponseCode != "0" || $txnResponseCode == "No Value Returned" || !$payment->isValidSecureHash()) {
	    $errorTxt = "Error ";
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>Response Page</title>
        <meta http-equiv="Content-Type" content="text/html, charset=utf-8">
    </head>
    <body>
		<!-- start branding table -->
		<table width='100%' border='2' cellpadding='2' bgcolor='#C1C1C1'>
			<tr>
				<td bgcolor='#E1E1E1' width='90%'><h2 class='co'>&nbsp;Virtual Payment Client - Version 1</h2></td>
				<td bgcolor='#C1C1C1' align='center'><h3 class='co'>Smartlink</h3></td>
			</tr>
		</table>
		<!-- end branding table -->
        <!-- End Branding Table -->
        <h3>Result</h3>
        <?php if ($errorTxt == "Error ") {?>
			<div><font color='red'><?=$errorTxt?></font></div>        	
        <?php } else {?>
        	<div>Checksum: <?=$hashValidated?></div>
        <?php }?>
    </body>
</html>