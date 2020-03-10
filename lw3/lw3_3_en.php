<?php
  header('Content-Type: text/plain');
  function GETParameter(string $text): ? string   //для чего string?
  {
    return isset($_GET[$text]) ? (string)$_GET[$text] : null; 
  }
  
  //adds the length of the password multiplied by four to the security level
  function addLen($text) {
    return 4 * strlen($text);
  }

  //adds the number of digits in the password multiplied by four to the password security
  function checkNumber($text) {
    return 4 * preg_match_all("/[0-9]/", $text);
  }

  //adds (len-n)*2, where len - password length, n - number of uppercase letters
  function checkUppercase($text) {
    return (strlen($text) - preg_match_all("/[A-Z]/", $text))*2;
  }

  //adds (len-n)*2, where len - password length, n - number of lowercase letters
  function checkLowercase($text) {
    return (strlen($text) - preg_match_all("/[a-z]/", $text))*2;
  }

  //subtract the length of the password from the security level if the password consists only letters
  function checkOnlyLetter($text) {
    if (preg_match_all("/[0-9]/", $text) === 0) 
      return -strlen($text); 
  }

  //subtract the length of the password from the security level if the password consists only digits
  function checkOnlyNumber($text) {
    if (preg_match_all("/[a-zA-Z]/", $text) === 0)
      return -strlen($text); 
  }

  //subtract the number of repeated characters from the password security
  function checkRepetition($text) {
    $arrChar = str_split($text);                
    $arrRepeat = array_count_values($arrChar);  
    $count = 0;
    foreach ($arrRepeat as $repetition) {       
      if ($repetition > 1)
        $count += $repetition;
    return -$count;
    }
  }

  $password = GETParameter('password');

  $protection = 0;
  $protection += addLen($password);
  $protection += checkNumber($password);
  $protection += checkUppercase($password);
  $protection += checkLowercase($password);
  $protection += checkOnlyLetter($password);
  $protection += checkRepetition($password);
  echo $protection;