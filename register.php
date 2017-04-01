<?php 
function register(){
	$email = trim($_POST['email']);
	$password = trim($_POST['reg-password']);
	$passChek = trim($_POST['repeatPass']);
	if ($email !=='' && $password !=='' && $passChek !==''){
		if (strcmp($password, $passChek)===0){
			define ( 'DB_HOST', 'localhost' );
			define ( 'DB_NAME', 'kalimag' );
			define ( 'DB_USER', 'root' );
			define ( 'DB_PASS', '' );
			try {
				$db = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS );
				$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
					
				$result = $db->exec( "INSERT INTO users VALUE(0,'$email', '$password','', '','','');" );

				// 				if($result){
				// 					$res = $db->query ( "SELECT * FROM users WHERE (Email = '$email') AND (Password = '$password');" );
				// 					$user = $res->fetch ( PDO::FETCH_ASSOC);
					
				// 					$_SESSION['ID'] = $user['ID'];
				// 					$_SESSION['email'] = $user['Email'];

				// 					header('Location: ../pages/account.php', true, 302);
				// 				}
			} catch ( PDOException $e ) {
				echo "{error : " . $e->getMessage () . "}";
				http_response_code ( 500 );
			}

		}else $chekPass = 'Паролите не съвпадат';
	}else $chek = 'задължително поле';
}
$chek='';
$chekPass='';
if (isset($_POST['submit'])){
	register();
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