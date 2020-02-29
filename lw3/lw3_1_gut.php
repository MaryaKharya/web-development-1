<?php
  header('Content-Type: text/plain');
  function getGETParameter(string $text): ? string
  {
    return isset($_GET[$text]) ? (string)$_GET[$text] : null; //для чего string?
  }
  
  $text = getGETParameter('text');
  //Удаляем пробелы перед текстом
  $n = 0;
  $Ch = $text[$n];
  while ($Ch === ' ') {
    $n++;
    $Ch = $text[$n];
  }
  
  /*if ($Ch === '')
    echo 'null';
  else
    echo 'norm'; */

  //Выводим слова, сокращяя количество пробелов между ними до одного
  while ($Ch !== '') {
    while ($Ch !== ' ') {
      echo $Ch;
      $n++;
      $Ch = $text[$n];
    }
    while ($Ch === ' ') {
      $n++;
      $Ch = $text[$n];
    }
    if (($Ch !== ' ') and ($Ch !== ''))
      echo ' ';
  }
  
?>