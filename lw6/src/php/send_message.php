<?php

function getParameter($name) 
{
    return $_POST[$name] ?? null;
}

function getForm() {
    $name = getParameter('name');
    $email = getParameter('email');
    $country = getParameter('country');
    $sex = getParameter('sex');
    if ($sex === 'male')
    {
        $sex = 'Мужской';
    }
    elseif ($sex === 'female')
    {
        $sex = 'Женский';
    }
    else
    {
        $sex = null;
    }
    $sms = getParameter('sms');
    if (empty($name) || empty($email) || empty($sms))
    {
        return null;
    }
    else
    {
        $data = "Имя: ${name}\nEmail: ${email}\nСтрана: $country\nПол: $sex\nСообщение: $sms";
        $form = [
            "data" => $data,
            "email" => $email,
        ];
        return $form;
    }
}

function saveData()
{
    $form = getForm();
    if (empty($form))
    {
        echo 'Empty name, email or message';
    }
    else
    {
        $data = $form['data'];
        $email = $form['email'];
        $file = '../data/' . mb_strtolower($email) . '.txt';
        file_put_contents($file, $data);
      }
}

saveData();