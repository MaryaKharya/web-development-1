<?php
  header('Content-Type: text/plain');
  function getGETParameter(string $text): ? string
  {
    return isset($_GET[$text]) ? (string)$_GET[$text] : null; //для чего string?
  }
  
  $text = getGETParameter('password');

  $protection = 0;
  $protection = $protection + (4*strlen($text)); //Добавляет к надёжности пароля его длинну*4   len*4
  $protection = $protection + (4*preg_match_all("/[0-9]/", $text)); //Если есть ЦИФРЫ добавляет n*4
  if (preg_match_all("/[A-Z]/", $text) > 0)
    $protection = $protection + ((strlen($text) - preg_match_all("/[A-Z]/", $text))*2); //Если есть ЗАГЛАВНЫЕ буквы добавляет (n-len)*2
  if (preg_match_all("/[a-z]/", $text) > 0)
    $protection = $protection + ((strlen($text) - preg_match_all("/[a-z]/", $text))*2); //Если есть СТРОЧНЫЕ буквы добавляет (n-len)*2
  if (preg_match_all("/[0-9]/", $text) === 0) 
    $protection = $protection - strlen($text); //Если пароль состоит только из БУКВ вычитаем из надёжности длину пароля
  if (preg_match_all("/[a-zA-Z]/", $text) === 0)
    $protection = $protection - strlen($text);  //Если пароль состоит только из ЦИФР вычитаем из надёжности длину пароля

  $arr = str_split($text);                   //Создаёт из строки явный моссив символов
  $arr = array_count_values($arr);           //Создаёт новый массив: ключ - эллемент указанного массива, значение - частота его повторений

  foreach ($arr as $Ch) {                    //Проходит по массиву, если колличество повторений больше 1, вычитает их из надёжности 
    if ($Ch > 1)
      $protection = $protection - $Ch;
  }
  echo $protection;
?>