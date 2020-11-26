<?php


$xml = 
"<?xml version='1.0' encoding='UTF-8'?>
<S:Envelope xmlns:S='http://schemas.xmlsoap.org/soap/envelope/'>
  <S:Header>
    <cai3:SequenceId xmlns:cai3='http://schemas.ericsson.com/cai3g1.2/'/>
    <cai3:TransactionId xmlns:cai3='http://schemas.ericsson.com/cai3g1.2/'/>
    <cai3:SessionId xmlns:cai3='http://schemas.ericsson.com/cai3g1.2/'>9294ebba5e3b46f49b1e4ccbca23426f</cai3:SessionId>
  </S:Header>
  <S:Body>
    <ns2:Fault xmlns:ns2='http://schemas.xmlsoap.org/soap/envelope/' xmlns:ns3='http://www.w3.org/2003/05/soap-envelope'>
      <faultcode>ns2:Server</faultcode>
      <faultstring>error,please check detail</faultstring>
      <detail>
        <ns2:Cai3gFault xmlns:ns2='http://schemas.ericsson.com/cai3g1.2/'>
          <ns2:faultcode>4006</ns2:faultcode>
          <ns2:faultreason>
            <ns2:reasonText>External Error</ns2:reasonText>
          </ns2:faultreason>
          <ns2:faultrole>NEF</ns2:faultrole>
          <ns2:details>
            <ema:UserProvisioningFault xmlns:ema='http://schemas.ericsson.com/ema/UserProvisioning/'>
              <ema:respCode>13001</ema:respCode>
              <ema:respDescription>SERVICE NOT DEFINED</ema:respDescription>
            </ema:UserProvisioningFault>
          </ns2:details>
        </ns2:Cai3gFault>
      </detail>
    </ns2:Fault>
  </S:Body>
</S:Envelope>";

$xml2 =  
'<?xml version="1.0" encoding="UTF-8"?>
 <note>
      <to>Tove</to>
      <from>Jani</Ffrom>
      <heading>Reminder</heading>
      <body>Dont forget me this weekend!</body>
  </note>';

$dom = new DOMDocument();
$dom->loadXml($xml);
var_dump($dom);

$node = $dom->getElementsByTagName('respCode')->item(0);
if ($node !== null) {
    $respCode = $node->nodeValue;
    echo gettype(intval($respCode)) . PHP_EOL;
}