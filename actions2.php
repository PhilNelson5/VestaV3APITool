<!DOCTYPE html>
<?php
require('helpers.php');
//Account Information for Service Delivery:
//AccountName            : Service_Delivery_NonIndemnified
//PartnerCD                    : 220
//Password                     : Password1
//
//AccountName            : Service_Delivery_Indemnified
//PartnerCD                    : 221
//Password                     : Password1
//WalletID  80400113   80500113
//
//AccountName: csgoshop_test
//AccountName: telcel_test
//Visa Successful       4001414208480156
//Pend need year EF5AQTEV
//pend time out EF5AQTEW
//BankRoutingNumber:323274458,
//CheckAccountNumber:021000021
//Visa CVN mismantch    4001420771215028
//Visa Debit sale successful    4200101372721718
//Visa Insufficient Funds   4614157022664880
//Mastercard account closed   5105783760057400
//Mastercard insufficient funds     5101154721341453
//<ShoppingCart xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"></ShoppingCart>
//your test accounts have an identical MerchantRouting configuration.  
//PaymentType	AcquirerCD	MerchantRoutingKey
//CC Credit	14                  1414
//DC Credit	14                  1414
//eCheck/ACH	21                  2121
//CP Credit Sale	20          2020
//CP Debit Sale         20          2020
//
//$GatewayV3Proxy = "https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/";
//$GatewayV3ProxyJSON = "https://vsafeecl3.ecustomersupport.com:6060/GatewayV3ProxyJSON/Service/";


