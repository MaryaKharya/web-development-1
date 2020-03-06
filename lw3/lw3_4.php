<?php
  header('Content-Type: text/plain');
  function GETParameter(string $text): ?string
  {
    return isset($_GET[$text]) ? (string)$_GET[$text] : null; //для чего string?
  }
  
  //Можно ли таким образом вызывать функцию? И почему не работает если вытащить переменные?
  function AddData() {
    $first_name = GETParameter('first_name');
    $last_name = GETParameter('last_name');
    $email = GETParameter('email');
    $age = GETParameter('age');
    file_put_contents('data/first_name.txt', $first_name);
    file_put_contents('data/last_name.txt', $last_name);  
    file_put_contents('data/email.txt', $email);  
    file_put_contents('data/age.txt', $age);
  } 
  
  AddData();