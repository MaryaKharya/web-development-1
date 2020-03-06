<?php
  header('Content-Type: text/plain');
  $first_name = file_get_contents('data/first_name.txt');
  $last_name = file_get_contents('data/last_name.txt');
  $email = file_get_contents('data/email.txt');
  $age = file_get_contents('data/age.txt');
  echo ("First Name: ${first_name}\n");
  echo ("Last Name: ${last_name}\n");
  echo ("Email: ${email}\n");
  echo ("Age: ${age}\n"); 