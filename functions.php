<?php
function showAll()  {
    $lines = file($file_log);
    foreach ($lines as $line) {
        $oneWord = explode(",", $line);
        echo "Date : $oneWord[0] <br>";
        echo "IP : $oneWord[1] <br>";
        echo "Email : $oneWord[2] <br>";
        echo "Name : $oneWord[3] <br>";
    
    }   
}


function search($file_path, $key) {
    $lines = file($file_path);
    foreach ($lines as $value) {
        $words = explode(",", $value);
        if (trim($words[3]) === $key) {
            echo "The date is :" . $words[0] . "<br>";
            echo "IP address :" . $words[1] . "<br>";
            echo "Email  :" . $words[2] . "<br>";
            echo "Name :" . $words[3] . "<br>";
            echo "<hr>";
        }
    }
}
