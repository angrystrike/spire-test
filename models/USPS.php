<?php


class USPS {
    public static function formatAddress($addressData) {
        $curl = curl_init();
        $url = 'http://production.shippingapis.com/ShippingAPI.dll?API=Verify&XML=';
        $userName = Config::get('app/usps_username');

        $xml = "<AddressValidateRequest USERID='{$userName}'><Address ID='0'><Address1>{$addressData['address1']}</Address1><Address2>{$addressData['address2']}</Address2><City>{$addressData['city']}</City><State>{$addressData['state']}</State><Zip5>{$addressData['zipcode']}</Zip5><Zip4></Zip4></Address></AddressValidateRequest>";
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
        $data = $array['Address'];

        if (array_key_exists('Error', $data)) {
            return json_encode(array(
                'success' => false,
                'data' => 'Error: ' . $data['Error']['Description']
            ));
        }
        return json_encode(array(
            'success' => true,
            'data' => array(
                'address1' => ifset($data, 'Address1'),
                'address2' => ifset($data, 'Address2'),
                'city' => ifset($data,'City'),
                'state' => ifset($data,'State'),
                'zip4' => ifset($data,'Zip4'),
                'zip5' => ifset($data,'Zip5')
            )
        ));
    }

}
