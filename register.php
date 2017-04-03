<?php 
function register(){
	$email = trim($_POST['email']);
	$password = trim($_POST['reg-password']);
	$passChek = trim($_POST['repeatPass']);
	
	$email = htmlentities($email);
	$password = htmlentities($password);
	$passChek = htmlentities($passChek);
	
	if ($email !=='' && $password !=='' && $passChek !==''){
		if (strcmp($password, $passChek)===0){
            if (!defined('DB_HOST')){
                define ( 'DB_HOST', 'localhost' );
            }
            if (!defined('DB_NAME')){
                define ( 'DB_NAME', 'kalimag' );
            }
            if (!defined('DB_USER')){
                define ( 'DB_USER', 'root' );
            }
            if (!defined('DB_PASS')){
                define ( 'DB_PASS', '' );
            }

            try {
				$db = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ';charset=utf8', DB_USER, DB_PASS );
				$db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
					
				$pstmt = $db->prepare( "INSERT INTO users(email, password) VALUE(?,?);" );
				$pstmt->execute(array($email, $password));

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