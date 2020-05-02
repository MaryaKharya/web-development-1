<?php
$fields = json_decode(file_get_contents('php://input'), true);

function checkingForValid(array $fields): array
{
    $errorList = [];
    $validateName = preg_match("/^[a-zа-я]+[a-zа-я\s\-]*$/ui", $fields['name']);
    $validateEmail = filter_var($fields['email'], FILTER_VALIDATE_EMAIL);
    $validateMessage = preg_match("/^[a-zа-я\s]+[a-zа-я\s\-.,()!?:;]*$/ui", $fields['message']);
    if ( !$validateName )
    {
        $errorList[] = 'name';
    }
    if (!$validateEmail )
    {
        $errorList[] = 'email';
    }
    if (!$validateMessage)
    {
        $errorList[] = 'message';
    }
    return $errorList;
}

$errorList = checkingForValid($fields);
if ( count($errorList) === 0 )
{
    $data = json_encode($fields, JSON_UNESCAPED_UNICODE);
    $fileName = strtolower($fields['email']) . '.txt';
    file_put_contents("../data/${fileName}", $data);
}
$errorList = json_encode($errorList);
echo $errorList;