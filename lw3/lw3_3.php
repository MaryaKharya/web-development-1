<?php
  header('Content-Type: text/plain');
  function GETParameter(string $text): ? string
  {
    return isset($_GET[$text]) ? (string)$_GET[$text] : null; 
  }
  
  function AddLength($text) 
  {
    return 4 * strlen($text);
  }

  function AddForDigits($text) 
  {
    return 4 * preg_match_all("/[0-9]/", $text);
  }

  function AddForUppercase($text) 
  {
    return (strlen($text) - preg_match_all("/[A-Z]/", $text))*2;
  }

  function AddForLowercase($text) 
  {
    return (strlen($text) - preg_match_all("/[a-z]/", $text))*2;
  }
  
  function SubtractIfOnlyLetters($text) 
  {
    if (preg_match_all("/[0-9]/", $text) === 0) 
      return -strlen($text); 
  }

 
  function SubtractIfOnlyDigits($text) 
  {
    if (preg_match_all("/[a-zA-Z]/", $text) === 0)
      return -strlen($text); 
  }

  function SubtractRepetition($text) 
  {
    $arrChar = str_split($text);                
    $arrRepeat = array_count_values($arrChar);  
    $count = 0;
    foreach ($arrRepeat as $repetition) 
    {       
      if ($repetition > 1)
        $count += $repetition;
    return -$count;
    }
  }

  function PrintSecurityPassword()
  {
    $password = GETParameter('password');
    $protection = 0;
    $protection += AddLength($password);
    $protection += AddForDigits($password);
    $protection += AddForUppercase($password);
    $protection += AddForLowercase($password);
    $protection += SubtractIfOnlyLetters($password);
    $protection += SubtractRepetition($password);
    echo $protection;
  }

  PrintSecurityPassword();