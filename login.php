<?php
$check = '';
$user = [];
if (isset($_POST['login'])){
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);

	$email = htmlentities($email);
    $password = htmlentities($password);

    if ($email !== '' && $password !== ''){
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
			$db = new PDO ("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ';charset=utf8', DB_USER, DB_PASS );
			$db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				
			$pstmt = $db->prepare("SELECT * FROM users WHERE (email = ?) AND (password = ?);" );
			$pstmt->execute(array($email, $password));
			$user = $pstmt->fetch (PDO::FETCH_ASSOC);
		} catch ( PDOException $e ) {
			echo "{error : " . $e->getMessage () . "}";
			http_response_code ( 500 );
		}

		if ($user){
			$_SESSION['ID'] = $user['id'];
			$_SESSION['name'] = $user['name'];
			$_SESSION['surname'] = $user['surname'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['phone'] = $user['phone'];
			$_SESSION['pass'] = $user['password'];
			$_SESSION['picture'] = $user['picture'];
		} else {
            $check = 'Невалиден имейл или парола';
        }
	}
}
?>
<div id="login-wrapper">
    <main class="log-window">
        <section class="form">
            <div class="fa-times-pos"><span class="fa fa-times" onclick="hideLogBar()"></span></div>
          		<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
					<h1>Здравейте!</h1>
					<p><strong>Моля въведете имейл адрес и парола</strong></p>
					<div id="mail">
						<input type="text" placeholder="имейл адрес" name="email" id="email">
					</div>
					<div id="password">
						<input type="password" placeholder="парола" name="password" id="password-log">
					</div>
					<figure>
						<figcaption><?php echo $check?></figcaption>
					</figure>
					<input type="submit" name="login" Value="Продължи">					
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
						<a href="https://web.facebook.com/login.php?skip_api_login=1&api_key=505725606172006&signed_next=1&next=https%3A%2F%2Fweb.facebook.com%2Fv2.7%2Fdialog%2Foauth%3Fredirect_uri%3Dhttp%253A%252F%252Fwww.emag.bg%252Fuser%252Ffacebookauth%253Fredirect_key%253Ddefault%26state%3Dc2f4eeebe75832824e22a494ed10cbda%26scope%3Dpublic_profile%252C%2Bemail%252C%2Buser_friends%26client_id%3D505725606172006%26ret%3Dlogin%26logger_id%3D5c65141b-aaa1-a533-b58f-f710d0bc2eeb&cancel_url=http%3A%2F%2Fwww.emag.bg%2Fuser%2Ffacebookauth%3Fredirect_key%3Ddefault%26error%3Daccess_denied%26error_code%3D200%26error_description%3DPermissions%2Berror%26error_reason%3Duser_denied%26state%3Dc2f4eeebe75832824e22a494ed10cbda%23_%3D_&display=page&locale=en_US&logger_id=5c65141b-aaa1-a533-b58f-f710d0bc2eeb" target="blank"><img alt="" src="../assets/images/facebook-sign-in.png"></a>
						<a href="https://accounts.google.com/ServiceLogin?passive=1209600&continue=https://accounts.google.com/o/oauth2/auth?response_type%3Dcode%26client_id%3D878064229905-ge1qoto079l7jhmfl99rvcl9ucop2van.apps.googleusercontent.com%26redirect_uri%3Dhttp://www.emag.bg/user/googleauth%26scope%3Dhttps://www.googleapis.com/auth/userinfo.email%2Bhttps://www.googleapis.com/auth/userinfo.profile%26state%3D453582957a270e1b4aa8933439985a70%26from_login%3D1%26as%3D-e384eeebaffea27&oauth=1&sarp=1&scc=1#identifier" target="blank"><img alt="" src="../assets/images/google-sign-in.png"></a>
					</article>
				</form>
        </section>
    </main>
</div>
