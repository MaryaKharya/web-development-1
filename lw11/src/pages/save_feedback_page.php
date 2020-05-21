<?php
include '../common.inc.php';

function sendSqlQueryInsert(array $form): void
{
    $connection = establishConnection();
    foreach ($form as &$field)
    {
        $field = $connection->quote($field);
    }
    $sql = 'insert into '.DB_TABLE." (name, email, country, sex, sms) VALUES (${form['name']}, ${form['email']}, ${form['country']}, ${form['sex']}, ${form[sms]})";
    $connection->query($sql);
}

function checkParameter(array $fields, array &$errors): bool
{
    if ( empty($fields['name'] ) )
    {
        $errors['name_error_msg'] = 'Укажите имя';
    }
    if ( empty($fields['email']) )
    {
        $errors['email_error_msg'] = 'Укажите email';
    }
    if ( empty($fields['sms']) )
    {
        $errors['sms_error_msg'] = 'Напишите мне что-нибудь';
    }
    return ( !empty($fields['name']) && !empty($fields['email']) && !empty($fields['sms']) );
}

function getForm()
{
    $fields = [
        'name' => getParameter('name'),
        'email' => getParameter('email'),
        'country' => getParameter('country'),
        'sms' => getParameter('sms'),
        'sex' => getParameter('sex')
    ];
    $fieldsInfo = [];
    if ($fields['sex'] === 'male') {
        $fields['sex'] = 'Мужской';
    } elseif ($fields['sex'] === 'female') {
        $fields['sex'] = 'Женский';
    } else {
        $fields['sex'] = null;
    }

    if ( !checkParameter($fields, $fieldsInfo) ) {
        renderTemplate('main.tpl.php', array_merge($fields, $fieldsInfo) );
    } else {
        return $fields;
    }
    return null;
}

function saveData()
{
    $form = getForm();
    if (!empty($form))
    {
        sendSqlQueryInsert($form);
        renderTemplate('main.tpl.php', [
            'all_right' => 'Сообщение успешно отправлено'
        ]);
    }
}