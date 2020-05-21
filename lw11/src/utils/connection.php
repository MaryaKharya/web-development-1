<?php
const DB_DSN = 'mysql:host=localhost;dbname=mypage';
const DB_USER = 'myPageUser';
const DB_PASSWORD = '1234';
const DB_TABLE = 'users';

function establishConnection(): PDO
{
    static $connection = null;
    if ($connection === null)
    {
        $connection = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $connection->query('set names utf8');
    }

    return $connection;
}