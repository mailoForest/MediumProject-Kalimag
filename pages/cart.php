<!DOCTYPE html>
<head>
<title>KALImag | Contact</title>
    <?php include '../head-links.php';
    require_once '../functions.php';
    ?>
</head>
<body>
<div class="main">
    <?php
    include '../header.php';
    include '../functions.php';
    ?>
  <div class="clr"></div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
<<<<<<< HEAD
          <section>

          </section>
=======
        <div class="article-basket">
	        <form action="" method="post" id='form-basket'>
	         	<?php
	         	if (isset($_SESSION['ID'])){
	         		$sum = 0;
	         		$resProductInBasket = getProductInBasket($_SESSION['ID'], 2);
	         		for ($row=0;$row<count($resProductInBasket);$row++){
	         			$price = $resProductInBasket[$row]['price'];
	         			$quantity = $resProductInBasket[$row]['quantity'];
	         			$finalPrice = $quantity*$price;
	         			$sum += $finalPrice;	         			
	         			$title = $resProductInBasket[$row]['name'] . ' '. $resProductInBasket[$row]['manufacturers'].' '.$resProductInBasket[$row]['model'];
		         		echo '<section class="basket" id='.$resProductInBasket[$row]['id'].'>
						<article id="images"><img src=../assets/images/products/'.$resProductInBasket[$row]['picture'].'></article>
		         		<article id="title"><p>'.$title.'</p></article>
	        			<article id="quantity"><input type="number" name="quant" id="quant" value='.$quantity.' /></article>
	         			<article id="price"><p>'.$price.' лв.</p></article>
	         			<article id="delete"><img src="../assets/images/close.png" onclick = "removeProduct('.$resProductInBasket[$row]['id'].')"></img></article></section>';			         	
	         		}
	         		$deliveryPrice = getAllSumProducts($_SESSION['ID']) < 1000 ? 5 : 0;
	         		$deliveryText = $deliveryPrice === 0 ? 'БЕЗПЛАТНА' : "$deliveryPrice лв.";
	         		$deliveryNotice = $deliveryPrice === 5 ? '* При покупка над 1000 лв. доставката е безплатна!' : '';
	         	?>
	         		<div id="information-for-cart">
		         			<p>Всички продукти: <strong id='sumAllProctsInBasket'> <?= getAllSumProducts($_SESSION['ID']) ?></strong></p>
		         			<p>Цена на доставка: <strong id='delivery-text'><?= $deliveryText ?></strong> </p>
		         			<p>Общо: <strong id = 'sumAllProctsInBasketAndDeliveryPrice'> <?= getAllSumProducts($_SESSION['ID']) + $deliveryPrice ?></strong></p>
		         			<em id='noticeDelivery' ><?= $deliveryNotice ?></em>
		         	</div>
		         	<input type="submit" name='order' value='Поръчай'/>
	         	<?php
	         	}else {
	         		echo '<div id="cart-message">
		         			<p><strong>За да добавяте продукти в количката трябва да се <span onclick="showLoginBar()">впишете</span>!</strong></p>
		         			</div>';
	         	}
	         	?>
	         	
         	</form>
        </div>
>>>>>>> 7a600b4700c3ec80ae44f65ee03768f4e506e386
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
    <script type="text/javascript">
        setClassActive('cart.php');
    </script>
</div>
</body>
</html>
