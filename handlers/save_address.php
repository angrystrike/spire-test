<?php

var_dump($_POST);

// function encodeURIComponent($str) {
//     $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
//     return strtr(rawurlencode($str), $revert);
// }

// //$xml = '<AddressValidateRequest USERID="955GOLDE1085"><AddressID="0"><Address1></Address1><Address2>6406 Ivy Lane</Address2><City>Greenbelt</City><State>MD</State><Zip5></Zip5><Zip4></Zip4></AddressID=></AddressValidateRequest>';

// $url = 'http://production.shippingapis.com/ShippingAPI.dll?API=Verify&XML=' . encodeURIComponent($xml);
// // $url = 'http://production.shippingapis.com/ShippingAPI.dll?API=Verify&XML=<AddressValidateRequest USERID="955GOLDE1085"><AddressID="0"><Address1></Address1><Address2>6406 Ivy Lane</Address2><City>Greenbelt</City><State>MD</State><Zip5></Zip5><Zip4></Zip4></AddressID=></AddressValidateRequest>';
// // Initializes a new cURL session
// $curl = curl_init($url);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// $response = curl_exec($curl);
// // Close cURL session
// curl_close($curl);
// echo $response . PHP_EOL;
//$response = file_get_contents('http://production.shippingapis.com/ShippingAPI.dll?API=Verify&XML='.urlencode($xml));

//$response = new SimpleXMLElement($response);

//echo ($response);