<?php include '../header.php'; require_once '../functions.php'; ?>
<div class="clr"></div>
<div class="content">
	<div class="content_resize">
		<div class="mainbar">
			<main class="main-subscribe">
			<?php if (isset($_POST['subscribe'])) { ?>
				<?php userSubscribed(); ?>
			<?php } ?>
			<?php if (!isset($_SESSION['ID']) ) { ?>
					<section class="subscribe">
					<h2><span onclick="showLoginBar()">Впиши се </span>и се абонирай за бюлетина на KALImag!</h2>
					<img src="../assets/images/abonament.jpg" />
					<ul>
						<li>Ще бъдеш един от първите, които научават за актуалните оферти на KALImag</li>
						<li>Всяка седмица ще ти изпращаме избрани атрактивни предложения</li>
						<li>Ще бъдеш винаги информиран за нашите кампании</li>
					</ul>
					</section>
			<?php } else if(!isSubscribe($_SESSION['ID'])) { ?>
				<section class="subscribe">
					<h2>Абонирай се за бюлетина на KALImag, за да си информиран за нашите нови предложения и оферти!</h2>
					<form action="" method="post">
						<fieldset>
							<input type="submit" name="subscribe" value="Абонирай се"/>
						</fieldset>
					</form>
					<ul>
						<li>Ще бъдеш един от първите, които научават за актуалните оферти на KALImag</li>
						<li>Всяка седмица ще ти изпращаме избрани атрактивни предложения</li>
						<li>Ще бъдеш винаги информиран за нашите кампании</li>
					</ul>
				</section>
			<?php } else { ?>
					<section class="subscribe">
						<img src="../assets/images/is-subscribe.jpg" />
						<p>Вие вече сте абониран за бюлетина на KALImag, ще бъдете информиран ежеседмично за нашите нови предложения и оферти на посочения от вас имейл адрес: <?php echo $_SESSION['email']; ?>!</p>
					</section>
			<?php } ?>
			</main>
		</div>
		<div class="sidebar">
			<div class="search">
				<form id="form" name="form" method="post" action="#">
					<span><input name="q" type="text" class="keywords" id="textfield" maxlength="50" value="Search..." /></span>
					<input name="b" type="image" src="../assets/images/search.gif" class="button" />
				</form>
			</div>
			<!--/search -->
			<?php include '../aside.php'?>
		</div>
		<div class="clr"></div>
	</div>
</div>
<script type="text/javascript" src="../assets/js/script.js"></script>
<script type="text/javascript"><!--
	setClassActive('subscribe.php');
//--></script>
<?php include '../footer.php'?>

