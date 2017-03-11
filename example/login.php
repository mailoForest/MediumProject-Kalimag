<?php 
$chek = '';
	if (isset($_POST['submit'])){
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		if ($email!=='' && $password!==''){
			$link_kalimag = mysqli_connect("localhost", "root", "");
			mysqli_select_db($link_kalimag, "kalimag");
			$result = mysqli_query($link_kalimag, "select * from users WHERE (Email = '$email') AND (Password = '$password')");
			$users = mysqli_fetch_array($result,MYSQLI_ASSOC);
			if ($users){
				session_start();
				
				$_SESSION['ID'] = $users['ID'];
				$_SESSION['name'] = $users['Name'];
					
				header('Location: ../pages/index.php', true, 302);
			}else $chek = 'Невалиден имейл или парола';
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="assets/css/reset.css" type="text/css" />
		<link rel="stylesheet" href="assets/css/style.css" type="text/css" />
		<title>Login</title>
	</head>
	
	<body>
		<main>
			<section class="logo">
				<a><img alt="" src="../assets/images/gallery_5.jpg"></a>
			</section>
			
			<section class="form">
				<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
					<h1>Здравейте!</h1>
					<p><strong>Моля въведете</strong></p>
					<div id="mail">
					<input type="text" placeholder="имейл адрес" name="email" id="email">
					</div>
					<div id="password">
					<input type="password" placeholder="парола" name="password" id="password">
					</div>
					<figure>
						<figcaption><?php echo $chek?></figcaption>
					</figure>
					<input type="submit" name="submit" Value="Продължи">
					<p>Нямаш акаунт? <a href="Registration.php">Регистрирай се</a></p>
					
					<table>
						<tr>
							<th><hr /></th>
							<td><p>или</p></td>
							<th><hr /></th>
						</tr>
						<tr>
							<td colspan="3"><p>влез в акаунта си с</p></td>
						</tr>
					</table>
					<article>
						<a href="https://web.facebook.com/login.php?skip_api_login=1&api_key=505725606172006&signed_next=1&next=https%3A%2F%2Fweb.facebook.com%2Fv2.7%2Fdialog%2Foauth%3Fredirect_uri%3Dhttp%253A%252F%252Fwww.emag.bg%252Fuser%252Ffacebookauth%253Fredirect_key%253Ddefault%26state%3Dc2f4eeebe75832824e22a494ed10cbda%26scope%3Dpublic_profile%252C%2Bemail%252C%2Buser_friends%26client_id%3D505725606172006%26ret%3Dlogin%26logger_id%3D5c65141b-aaa1-a533-b58f-f710d0bc2eeb&cancel_url=http%3A%2F%2Fwww.emag.bg%2Fuser%2Ffacebookauth%3Fredirect_key%3Ddefault%26error%3Daccess_denied%26error_code%3D200%26error_description%3DPermissions%2Berror%26error_reason%3Duser_denied%26state%3Dc2f4eeebe75832824e22a494ed10cbda%23_%3D_&display=page&locale=en_US&logger_id=5c65141b-aaa1-a533-b58f-f710d0bc2eeb" target="blank"><img alt="" src="assets/images/facebook-sign-in.png"></a>
						<a href="https://accounts.google.com/ServiceLogin?passive=1209600&continue=https://accounts.google.com/o/oauth2/auth?response_type%3Dcode%26client_id%3D878064229905-ge1qoto079l7jhmfl99rvcl9ucop2van.apps.googleusercontent.com%26redirect_uri%3Dhttp://www.emag.bg/user/googleauth%26scope%3Dhttps://www.googleapis.com/auth/userinfo.email%2Bhttps://www.googleapis.com/auth/userinfo.profile%26state%3D453582957a270e1b4aa8933439985a70%26from_login%3D1%26as%3D-e384eeebaffea27&oauth=1&sarp=1&scc=1#identifier" target="blank"><img alt="" src="assets/images/google-sign-in.png"></a>
					</article>
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

