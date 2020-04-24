<?php

header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$messages = array();

	if (!empty($_COOKIE['save'])) { 
		setcookie('save', '', 100000);
		setcookie('login', '', 100000);
    	setcookie('pass', '', 100000);
		$messages[] = 'Спасибо, результаты сохранены.';
	    if (!empty($_COOKIE['pass'])) {
		$messages[] = sprintf("Вы можете <a href='login.php'>Войти</a> с логином <strong>%s</strong> и паролем <strong>%s</strong> для изменения данных.",
		strip_tags($_COOKIE['login']),
		strip_tags($_COOKIE['pass']));
	  }
	}

	$errors = array();
    $errors['name'] = !empty($_COOKIE['name_error']);
    $errors['email'] = !empty($_COOKIE['email_error']);
    $errors['date'] = !empty($_COOKIE['date_error']);
    $errors['sex'] = !empty($_COOKIE['sex_error']);
    $errors['limb'] = !empty($_COOKIE['limb_error']);
    $errors['ability'] = !empty($_COOKIE['ability_error']);
    $errors['kontract'] = !empty($_COOKIE['kontract_error']);

	if ($errors['name']) {
		setcookie('name_error', '', 100000);
		$messages[] = '<div class="error">Укажите имя.</div>';
	  }
	  
	  if ($errors['email']) {
		setcookie('email_error', '', 100000);
		$messages[] = '<div class="error">Адрес эл.почты указан неверно. Образец: exp@mail.ru</div>';
	  }
	 
	  if ($errors['date']) {
		setcookie('date_error', '', 100000);
		$messages[] = '<div class="error">Дата рождения указана неверно. Образец: ДД.ММ.ГГГГ</div>';
	  }
	  
	  if ($errors['sex']) {
		setcookie('sex_error', '', 100000);
		$messages[] = '<div class="error">Укажите пол.</div>';
	  }
	
	  if ($errors['limb']) {
		setcookie('limb_error', '', 100000);
		$messages[] = '<div class="error">Укажите число конечностей.</div>';
	  }
	
	  if ($errors['ability']) {
		setcookie('ability_error', '', 100000);
		$messages[] = '<div class="error">Укажите суперспособности.</div>';
	  }
	
	  if ($errors['kontract']) {
		setcookie('kontract_error', '', 100000);
		$messages[] = '<div class="error">Пожалуйста, ознакомьтесь с контрактом!</div>';
	  }

	  $values = array();
      $values['name'] = empty($_COOKIE['name_value']) ? '' : $_COOKIE['name_value'];
      $values['email'] = empty($_COOKIE['email_value']) ? '' : $_COOKIE['email_value'];
      $values['date'] = empty($_COOKIE['date_value']) ? '' : $_COOKIE['date_value'];
      $values['sex'] = empty($_COOKIE['sex_value']) ? '' : $_COOKIE['sex_value'];
      $values['limb'] = empty($_COOKIE['limb_value']) ? '' : $_COOKIE['limb_value'];
      $values['ability1'] = empty($_COOKIE['ability1_value']) ? '' : $_COOKIE['ability1_value'];
      $values['ability2'] = empty($_COOKIE['ability2_value']) ? '' : $_COOKIE['ability2_value'];
      $values['ability3'] = empty($_COOKIE['ability3_value']) ? '' : $_COOKIE['ability3_value'];
	  $values['ability4'] = empty($_COOKIE['ability4_value']) ? '' : $_COOKIE['ability4_value'];
	  $values['ability5'] = empty($_COOKIE['ability5_value']) ? '' : $_COOKIE['ability5_value'];
      $values['ability6'] = empty($_COOKIE['ability6_value']) ? '' : $_COOKIE['ability6_value'];
      $values['ability7'] = empty($_COOKIE['ability7_value']) ? '' : $_COOKIE['ability7_value'];
      $values['ability8'] = empty($_COOKIE['ability8_value']) ? '' : $_COOKIE['ability8_value'];
      $values['osebe'] = empty($_COOKIE['osebe_value']) ? '' : $_COOKIE['osebe_value'];
      $values['kontract'] = empty($_COOKIE['kontract_value']) ? '' : $_COOKIE['kontract_value'];

	  session_start();
	 if ($errors && !empty($_COOKIE[session_name()]) && !empty($_SESSION['login'])) {
	   $login = $_SESSION['login'];
	   $pass = $_SESSION['uid'];
	   $user = 'u20294';
	   $password = '5205554';
	   $db = new PDO('mysql:host=localhost;dbname=u20294', $user, $password);
	   try {
	     foreach($db->query('SELECT * FROM profi') as $row){
	       if($row['login'] == $login){
	         if($row['password'] == $pass){
	           $values['name'] = $row['name'];
	           $values['email'] = $row['email'];
	           $values['date'] = $row['date'];
	           $values['sex'] = $row['sex'];
	           $values['limb'] = $row['limb'];
	           $values['ability1'] = strip_tags($row['ability1']);
	           $values['ability2'] = strip_tags($row['ability2']);
			   $values['ability3'] = strip_tags($row['ability3']);
			   $values['ability4'] = strip_tags($row['ability4']);
			   $values['ability5'] = strip_tags($row['ability5']);
			   $values['ability6'] = strip_tags($row['ability6']);
			   $values['ability7'] = strip_tags($row['ability7']);
			   $values['ability8'] = strip_tags($row['ability8']);
	           $values['osebe'] = strip_tags($row['osebe']);
	           $values['kontract'] = $row['kontract'];
	           printf('Вход с логином %s, uid %d.', $_SESSION['login'], $_SESSION['uid']);
	           break;
	         }
	       }
	     }
	   }
	   catch(PDOException $e){
	   print('Error : ' . $e->getosebe());
	   exit();
	   }
	 }
	 include('myPHP.php');
	}

	else {
		$action = $_POST['save'];
		switch ($action){
		  case 'выйти':{
			$values = array();
			$values['name'] = null;
			$values['email'] = null;
			$values['date'] = null;
			$values['sex'] = null;
			$values['limb'] = null;
			$values['ability1'] = null;
			$values['ability2'] = null;
			$values['ability3'] = null;
			$values['ability4'] = null;
			$values['ability5'] = null;
			$values['ability6'] = null;
			$values['ability7'] = null;
			$values['ability8'] = null;
			$values['osebe'] = null;
			$values['kontract'] = null;
			session_start();
			if(!empty($_SESSION['login'])){
				setcookie('save', '', 100000);
				setcookie('login', '', 100000);
				setcookie('pass', '', 100000);
				setcookie('name_value', '', 100000);
				setcookie('email_value', '', 100000);
				setcookie('date_value', '', 100000);
				setcookie('sex_value', '', 100000);
				setcookie('limb_value', '', 100000);
				setcookie('ability1_value', '', 100000);
				setcookie('ability2_value', '', 100000);
				setcookie('ability3_value', '', 100000);
				setcookie('ability4_value', '', 100000);
				setcookie('ability5_value', '', 100000);
				setcookie('ability6_value', '', 100000);
				setcookie('ability7_value', '', 100000);
				setcookie('ability8_value', '', 100000);
				setcookie('osebe_value', '', 100000);
				setcookie('kontract_value', '', 100000);
				$_COOKIE=array();
			}
			session_destroy();
			header('Location: index.php');
			break;
		  }
		  case 'войти':{
			$values = array();
			$values['name'] = null;
			$values['email'] = null;
			$values['date'] = null;
			$values['sex'] = null;
			$values['limb'] = null;
			$values['ability1'] = null;
			$values['ability2'] = null;
			$values['ability3'] = null;
			$values['ability4'] = null;
			$values['ability5'] = null;
			$values['ability6'] = null;
			$values['ability7'] = null;
			$values['ability8'] = null;
			$values['osebe'] = null;
			$values['kontract'] = null;
			session_start();
			if(!empty($_SESSION['login'])){
				setcookie('save', '', 100000);
				setcookie('login', '', 100000);
				setcookie('pass', '', 100000);
				setcookie('name_value', '', 100000);
				setcookie('email_value', '', 100000);
				setcookie('date_value', '', 100000);
				setcookie('sex_value', '', 100000);
				setcookie('limb_value', '', 100000);
				setcookie('ability1_value', '', 100000);
				setcookie('ability2_value', '', 100000);
				setcookie('ability3_value', '', 100000);
				setcookie('ability4_value', '', 100000);
				setcookie('ability5_value', '', 100000);
				setcookie('ability6_value', '', 100000);
				setcookie('ability7_value', '', 100000);
				setcookie('ability8_value', '', 100000);
				setcookie('osebe_value', '', 100000);
				setcookie('kontract_value', '', 100000);
				$_COOKIE=array();
			}
			session_destroy();
			header('Location: login.php');
			break;
		  }
		  case 'сохранить':{
			$errors = FALSE;  
			$messages[]='ok';
			if (empty($_POST['name'])) {
			  setcookie('name_error', '1', time() + 24 * 60 * 60);
			  $errors = TRUE;
			}
			else {
				setcookie('name_value', $_POST['name'], time() + 30 * 24 * 60 * 60);
			}
	  
			if (!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $_POST['email'])) {
				setcookie('email_error', '1', time() + 24 * 60 * 60);
				$errors = TRUE;
			}
			else {
				setcookie('email_value', $_POST['email'], time() + 30 * 24 * 60 * 60);
			}
	  
			if (empty($_POST['date'])) {
				setcookie('date_error', '1', time() + 24 * 60 * 60);
				$errors = TRUE;
			}
			else {
				setcookie('date_value', $_POST['date'], time() + 30 * 24 * 60 * 60);
			}   
	  
			if (empty($_POST['sex'])) {
				setcookie('sex_error', '1', time() + 24 * 60 * 60);
				$errors = TRUE;
			}
			else {
				setcookie('sex_value', $_POST['sex'], time() + 30 * 24 * 60 * 60);
			}
	  
			if (empty($_POST['limb'])) {
				setcookie('limb_error', '1', time() + 24 * 60 * 60);
				$errors = TRUE;
			}
			else {
				setcookie('limb_value', $_POST['limb'], time() + 30 * 24 * 60 * 60);
			}
	  
			if (!isset($_POST['ability1'])
			 && !isset($_POST['ability2'])
			 && !isset($_POST['ability3'])
			 && !isset($_POST['ability4'])
			 && !isset($_POST['ability5'])
			 && !isset($_POST['ability6'])
			 && !isset($_POST['ability7'])
			 && !isset($_POST['ability8'])) {
				setcookie('ability_error', '1', time() + 24 * 60 * 60);
				$errors = TRUE;
			  }
			else {
			  setcookie('ability1_value', isset($_POST['ability1']) ? $_POST['ability1'] : '', time() + 365 * 30 * 24 * 60 * 60);
			  setcookie('ability2_value', isset($_POST['ability2']) ? $_POST['ability2'] : '', time() + 365 * 30 * 24 * 60 * 60);
			  setcookie('ability3_value', isset($_POST['ability3']) ? $_POST['ability3'] : '', time() + 365 * 30 * 24 * 60 * 60);
			  setcookie('ability4_value', isset($_POST['ability4']) ? $_POST['ability4'] : '', time() + 365 * 30 * 24 * 60 * 60);
			  setcookie('ability5_value', isset($_POST['ability5']) ? $_POST['ability5'] : '', time() + 365 * 30 * 24 * 60 * 60);
			  setcookie('ability6_value', isset($_POST['ability6']) ? $_POST['ability6'] : '', time() + 365 * 30 * 24 * 60 * 60);
			  setcookie('ability7_value', isset($_POST['ability7']) ? $_POST['ability7'] : '', time() + 365 * 30 * 24 * 60 * 60);
			  setcookie('ability8_value', isset($_POST['ability8']) ? $_POST['ability8'] : '', time() + 365 * 30 * 24 * 60 * 60);
			}
	  
			if (empty($_POST['osebe'])) {
				setcookie('osebe_error', '1', time() + 24 * 60 * 60);
				$errors = TRUE;
			}
			else {
				setcookie('osebe_value', $_POST['osebe'], time() + 30 * 24 * 60 * 60);
			}
	  
			if (empty($_POST['kontract'])) {
				setcookie('kontract_error', '1', time() + 24 * 60 * 60);
				$errors = TRUE;
			}
			else {
				setcookie('kontract_value', $_POST['kontract'], time() + 30 * 24 * 60 * 60);
			}
	  
		  if ($errors) {
			header('Location: index.php');
			exit();
		  }
		  else{
			setcookie('name_error', '', 100000);
			setcookie('email_error', '', 100000);
			setcookie('date_error', '', 100000);
			setcookie('sex_error', '', 100000);
			setcookie('limb_error', '', 100000);
			setcookie('ability_error', '', 100000);
			setcookie('osebe_error', '', 100000);
			setcookie('kontract_error', '', 100000);
		  }
			if (!empty($_COOKIE[session_name()]) && session_start() && !empty($_SESSION['login'])) {
			  setcookie('login', $login);
			  setcookie('pass', $pass);
			  extract($_POST);
			  $user = 'u20294';
			  $password = '5205554';
			  $db = new PDO('mysql:host=localhost;dbname=u20294', $user, $password);
			  extract($_POST);
			  $login = $_SESSION['login'];
			  $name = $_POST['name'];
			  $email = $_POST['email'];
			  $date = $_POST['date'];
			  $sex = $_POST['sex'];
			  $limb = $_POST['limb'];
			  if(!empty( $_POST['ability1'])){
				$super1 = $_POST['ability1'];
			  }
			  else{
				$super1 = '';
			  }
			  if(!empty( $_POST['ability2'])){
				$super2 = $_POST['ability2'];
			  }
			  else{
				$super2 = '';
			  }
			  if(!empty( $_POST['ability3'])){
				$super3 = $_POST['ability3'];
			  }
			  else{
				$super3 = '';
			  }
			  if(!empty( $_POST['ability4'])){
				$super4 = $_POST['ability4'];
			  }
			  else{
				$super4 = '';
			  }
			  if(!empty( $_POST['ability5'])){
				$super5 = $_POST['ability5'];
			  }
			  else{
				$super5 = '';
			  }
			  if(!empty( $_POST['ability6'])){
				$super6 = $_POST['ability6'];
			  }
			  else{
				$super6 = '';
			  }
			  if(!empty( $_POST['ability7'])){
				$super7 = $_POST['ability7'];
			  }
			  else{
				$super7 = '';
			  }
			  if(!empty( $_POST['ability8'])){
				$super8 = $_POST['ability8'];
			  }
			  else{
				$super8 = '';
			  }
			  $message = $_POST['osebe'];
			  $kontract = $_POST['kontract'];
			  try {
				$query = $db->prepare("INSERT INTO profi (name, email, date, sex, limb, ability, osebe) VALUES (:name, :email, :date, :sex, :limb, :ability, :osebe)");
				$query->bindParam(':name', $name);
				$query->bindParam(':email', $email);
				$query->bindParam(':date', $date);
				$query->bindParam(':sex', $sex);
				$query->bindParam(':limb', $limb);
				$query->bindParam(':ability1',$ability);
				$query->bindParam(':ability2',$ability);
				$query->bindParam(':ability3',$ability);
				$query->bindParam(':ability4',$ability);
				$query->bindParam(':ability5',$ability);
				$query->bindParam(':ability6',$ability);
				$query->bindParam(':ability7',$ability);
				$query->bindParam(':ability8',$ability);
				$query->bindParam(':osebe', $osebe);
				$query->bindParam(':kontract', $kontract);
				$query->execute();
		  }
			catch(PDOException $t){
				print('Error : ' . $t->getosebe());
				exit();
			}
			setcookie('save', '1');
			$messages[] = 'Спасибо, результаты сохранены.';
			header('Location: index.php');
			}
			else {
			  $user = 'u20294';
			  $password = '5205554';
			  $db = new PDO('mysql:host=localhost;dbname=u20294', $user, $password);
			  extract($_POST);
			  $b=TRUE;
			  try {
				while($b){
				  $login = rand(1, 200);
				  $pass = rand(1, 100);
				  $b=FALSE;
				  foreach($db->query('SELECT login FROM profi') as $row){
					if($row['login']==$login){
					  $b=TRUE;
					}
				  }
				}
			  }
			  catch(PDOException $e){
				print('Error : ' . $e->getosebe());
				setcookie('save', '1');
				exit();
			  }
			  setcookie('login', $login);
			  setcookie('pass', $pass);
			  extract($_POST);
			  $user = 'u20294';
			  $password = '5205554';
			  $db = new PDO('mysql:host=localhost;dbname=u20294', $user, $password);
			  $name = $_POST['name'];
			  $email = $_POST['email'];
			  $date = $_POST['date'];
			  $sex = $_POST['sex'];
			  $limb = $_POST['limb'];
			  if(!empty( $_POST['ability1'])){
				$super1 = $_POST['ability1'];
			  }
			  else{
				$super1 = '';
			  }
			  if(!empty( $_POST['ability2'])){
				$super2 = $_POST['ability2'];
			  }
			  else{
				$super2 = '';
			  }
			  if(!empty( $_POST['ability3'])){
				$super3 = $_POST['ability3'];
			  }
			  else{
				$super3 = '';
			  }
			  if(!empty( $_POST['ability4'])){
				$super4 = $_POST['ability4'];
			  }
			  else{
				$super4 = '';
			  }
			  if(!empty( $_POST['ability5'])){
				$super5 = $_POST['ability5'];
			  }
			  else{
				$super5 = '';
			  }
			  if(!empty( $_POST['ability6'])){
				$super6 = $_POST['ability6'];
			  }
			  else{
				$super6 = '';
			  }
			  if(!empty( $_POST['ability7'])){
				$super7 = $_POST['ability7'];
			  }
			  else{
				$super7 = '';
			  }
			  if(!empty( $_POST['ability8'])){
				$super8 = $_POST['ability8'];
			  }
			  else{
				$super8 = '';
			  }
			  $message = $_POST['osebe'];
			  $kontract = $_POST['kontract'];
			  
			  	try {
			  		$query = $db->prepare("INSERT INTO profi (name, email, date, sex, limb, ability, osebe) VALUES (:name, :email, :date, :sex, :limb, :ability, :osebe)");
					$query->bindParam(':login', $login, PDO::PARAM_INT);  
					$query->bindParam(':pass', $pass);
					$query->bindParam(':name', $name);
			  		$query->bindParam(':email', $email);
			  		$query->bindParam(':date', $date);
			  		$query->bindParam(':sex', $sex);
			  		$query->bindParam(':limb', $limb);
			  		$query->bindParam(':ability1',$ability);
			  		$query->bindParam(':ability2',$ability);
			  		$query->bindParam(':ability3',$ability);
			  		$query->bindParam(':ability4',$ability);
			  		$query->bindParam(':ability5',$ability);
			  		$query->bindParam(':ability6',$ability);
			  		$query->bindParam(':ability7',$ability);
			  		$query->bindParam(':ability8',$ability);
			  		$query->bindParam(':osebe', $osebe);
			  		$query->bindParam(':kontract', $kontract);
			  		$query->execute();
				}
			  	catch(PDOException $t){
			  		print('Error : ' . $t->getosebe());
			  		exit();
				  }
				  
		}
		setcookie('save', '1');
		$messages[] = 'Спасибо, результаты сохранены.';
		header('Location: index.php');
		}
  	  }
}