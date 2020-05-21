<?php
include '../src/common.inc.php';

if (getRequestMethod() == 'POST')
{
    displayData();
}
else
{
    feedbackPage();
}