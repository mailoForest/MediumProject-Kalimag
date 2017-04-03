<?php
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

$data = [];

if (isset($_GET['name'])){
    try{
        $minicategory = $_GET['name'];
        $db = new PDO( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ';charset=utf8', DB_USER, DB_PASS );
        $preparedStatement = $db->prepare("SELECT * FROM minicategories WHERE name = ?");
        $result = $preparedStatement->execute([$minicategory]);

        if ($result) {
            $countRows = 0;
            while ($row = $preparedStatement->fetch(PDO::FETCH_NUM)) {
                $countRows++;
            }

            if ($countRows == 0){
                header("Location: ./");
                die();
            } else {
                $result = $db->prepare('SELECT p.name, man.name, p.model, p.price, p.picture, p.id FROM products p JOIN minicategories m on(p.minicategory_id = m.id)
                                                  JOIN manufacturers man ON (man.id = p.manufacturer_id) WHERE m.name = ?');
                $result->execute([$minicategory]);

                while ($row = $result->fetch(PDO::FETCH_NUM)){
                    $data[] = $row;
                }
            }
        }

    } catch (PDOException $exception){
        $message = $exception->getMessage();
        echo "<script>alert($message)</script>";
    }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>KALImag</title>
    <?php include '../head-links.php'?>
</head>
<body>
<div class="main">
    <?php include '../header.php'?>
    <div class="clr"></div>
    <div class="content">
        <div class="content_resize">
            <div class="mainbar">
            <section class = 'mainbar-minicategory'>
                <?php
                $decideIfShouldBeAddedToCart = '';


                foreach ($data as $d){
                    $title  = $d[0] . ' ' . $d[1] . ' ' . $d[2];
                    $price = $d[3];
                    $imageName = $d[4];
                    $productId = $d[5];
                    $productsPicturesPath = '../assets/images/products';

                    if (isset($_SESSION['ID'])){
                        $userId = $_SESSION['ID'];
                        $decideIfShouldBeAddedToCart = "addToCart($userId, $productId, '$title')";
                    } else {
                        $decideIfShouldBeAddedToCart = "showLoginBar()";
                    }

                    echo "
<article class = 'minicategory-products'>
    <a href='product.php?id=$productId'>
        <article><img width='100em' src='$productsPicturesPath/$imageName' alt=''><p>$title $price лв.</p></article>
    </a>
    <button onclick=\"$decideIfShouldBeAddedToCart\">Добави в кошницата</button>
</article>";
                }
                ?>
                </section>
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
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <script  type="text/javascript">
        setClassActive('index.php');
        window.onscroll = function(){showGoTop()};
    </script>
</div>
</body>
</html>
