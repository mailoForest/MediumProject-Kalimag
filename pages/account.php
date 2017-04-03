<?php 
session_start();
require_once '../functions.php';
if(!isset($_SESSION['ID'])){
	goHome();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>KALImag | Blog</title>
<?php include '../head-links.php'?>
</head>
<body>
<div class="main">
    <?php
        include '../header.php';
    	$linkProfilPic = "profil_pic.jpg";
        if (isset($_SESSION['picture'])){
        	$linkProfilPic = $_SESSION['picture'];
        }
		if (isset($_POST['change'])){
			changePersonalData();
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
	    			<form enctype='multipart/form-data' action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	    				<div id='profilePicture'>
	    					<img src='../profilePicture/<?=$linkProfilPic?>' alt="" />
	    					<input name="profilePic" type="file" accept="image/*" />
							<input type='hidden' name='MAX_FILE_SIZE' value='8000000' />
	    				</div>
	    				
	    				<div id='data'>
	    					<label>Име</label>
	    					 <input type="text" id="name" name="name" value='<?php echo $_SESSION['name']?>'/><br />
	    					 
	    					 <label>Фамилия</label>
	    					 <input type="text" name="surname" id="surname" value='<?php echo $_SESSION['surname']?>'/><br />
	    					 
	    					 <label>Телефон</label>
	    					 <input type="text" name="phone" id="phone" value='<?php echo $_SESSION['phone']?>'/><br />
	    					 
	    					 <input type="submit" name='change' id="change" value='Запази'/>
	    				</div>
	    			</form>
    			</div>
    				<div id='security'>
    					<form action="" method="post">
	    					<fieldset>
	    						<h3>Имейл:</h3>
	    						<div id='oldEmail'>
	    						<label>Настоящ имейл адрес: </label><?php echo $_SESSION['email']?><br/>
	    						</div>
	    						<div id='done-change-mail'>
	    						<label>Нов имейл адрес: </label><a id="createdMail"></a><br/>
	    						</div>
	    						<div id="new-email">
		    						<label>Нов имейл: </label>
		    						<input id="newEmail" type="text" name="newEmail"/><br/>
		    						
		    						<label>Парола: </label>
		    						<input id="newPassword" type="password" name="newPassword"/><br/>
		    						<a id="Quit-change-email" onclick="quitChangeEmail()">Откажи</a>
		    						<a id="changeEmail" onclick="change()">Промени</a>
	    						</div>
	    						<p id="change-email" onclick="changeEmail()">Промени имейл адрес</p>
	    					</fieldset>
    					</form>
    					
    					<form action="" method="post">
	    					<fieldset>
	    						<h3>Парола:</h3><a id="doneChangePass">Паролата беше променена успешно</a>
	    						<div id="new-pass">
	    							<label>Парола: </label>
		    						<input id="oldPassword" type="password" name="oldPassword"/><br/>
		    						<label>Нов парола: </label>
		    						<input type="password" id="newPass"/><br/>
		    						
		    						<label>Повтори парола: </label>
		    						<input type="password" id="repeatPass"/><br/>
		    						<a id="Quit-change-pass" onclick="quitChangePass()">Откажи</a>
		    						<a id="changePass" onclick="changePassword()">Промени</a>
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
