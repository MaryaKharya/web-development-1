<?php
  header('Content-Type: text/plain');
  function getGETParameter(string $text): ? string
  {
    return isset($_GET[$text]) ? (string)$_GET[$text] : null;
  }
  
  $text = getGETParameter('identifier');

  if ($text !== null)
    if ((preg_match("/^[a-zA-Z][a-zA-Z0-9]*$/", $text)) && (!preg_match("/[#]/", $text)))
      echo 'Yes, correct identifier';
    else
      echo 'No, invalid identifier';
  else
    echo 'Not found identifier';
  
