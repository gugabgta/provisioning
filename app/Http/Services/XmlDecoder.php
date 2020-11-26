<?php

namespace App\Http\Services;

use DOMDocument;

class XmlDecoder
{
    public function getElement($xml,$element){
        $dom = new DOMDocument();
        $dom->loadXml($xml);
        
        $node = $dom->getElementsByTagName($element)->item(0);
        if ($node !== null) {
            $respCode = intval($node->nodeValue);
            return $respCode;
        }
    }
}