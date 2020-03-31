<?php
  $name = $_POST['name'] ?? null;
  $email = $_POST['email'] ?? null;
  $country = $_POST['country'] ?? null;
 
  if ($_POST['sex'] === "male")  
      $sex = "Мужской";
  elseif ($_POST['sex'] === "female")
      $sex = "Женский";
  else
      $sex = null;

  $sms = $_POST['sms'] ?? null;

  if (empty($name) || empty($email) || empty($sms))
  {
    echo "Empty name, email or message";
  } else
    {
      $data = "Имя: ${name}\nEmail: ${email}\nСтрана: $country\nПол: $sex\nСообщение: $sms";
      $file = "../data/" . mb_strtolower($email) . ".txt";
      file_put_contents($file, $data);
    }
?>