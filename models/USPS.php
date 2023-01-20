<?php

require_once '../core/Helpers.php';
require_once '../core/Config.php';

class USPS {
    private $_db;
    private $_data;
    private $_sessionName;

    public function __construct() {
        $this->_db = Database::getInstance();
        $this->_sessionName = Config::get('session/session_name');
    }

    public function data()
    {
        return $this->_data;
    }
    
    public static function formatAddress($addressData) {
        $curl = curl_init();
        $url = 'http://production.shippingapis.com/ShippingAPI.dll?API=Verify&XML=';
        $userName = Config::get('app/usps_username');

        $xml = "<AddressValidateRequest USERID='955GOLDE1085'><Address ID='0'><Address1>{$addressData['address1']}</Address1><Address2>{$addressData['address2']}</Address2><City>{$addressData['city']}</City><State>{$addressData['state']}</State><Zip5>{$addressData['zipcode']}</Zip5><Zip4></Zip4></Address></AddressValidateRequest>";
        $xml = encodeURIComponent($xml);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . $xml,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;

        $xml = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json, TRUE);
        //print("<pre>".print_r($array,true)."</pre>");

        // print_r($array['Address']['Error']['Description']);

        if ($array['Address']['Error']) {
            return json_encode(array(
                'success' => false,
                'data' => 'Error: ' . $array['Address']['Error']['Description']
            ));
        }
        $data = $array['Address'];
        return json_encode(array(
            'success' => true,
            'data' => array(
                'address1' => $data['Address1'],
                'address2' => $data['Address2'],
                'city' => $data['City'],
                'state' => $data['State'],
                'zip4' => $data['Zip4'],
                'zip5' => $data['Zip5']
            )
        ));
    }

}
