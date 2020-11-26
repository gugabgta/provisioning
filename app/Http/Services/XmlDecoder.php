<?php

namespace App\Http\Services;

use DOMDocument;

class XmlDecoder
{
    public function getRespcode($xml){
        $dom = new DOMDocument();
        $dom->loadXml($xml);
        
        $node = $dom->getElementsByTagName('respCode')->item(0);
        if ($node !== null) {
            $respCode = intval($node->nodeValue);
            return $respCode;
        }
    }
}