<?php
include '../common.inc.php';

function checkParameter()
{
    ($sex = null) ?: ($fieldsInfo['sex'] = $sex);
    ($country = null) ?: ($fieldsInfo['country'] = $country);
    empty($name) ? ($fieldsInfo['name_error_msg'] = 'Укажите имя') : ($fieldsInfo['name'] = $name);
    empty($email) ? ($fieldsInfo['email_error_msg'] = 'Укажите email') : ($fieldsInfo['email'] = $email);
    empty($sms) ? ($fieldsInfo['sms_error_msg'] = 'Напишите мне что-нибудь') : ($fieldsInfo['sms'] = $sms);
    return ( empty($name) || empty($email) || empty($sms) );
}

function getForm()
{
    $name = getParameter('name');
    $email = getParameter('email');
    $country = getParameter('country');
    $sms = getParameter('sms');
    $sex = getParameter('sex');
    $fieldsInfo = [];
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

    if ( checkParameter() )
    {
        $fieldsInfo['error'] = true;
        renderTemplate('main.tpl.php', $fieldsInfo );
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
    if (!empty($form))
    {
        $data = $form['data'];
        $email = $form['email'];
        $file = '../data/' . mb_strtolower($email) . '.txt';
        file_put_contents($file, $data);
        renderTemplate('main.tpl.php', [
            'all_right' => 'Сообщение успешно отправлено'
        ]);
    }
}