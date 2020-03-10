<?php
  header('Content-Type: text/plain');
  function getGETParameter(string $parameter): ?string
  {
    return isset($_GET[$parameter]) ? (string)$_GET[$parameter] : null; //для чего string?
  }
  
  $text = getGETParameter('text');
  
  //Delete spaces before the text and at the end
  $text = trim($text, ' ');                    

  //Print words, replacing few spaces with one
  $text = preg_replace('/\s+/', ' ', $text);                          
  echo $text;