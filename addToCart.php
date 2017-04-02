<?php
/**
 * Created by PhpStorm.
 * User: HP Pavilion 17
 * Date: 2.4.2017 г.
 * Time: 18:47
 */
if (isset($_GET['userId']) && isset($_GET['productId'])){
    $userId = $_GET['userId'];
    $userId = htmlentities(trim($userId));

    $productId = $_GET['productId'];
    $productId = htmlentities(trim($productId));

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

    try {
        $db = new PDO ("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ';charset=utf8', DB_USER, DB_PASS );
        $db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        $result = $db->prepare("SELECT * FROM baskets WHERE users_id = ? and product_id = ?");
        $result->execute([$userId, $productId]);
        $row = $result->fetchAll(PDO::FETCH_NUM);


        if (!$row){
            $psmt = $db->prepare("INSERT INTO baskets VALUES (?,?,1);");
            $psmt->execute([$userId,$productId]);
        } else {
            $quantity = $row[0][2];
            $psmt = $db->prepare("UPDATE baskets SET quantity = ? WHERE users_id = ? and product_id = ?;");
            $quantity++;
            var_dump($quantity);
            $psmt->execute([$quantity, $userId, $productId]);
        }
    } catch ( PDOException $e ) {
        echo "{error : " . $e->getMessage () . "}";
        http_response_code ( 500 );
    }

} else {
    echo "Не успяхте да запишете продукта в кошницата си!";
}
?>
