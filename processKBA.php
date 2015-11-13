<!DOCTYPE html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    print_r($_POST);
    
    if(isset($_POST['questions'])) {
        $url = 'https://paysafesandbox.ecustomersupport.com/GatewayProxy/Service/ChallengeQuestionAnswer';

        $payload = array(
            'AnswerNumber' => $_POST["AnswerNumber"],
            'AccountName'   => $_POST["AccountName"],
            'PaymentID'   => $_POST["PaymentID"],
            'Type'   => $_POST["Type"],
            'Password'      => $_POST["Password"],
        );

        $context = stream_context_create(array(
            'http' => array(
                'method'  => 'POST',
                'header'  => "Connection: close\r\n"
                           . "Content-Type: application/x-www-form-urlencoded\r\n",
                'content' => http_build_query($payload)
            )
        ));

        $result = array();

        parse_str(file_get_contents($url, true, $context), $result);
        
        if ($result['ResponseCode'] == 0) {
            debug_to_console('Successfully called ChallengeQuestionAnswer<br />', $result);
        } else {
            debug_to_console('Error in ChallengeQuestionAnswer<br />', $result);
        }
        return $result;
        
    }
    else {
        echo ('Something went wrong processing answers');
    }