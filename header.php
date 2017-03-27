<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Kaloqn
 * Date: 3.3.2017 г.
 * Time: 17:00 ч.
 */
?>
<?php
    include '../login.php';
    include '../register.php';
?>
<a href="" id="anchor"></a>
<div class="header">
    <div class="header_resize">
        <div class="logo">
            <h1><a href="./"><span>KALI</span>mag</a></h1>
        </div>
        <div class="menu_nav">
            <ul>
                <li id="index.php"><a href="./"><span>Начало</span></a></li>
                <li id="subscribe.php"><a href="subscribe.php"><span>Абонирай се</span></a></li>
                <li id="info.php"><a href="info.php"><span>Инфо</span></a></li>
                <?php
                if (isset($_SESSION['ID'] )){
                	echo '<li id="myAccount"><a href="account.php"><span>Моят акаунт</span></a>
 							<ul class="submenu">
		                        <li><a href="account.php"  personalSeting()">Настройки</a></li>
		                        <li><a href="../logout.php">Изход</a></li>
		                    </ul>
                		</li>';
                }else echo '<li id="account.php" onmouseover="showAccountBar()" onmouseout="hideAccountBar()"><a><span>Акаунт</span></a></li>';
                ?>
                <li id="cart.php"><a href="cart.php"><span>Количка</span></a></li>
            </ul>
            <div class="clr"></div>
            <div id="account-bar" onmouseover="showAccountBar()" onmouseout="hideAccountBar()">
                <div id="connect"></div>
                <p>Не сте в акаунта си!
                    <span class="account-log" onclick="showLoginBar()">Впишете се</span> или се
                    <span class="account-log" onclick="showRegisterBar()">регистрирайте</span>.</p>
            </div>
        </div>
        <div class="clr"></div>
        <div class="header_img"><img src="../assets/images/buynow-cry-later-logo.png" alt="" width="35%" />
            <h2><span>най-добрите</span> Предложения </h2>
        </div>
    </div>
</div>
<a href="#anchor" id="goTop"><img src="../assets/images/arrow-up.png" width="50px" alt=""></a>

