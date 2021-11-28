<?php
$client = null;

try {
    $client = new SoapClient(
        'https://wsiautor.uni-login.dk/wsiautor-v4/ws?WSDL',
        [
            'cache_wsdl' => WSDL_CACHE_NONE,
            'encoding' => 'utf-8',
            'exceptions' => true,
            'soap_version' => SOAP_1_1,
            'trace' => true,
        ],
    );
} catch (SoapFault $e) {
    echo "<pre>";
    var_dump($e->getMessage());
    echo "</pre>";

    if ($client instanceof SoapClient) {
        echo "<pre>";
        var_dump($client->__getLastRequest(), $client->__getLastResponse());
        echo "</pre>";
    }
}
?>