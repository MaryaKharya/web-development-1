<?php
  header('Content-Type: text/plain');
  function GETParameter(string $text): ? string   //для чего string?
  {
    return isset($_GET[$text]) ? (string)$_GET[$text] : null; 
  }
  
  //Добавляет к надёжности пароля его длинну, умноженную на 4
  function addLen() {
    return 4 * strlen($text);
  }

  //Добавляет к надёжности количество цифр в пароле, умноженное на 4
  function checkNumber() {
    return 4 * preg_match_all("/[0-9]/", $text);
  }

  //Добавляет (len-n)*2, где len - длина пароля, n - количество ПРОПИСНЫХ букв
  function checkUppercase() {
    return (strlen($text) - preg_match_all("/[A-Z]/", $text))*2;
  }

  //Добавляет (len-n)*2, где len - длина пароля, n - количество СТРОЧНЫХ букв
  function checkLowercase() {
    return (strlen($text) - preg_match_all("/[a-z]/", $text))*2;
  }

  //Вычитает из надёжности длину пароля, если он состоит только из БУКВ
  function checkOnlyLetter() {
    if (preg_match_all("/[0-9]/", $text) === 0) 
      return -strlen($text); 
  }

  //Вычитает из надёжности длину пароля, если он состоит только из ЦИФР
  function checkOnlyNumber() {
    if (preg_match_all("/[a-zA-Z]/", $text) === 0)
      return -strlen($text); 
  }

  //Вычитает из надёжности пароля, количество повторяющихся символов
  function checkRepetition() {
    $arrChar = str_split($text);                //Создаёт из строки массив символов
    $arrRepeat = array_count_values($arrChar);  //Создаёт новый массив: ключ - эллемент указанного массива, значение - частота его повторений
    $count = 0;
    foreach ($arrRepeat as $repetition) {       
      if ($repetition > 1)
        $count += $repetition;
    return -$count;
    }
  }


  $text = GETParameter('password');

  $protection = 0;
  $protection += addLen();
  $protection += checkNumber();
  $protection += checkUppercase();
  $protection += checkLowercase();
  $protection += checkOnlyLetter();
  $protection += checkRepetition();

  echo $protection; 

  //Закачать всё в функции и комментарии прописать на англ.