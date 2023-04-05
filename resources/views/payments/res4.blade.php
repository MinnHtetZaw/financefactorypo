@php
    	  $response = file_get_contents('php://input');
			echo "Response:<br/><textarea style='width:100%;height:80px'>".$response."</textarea>"; 
		
			//each response params:
			$version = $_REQUEST["version"];
			$request_timestamp = $_REQUEST["request_timestamp"];
			$merchant_id = $_REQUEST["merchant_id"];
			$currency = $_REQUEST["currency"];
			$order_id = $_REQUEST["order_id"];
			$amount = $_REQUEST["amount"];
			$invoice_no = $_REQUEST["invoice_no"];
			$transaction_ref = $_REQUEST["transaction_ref"];
			$approval_code = $_REQUEST["approval_code"];
			$eci = $_REQUEST["eci"];
			$transaction_datetime = $_REQUEST["transaction_datetime"];
			$payment_channel = $_REQUEST["payment_channel"];
			$payment_status = $_REQUEST["payment_status"];
			$channel_response_code = $_REQUEST["channel_response_code"];
			$channel_response_desc = $_REQUEST["channel_response_desc"];
			$masked_pan = $_REQUEST["masked_pan"];
			$stored_card_unique_id = $_REQUEST["stored_card_unique_id"];
			$backend_invoice = $_REQUEST["backend_invoice"];
			$paid_channel = $_REQUEST["paid_channel"];
			$recurring_unique_id = $_REQUEST["recurring_unique_id"];
			$paid_agent = $_REQUEST["paid_agent"];
			$payment_scheme = $_REQUEST["payment_scheme"];
			$user_defined_1 = $_REQUEST["user_defined_1"];
			$user_defined_2 = $_REQUEST["user_defined_2"];
			$user_defined_3 = $_REQUEST["user_defined_3"];
			$user_defined_4 = $_REQUEST["user_defined_4"];
			$user_defined_5 = $_REQUEST["user_defined_5"];
			$browser_info = $_REQUEST["browser_info"];
			$ippPeriod = $_REQUEST["ippPeriod"];
			$ippInterestType = $_REQUEST["ippInterestType"];
			$ippInterestRate = $_REQUEST["ippInterestRate"];
			$ippMerchantAbsorbRate = $_REQUEST["ippMerchantAbsorbRate"];
			$payment_scheme = $_REQUEST["payment_scheme"];
			$process_by = $_REQUEST["process_by"];
			$sub_merchant_list = $_REQUEST["sub_merchant_list"];
			$hash_value = $_REQUEST["hash_value"];   
			echo "version: ".$version."<br/>";
			echo "request_timestamp: ".$request_timestamp."<br/>";
			echo "merchant_id: ".$merchant_id."<br/>";
			echo "currency: ".$currency."<br/>";
			echo "order_id: ".$order_id."<br/>";
			echo "amount: ".$amount."<br/>";
			echo "invoice_no: ".$invoice_no."<br/>";
			echo "transaction_ref: ".$transaction_ref."<br/>";
			echo "approval_code: ".$approval_code."<br/>";
			echo "eci: ".$eci."<br/>";
			echo "transaction_datetime: ".$transaction_datetime."<br/>";
			echo "payment_channel: ".$payment_channel."<br/>";
			echo "payment_status: ".$payment_status."<br/>";
			echo "channel_response_code: ".$channel_response_code."<br/>";
			echo "channel_response_desc: ".$channel_response_desc."<br/>";
			echo "masked_pan: ".$masked_pan."<br/>";
			echo "stored_card_unique_id: ".$stored_card_unique_id."<br/>";
			echo "backend_invoice: ".$backend_invoice."<br/>";
			echo "paid_channel: ".$paid_channel."<br/>";
			echo "recurring_unique_id: ".$recurring_unique_id."<br/>";
			echo "sub_merchant_list: " .$sub_merchant_list."<br/>";
			echo "payment_scheme: ".$payment_scheme."<br/>";
			echo "user_defined_1: ".$user_defined_1."<br/>";
			echo "user_defined_2: ".$user_defined_2."<br/>";
			echo "user_defined_3: ".$user_defined_3."<br/>";
			echo "user_defined_4: ".$user_defined_4."<br/>";
			echo "user_defined_5: ".$user_defined_5."<br/>";
			echo "browser_info: ".$browser_info."<br/>"; 
			echo "ippPeriod: " .$ippPeriod."<br/>";
			echo "ippInterestType: " .$ippInterestType."<br/>";
			echo "ippInterestRate: " .$ippInterestRate."<br/>";
			echo "ippMerchantAbsorbRate: " .$ippMerchantAbsorbRate."<br/>";
			echo "payment_scheme: " .$payment_scheme."<br/>";
			echo "process_by: " .$process_by."<br/>";
			echo "sub_merchant_list: " .$sub_merchant_list."<br/>";
			echo "hash_value: ".$hash_value."<br/>";
			  
			//check response hash value (for security, hash value validation is Mandatory)
			$checkHashStr = $version . $request_timestamp . $merchant_id . $order_id . 
			$invoice_no . $currency . $amount . $transaction_ref . $approval_code . 
			$eci . $transaction_datetime . $payment_channel . $payment_status . 
			$channel_response_code . $channel_response_desc . $masked_pan . 
			$stored_card_unique_id . $backend_invoice . $paid_channel . $paid_agent . 
			$recurring_unique_id . $user_defined_1 . $user_defined_2 . $user_defined_3 . 
			$user_defined_4 . $user_defined_5 . $browser_info . $ippPeriod . 
			$ippInterestType . $ippInterestRate . $ippMerchantAbsorbRate . $payment_scheme .
			$process_by . $sub_merchant_list;
			  
			$SECRETKEY = "7jYcp4FxFdf0";
			$checkHash = hash_hmac('sha256',$checkHashStr, $SECRETKEY,false); 
			echo "checkHash: ".$checkHash."<br/><br/>";
		
			if(strcmp(strtolower($hash_value), strtolower($checkHash))==0){
				echo "Hash check = success. it is safe to use this response data.";
			}
			else{
				echo "Hash check = failed. do not use this response data.";
			}
			  
		
@endphp