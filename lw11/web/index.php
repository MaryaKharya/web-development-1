<?php
include '../src/common.inc.php';
if (getRequestMethod() === 'POST')
{
    saveData();
}
else
{
    mainPage();
}