<?php
include '../common.inc.php';

function getDataByEmail(string $email): array
{
    $connection = establishConnection();
    $email = $connection->quote($email);
    $sqlCheck = 'SELECT EXISTS (SELECT * FROM '.DB_TABLE." WHERE email = ${email}) AS found";
    $answer = $connection->query($sqlCheck)->fetch();
    if ($answer['found'])
    {
        $sql = 'SELECT * FROM '.DB_TABLE." WHERE email = ${email}";
        $stmt = $connection->query($sql);
        return $stmt->fetch();
    }
    return [];
}

function displayData(): void
{
    $email = mb_strtolower( getParameter('email') );
    $dataUser = getDataByEmail($email);
    if ( array_key_exists('email', $dataUser) )
    {
        $answer = [
            'Имя' => $dataUser['name'],
            'Почта' => $dataUser['email'],
            'Страна' => $dataUser['country'],
            'Пол' => $dataUser['sex'],
            'Сообщение' => $dataUser['sms']
        ];
    }
    else
    {
        $answer['Error'] = 'Отправитель с данным e\'mail не найден';
    }
    feedbackPage(['answers' => $answer]);
}

function feedbackPage(array $args = []): void
{
    renderTemplate('feedback.tpl.php', $args);
}