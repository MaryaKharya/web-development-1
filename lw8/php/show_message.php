<?php
$email = mb_strtolower($_GET['email']);
$data = file_get_contents("../data/" . $email . ".txt") ?? null;
if (isset($data)) 
{
    $array_data = explode("\n", $data);
}
?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Данные отправителя</title>
    <link href="../css/show_message.css" rel="stylesheet">
  </head>
  <body>
    <div class="list">
      <dl class="data">
        <?php  
        if (!empty($data)) 
        {
            foreach ($array_data as $value) 
            {
                $array_definition = explode(":", $value);
                echo "<dt>$array_definition[0]:</dt>";
                echo "<dd>$array_definition[1]</dd>";
            }
        }   
        else 
        {
            echo "<dd>Данные отправителя не найдены</dd>";
        }
        ?>
      </dl>
    </div>
    <div class="form">
      <form action="form_query.php" method="GET">
        <input class="submit" type="submit" value="Ввести email">
      </form>
  </body>
</html>