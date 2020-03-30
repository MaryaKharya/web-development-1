<?php
  $email = mb_strtolower($_GET['email']);
  $data = file_get_contents("../data/" . $email . ".txt");
  $array_data = explode("Message:", $data);
  isset($array_data[1]) ? $message = $array_data[1] : $message = null;
  if (isset($message))
  {
    $message = substr($message, 0, strpos($message, "\n"));
    echo trim($message);
  } else
    {
      echo "Сообщения от данного пользователя не найдено";
    }
