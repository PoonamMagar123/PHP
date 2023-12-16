<?php
    $str = "This is a string";
    echo $str;
    $lenn = strlen($str);
    echo "<br>The lenght of this string is $lenn";
    echo "<br>The lenght of word in this string is ". str_word_count($str). ". Thank You! <br>";
    
    echo "<br>The reverse string is :-". strrev($str);
    echo "<br>The Position string is :-". strpos($str, "is");
    
    echo "<br>The Replace string is :-". str_replace("is", "at", $str);