//Strip empty tags from array because sandbox runs validation on these even if they are empty
$_POST = array_filter( $_POST, 'strlen' );
if (isset($_POST["api_method"]) AND $_POST["api_method"] == "BankAccountToTemporaryToken") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/BankAccountToTemporaryToken';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "ChallengeQuestionAnswer") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/ChallengeQuestionAnswer';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "ChallengeQuestionBegin") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/ChallengeQuestionBegin';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "ChargeAccountToTemporaryToken") {
    getToken($_POST);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "ChargeAuthorize") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/ChargeAuthorize';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "ChargeConfirm") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/ChargeConfirm';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "ChargeGetPaymentDeviceInfo") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/ChargeGetPaymentDeviceInfo';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "ChargeSale") {
    callChargeSale($_POST);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "CheckReportStatus") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/CheckReportStatus';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "CheckSale") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/CheckSale';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "CPChargeSale") {
    $url = '';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "CPDebitSale") {
    $url = '';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "CPReversePayment") {
    $url = '';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "CPSaleComplete") {
    $url = '';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "DebitSale") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/DebitSale';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "DownloadReportFile") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/DownloadReportFile';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "GenerateReport") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/GenerateReport';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "GetPaymentStatus") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/GetPaymentStatus';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "GetSessionTags") {
    getSessionTags($_POST);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "HeartBeat") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/HeartBeat';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "PaymentDeviceChargeRegister") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/PaymentDeviceChargeRegister';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "PaymentDeviceChargeUpdate") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/PaymentDeviceChargeUpdate';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "PaymentDeviceCheckRegister") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/PaymentDeviceCheckRegister';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "PaymentDeviceCheckUpdate") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/PaymentDeviceCheckUpdate';
    executeAPICall($_POST, $url, $_POST["api_method"]); 
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "PaymentDeviceOnFileRemove") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/PaymentDeviceOnFileRemove';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "RecurringPaymentEnroll") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/RecurringPaymentEnroll';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "RecurringPaymentEnrollStatus") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/RecurringPaymentEnrollmentStatus';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "RecurringPaymentStatus") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/RecurringPaymentStatus';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "RecurringPaymentUnenroll") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/RecurringPaymentUnEnroll';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "Refund") {
    //create ChargeSale Transaction as basis for refund
    $webSessionID = '';
    $webSessionID = getSessionTags($_POST)['WebSessionID'];
    debug_to_console('Refund Web session ID returned from GetSession Tags:', $webSessionID);

    //required if imdemnified and ChargeSource is WEB
    $_POST['WebSessionID'] = $webSessionID;

    $newToken = '';
    $newToken = getToken($_POST);
    $_POST['ChargeAccountNumberToken'] = $newToken;
    $post_data = populateDefaultData($_POST);
    debug_to_console('Inside Refund:', $post_data);
    $Sale_Result = callChargeSale($post_data);
    debug_to_console('Refund ChargeSale Result:', $Sale_Result);
    if ($Sale_Result['PaymentStatus'] == 10) {
        //we have a successful sale to refund a payment on

        $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/ReversePayment';
        $payload = array(
            'AccountName' => $post_data['AccountName'],
            'ChargeAmount' => $post_data['ChargeAmount'],
            'CreatedByUser' => $_POST['CreatedByUser'],
            'Password' => $post_data['Password'],
            'PaymentID' => $Sale_Result['PaymentID'],
            'RefundAmount' => $_POST['RefundAmount'],
            'TransactionID' => uniqid('Vesta', true)
        );
        executeAPICall($payload, $url, $_POST["api_method"]);
    } else {
        debug_to_console("Refund error, ChargeSale call failed", $Sale_Result);
    }
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "ReversePayment") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/ReversePayment';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "ReverseCheckPayment") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/ReverseCheckPayment';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "TestCurl") {
    //THIS WAS TRYING TO USE CURL AND I COULDN'T GET IT TO WORK
    $post_data = array(
        'ChargeAccountNumber' => $_POST['ChargeAccountNumber'],
        'AccountName' => $_POST['AccountName']
    );
    debug_to_console('post_data ', $post_data);
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/ChargeAccountToTemporaryToken';
    curl_setopt($curl, CURLOPT_URL, "https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/ChargeAccountToTemporaryToken/");
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
//  curl_setopt ($curl, CURLOPT_CAINFO, "C:\xampp\htdocs\VestaAPISamples\cacert.pem");
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//  curl_setopt($curl, CURLOPT_FAILONERROR, false);
//    $result = curl_helper_post($curl, $url, $post_data);
    $result = curl_exec($curl);
    if ($result == false) {
        curl_helper_error($curl, $url, $post_data);
        debug_to_console('error result', $result);
        die();
    }
    curl_close($curl);

    debug_to_console('result', $result);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "TokenOneStep") {
    $newToken = '';
    $newToken = getToken($_POST);

    $_POST['ChargeAccountNumberToken'] = $newToken;
    debug_to_console('Inside Token One Step with new Token:', $_POST);
    callChargeSale($_POST);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "TokenTwoStep") {
    //required if imdemnified and ChargeSource is WEB
    $webSessionID = '';
    $webSessionID = getSessionTags($_POST)['WebSessionID'];
    debug_to_console('Web session ID returned from GetSession Tags:', $webSessionID);

    $_POST['WebSessionID'] = $webSessionID;

    $newToken = '';
    $newToken = getToken($_POST);

    $_POST['ChargeAccountNumberToken'] = $newToken;
    $post_data = populateDefaultData($_POST);
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/ChargeAuthorize';
    debug_to_console('Token Two Step call ChargeAuthorize:', $_POST);
    $call_response = executeAPICall($post_data, $url, $_POST["api_method"]);
    debug_to_console('Token Two Step response from authorize:', $call_response);
    if ($call_response['PaymentStatus'] == 5) {
        //Call was Authorized Successfully, call ChargeConfirm to settle
        debug_to_console('Token Two Step call ChargeConfirm:', $post_data);
        $payload = array(
            'AccountName' => $post_data['AccountName'],
            'ChargeAmount' => $post_data['ChargeAmount'],
            'Password' => $post_data['Password'],
            'PaymentID' => $call_response['PaymentID'],
            'TransactionID' => $post_data['TransactionID']
        );
        $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/ChargeConfirm';
        executeAPICall($payload, $url, $_POST["api_method"]);
    } else {
        debug_to_console('Something went wrong in two step authorize:', $call_response);
    }
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "TokenWithFingerprintOneStep") {

    debug_to_console('Inside TokenWithFingerprintOneStep:', $_POST);
    // In order to pend a transaction and call ChallengeQuestionBegin, we need a valid webSessionId returned from the getSessionTags API call
    $webSessionID = '';
    $webSessionID = getSessionTags($_POST)['WebSessionID'];
    debug_to_console('Web session ID returned from GetSession Tags:', $webSessionID);

    //required if imdemnified and ChargeSource is WEB
    $_POST['WebSessionID'] = $webSessionID;

    $newToken = '';
    $newToken = getToken($_POST);
    $_POST['ChargeAccountNumberToken'] = $newToken;
    $post_data = populateDefaultData($_POST);
    debug_to_console('Inside Token One Step with new Token:', $post_data);
    callChargeSale($post_data);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "ValidateChargeAccount") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/ValidateChargeAccount';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "WalletCreate") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/WalletCreate';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "WalletList") {
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/WalletList';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} else {
    echo 'Im Sorry, Something has gone wrong';
}

