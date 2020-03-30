<?php
  $name = $_POST['name'] ?? null;
  $email = $_POST['email'] ?? null;
  $country = $_POST['country'] ?? null;
  $sex = $_POST['sex'] ?? null;
  $sms = $_POST['sms'] ?? null;

  if (empty($name) || empty($email) || empty($sms))
  {
    echo "Empty name, email or message";
  } else
    {
      $data = "Name: ${name}\nEmail: ${email}\nCountry: $country\nSex: $sex\nMessage: $sms\n";
      $file = "../data/" . mb_strtolower($email) . ".txt";
      file_put_contents($file, $data);
    }
?>