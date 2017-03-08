<?php 
$chekPass = '';
	if (isset($_POST['submit'])){
		$email = trim($_POST['mail']);
		if ($email!==''){
			$link_kalimag = mysqli_connect("localhost", "root", "");
			mysqli_select_db($link_kalimag, "kalimag");
			$result = mysqli_query($link_kalimag, "select * from users");
			while ($users = mysqli_fetch_array($result,MYSQLI_ASSOC)){
				
				if ($users['Email'] === $email){
					$chekUser=false;
					$chekPass='Вече има регистриран потребител с този имейл';
					break;
				}else header('Location: register.php', true, 302);
			}
		}
		
	}
?>
<div id="login-wrapper" onclick="hideLogBar()">
    <main class="log-window">
        <section class="form">
            <div class="fa-times-pos"><span class="fa fa-times" onclick="hideLogBar()"></span></div>
            <form action="" method="post">
                <h1>Здравейте!</h1>
                <p><strong>Моля въведете имейл адрес</strong></p>
                <input type="text" name="mail">
                <h3><?php echo $chekPass ?></h3>
                <input type="submit" name="submit" Value="Продължи">
                <p>Нямаш акаунт? Не се притеснявай!
                    Попълни имейл адреса, с който желаеш да се регистрираш.</p>

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
        <section class="bottom-form">
            <a href="">Имаш нужда от помощ?</a>
            <article class="link-form">
                <a href="">Акаунт на клиент на eMAG.bg </a><a id="vertical-line" href="">Данни с личен характер</a>
            </article>
        </section>
    </main>
</div>
