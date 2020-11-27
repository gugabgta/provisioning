<?php

namespace App\Http\Services;

use DOMDocument;

class XmlDecoder
{
    public function getElement($xml,$element){
        if(strpos($xml, 'b"') === 0){
            $xml = str_replace('\"', '"', substr($xml, 2, -1));
        }
        $dom = new DOMDocument();
        $dom->loadXml($xml);
        
        $node = $dom->getElementsByTagName($element)->item(0);
        if ($node !== null) {
            $respCode = intval($node->nodeValue);
            return $respCode;
        }
        return 'elemento inexistente';
    }
}
