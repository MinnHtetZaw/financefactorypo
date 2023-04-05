<?php

namespace App\Http\Controllers\Web;

use App\Traits\HTTP;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentTestController extends Controller
{
    use HTTP;
    public function test(Request $request)
    {
       dd($request->all());
    }
    public function payment1()
    {
        
	//Merchant's account information
	$merchantID = "JT01";		//Get MerchantID when opening account with 2C2P
	$secretKey = "7jYcp4FxFdf0";	//Get SecretKey from 2C2P PGW Dashboard

	//Request Information 
	/* 
	Process Type:
		I = transaction inquiry
		V = transaction void
		R = transaction Refund
		S = transaction Settlement 
	*/
	$processType = "I";		
	$invoiceNo = "Invoice1401872337";
	$version = "3.4";
	
	//Construct signature string
	$stringToHash = $version . $merchantID . $processType . $invoiceNo ; 
	$hash = strtoupper(hash_hmac('sha1', $stringToHash ,$secretKey, false));	//Compute hash value

    echo $hash;
	//Construct request message
	$xml = "<PaymentProcessRequest>
			<version>$version</version> 
			<merchantID>$merchantID</merchantID>
			<processType>$processType</processType>
			<invoiceNo>$invoiceNo</invoiceNo> 
			<hashValue>$hash</hashValue>
			</PaymentProcessRequest>";  

	$payload = base64_encode($xml); //Encrypt payload
	echo "<br>";
    echo $payload;
	echo "<br>";
 	
				
	
	//Send request to 2C2P PGW and get back response

 	$response = $this->post("https://demo2.2c2p.com/2C2PFrontend/PaymentActionV2/PaymentProcess.aspx","paymentRequest=".$payload);
	 

    


	//Decrypt response message and display  
	$response = base64_decode($response);   
	echo "Response:<br/><textarea style='width:100%;height:80px'>". $response."</textarea>"; 
 
	//Validate response Hash
	$resXml=simplexml_load_string($response); 
	$res_version = $resXml->version;
	$res_respCode = $resXml->respCode;
	$res_processType = $resXml->processType;
	$res_invoiceNo = $resXml->invoiceNo;
	$res_amount = $resXml->amount;
	$res_status = $resXml->status;
	$res_approvalCode = $resXml->approvalCode;
	$res_referenceNo = $resXml->referenceNo;
	$res_transactionDateTime = $resXml->transactionDateTime;
	$res_paidAgent = $resXml->paidAgent;
	$res_paidChannel = $resXml->paidChannel;
	$res_maskedPan = $resXml->maskedPan;
	$res_eci = $resXml->eci;
	$res_paymentScheme = $resXml->paymentScheme;
	$res_processBy = $resXml->processBy;
	$res_refundReferenceNo = $resXml->refundReferenceNo;
	$res_userDefined1 = $resXml->userDefined1;
	$res_userDefined2 = $resXml->userDefined2;
	$res_userDefined3 = $resXml->userDefined3;
	$res_userDefined4 = $resXml->userDefined4;
	$res_userDefined5 = $resXml->userDefined5;
	
	//Compute response hash
	$res_stringToHash = $res_version.$res_respCode.$res_processType.$res_invoiceNo.$res_amount.$res_status.$res_approvalCode.$res_referenceNo.$res_transactionDateTime.$res_paidAgent.$res_paidChannel.$res_maskedPan.$res_eci.$res_paymentScheme.$res_processBy.$res_refundReferenceNo.$res_userDefined1.$res_userDefined2.$res_userDefined3.$res_userDefined4.$res_userDefined5 ; 
	$res_responseHash = strtoupper(hash_hmac('sha1',$res_stringToHash,$secretKey, false));  	//Calculate response Hash Value 
	echo "<br/>hash: ".$res_responseHash."<br/>"; 
	if($resXml->hashValue == strtolower($res_responseHash))
    { 
        echo "valid response"; 
    } 
	else{
         echo "invalid response"; 
        }
	
    }

    public function payment2()
    {
        
	//Merchant's account information
	$merchantID = "JT01";		//Get MerchantID when opening account with 2C2P
	$secretKey = "7jYcp4FxFdf0";	//Get SecretKey from 2C2P PGW Dashboard

	//Request Information 
	/* 
	Process Type:
		I = transaction inquiry
		V = transaction void
		R = transaction Refund
		S = transaction Settlement 
	*/
	$processType = "I";		
	$invoiceNo = "Invoice1401872337";
	$version = "3.4";
    $userDefined1 = "item 1";
	
	//Construct signature string
	$stringToHash = $version . $merchantID . $processType . $invoiceNo .$userDefined1 ; 
	$hash = strtoupper(hash_hmac('sha1', $stringToHash ,$secretKey, false));	//Compute hash value

    echo $hash;
	//Construct request message
	$xml = "<PaymentProcessRequest>
			<version>$version</version> 
			<merchantID>$merchantID</merchantID>
			<processType>$processType</processType>
			<invoiceNo>$invoiceNo</invoiceNo> 
			<hashValue>$hash</hashValue>
			</PaymentProcessRequest>";  

	$payload = base64_encode($xml); //Encrypt payload
	echo "<br>";
    echo $payload;
	echo "<br>";
 	
				
	
	//Send request to 2C2P PGW and get back response

 	$response = $this->post("https://demo2.2c2p.com/2C2PFrontend/SecurePayment/PaymentAuth.aspx","paymentRequest=".$payload);
	 

    


	//Decrypt response message and display  
	$response = base64_decode($response);   
	echo "Response:<br/><textarea style='width:100%;height:80px'>". $response."</textarea>"; 
 
	//Validate response Hash
	$resXml=simplexml_load_string($response); 
	$res_version = $resXml->version;
	$res_respCode = $resXml->respCode;
	$res_processType = $resXml->processType;
	$res_invoiceNo = $resXml->invoiceNo;
	$res_amount = $resXml->amount;
	$res_status = $resXml->status;
	$res_approvalCode = $resXml->approvalCode;
	$res_referenceNo = $resXml->referenceNo;
	$res_transactionDateTime = $resXml->transactionDateTime;
	$res_paidAgent = $resXml->paidAgent;
	$res_paidChannel = $resXml->paidChannel;
	$res_maskedPan = $resXml->maskedPan;
	$res_eci = $resXml->eci;
	$res_paymentScheme = $resXml->paymentScheme;
	$res_processBy = $resXml->processBy;
	$res_refundReferenceNo = $resXml->refundReferenceNo;
	$res_userDefined1 = $resXml->userDefined1;
	$res_userDefined2 = $resXml->userDefined2;
	$res_userDefined3 = $resXml->userDefined3;
	$res_userDefined4 = $resXml->userDefined4;
	$res_userDefined5 = $resXml->userDefined5;
	
	//Compute response hash
	$res_stringToHash = $res_version.$res_respCode.$res_processType.$res_invoiceNo.$res_amount.$res_status.$res_approvalCode.$res_referenceNo.$res_transactionDateTime.$res_paidAgent.$res_paidChannel.$res_maskedPan.$res_eci.$res_paymentScheme.$res_processBy.$res_refundReferenceNo.$res_userDefined1.$res_userDefined2.$res_userDefined3.$res_userDefined4.$res_userDefined5 ; 
	$res_responseHash = strtoupper(hash_hmac('sha1',$res_stringToHash,$secretKey, false));  	//Calculate response Hash Value 
	echo "<br/>hash: ".$res_responseHash."<br/>"; 
	if($resXml->hashValue == strtolower($res_responseHash))
    { 
        echo "valid response"; 
    } 
	else{
         echo "invalid response"; 
        }
	
    }

    public function payment3()
    {
        return view('payments.test');
    }
    public function payment3data(Request $request)
    {
        $payload = \Payment2C2P::paymentRequest([
            'desc' => '1 room for 2 nights',
            'uniqueTransactionCode' => "Invoice".time(),
            'amt' => '1000000',
            'currencyCode' => '702',
            'cardholderName' => 'Card holder Name',
            'cardholderEmail' => 'email@emailcom',
            'panCountry' => 'SG',
            'encCardData' => $request->input('encryptedCardInfo'), // Retrieve encrypted credit card data 
            'userDefined1' => 'userDefined1',
            'userDefined2' => 'userDefined2',
			'result_url_1' => 'localhost:8000/res'
        ]);
        return view('payments.test1',compact('payload'));
    }
	public function getres1(Request $request)
	{
		$response = \Payment2C2P::getData($request->get('paymentResponse'));
		dd($response);
	}
    public function getres()
    {
		return view('payments.res4');
		//full response
		
    }
	public function payment4()
	{
		return view('payments.payment4');
	}
	public function payment4data(Request $request)
	{
 if(!empty($_POST)): 

	function base64url_encode($data) {
	  return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
	}
	
	function base64url_decode($data) {
	  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
	} 
	
	
		include_once('HTTP.php');
		$http = new HTTP();
		$BASEURL = "https://sandbox-pgw.2c2p.com/payment/4.1/";
		$APIURL = "PaymentToken";
		   
	echo "//========================= GET PAYMENT TOKEN ==============================//";
		//Merchant's account information
		$MERCHANTID = $_POST["MERCHANTID"];		//Get MerchantID when opening account with 2C2P
		$SECRETKEY = $_POST["SECRETKEY"];	//Get SecretKey from 2C2P PGW Dashboard
	 
		//Request Information    
		$invoiceNo = $_POST["invoiceNo"];
		$description =$_POST["description"];
		$amount =$_POST["amount"];
		$currencyCode = $_POST["currencyCode"];
		$paymentChannel = array_filter(explode(",",$_POST["paymentChannel"])); 
		$request3DS = $_POST["request3DS"]; 
		$promotion= $_POST["promotion"]; 
		$tokenize= ($_POST["tokenize"]==="true"?true:false);
		$cardTokens= array_filter(explode(",",$_POST["cardTokens"]));
		$tokenizeOnly= ($_POST["tokenizeOnly"]==="true"?true:false);
		$interestType= $_POST["interestType"];
		$installmentPeriodFilter=array_filter(array_map('intval', explode(",",$_POST["installmentPeriodFilter"])));
		$productCode= $_POST["productCode"];
		$recurring= ($_POST["recurring"]==="true"?true:false);
		$invoicePrefix= $_POST["invoicePrefix"];
		$recurringAmount=$_POST["recurringAmount"];
		$allowAccumulate= $_POST["allowAccumulate"];
		$maxAccumulateAmount= $_POST["maxAccumulateAmount"];
		$recurringInterval= $_POST["recurringInterval"];
		$recurringCount= $_POST["recurringCount"];
		$chargeNextDate= $_POST["chargeNextDate"];
		$chargeOnDate= $_POST["chargeOnDate"];
		$paymentExpiry= $_POST["paymentExpiry"];
		$userDefined1= $_POST["userDefined1"];
		$userDefined2= $_POST["userDefined2"];
		$userDefined3= $_POST["userDefined3"];
		$userDefined4= $_POST["userDefined4"];
		$userDefined5= $_POST["userDefined5"];
		$paymentRouteID= $_POST["paymentRouteID"];
		$statementDescriptor= $_POST["statementDescriptor"];
		$subMerchants= $_POST["subMerchants"];
		$frontendReturnUrl = $_POST["frontendReturnUrl"];
		$backendReturnUrl = $_POST["backendReturnUrl"];
		$locale= $_POST["locale"]; 
		$nonceStr= $_POST["nonceStr"];
		
		$PT_dataArray = array(
		//MANDATORY PARAMS
		"merchantID" => $MERCHANTID,
		"invoiceNo" => $invoiceNo,
		"description" => $description,
		"amount" => $amount,
		"currencyCode" => $currencyCode,
		
		
		//OPTIONAL PARAMS
		"paymentChannel" => $paymentChannel,
		"request3DS" => $request3DS,
		"promotion" => $promotion,
		"tokenize" => $tokenize,
		"cardTokens" => $cardTokens,
		"tokenizeOnly" => $tokenizeOnly,
		"interestType" => $interestType,
		"installmentPeriodFilter" => $installmentPeriodFilter,
		"productCode" => $productCode,
		"recurring" => $recurring,
		"invoicePrefix" => $invoicePrefix,
		"recurringAmount" => $recurringAmount,
		"allowAccumulate" => $allowAccumulate,
		"maxAccumulateAmount" => $maxAccumulateAmount,
		"recurringInterval" => $recurringInterval,
		"recurringCount" => $recurringCount,
		"chargeNextDate" => $chargeNextDate,
		"chargeOnDate" => $chargeOnDate,
		"paymentExpiry" => $paymentExpiry,
		"userDefined1" => $userDefined1,
		"userDefined2" => $userDefined2,
		"userDefined3" => $userDefined3,
		"userDefined4" => $userDefined4,
		"userDefined5" => $userDefined5,
		"paymentRouteID" => $paymentRouteID,
		"statementDescriptor" => $statementDescriptor,
		"subMerchants" => $subMerchants,
		"locale" => $locale,
		"frontendReturnUrl" => $frontendReturnUrl,
		"backendReturnUrl" => $backendReturnUrl,
	
		//MANDATORY RANDOMIZER
		"nonceStr" => $nonceStr
		);                                         
		$PT_dataArray = (object) array_filter((array) $PT_dataArray);    
		$PT_data = json_encode($PT_dataArray);     
		echo "<br/>"; 
		echo "request PT_data: <br/><textarea style='width:100%;height:100px'>". $PT_data."</textarea>";  
		echo "<br/>"; 
	
		$PT_dataB64= base64url_encode($PT_data);
	
		//JWT header
		$PT_header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
		$PT_headerB64= base64url_encode($PT_header);
	
		$PT_signature= hash_hmac('sha256', $PT_headerB64 . "." . $PT_dataB64 ,$SECRETKEY, true); 
		$PT_signatureB64= base64url_encode($PT_signature);
	 
		$PT_payloadData = $PT_headerB64 . "." . $PT_dataB64 . "." . $PT_signatureB64;
		$PT_payloadArray = array(
			"payload" => $PT_payloadData
		);
		$PT_payloadArray = (object) array_filter((array) $PT_payloadArray);                 
		$PT_payload = json_encode($PT_payloadArray);    
		echo "<br/>"; 
		echo "payload:<br/><textarea style='width:100%;height:40px'>". $PT_payload."</textarea>";    
		echo "<br/>"; 
	 
		//Send request to 2C2P PGW and get back response
		 $PT_response = $http->post($BASEURL.$APIURL,$PT_payload);
	
		$PT_resData = json_decode($PT_response);
		$PT_resPayload = json_decode(base64_decode($PT_resData->{"payload"}));
	
		echo "<br/>"; 
		echo "RESPONSE:<br/><textarea style='width:100%;height:80px'>". base64_decode($PT_resData->{"payload"})."</textarea>"; 
		echo "<br/>";
		 
		echo "//========================= END OF GET PAYMENT TOKEN ==============================//";
	
	
	 endif; 
	}
}
