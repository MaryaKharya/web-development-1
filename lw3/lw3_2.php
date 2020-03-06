<?php
  header('Content-Type: text/plain');
  function getGETParameter(string $text): ? string
  {
    return isset($_GET[$text]) ? (string)$_GET[$text] : null; //для чего string?
  }
  
  $text = getGETParameter('identifier');

  if ($text !== null)
    if ({хз какая команда}("/^[a-zA-Z]+[a-zA-Z0-9]*$/"))
      echo 'No, invalid identifier';
    else
      echo 'Yes, correct identifier';
  else
    echo 'Not found identifier';
  
