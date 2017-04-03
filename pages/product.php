<?php
/**
 * Created by PhpStorm.
 * User: HP Pavilion 17
 * Date: 2.4.2017 г.
 * Time: 13:22
 */
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
$productData = [];
$productId = 0;
$productName = '';
$manufacturerName = '';
$model = '';
$price = 0;
$picture = '';
$warranty = 0;
$quantity = 0;
$isAvailable = true;
$specifications = [];

if (isset($_GET['id'])){
    try{
        $product = $_GET['id'];
        $db = new PDO( "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ';charset=utf8', DB_USER, DB_PASS );
        $preparedStatement = $db->prepare("SELECT p.id, p.name, m.name AS 'manufacturer', p.model, p.price, p.picture, p.warranty, p.quantity
                                                    FROM products p JOIN manufacturers m ON (p.manufacturer_id= m.id)WHERE p.id = ?");
        $result = $preparedStatement->execute([$product]);

        if ($result) {
            $countRows = 0;
            while ($product = $preparedStatement->fetch(PDO::FETCH_ASSOC)) {
                $countRows++;
                $productData = $product;
            }
            if ($countRows == 0){
                header("Location: ./");
                die($_GET['id']);
            }

            $productId = $productData['id'];
            $productName = $productData['name'];
            $manufacturerName = $productData['manufacturer'];
            $model = $productData['model'];
            $price = $productData['price'];
            $picture = $productData['picture'];
            $warranty = $productData['warranty'];
            $warranty = $warranty > 0 ? "Гаранция: $warranty месеца" : 'Гаранция: няма';
            $quantity = $productData['quantity'];
            $isAvailable = $quantity > 0 ? 'В наличност' : "Няма в наличност";

            $preparedStatement = $db->prepare("SELECT * FROM products_specification_names_specification_values WHERE product_id = ?");
            $preparedStatement->execute([$productId]);

            while ($row = $preparedStatement->fetch(PDO::FETCH_NUM)){
                $specifications[] = $row;
            }

        }

    } catch (PDOException $exception){
        $message = $exception->getMessage();
        echo "<script>alert($message)</script>";
    }
} else {
    header('Location: ./');
    die();
}

?>
<!DOCTYPE html>
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
                $productTitle = "$productName $manufacturerName $model";

                if (isset($_SESSION['ID'])){
                    $userId = $_SESSION['ID'];
                    $decideIfShouldBeAddedToCart = "addToCart($userId, $productId, '$productTitle')";
                } else {
                    $decideIfShouldBeAddedToCart = "showLoginBar()";
                }

                $productsPicturesPath = '../assets/images/products';

                echo "<section id='title'><h1>$productTitle</h1></section>

                      <section id='present'>
                        <article class = title-product><img src='$productsPicturesPath/$picture' alt=''></article>
                        <article class = 'info-product'>
                            <div>$price лв.</div>
                            <div>$isAvailable</div>
                            <div>$warranty</div>
                            <div><button onclick=\"$decideIfShouldBeAddedToCart\">Добави в количката</button></div>
                        </article>
                      </section>
                      <section id='specifications'><table>";
                foreach ($specifications as $specification){
                    $specificationName = $specification[1];
                    $specificationValue = $specification[2];

                    echo "<tr class='specRow'><td class='specName'>$specificationName</td><td class='specValue'>$specificationValue</td></tr>";
                }
                     echo '</table></section>';
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

