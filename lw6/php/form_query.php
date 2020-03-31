<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Query Message</title>
    <link href="../css/form_query.css" rel="stylesheet">
  </head>
  <body>
    <div class="form">
      <form action="show_message.php" method="GET"> 
        <label for="email">Email отправителя <span class="star">*</span></label> 
        <div>
          <input class="email" name="email" id="email" type="email" maxlength="255" required="required" placeholder="Например, google@yandex.ru" title="Email">
        </div>
        <input class="submit" type="submit" value="Отправить">
      </form>
    </div>  
  </body>
</html>

