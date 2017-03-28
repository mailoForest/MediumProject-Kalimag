<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Kaloqn
 * Date: 3.3.2017 г.
 * Time: 17:00 ч.
 */;

if (isset($_GET['subcategory'])){
    $subcategory = $_GET['subcategory'];
    // свързва се с база данни и се опитва да намери категория = стойността на променливата. ако е спешно търсенето, препраща. иначе нищо не прави.

    define ( 'DB_HOST', 'localhost' );
    define ( 'DB_NAME', 'kalimag_db' );
    define ( 'DB_USER', 'root' );
    define ( 'DB_PASS', '' );

    try {
        $db = new PDO ( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ';charset=utf8', DB_USER, DB_PASS );
        $db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        $pstmt = $db->prepare("SELECT name FROM subcategories WHERE name = ?");


        if ($pstmt->execute([$subcategory])) {
            $countRows = 0;
            while ($row = $pstmt->fetch(PDO::FETCH_NUM)) {
                $countRows++;
            }
            if ($countRows > 0){
                header("Location: product.php?category=$subcategory");
                die();
            }
        }
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}
include '../register.php';
include '../login.php'
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

