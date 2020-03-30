<?php
  include 'form.php';
?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <title>Страничка о человеке</title>
    <link href="../css/main.css" rel="stylesheet">
  </head>
  <body>
    <nav>                       <!--Меню-->
      <ul class="menu">
        <li class="menu_about">
          <a href="#about_me" class="person_icon icon">
            Обо мне
          </a>  
        </li>
        <li>
          <a href="#hobby" class="hobby_icon icon">
            Мое хобби
          </a>  
        </li>
        <li>
          <a href="#film" class="video_icon icon">
            Любимые фильмы
          </a>  
        </li>
      </ul>
    </nav>
    <article>                   <!--Обо мне-->
      <div class="container">
        <a class="anchor_about" name="about_me"></a>
        <div class="about">
          <img src="../img/photo.png" class="my_photo">
          <div class="name">
            <blockquote class="citation">
              Мы берем на себя много, потому что 
              мало чего боимся<br>
              <strong class="author">— Том Демарко. Deadline</strong>
            </blockquote>
            <h1 class="name_header">
              Jane Doe
            </h1>
            <div class="rectangle"></div>
          </div>
          <p class="physic">
            В 1930-е годы прошлого века физик Джордж Гамоу из 
            университета штата Колорадо начал публиковать<br> 
            мини-сериал рассказов о неком мистере Томпкинсе, 
            банковском клерке средних лет. Мистер Томпкинс, как 
            явствовало из этих историй, интересовался современной 
            наукой. 
          </p>
          <div class="favorite writers">
            <h2 class="header_list">Любимые писатели:</h2>
            <ul class="list_writer">
              <li>Айзек Азимов</li>
              <li>Говард Лавкрафт</li>
              <li>Дмитрий Глуховский</li>
              <li>Чак Паланик</li>
            </ul>
          </div>
          <a class="anchor_hobby" name="hobby"></a>
          <div class="hobby">
            <h2 class="hobby_header">
              Мое хобби
            </h2>
            <p class="hobby_text">
              Он регулярно посещал вечерние лекции местного профессора
              и, разумеется, всегда засыпал на самом интересном месте.<br>     
              А когда просыпался, то обнаруживал себя в каком-нибудь 
              параллельном мире, где один из основных законов физики
              действовал не так, как в его мире. 
            </p>
            <a class="ref" href="#form">Напиши мне</a>
          </div>
          <div class="favorite movies">
            <h2 class="header_list">Любимые фильмы:</h2>
            <ul class="list_film">
              <li>1. Шоу Трумэна</li>
              <li>2. Малхолланд Драйв</li>
              <li>3. Семь жизней</li>
              <li>4. Гравитация</li>
            </ul>
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </article>
    <section class="films">     <!--Фильмы-->
      <div class="container">   
        <h2 class="header_loving_movies">Любимые фильмы</h2>
        <a class="anchor_film" name="film"></a>
        <div class="loving_movies">
          <div class="film">
            <img src="../img/film1.png">
            <h3 class="film_header">Побег из Шоушенка</h3>
            <p class="film_text">
              Успешный банкир Энди Дюфрейн 
              обвинен в убийстве собственной 
              жены и ее любовника. Оказавшись в 
              тюрьме под названием Шоушенк, он 
              сталкивается с жестокостью и 
              беззаконием, царящими по обе 
              стороны решетки. Каждый, кто 
              попадает в эти стены, становится их 
              рабом до конца жизни. Но Энди, 
              вооруженный живым умом и доброй 
              душой, отказывается мириться с 
              приговором судьбы и начинает 
              разрабатывать невероятно дерзкий 
              план своего освобождения.
            </p>
          </div>
          <div class="film">
            <img src="../img/film2.png">
            <h3 class="film_header">Наркоз</h3>
            <p class="film_text">
              Клай Бересфорд вынужден лечь под 
              нож. Однако в процессе операции на 
              сердце он неожиданно приходит в 
              себя. Находясь в парализованном 
              состоянии, будучи не в силах 
              пошевелить ни рукой, ни ногой, он, 
              тем не менее, чувствует каждое 
              касание скальпеля к своей плоти…
            </p>    
          </div>
          <div class="film">
            <img src="../img/film3.png">
            <h3 class="film_header astral">Астрал</h3>
            <p class="film_text">
              Джош и Рене переезжают со своими 
              детьми в новый дом, но не успевают 
              толком распаковать вещи, как 
              начинаются странные события. 
              Необъяснимо перемещаются 
              предметы, в детской звучат странные 
              звуки… Но в настоящий ужас 
              приходят родители, когда их 
              десятилетний сын Далтон впадает в 
              кому. Все усилия врачей в больнице 
              помочь мальчику безуспешны.
            </p>  
          </div>
          <div class="film">
            <img src="../img/film4.png">
            <h3 class="film_header">Гравитация</h3>
            <p class="film_text">
              Доктор Райан Стоун, блестящий 
              специалист в области медицинского 
              инжиниринга, отправляется в свою 
              первую космическую миссию под 
              командованием ветерана 
              астронавтики Мэтта Ковальски, для 
              которого этот полет — последний 
              перед отставкой. Но во время, 
              казалось бы, рутинной работы за 
              бортом случается катастрофа.<br>
              Шаттл уничтожен, а Стоун и 
              Ковальски остаются совершенно 
              одни; они находятся в связке друг с 
              другом, и все, что они могут, — это 
              двигаться по орбите в абсолютно 
              черном пространстве без всякой 
              связи с Землей и какой-либо 
              надежды на спасение.
            </p>
          </div>
        </div>
        <a href="#" class="buttom">Все фильмы</a>
      </div>
    </section>
    <section>                   <!--Напиши мне-->
      <a class="anchor_form" name="form"></a>
      <div class="container">
        <div class="header_text_me">
          <div class="line"></div>
          <h2 class="text_me">Напиши мне</h2>
          <div class="line"></div>
        </div>
        <div class="form">
          <form action="index.php" method="POST">
            <label for="name">Ваше имя <span class="star">*</span></label>
            <div>  
              <input class="input_cell" name="name" id="name" type="text" maxlength="255" required="required" title="Имя" placeholder="Например, Иван">
            </div>
            <label for="name">Ваш email <span class="star">*</span></label>
            <div>  
              <input class="input_cell" name="email" id="email" type="email" maxlength="255" required="required" title="Email" placeholder="Например, Ivan12@mail.ru">
            </div>
            <label for="country">Откуда вы?</label>
            <div>  
              <select class="input_cell country" name="country" id="country" title="Страна" size="1">
                <option>Россия</option>
                <option>Белоруссия</option>
                <option>Казахстан</option>
                <option>Украина</option>
                <option>Армения</option>
                <option>Азербайджан</option>
                <option>Киргизия</option>
                <option>Молдавия</option>
                <option>Таджикистан</option>
                <option>Узбекистан</option>
              </select>
            </div>
            <label for="sex">Ваш пол</label>
            <div class="sex">
              <input name="sex" id="male" type="radio" value="male">
              <label for="male">Мужской</label>
              <input name="sex" id="female" type="radio" value="female">
              <label for="female">Женский</label>
            </div>
            <label for="name">Ваше сообщение <span class="star">*</span></label>
            <div>
              <textarea class="input_cell" name="sms" id="sms" maxlength="1020" required="required" title="Сообщение">
              </textarea>
            </div>
            <input class="submit" type="submit" value="Отправить">
          </form>
        </div>
      </div>
    </section>
  </body>
</html>