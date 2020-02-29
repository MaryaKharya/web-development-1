<?php
  header('Content-Type: text/plain');
  function getGETParameter(string $text): ? string
  {
    return isset($_GET[$text]) ? (string)$_GET[$text] : null; //для чего string?
  }
  
  $text = getGETParameter('identifier');

  $n = 0;
  $Ch = $text[$n];
  if ($text !== null)
    if (is_numeric($Ch))
      echo 'No, invalid identifier';
    else
      echo 'Yes, correct identifier';
  else
    echo 'Not found identifier'
  
?>