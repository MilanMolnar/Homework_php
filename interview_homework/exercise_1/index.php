<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise 1</title>
</head>

<body>
    <?php
    function processString($text){
        //Gets everything except for "ő" and "ű"
        $unaccented =  preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities($text));
        $search = array("ő", "Ő", "ű", "Ű");
        $replace = array("o", "O", "u", "U");
        //Replaced all accented characters
        $unaccented = str_replace($search, $replace, $unaccented);
        //Replace all special characters with dashes
        return preg_replace('/[^A-Za-z0-9\-]/', '-', $unaccented);
    }


    function AlternativeSolution($text){
        //Get all hungarian accented character and put them in an associative array with the respected counter part
        $unwantedArray = array('Á'=>'A','É'=>'E', 'Í'=>'I','Ó'=>'O', 'Ő'=>'O', 'Ö'=>'O', 'Ű'=>'U', 'Ü'=>'U','Ú'=>'U', //Upper case
                               'á'=>'a','é'=>'e', 'í'=>'i', 'ö'=>'o', 'ő'=>'o','ó'=>'o', 'ú'=>'u', 'ü'=>'u', 'ű'=>'u'); //Lower case
        $unaccented = strtr( $text, $unwantedArray );
        return preg_replace('/[^A-Za-z0-9\-]/', '-', $unaccented);
    }


    echo "Original solution:" . "<br>";
    echo processString("á|éa Üüz:öÖ");
    echo "<br> <hr>" . "Alternative solution:" . "<br>";
    echo AlternativeSolution("á|éa Üüz:öÖ"); //Please note that you can not create an exhaustive list of all the accented characters, so I only used the hungarian ones
    ?>

</body>
</html>




