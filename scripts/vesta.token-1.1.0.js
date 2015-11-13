/*
 * Lightweight JSONP fetcher
 * Copyright 2010-2012 Erik Karlsson. All rights reserved.
 * BSD licensed
 *
 * https://github.com/IntoMethod/Lightweight-JSONP
 *
 * Minified with http://jscompress.com/
 */
var JSONP=function(){function i(e,n){var i=document.createElement("script"),s=false;i.src=e;i.async=true;var o=n||r.error;if(typeof o==="function"){i.onerror=function(t){o({url:e,event:t})}}i.onload=i.onreadystatechange=function(){if(!s&&(!this.readyState||this.readyState==="loaded"||this.readyState==="complete")){s=true;i.onload=i.onreadystatechange=null;if(i&&i.parentNode){i.parentNode.removeChild(i)}}};if(!t){t=document.getElementsByTagName("head")[0]}t.appendChild(i)}function s(e){return encodeURIComponent(e)}function o(t,o,u,a){var f=(t||"").indexOf("?")===-1?"?":"&",l;a=a||r["callbackName"]||"callback";var c=a+"_json"+ ++e;o=o||{};for(l in o){if(o.hasOwnProperty(l)){f+=s(l)+"="+s(o[l])+"&"}}n[c]=function(e){u(e);try{delete n[c]}catch(t){}n[c]=null};i(t+f+a+"="+c);return c}function u(e){r=e}var e=0,t,n=this,r={};return{get:o,init:u}}()

/*
 * VestaToken PCI Shield
 * Copyright 2010 - 2013 Vesta Corporation. All rights reserved.
 *
 * @version 1.1.0
 * @author Luis Gonzalez luis.gonzalez@trustvesta.com
 */
var VestaToken = (function() {
	var ServiceURL, AccountName;
	/**
	 * Initializes the ServiceURL and AccountName variables
	 * These are mandatory
	 *
	 * @param params {object} Object with the following properties:
	 * * ServiceURL
	 * * AccountName
	 *
	 * @example
	 *   VestaToken.init({ ServiceURL: "https://example.com/Path", AccountName: "VestaDev" });
	 */
	function init(params) {
		this.ServiceURL  = params.ServiceURL;
		this.AccountName = params.AccountName;
	}
	
	/**
	 * Sets the chargeAccountNumber and appropiate callbacks
	 * for the operation. Strips all the non numeric characters
	 * from chargeAccountNumber, checks that it is valid and
	 * performs the call to the PaySafe service
	 *
	 * @param params {object} with the following properties:
	 * * chargeAccountNumber string
	 * * onSuccess: function with the signature callback(Object data)
	 *              data contains the following properties
	 *              * ResponseCode (integer)
	 *              * PaymentDeviceLast4 (string)
	 *              * PaymentDeviceTypeCD (integer)
	 *              * ChargeAccountNumberToken (string)
	 * * onFailed: function with the following signature callback(String value)
	 * * onInvalidInput: function with the following signature callback(String value)
	 */
	function getCreditCardToken(params) {
		var creditCardNumber = params.chargeAccountNumber || '';

		creditCardNumber = creditCardNumber.replace(/[^\d]/, '');
		if (!/^\d{13,}$/.test(creditCardNumber) || !_isMod10(creditCardNumber)) {
			if (typeof params.onInvalidInput == 'function') {
				params.onInvalidInput('Charge Account Number is not valid. Please verify.');
				return;
			}
		}
		
		_sendMessage({
			message       : 'ChargeAccountToTemporaryToken',
			payload       : { ChargeAccountNumber: creditCardNumber },
			onSuccess     : params.onSuccess,
			onFailed      : params.onFailed,
			onInvalidInput: params.onInvalidInput
		});
	}
	
	/**
	 * Makes the actual call to the Service
	 *
	 * @param params {object} Object with the following properties:
	 * * payload Object with the parameters to send
	 * * onSuccess: function with the signature callback(Object data)
	 *              data contains the following properties
	 *              * ResponseCode (integer)
	 *              * PaymentDeviceLast4 (string)
	 *              * PaymentDeviceTypeCD (integer)
	 *              * ChargeAccountNumberToken (string)
	 * * onFailed: function with the following signature callback(String value)
	 * * onInvalidInput: function with the following signature callback(String value)
	 * * message: The API Method to request
	 */
	function _sendMessage(params) {
		var payload        = params.payload        || {};
		var onSuccess      = params.onSuccess      || function(){};
		var onFailed       = params.onFailed       || function(){};
		var onInvalidInput = params.onInvalidInput || function(){};
		var url            = VestaToken.ServiceURL + '/' + params.message;
	
		payload.AccountName = VestaToken.AccountName;
	
		JSONP.init({
			error: function(ex){
				onFailed("Failed to load: " + ex.url);
			}
		});
		
		JSONP.get(url, payload, function(data) {
			if ( !data.ResponseCode ) {
				onFailed('Unknown System Failure');
			} else if( data.ResponseCode >= 500 ) {
				onInvalidInput(data.ResponseText);
			} else if( data.ResponseCode != 0 ) {
				onFailed(data.ResponseText);
			} else {
				onSuccess(data);
			}
		});
	}
	
	/**
	 * Validates a Mod10 number
	 *
	 * @param val {object}
	 *
	 * @returns bool
	 */
	function _isMod10(v) {
		var iTotal = 0;
		var parity = v.length % 2;
	
		for (var i = 0; i < v.length; i++) {
			var calc = parseInt(v.charAt(i));
			if (i % 2 == parity) calc = calc * 2;
			if (calc > 9)        calc = calc - 9;
			iTotal += calc;
		}
	
		return iTotal % 10 == 0;
	}
	
	return {
		init: init,
		getCreditCardToken: getCreditCardToken
	};
})();

// Adding Backwards compatiblity

/**
 * Alias for getCreditCardToken for backwards compatiblity
 * @deprecated
 */
VestaToken.getcreditcardtoken = VestaToken.getCreditCardToken;

/**
 * Alias for VestaToken
 * @deprecated
 */
var vestatoken = VestaToken;