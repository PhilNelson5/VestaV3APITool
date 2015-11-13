<?php
 
$url = 'https://paysafesandbox.ecustomerpayments.com/GatewayProxyJSON/Service/GetSessionTags';
 
$payload = array(
    'TransactionID' => uniqid('Vesta', true),
    'AccountName'   => 'BcI/eAaBXWvNozS3xMK5kw==',
    'Password'      => 'WNkDUagtVq6w+37jmkcIzXjFGZ27pnp74GzCXcBi3OmH35zrXkNs6/lSaW2n1vx9',
);
 
$context = stream_context_create(array(
    'http' => array(
        'method'  => 'POST',
        'header'  => "Connection: close\r\n"
                   . "Content-Type: application/json\r\n",
        'content' => json_encode($payload)
    )
));
 
$result = array();
$result = json_decode (file_get_contents($url, false, $context),true);
 
$paymentID = null;
$error = null;
if ($result['ResponseCode'] == 0) {
    $fingerprintEndpoint = 'https://paysafesandbox.ecustomerpayments.com/PaySafeUIRedirector';
    $embedHtml = sprintf(
            '<p style="background:url(%1$s/fp/clear.png?org_id=%2$s&session_id=%3$s&m=1);"></p>' .
            '<img src="%1$s/fp/clear.png?org_id=%2$s&session_id=%3$s&m=2" />' .
            '<script type="text/javascript" src="%1$s/fp/check.js?org_id=%2$s&session_id=%3$s"></script>' .
            '<object data="%1$s/fp/fp.swf?org_id=%2$s&session_id=%3$s" type="application/x-shockwave-flash" width="1" height="1">' .
            '  <param value="%1$s/fp/fp.swf?org_id=%2$s&session_id=%3$s" name="movie" />' .
            '</object>'
        , $fingerprintEndpoint
        , $result['OrgID']
        , $result['WebSessionID']);
 
    echo $embedHtml;
} else {
    // An error occurred
    $error = $result['ResponseText'];
}