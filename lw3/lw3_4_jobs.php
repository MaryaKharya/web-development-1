<?php
  header('Content-Type: text/plain');
  function GETParameter(string $text): ?string
  {
    return isset($_GET[$text]) ? (string)$_GET[$text] : null;
  }
  
  $first_name = GETParameter('first_name');
  $last_name = GETParameter('last_name');
  $email = GETParameter('email');
  $age = GETParameter('age');

  $f_name1 = 'data/first_name.txt';
  $f_name2 = 'data/last_name.txt';
  $f_email = 'data/email.txt';
  $f_age = 'data/age.txt';
  file_put_contents($f_name1, $first_name);
  file_put_contents($f_name2, $last_name);  
  file_put_contents($f_email, $email);  
  file_put_contents($f_age, $age);  