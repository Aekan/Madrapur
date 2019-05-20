<?php
 	require_once OTP.'sdk/config.php';
	require_once OTP.'/sdk/SimplePayment.class.php';

	$orderCurrency = (isset($_REQUEST['order_currency'])) ? $_REQUEST['order_currency'] : 'N/A';
	$orderRef = (isset($_REQUEST['order_ref'])) ? $_REQUEST['order_ref'] : 'N/A'; 	

	$backref = new SimpleBackRef($config, $orderCurrency);
	$backref->order_ref = $orderRef;

    $response = [
        'mainStatus' => '',
        'status' => [],
        'links' => [
            'ios' => '',
            'idn' => '',
            'irn' => '',
        ],
        'payrefno' => 0,
        'orderid' => 0,
        'backrefdate' => '',
    ];

	if($backref->checkResponse()){	
		$backStatus = $backref->backStatusArray;
		
		//CCVISAMC
		if ($backStatus['PAYMETHOD'] == 'Visa/MasterCard/Eurocard') {
			$response['mainStatus'] = 'SUCCESSFUL_CARD_AUTHORIZATION';
			if ($backStatus['ORDER_STATUS'] == 'IN_PROGRESS') {
				 $response['status'][] = 'WAITING_FOR_IPN';
			} elseif ($backStatus['ORDER_STATUS' ] == 'PAYMENT_AUTHORIZED') {
				 $response['status'][] = 'WAITING_FOR_IPN';
			} elseif ($backStatus['ORDER_STATUS'] == 'COMPLETE') {
				 $response['status'][] = 'CONFIRMED_IPN';
			}
		}
		//WIRE
		elseif ($backStatus['PAYMETHOD'] == 'Bank/Wire transfer') {
			$response['mainStatus'] = 'SUCCESSFUL_WIRE';
			if ($backStatus['ORDER_STATUS'] == 'PAYMENT_AUTHORIZED' || $backStatus['ORDER_STATUS'] == 'COMPLETE') {
				 $response['status'][] = 'CONFIRMED_WIRE';
			}
		}
		$response['links']['irn'] = 'irn.php?order_ref=' . $backStatus['REFNOEXT'] . '&payrefno=' . $backStatus['PAYREFNO'] . '&ORDER_AMOUNT=1207&AMOUNT=1207&ORDER_CURRENCY=' . $orderCurrency;
        $response['links']['idn'] = 'idn.php?order_ref=' . $backStatus['REFNOEXT'] . '&payrefno=' . $backStatus['PAYREFNO'] . '&ORDER_AMOUNT=1207&ORDER_CURRENCY=' . $orderCurrency;
	} else {
		$backStatus = $backref->backStatusArray;
		$response['mainStatus'] = 'UNSUCCESSFUL_TRANSACTION';
		$response['status'][] = 'END_OF_TRANSACTION';
		$response['status'][] = 'UNSUCCESSFUL_NOTICE';
	}

	$response['links']['ios'] .= 'ios.php?simpleid=' . $backStatus['PAYREFNO'] . '&order_ref=' . $backStatus['REFNOEXT'] . '&ORDER_CURRENCY=' . $orderCurrency;
	$response['payrefno'] = $backStatus['PAYREFNO'];
	$response['orderid'] = $backStatus['REFNOEXT'];
	$response['backrefdate'] = $backStatus['BACKREF_DATE'];
	$backref->errorLogger();
	//echo $response.$links;

	$qString = $_SERVER['QUERY_STRING'];
	$prettyString = "";

	$qStringArray = explode("&", $qString);

	foreach ($qStringArray as $element) {
		$elementString = explode("=", $element);

		$prettyString .= "/" . $elementString[1];
	}

	redirect("https://budapestrivercruise.co.uk/checkout/thankyou" . json_encode($response), 301);

