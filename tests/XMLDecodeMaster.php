<?php        
    $setSubscription = $dom->getElementsByTagName('catalog')->item(0);
    $array = child($setSubscription);
    var_dump($array);
    
    function child($setSubscription){
        if ($setSubscription->hasChildNodes() && $setSubscription->nodeName != "#text") {
            foreach ($setSubscription->childNodes as $index => $node){
                    $array[$node->nodeName . $index] = child($node);
            }
            return $array;
        }
        return $setSubscription->textContent;
    }