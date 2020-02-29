<?php
  header('Content-Type: text/plain');
  function getGETParameter(string $text): ? string
  {
    return isset($_GET[$text]) ? (string)$_GET[$text] : null; //для чего string?
  }
  
  $text = getGETParameter('text');
  
  //Удаляем пробелы перед текстом и в конце
  $text = ltrim($text, ' ');
  $text = rtrim($text, ' ');

  //Выводим слова, сокращяя количество пробелов между ними до одного
  $text = preg_replace('/\s+/', ' ', $text);
  echo $text;
  
?>