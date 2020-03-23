<?php
  header('Content-Type: text/plain');
  $Data = file_get_contents('data/email.txt');

 
  echo ("First Name: ${Firstname}\n");
  echo ("Last Name: ${Lastname}\n");
  echo ("Email: ${Email}\n");
  echo ("Age: ${Age}\n"); 