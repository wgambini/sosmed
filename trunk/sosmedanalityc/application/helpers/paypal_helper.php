<?php

require_once ("paypalfunctions.php");
// ==================================
// PayPal Express Checkout Module
// ==================================

class PayPal{

	private $currencyCodeType = "USD";
	private $paymentType = "Order";

	private $returnURL = "https://sosmedsis.com/sosmedanalityc/c_payment";
	private $cancelURL = "https://sosmedsis.com/sosmedanalityc/c_login";

	function __construct(){
		
	}

	function express_checkout($paymenAmount){
		$resArray = CallShortcutExpressCheckout ($paymenAmount, $this->currencyCodeType, $this->paymentType, $this->returnURL, $this->cancelURL);
		$ack = strtoupper($resArray["ACK"]);
		if($ack=="SUCCESS" || $ack=="SUCCESSWITHWARNING"){
			RedirectToPayPal ( $resArray["TOKEN"] );
		}else{
			$ErrorCode = urldecode($resArray["L_ERRORCODE0"]);
			$ErrorShortMsg = urldecode($resArray["L_SHORTMESSAGE0"]);
			$ErrorLongMsg = urldecode($resArray["L_LONGMESSAGE0"]);
			$ErrorSeverityCode = urldecode($resArray["L_SEVERITYCODE0"]);
				
			echo "SetExpressCheckout API call failed. ";
			echo "Detailed Error Message: " . $ErrorLongMsg;
			echo "Short Error Message: " . $ErrorShortMsg;
			echo "Error Code: " . $ErrorCode;
			echo "Error Severity Code: " . $ErrorSeverityCode;
		}
	}
}
?>