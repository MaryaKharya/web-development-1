<?php
  header('Content-Type: text/plain');
  function GETParameter(string $text): ?string
  {
    return isset($_GET[$text]) ? (string)$_GET[$text] : null;
  }

  function WriteInFile($text)
  {
    $Handle = Fopen("data/email.txt", "w");
    Fwrite($Handle, $text);
    Fclose($Handle);
  }

  function AddData() 
  {
    $Firstname = GETParameter('first_name');
    $Lastname = GETParameter('last_name');
    $Email = GETParameter('email');
    $Age = GETParameter('age');


    $Data = "First name: ${Firstname}\nLast name: ${Lastname}\nEmail: ${Email}\nAge: ${Age}\n";

    WriteInFile($Data);
  } 
  
  AddData();