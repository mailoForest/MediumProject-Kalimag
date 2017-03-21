<?php 
$chek='';
$chekPass='';
if (isset($_POST['submit'])){
	$email = trim($_POST['email']);
	$password = trim($_POST['reg-password']);
	$passChek = trim($_POST['repeatPass']);
	if ($email !=='' && $password !=='' && $passChek !==''){
		if (strcmp($password, $passChek)===0){
			$link_kalimag = mysqli_connect("localhost", "root", "");
			mysqli_select_db($link_kalimag, "kalimag");

			mysqli_query($link_kalimag, "insert into users value(0,'$email', '','', '$password','')");
			mysqli_close($link_kalimag);
			session_start();
				
			$_SESSION['pass'] = $password;
			$_SESSION['Email'] = $mail;
			
			header('Location: ../pages/index.php', true, 302);
		}else $chekPass = 'Паролите не съвпадат';
	}else $chek = 'задължително поле';;
}
?>

<div id="register-wrapper">
    <main class="log-window">
        <section class="form">
            <div class="fa-times-pos"><span class="fa fa-times" onclick="hideLogBar()"></span></div>
				<form action="" method="post" id="form">
					<h1>Добре дошли!</h1>
					<h2>Изглежда нямате акаунт в KALImag.</h2><h2> Нека да Ви направим!</h2><br/>
					<div id='emails'>
						<label>Попълнете имейл адрес</label>
						<input type="text" name="email" id="reg-email"/>
						<em><?php echo $chek ?></em>
					</div>
					<div id="regPassword"> 
						<label>Изберете сигурна парола</label>
						<input type="password" name="reg-password" id="reg-password"/>
						<em><?php echo $chek ?></em>
						<label>Потвърждаване на парола</label>
						<input type="password" name="repeatPass" id="repeat-pass"/>
						<em><?php echo $chek ?></em>
					</div>
					<em><?php echo $chekPass ?></em>
					<input type="submit" name="submit" Value="Продължи"/>
					<h6><input type="checkbox" id="agree" name="agree" value="yes">Прочетох и съм съгласен с <a href="">Условията за ползване</a></h6>
					<h6><input type="checkbox" name="agre" value="yes"/>Искам да бъда винаги запознат с най-актуалните оферти</h6>			
				</form>
        </section>
    </main>

</div>