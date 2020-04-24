<!doctype html>
<html lang="ru">

 <head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">    
 </head>

 <body>
   <div class="all" id="form">
      <h2> Задания , связанные с формой </h2>
      <?php
      if (!empty($messages)) {
        print('<div id="messages">');
        foreach ($messages as $mess) {
      	print($mess);
        }
        print('</div><br/><br/>');
      }
      ?>
      <form action="" method="POST">
        <label for="name">
          Имя: 
          <br>
          <input type="text"  id="name" name="name" <?php if ($errors['name']) {print 'class="error"';} ?> value="<?php print $values['name']; ?>">
        </label>
        <br>
        <label for="email">
          E-mail:
          <br>
          <input type="email" id="email" name="email" <?php if ($errors['email']) {print 'class="error"';} ?> value="<?php print $values['email']; ?>">
        </label>
        <br>
        <label>
          Дата рождения:
          <br>
          <input id="date" name="date" <?php if ($errors['date']) {print 'class="error"';} ?> value="<?php print $values['date']; ?>" type="text"/>
        </label>
        <br>
        Пол:
        <br>
        <label for="sex">
            <input type="radio" name="sex" value="male" <?php if ($values['sex'] == 'male') {print 'checked="checked"';} ?>/>
            Мужской
        </label>
        <label>
            <input type="radio" name="sex" value="female" <?php if ($values['sex'] == 'female') {print 'checked="checked"';} ?>/>
            Женский
        </label>
        <label>
            <input type="radio" name="sex" value="lamin" <?php if ($values['sex'] == 'lamin') {print 'checked="checked"';} ?>/>
            Ламинат
         </label>
        <label>
            <input type="radio" name="sex" value="linol" <?php if ($values['sex'] == 'linol') {print 'checked="checked"';} ?>/>
                Линолеум
        </label>
        <br> 
        Количество глаз:
        <br>
        <label for="limb">
            <input type="radio" name="limb" value="1" <?php if ($errors['limb']) {print 'class="error"';} ?>  <?php if ($values['limb'] == '1') {print 'checked="checked"';} ?> />
            1
        </label>
        <label>
            <input type="radio" name="limb" value="2" <?php if ($errors['limb']) {print 'class="error"';} ?>  <?php if ($values['limb'] == '2') {print 'checked="checked"';} ?> />
            2
        </label>
        <label>
            <input type="radio" name="limb" value="3" <?php if ($errors['limb']) {print 'class="error"';} ?>  <?php if ($values['limb'] == '3') {print 'checked="checked"';} ?> />
            3
        </label>
        <label>
            <input type="radio" name="limb" value="4" <?php if ($errors['limb']) {print 'class="error"';} ?>  <?php if ($values['limb'] == '4') {print 'checked="checked"';} ?> />
            4
        </label>
        <label>
            <input type="radio" name="limb" value="6" <?php if ($errors['limb']) {print 'class="error"';} ?>  <?php if ($values['limb'] == '6') {print 'checked="checked"';} ?> />
            6
        </label>
        <label>
            <input type="radio" name="limb" value="8" <?php if ($errors['limb']) {print 'class="error"';} ?>  <?php if ($values['limb'] == '8') {print 'checked="checked"';} ?> />
            8
        </label>
        <br>
        </label <?php if ($errors['ability']) {print 'class="error"';} ?> for="ability">
        Сверхспособности:
        <br>
        
            <input type="checkbox" name="ability1" value="Непробиваемость" <?php if ($values['ability1'] != '') {print 'checked="checked"';} ?> />
            Непробиваемость
        
        <br>
        
            <input type="checkbox" name="ability2" value="Супер-скорость" <?php if ($values['ability2'] != '') {print 'checked="checked"';} ?> />        
             Супер-скорость
       
        <br>
        
            <input type="checkbox" name="ability3" value="Левитация" <?php if ($values['ability3'] != '') {print 'checked="checked"';} ?> />        
             Левитация
        
        <br>
        
            <input type="checkbox" name="ability4" value="Невидимость" <?php if ($values['ability4'] != '') {print 'checked="checked"';} ?> />        
             Невидимость
        
        <br>
        
            <input type="checkbox" name="ability5" value="Способность видеть сквозь стены" <?php if ($values['ability5'] != '') {print 'checked="checked"';} ?> />        
             Способность видеть сквозь стены
        
        <br>
        
            <input type="checkbox" name="ability6" value="Бессмертие" <?php if ($values['ability6'] != '') {print 'checked="checked"';} ?> />        
             Бессмертие
        
        <br>
        
            <input type="checkbox" name="ability7" value="Регенерация" <?php if ($values['ability7'] != '') {print 'checked="checked"';} ?> />        
             Регенерация
        
        <br>
        
            <input type="checkbox" name="ability8" value="Деньги" <?php if ($values['ability8'] != '') {print 'checked="checked"';} ?> />        
             Деньги
        </label>
        <br>
        <label>
          Биография:
          <br>
          <textarea name="osebe" value="<?php printf ($values['osebe']); ?>">Расскажите о себе</textarea>
          <br>
        </label>
        <br>
        <label>
            <input type="checkbox" name="kontract" value="+" <?php if ($values['kontract'] != '') {print 'checked="checked"';} ?>/>С контрактом ознакомлен<br/>
          </label>
          <br>
        <input type="submit" name="go" value="Отправить">
        <input type="submit" name="save" id="out" value="выйти"/>
        <input type="submit" name="save" id="out" value="войти"/>
      </form>
   </div>
   </body>
</html>