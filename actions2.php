<!DOCTYPE html>
<?php
require('helpers.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Time out response                     4002432198795432
//Successful transaction                4200123456719012
//pended transaction                    4628610683834808
//  <ShoppingCart xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"></ShoppingCart>
//    'ChargeAccountNumber'            => 4002432198795432
//    PERSONAL ACCOUNT
//    'AccountName'              => BcI/eAaBXWvNozS3xMK5kw==
//    'Password'                 => WNkDUagtVq6w+37jmkcIzXjFGZ27pnp74GzCXcBi3OmH35zrXkNs6/lSaW2n1vx9
//    
//    VESTA ACCOUNT
//    'AccountName'              => c91yKKKHf+rCSzgwdeuD9g==
//    'Password'                 => HTp+CKx137DjQ/ojL+beveq0wWvrwJnsvxjuV/TMz8ue3kGyA5WIAGlkIGVl2J88
//                              "WalletID":"188"
//                              temp token: 4200800000009384
//                               PHP: Success in RecurringPaymentEnroll {"AVSResultCode":"11","CVNResultCode":"17","ChargePermanentToken":"4200900000000035","EnrollmentID":"768","EnrollmentStatus":"1","PaymentAcquirerName":"Chase Paymentech","PaymentID":"3KVVR0YSW","PaymentStatus":"10","ProxiedMessageName":"RecurringPaymentEnroll","ResponseCode":"0"} 
//    
//AccountName=>"pZ8H7jvp98+bR7vyskYLsA==“, 
//Password=>"lJKC1an4pEKHPMiko7lCI9au/8m4hasy3R0hqYElqIUZ19IdGYSaL96pKJyHIUci”
//Strip empty tags from array because sandbox runs validation on these even if they are empty
$_POST = array_filter($_POST);

if (isset($_POST["api_method"]) AND $_POST["api_method"] == "ChallengeQuestionAnswer") {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/ChallengeQuestionAnswer';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "ChallengeQuestionBegin") {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/ChallengeQuestionBegin';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "ChargeAccountToTemporaryToken") {
    getToken($_POST);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "ChargeAuthorize") {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/ChargeAuthorize';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "ChargeConfirm") {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/ChargeConfirm';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "ChargeGetPaymentDeviceInfo") {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/ChargeGetPaymentDeviceInfo';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "ChargeSale") {
    callChargeSale($_POST);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "CheckReportStatus") {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/CheckReportStatus';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "DownloadReportFile") {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/DownloadReportFile';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "GenerateReport") {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/GenerateReport';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "GetPaymentStatus") {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/GetPaymentStatus';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "GetSessionTags") {
    getSessionTags($_POST);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "HeartBeat") {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/HeartBeat';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "PaymentDeviceChargeRegister") {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/PaymentDeviceChargeRegister';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "PaymentDeviceChargeUpdate") {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/PaymentDeviceChargeUpdate';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "PaymentDeviceOnFileRemove") {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/PaymentDeviceOnFileRemove';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "RecurringPaymentEnroll") {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/RecurringPaymentEnroll';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "RecurringPaymentEnrollStatus") {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/RecurringPaymentEnrollmentStatus';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "RecurringPaymentStatus") {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/RecurringPaymentStatus';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "RecurringPaymentUnenroll") {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/RecurringPaymentUnEnroll';
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

        $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/ReversePayment';
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
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/ReversePayment';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "TestCurl") {
    //THIS WAS TRYING TO USE CURL AND I COULDN'T GET IT TO WORK
    $post_data = array(
        'ChargeAccountNumber' => $_POST['ChargeAccountNumberToken'],
        'AccountName' => $_POST['AccountName']
    );
    debug_to_console('post_data<br />', $post_data);
    $curl = curl_init();
//    output('What is curl: <br />', $curl);

    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/ChargeAccountToTemporaryToken';
    curl_setopt($curl, CURLOPT_URL, "https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/ChargeAccountToTemporaryToken/");
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
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/ChargeAuthorize';
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
        $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/ChargeConfirm';
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
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/ValidateChargeAccount';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "WalletCreate") {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/WalletCreate';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} elseif (isset($_POST["api_method"]) AND $_POST["api_method"] == "WalletList") {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/WalletList';
    executeAPICall($_POST, $url, $_POST["api_method"]);
} else {
    echo 'Im Sorry, Something has gone wrong';
}

function getSessionTags($_DATA) {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/GetSessionTags';

    $payload = array(
        'TransactionID' => $_DATA['TransactionID'],
        'AccountName' => $_DATA['AccountName'],
        'Password' => $_DATA['Password']
    );

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
        debug_to_console('Successfully called GetSessionTags<br />', $result);
        $fingerprintEndpoint = 'https://paysafesandbox.ecustomersupport.com/ThreatMetrixUIRedirector';
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

    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/ChargeAccountToTemporaryToken';
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

        debug_to_console("SUCCESS getting token:<br />", $cardToken);

        return $cardToken;
    } else {
        $error = $result['ResponseText'];

        debug_to_console("OOPS. We have an error in getToken", $error);
    }
    return $cardToken;
}

function callChargeSale($_data) {
    $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/ChargeSale';
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
//    debug_to_console("executeAPICall for $api", $post_data);  
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
