<?php

header('Content-Type: text/html; charset=UTF-8');


session_start();

if (!empty($_SESSION['login'])) {

  header('Location: ./');
}


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $messages = array();
  $errors = array();
  $errors['login'] = !empty($_COOKIE['login_error']);
  $errors['pass'] = !empty($_COOKIE['pass_error']);

  
  if (!empty($errors['login'])) {

    setcookie('login_error', '', 100000);
   
    $messages[] = '<div class="error">Неверный login</div>';
  }
  else if(!empty($errors['pass'])){
   
    setcookie('pass_error', '', 100000);
   
    $messages[] = '<div class="error">Неверный пароль </div>';
  }
?>
<html lang="ru">
  	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">   <meta name="viewport" content="width=device-wedth,initial-scale=1.0">
		<link rel="stylesheet" href = "style.css">
		<title>login in web5</title>
	</head>
  <?php
    if (!empty($messages)) {
      print('<div id="messages">');
      
      foreach ($messages as $message) {
        print($message);
      }
      print('</div>');
    }
  ?>
  <div class="container justify-content-center p=0 m=0" id="content">
    <form action="login.php" method="post">
      <p> <h2>Войдите для изменения данных </p>
      <p>Логин:</p>
      <input name="login" id="login"  placeholder="11111"/>
      <p>Пароль:</p>
      <input name="pass" id="pass" placeholder="пароль"/></br>
      <input type="submit" id="in" value="Войти"/>
      </h2>
    </form>
  </div>
</html>
<?php
}

else {
  $errors = FALSE;
    if (empty($_POST['login'])) {
      
      setcookie('login_error', '1', time() + 24 * 60 * 60);
      $errors = TRUE;
    }
    else {
      
      setcookie('login_value', $_POST['login'], time() + 30 * 24 * 60 * 60);
    }
    if (empty($_POST['pass'])) {
      setcookie('pass_error', '1', time() + 24 * 60 * 60);
      $errors = TRUE;
    }
    else{
      setcookie('pass_value', $_POST['pass'], time() + 30 * 24 * 60 * 60);
    }
    if ($errors) {
    
      header('Location: login.php');
      exit();
    }
    else{
    setcookie('login_error', '', 100000);
    setcookie('pass_error', '', 100000);
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $user = 'u20294';
    $password = '5205554';
    $db = new PDO('mysql:host=localhost;dbname=u20294', $user, $password);
    extract($_POST);
    try {
      foreach($db->query('SELECT * FROM profi') as $row){
        if($row['login']==$_POST['login']){
         
          if($row['password']==$_POST['pass']){
            $_SESSION['login'] = $_POST['login'];
            
            $_SESSION['uid'] = $_POST['pass'];
           
            $values['name'] = $row['name'];
            $values['email'] = $row['email'];
            $values['date'] = $row['date'];
            $values['sex'] = $row['sex'];
            $values['limb'] = $row['limb'];
            $values['ability1'] = $row['ability1'];
            $values['ability2'] = $row['ability2'];
            $values['ability3'] = $row['ability3'];
            $values['ability4'] = $row['ability4'];
            $values['ability5'] = $row['ability5'];
            $values['ability6'] = $row['ability6'];
            $values['ability7'] = $row['ability7'];
            $values['ability8'] = $row['ability8'];
            $values['osene'] = $row['osebe'];
            $values['kontract'] = $row['kontract'];
            setcookie('save', '1');
            header('Location: index.php');
          }
          else{
            $errors = TRUE;
            setcookie('pass_error', '1s', time() + 24 * 60 * 60);
          }
        }
      }
    }
    catch(PDOException $e){
      print('Error : ' . $e->getMessage());
      exit();
    }
    setcookie('save', '1');
   
    $errors = TRUE;
    setcookie('login_error', '1', time() + 24 * 60 * 60);
    if ($errors) {
  
      header('Location: login.php');
      exit();
    }
  }
}