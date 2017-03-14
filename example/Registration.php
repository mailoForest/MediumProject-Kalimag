<?php 
// $chek='';
// $chekPass='';
// if (isset($_POST['submit'])){
// 	$name = trim($_POST['name']);
// 	$password = trim($_POST['password']);
// 	$passChek = trim($_POST['chekPassword']);
// 	if ($name !=='' && $password !=='' && $passChek !==''){
// 		if (strcmp($password, $passChek)===0){
// 			$link_kalimag = mysqli_connect("localhost", "root", "");
// 			mysqli_select_db($link_kalimag, "kalimag");

// 			mysqli_query($link_kalimag, "insert into users value(0, '$name', '$password', '$email')");
// 			mysqli_close($link_kalimag);
// 			session_start();
				
// 			$_SESSION['username'] = $name;
// 			$_SESSION['pass'] = $password;
// 			$_SESSION['Email'] = $mail;
			
// 			header('Location: ../pages/index.php', true, 302);
// 		}else $chekPass = 'Паролите не съвпадат';
// 	}else $chek = 'задължително поле';;
// }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="assets/css/reset.css" type="text/css" />
		<link rel="stylesheet" href="assets/css/style.css" type="text/css" />
		<script type="text/javascript" src="../assets/js/jquery-1.2.6.min.js"></script>
		<title>Нов акаунт</title>
	</head>
	
	<body>
		<main id="reg-form">
			<section class="logo">
				<a><img alt="" src="assets/images/logo.png"></a>
			</section>
			
			<section class="form">
				<a href="./login.php" id="back">&lt Назад</a>
				<form action="" method="post" id="form">
					<h1>Добре дошли!</h1>
					<h2>Изглежда нямате акаунт в KALImag.</h2><h2> Нека да Ви направим!</h2><br/>
					<div id='emails'>
						<label>Попълнете имейл адрес</label>
						<input type="text" name="email" id="reg-email"/>
					</div>
					<div id="regPassword"> 
						<label>Изберете сигурна парола</label>
						<input type="password" name="reg-password" id="reg-password"/>
						<label>Потвърждаване на парола</label>
						<input type="password" name="repeatPass" id="repeat-pass"/>
					</div>
					<input type="submit" name="submit" Value="Продължи"/>
					<h6><input type="checkbox" id="agree" name="agree" value="yes">Прочетох и съм съгласен с <a href="">Условията за ползване</a></h6>
					<h6><input type="checkbox" name="agre" value="yes"/>Искам да бъда винаги запознат с най-актуалните оферти</h6>			
				</form>
				
			</section>
			<section class="bottom-form">
				<a href="">Имаш нужда от помощ?</a>
				<article class="link-form">
				<a href="">Акаунт на клиент на eMAG.bg </a><a id="vertical-line" href="">Данни с личен характер</a>
				</article>
					<hr/>
			</section>
		</main>	
		<script type="text/javascript" src="../assets/js/script.js"></script>
	</body>
</html>
