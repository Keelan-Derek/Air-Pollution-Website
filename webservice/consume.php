<?php

    header('Content-Type: text/xml; charset=utf-8');
    $url = "http://localhost/AirPollution_Website/webservice/purchases.xml";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $responseXML= curl_exec($ch);
    curl_close($ch);
    //echo $responseXML;
    
    $doc = new DOMDocument(); 
    $doc->loadXML($responseXML); 
    echo $doc->saveXML();
    
    
?>