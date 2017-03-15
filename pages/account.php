<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>KALImag | Blog</title>
<?php include '../head-links.php'?>
</head>
<body>
<div class="main">
    <?php include '../header.php';
		if (isset($_POST['change'])){
			$name = trim(($_POST['name']));
			$surname = trim(($_POST['surname']));
			$phone = trim(($_POST['phone']));
			$address = trim(($_POST['address']));
			$id=$_SESSION['ID'];
			$link_kalimag = mysqli_connect("localhost", "root", "");
			mysqli_select_db($link_kalimag, "kalimag");
			mysqli_query($link_kalimag, "UPDATE users SET Name='$name', Surname='$surname'  WHERE ID='$id'");
			echo 1;
		}
	?>
    <div class="clr"></div>
    	<div class="content-acount">
    		<div class="sidebar">
				<ul>
					<li onclick="personalSeting()">Лични данни</li>
					<li onclick="securitySeting()">Настройки за сигурност</li>
					<li>Моите поръчки</li>
				</ul>
	     	</div>
    		<div class="article">
    			<div id="personalData">
	    			<h3>Моите данни</h3>
	    			<form action="" method="post">
	    				<div id='img'>
	    					<img src="../assets/images/profil_pic.jpg" alt="" />
	    				</div>
	    				
	    				<div id='data'>
	    					<label>Име</label>
	    					 <input type="text" id="name" name="name" value='<?php echo $_SESSION['name']?>'/><br />
	    					 
	    					 <label>Фамилия</label>
	    					 <input type="text" name="surname" id="surname" value='<?php echo $_SESSION['surname']?>'/><br />
	    					 
	    					 <label>Телефон</label>
	    					 <input type="text" name="phone" id="phone" value='<?php echo $_SESSION['phone']?>'/><br />
	    					 
	    					 <label>Адрес</label>
	    					 <input type="text" name="address" id="address"/><br />
	    					 <input type="submit" name='change' id="change" value='Запази'/>
	    				</div>
	    			</form>
    			</div>
    				<div id='security'>
    					<form action="" method="post">
	    					<fieldset>
	    						<h3>Имейл:</h3>
	    						<label>Настоящ имейл адрес: </label><?php echo $_SESSION['email']?><br/>
	    						<div id="new-email">
		    						<label>Нов имейл: </label>
		    						<input type="text"/><br/>
		    						
		    						<label>Парола: </label>
		    						<input type="text"/><br/>
		    						<a id="Quit-change-email" onclick="quitChangeEmail()">Откажи</a>
		    						<a id="changeEmail">Промени</a>
	    						</div>
	    						<p id="change-email" onclick="changeEmail()">Промени имейл адрес</p>
	    					</fieldset>
    					</form>
    					
    					<form action="" method="post">
	    					<fieldset>
	    						<h3>Парола:</h3>
	    						<div id="new-pass">
		    						<label>Нов парола: </label>
		    						<input type="text"/><br/>
		    						
		    						<label>Повтори парола: </label>
		    						<input type="text"/><br/>
		    						<a id="Quit-change-pass" onclick="quitChangePass()">Откажи</a>
		    						<a id="changeEmail">Промени</a>
	    						</div>
	    						<p id="change-pass" onclick="changePass()">Промени парола</p>
	    					</fieldset>
    					</form>
    				</div>
            </div>
     	</div>
      <div class="clr"></div>
    <?php include '../footer.php'?>
</div>
<script type="text/javascript" src="../assets/js/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="../assets/js/acount-script.js"></script>
<script type="text/javascript">
    setClassActive('account.php');
</script>
</body>
</html>
