<?php 
$chek='';
$chekPass='';
if (isset($_POST['submit'])){
	$name = trim($_POST['name']);
	$password = trim($_POST['password']);
	$passChek = trim($_POST['chekPassword']);
	if ($name !=='' && $password !=='' && $passChek !==''){
		if (strcmp($password, $passChek)===0){
			$link_kalimag = mysqli_connect("localhost", "root", "");
			mysqli_select_db($link_kalimag, "kalimag");

			mysqli_query($link_kalimag, "insert into users value(0, '$name', '$password', '$email')");
			mysqli_close($link_kalimag);
			session_start();
				
			$_SESSION['username'] = $name;
			$_SESSION['pass'] = $password;
			$_SESSION['Email'] = $mail;
			
			header('Location: ../pages/index.php', true, 302);
		}else $chekPass = 'Паролите не съвпадат';
	}else $chek = 'задължително поле';;
}
?>

<div id="register-wrapper" onclick="hideLogBar()">
    <main class="log-window">
        <section class="form">
            <div class="fa-times-pos"><span class="fa fa-times" onclick="hideLogBar()"></span></div>
            <form action="" method="post">
                <h1>Добре дошли!</h1>
                <h2>Изглежда нямате акаунт в KALImag.</h2><h2> Нека да Ви направим!</h2><br/>

                <label>Попълнете име и фамилия</label>
                <figure>
                    <input type="text" name="name"/>
                    <figcaption><?php echo $chek ?></figcaption>
                </figure>

                <label>Изберете сигурна парола</label>
                <figure>
                    <input type="password" name="password"/>
                    <figcaption><?php echo $chek ?></figcaption>
                </figure>

                <label>Потвърждаване на парола</label>
                <figure>
                    <input type="password" name="chekPassword"/>
                    <figcaption><?php echo $chek?></figcaption>
                </figure>
                <h3><?php echo $chekPass ?></h3>
                <input type="submit" name="submit" Value="Продължи"/>
                <h6><input type="checkbox" name="agree" value="yes">Прочетох и съм съгласен с <a href="">Условията за ползване</a></h6>
                <figure>
                    <figcaption><?php echo $chek?></figcaption>
                </figure>
                <h6><input type="checkbox" name="agre" value="yes"/>Искам да бъда винаги запознат с най-актуалните оферти</h6>

            </form>

        </section>
        <section class="bottom-form">
            <a href="">Имаш нужда от помощ?</a>
            <article class="link-form">
            <a href="">Акаунт на клиент на KALImag.bg </a><a id="vertical-line" href="">Данни с личен характер</a>
            </article>
        </section>
    </main>
</div>