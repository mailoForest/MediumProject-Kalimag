<?php 
$chek='';
if (isset($_POST['submit'])){
	$name = trim($_POST['name']);
	$pass1 = trim($_POST['password']);
	$pass2 = trim($_POST['chekPassword']);
	if ($name==''||$pass2==''){
		$chek = 'задължително поле';
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="../example/assets/css/reset.css" type="text/css" />
		<link rel="stylesheet" href="../example/assets/css/style.css" type="text/css" />
		<title>Нов акаунт</title>
	</head>
	
	<body>
		<main>
			<section class="logo">
				<a><img alt="" src="example/assets/images/logo.png"></a>
			</section>
			
			<section class="form">
				<a href="./login.php" id="back">&lt Назад</a>
				<form action="" method="post">
					<h1>Добре дошли!</h1>
					<h2>Изглежда нямате акаунт в eMAG.</h2><h2> Нека да Ви направим!</h2><br/>
					
					<label>Попълнете име и фамилия</label>
					<figure>
						<input type="text" name="name"/>
						<figcaption><?php echo $chek ?></figcaption>
					</figure>
					
					<label>Изберерете сигурна парола</label>
					<figure>
						<input type="text" name="password"/>
						<figcaption><?php echo $chek ?></figcaption>
					</figure>
					
					<label>Потвърждаване на парола</label>
					<figure>
						<input type="text" name="chekPassword"/>
						<figcaption><?php echo $chek ?></figcaption>
					</figure>
					<input type="submit" name="submit" Value="Продължи"/>
					<h6><input type="checkbox" name="agree" value="yes">Прочетох и съм съгласен с <a href="">Условията за ползване</a></h6>
					<figure>
						<figcaption><?php echo $chek ?></figcaption>
					</figure>
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
	</body>
</html>
