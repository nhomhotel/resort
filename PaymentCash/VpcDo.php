<?php
include("Payment.php");
$payment = new Payment();
$payment->setSecureSecret("198BE3F2E8C75A53F38C1C4A5B6DBA27");
$payment->setVirtualPaymentUrl("http://paymentcert.smartlink.com.vn:8181/vpcpay.do");

/*
 1. Tao mot mang cac tham so:
$_params= array("vpc_Version" => "1", "vpc_Command" => "pay", "vpc_AccessCode" => "ECAFAB", "vpc_MerchTxnRef" => "abc123",
 "vpc_Merchant" => "SMLTEST", "vpc_OrderInfo" => "Order info", "vpc_Amount" => "100", "vpc_Locale" => "vn" ,
 "vpc_Currency" => "VND", "vpc_ReturnURL" => "http://localhost:8081/php_sml/VpcDr_ND.php", "vpc_BackURL" => "http://localhost:8081/php_sml/test.html");
 2. Gui cac tham so toi smartlink
$payment->redirect($_params);
 */

//trong vi du nay lay $_POST lam tham so
unset($_POST["SubButL"]);
unset($_POST["Title"]);
$payment->redirect($_POST);
?>