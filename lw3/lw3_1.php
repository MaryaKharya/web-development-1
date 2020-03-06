<?php
  header('Content-Type: text/plain');
  function getGETParameter(string $parameter): ?string
  {
    return isset($_GET[$parameter]) ? (string)$_GET[$parameter] : null; //для чего string?
  }
  
  $text = getGETParameter('text');
  
  //Удаляем пробелы перед текстом и в конце
  $text = trim($text, ' ');                    

  //Выводим слова, сокращяя количество пробелов между ними до одного
  $text = preg_replace('/\s+/', ' ', $text);                          
  echo $text;
  
/* ?>
далее html либо к-н друго код. */