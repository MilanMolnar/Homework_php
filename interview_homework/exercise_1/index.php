<?php

function processString($text){
    //gets everything except for "ő" and "ű"
    $unaccented =  preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities($text));
    $search = array("ő", "Ő", "ű", "Ű");
    $replace = array("o", "O", "u", "U");
    //replaced all accented characters
    $unaccented = str_replace($search, $replace, $unaccented);
    //replace all special characters with dashes
    return preg_replace('/[^A-Za-z0-9\-]/', '-', $unaccented);
}