function getSessionTags($_DATA) {
    $url = "https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/GetSessionTags";
debug_to_console('Is FingerPrint HERE:', $_DATA);
    $payload = array(
        'TransactionID' => $_DATA['TransactionID'],
        'AccountName' => $_DATA['AccountName'],
        'Password' => $_DATA['Password']
    );
    
    debug_to_console('Parameters Passed to getSessionTags:', $payload);

    $context = stream_context_create(array(
        'http' => array(
            'method' => 'POST',
            'header' => "Connection: close\r\n"
            . "Content-Type: application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($payload)
        )
    ));

    $result = array();

    parse_str(file_get_contents($url, true, $context), $result);

    $error = null;
    if ($result['ResponseCode'] == 0) {
        debug_to_console('Successfully called GetSessionTags ', $result);
//        $fingerprintEndpoint = 'https://paysafe.ecustomerpayments.com/PaySafeUIRedirector';
        $fingerprintEndpoint = 'https://fingerprint.ecustomerpayments.com/ThreatMetrixUIRedirector';
        $embedHtml = sprintf('<p style="background:url(%1$s/fp/clear.png?org_id=%2$s&session_id=%3$s&m=1);"></p> <img src="%1$s/fp/clear.png?org_id=%2$s&session_id=%3$s&m=2" /> <script type="text/javascript" src="%1$s/fp/check.js?org_id=%2$s&session_id=%3$s"></script> <object data="%1$s/fp/fp.swf?org_id=%2$s&session_id=%3$s" type="application/x-shockwave-flash" width="1" height="1"> <param value="%1$s/fp/fp.swf?org_id=%2$s&session_id=%3$s" name="movie" /> </object>'
                , $fingerprintEndpoint
                , $result['OrgID']
                , $result['WebSessionID']);

        echo $embedHtml;
    } else {
        // An error occurred
        $error = $result['ResponseText'];
    }
    return $result;
}

function getToken($PostData) {

    debug_to_console('Parameters Passed to getToken:', $PostData);

    $payload = array(
        'AccountName' => $PostData['AccountName'],
        'ChargeAccountNumber' => $PostData['ChargeAccountNumber']
    );
    debug_to_console('Only call with Accountname and Card Number:', $payload);
    $query = http_build_query($payload);

    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/ChargeAccountToTemporaryToken';
    $context = stream_context_create(array(
        'http' => array(
            'method' => 'POST',
            'header' => "Connection: close\r\n"
            . "Content-Type: application/x-www-form-urlencoded\r\n",
            'content' => $query
        )
    ));

    $result = array();
    parse_str(file_get_contents($url, false, $context), $result);
    $error = null;
    if ($result['ResponseCode'] == 0) {

        $cardToken = $result['ChargeAccountNumberToken'];

        debug_to_console("SUCCESS getting token: ", $cardToken);

        return $cardToken;
    } else {
        $error = $result['ResponseText'];

        debug_to_console("OOPS. We have an error in getToken", $error);
    }
    return $cardToken;
}

function callChargeSale($_data) {
    debug_to_console("Parameters passed to ChargeSale:", $_data);
    $url = 'https://vsafeecl3.ecustomersupport.com:6060/GatewayV3Proxy/Service/ChargeSale';
    $result = executeAPICall($_data, $url, $_data["api_method"]);
    return $result;
}

function debug_to_console($message, $data) {
    if (is_array($data) || is_object($data)) {
        echo("<script>console.log('PHP: $message " . json_encode($data) . "');</script>");
    } else {
        echo("<script>console.log('PHP: $message" . $data . "');</script>");
    }
}

function executeAPICall($post_data, $url, $api) {
    debug_to_console("executeAPICall for $api", $post_data);  
    $query = http_build_query($post_data);

    $context = stream_context_create(array(
        'http' => array(
            'method' => 'POST',
            'header' => "Connection: close\r\n"
            . "Content-Type: application/x-www-form-urlencoded\r\n",
            'content' => $query
        )
    ));

    $result = array();
    parse_str(file_get_contents($url, false, $context), $result);
//    debug_to_console("executeAPICall RESULT $api", $result);

    if ($result['ResponseCode'] == 0) {
        debug_to_console("Success in $api", $result);
    } else {
        debug_to_console("OOPS, error in $api", $result);
    }
    return $result;
}

function populateDefaultData($post_data) {
    $post_data['CardHolderPostalCode'] = 97034;
    $post_data['ChargeSource'] = 'WEB';
    $post_data['CardHolderAddressLine1'] = '123 Main St.';
    $post_data['CardHolderCountryCode'] = 'US';
    $post_data['ChargeAmount'] = '12.25';
    $post_data['CardHolderFirstName'] = 'John';
    $post_data['CardHolderLastName'] = 'Doe';
    $post_data['CardHolderCity'] = 'Tigard';
    $post_data['CardHolderRegion'] = 'OR';
    $post_data['IsTempToken'] = true;
    $post_data['RiskInformation'] = '<ShoppingCart xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"></ShoppingCart>';

    return $post_data;
}
