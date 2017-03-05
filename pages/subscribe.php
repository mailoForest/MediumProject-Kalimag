<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>KALImag</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../assets/css/reset.css" rel="stylesheet" type="text/css" />
<link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
<link href="../assets/css/ali-style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../assets/js/cufon-yui.js"></script>
<script type="text/javascript" src="../assets/js/arial.js"></script>
<script type="text/javascript" src="../assets/js/cuf_run.js"></script>
</head>
<body>
<div class="main">
<?php include '../header.php'?>
  <div class="clr"></div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
          <main class="main-subscribe">
          	<section class="subscribe">
          		<h2>Абонирай се за бюлетина на KALImag, за да си информиран за нашите нови предложения и оферти!</h2>
          		
          		<form>
          		<fieldset>
          			<legend></legend>
          			<input type="text" name="name" placeholder="Име" />
          			<input type="text" name="mail" placeholder="Имейл" />
          			<input type="submit" name="subscribe" value="Абонирай се"/>
          			</fieldset>
          		</form>
          		<ul>
          			<li>Ще бъдеш един от първите, които научават за актуалните оферти на KALImag</li>
          			<li>Всяка седмица ще ти изпращаме избрани атрактивни предложения</li>
          			<li>Ще бъдеш винаги информиран за нашите кампании</li>
          		</ul>
          	</section> 
          </main>
      </div>
      <div class="sidebar">
        <div class="search">
          <form id="form" name="form" method="post" action="#">
            <span>
            <input name="q" type="text" class="keywords" id="textfield" maxlength="50" value="Search..." />
            </span>
            <input name="b" type="image" src="../assets/images/search.gif" class="button" />
          </form>
        </div>
        <!--/search -->
          <?php include '../aside.php'?>
      </div>
      <div class="clr"></div>
   </div>
  </div>
    <?php include '../footer.php'?>
    <script>
        function setClassActive(id) {
            document.getElementById(id).setAttribute('class', 'active');
        }
        setClassActive('subscribe.php');
    </script>
</div>
</body>
</html>
