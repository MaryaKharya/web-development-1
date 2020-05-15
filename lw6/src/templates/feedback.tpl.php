<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Query Message</title>
    <link href="../../web/css/form_query.css" rel="stylesheet">
  </head>
  <body>
    <div class="form">
      <form method="POST">
        <label for="email">Email отправителя <span class="star">*</span></label>
        <div>
          <input class="email" name="email" id="email" type="email" maxlength="255" required="required" placeholder="Например, google@yandex.ru" title="Email">
        </div>
        <input class="submit" type="submit" value="Отправить">
      </form>
        <?php if ( count($args['answers']) > 0 ): ?>
            <div class="list">
                <dl class="data">
                    <?php foreach ($args['answers'] as $key => $value): ?>
                        <dt><?php echo $key ?></dt>
                        <dd><?php echo $value ?></dd>
                    <?php endforeach; ?>
                </dl>
            </div>
        <?php endif; ?>
    </div>
  </body>
</html>