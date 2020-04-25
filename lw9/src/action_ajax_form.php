<?php
$name = null;
$email = null;
$country = null;
$sex = null;
$sms = null;
$fields = [];
$error = false;
$errorList = [];
$QUERY = json_decode(file_get_contents('php://input'), true);
function getParameter($name)
{
    global $QUERY;
    return $QUERY[$name] ?? null;
}

function getFields()
{
    global $name, $email, $country, $sex, $sms;
    $name = getParameter('name');
    $email = getParameter('email');
    $country = getParameter('country');
    $sex = getParameter('sex');
    $sms = getParameter('sms');
}

function validateName($name)
{
    return preg_match("/^[a-z]+[a-z\s\-]*$/i", $name);
}

function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function checkingForValid()
{
    global $fields, $errorList, $name, $email, $sms;
    isset($name) ? ($fields['name'] = $name) : ($errorList[] = 'name');
    isset($email) ? ($fields['email'] = $email) : ($errorList[] = 'email');
    isset($sms) ? ($fields['sms'] = $sms) : ($errorList[] = 'sms');
    if ( count($errorList) === 0)
    {
        validateName($name) ?: ($errorList[] = 'name');
        validateEmail($email) ?: ($errorList[] = 'email');
        return (count($errorList) === 0);
    }
    else
    {
        return false;
    }
}

getFields();
if ( checkingForValid() )
{
    echo json_encode('Всё норм');
}
else
{
    global $name, $email;
    $errorString = implode(', ', $errorList);
    echo json_encode("Есть ошибка: ${errorString}");
}