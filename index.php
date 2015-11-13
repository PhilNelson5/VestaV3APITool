<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Vesta API Test Tool</title>
            <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
            <script src="jquery-1.11.3.min.js"></script>
            <script src="ShowForm.js" type="text/javascript"></script>
            <link rel="stylesheet" type="text/css" href="mystyle.css">
    </head>
    <body>
        
        <p>Select the API from the dropdown you wish to test.</p><br>
       
        
        <select id="Api_method" name="api_method" onchange="doIt(this);">
            <option value="ChargeSale">Charge Sale</option>
            <option value="ChargeAuthorize">Charge Authorize</option>
            <option value="GetSessionTags">Get Session Tags</option>
        </select>
        
        <p><br>Enter the required parameters to make your api call.</p>

 <form id="charge_sale  " method="post" action="actions.php">
<!-- <form id="frm1" method="post" action="GetSessionInformation.php"> class="hidden" -->
  AccountName (API username): <input type="text" name="AccountName"><br>
  ChargeAccountNumber: <input type="text" name="ChargeAccountNumber"><br>
  Password: <input type="text" name="Password"><br>
  <input id="ChargeAccountToTemporaryToken" name="ChargeAccountToTemporaryToken" type="submit" value="ChargeAccountToTemporaryToken">
  <input id="ChargeSale" name="ChargeSale" type="submit" value="ChargeSale">
  <input id="AuthorizePayment" name="AuthorizePayment" type="submit" value="AuthorizePayment">
  <input id="GetSessionTags" name="GetSessionTags" type="submit" value="GetSessionTags">
</form>
<input name="ctl00$MainContent$hiddenSessionID" type="hidden" id="ctl00_MainContent_hiddenSessionID" value="999_999999999">
<input name="ctl00$MainContent$hiddenOrgID" type="hidden" id="ctl00_MainContent_hiddenOrgID" value="gpXXXXX">
    <div id="PnlfingerPrinting" style="width:0px;height:0px;">
        <span id="ctl00_MainContent_lblfingerPrinting"><p style='background:url(https://paysafe.ecustomerpayments.com/PaySafeUIRedirector/fp/clear.png?org_id=gp9h38j0&session_id=105_256589796&m=1)'></p>
                                    <img src='https://paysafe.ecustomerpayments.com/PaySafeUIRedirector/fp/clear.png?org_id=gp9h38j0&session_id=105_256589796&m=2' alt='' />
                                    <script src='https://paysafe.ecustomerpayments.com/PaySafeUIRedirector/fp/check.js?org_id=gp9h38j0&session_id=105_256589796' type='text/javascript'></script>
                                    <object data='https://paysafe.ecustomerpayments.com/PaySafeUIRedirector/fp/fp.swf?org_id=gp9h38j0&session_id=105_256589796' type='application/x-shockwave-flash' width='1' height='1' id='obj_id'>
                                        <param value='https://paysafe.ecustomerpayments.com/PaySafeUIRedirector/fp/fp.swf?org_id=gp9h38j0&session_id=105_256589796' name='movie'/>      
                                    </object></span>
    </div>

<p style="background:url(https://paysafe.ecustomerpayments.com/PaySafeUIRedirector/fp/clear.png?org_id={orgID}&session_id={webSessionID}&m=1);"></p>
<img src="https://paysafe.ecustomerpayments.com/PaySafeUIRedirector/fp/clear.png?org_id={orgID}&session_id={webSessionID}&m=2" />
<script type="text/javascript" src="https://paysafe.ecustomerpayments.com/PaySafeUIRedirector/fp/check.js?org_id={orgID}&session_id={webSessionID}"></script>
<object data="https://paysafe.ecustomerpayments.com/PaySafeUIRedirector/fp/fp.swf?org_id={orgID}&session_id={webSessionID}" type="application/x-shockwave-flash" width="1" height="1">
	<param value="https://paysafe.ecustomerpayments.com/PaySafeUIRedirector/fp/fp.swf?org_id={orgID}&session_id={webSessionID}" name="movie" />
</object>

    </body>
    
</html>