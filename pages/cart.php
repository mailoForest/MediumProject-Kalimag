<!DOCTYPE html>
<head>
<title>KALImag | Contact</title>
    <?php include '../head-links.php';?>
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
        <div class="article-basket">
	        <form action="order.php" method="post" id='form-basket'>
	         	<?php
	         	if (isset($_SESSION['ID'])){
	         		$sum = 0;
	         		$resProductInBasket = getProductInBasket($_SESSION['ID'], 2);
	         		if ($resProductInBasket){
		         		for ($row=0;$row<count($resProductInBasket);$row++){
		         			$price = $resProductInBasket[$row]['price'];
		         			$quantity = $resProductInBasket[$row]['quantity'];
		         			$finalPrice = $quantity*$price;
		         			$sum += $finalPrice;	         			
		         			$title = $resProductInBasket[$row]['name'] . ' '. $resProductInBasket[$row]['manufacturers'].' '.$resProductInBasket[$row]['model'];
			         		echo '<section class="basket" id='.$resProductInBasket[$row]['id'].'>
							<article id="images"><img src=../assets/images/products/'.$resProductInBasket[$row]['picture'].'></article>
			         		<article id="title"><p>'.$title.'</p></article>
		        			<article id="quantity"><input type="number" name="quant" class="quantity" value='.$quantity.' onfocus="removeBorders('.$resProductInBasket[$row]['id'].')" onblur = "upadteProductQuantity('.$resProductInBasket[$row]['id'].',this.value)" /></article>
		         			<article id="price"><p><span class = "price">'.$price.'</span> лв.</p></article>
		         			<article id="delete"><img src="../assets/images/close.png" onclick = "removeProduct('.$resProductInBasket[$row]['id'].')"></img></article></section>';			         	
		         		}
		         		$deliveryPrice = getAllSumProducts($_SESSION['ID']) < 1000 ? 5 : 0;
		         		$deliveryText = $deliveryPrice === 0 ? 'БЕЗПЛАТНА' : "$deliveryPrice.00 лв.";
		         		$deliveryNotice = $deliveryPrice === 5 ? '* При покупка над 1000 лв. доставката е безплатна!' : '';
	         		
	         	?>
	         		<div id="information-for-cart">
		         			<p>Всички продукти: <strong id='sumAllProctsInBasket'> <?= round(getAllSumProducts($_SESSION['ID']), 2) ?> лв.</strong></p>
		         			<p>Цена на доставка: <strong id='delivery-text'><?= $deliveryText ?></strong> </p>
		         			<p>Общо: <strong id = 'sumAllProctsInBasketAndDeliveryPrice'> <?= round(getAllSumProducts($_SESSION['ID']) + $deliveryPrice,2) ?> лв.</strong></p>
		         			<em id='noticeDelivery' ><?= $deliveryNotice ?></em>
		         			<input id='orderButton' type="submit" name='order' value='Поръчай'/>
		         	</div>
		         	
	         	<?php
	         		}else echo '<div id="cart-message">
		         			<p><strong>Количката Ви е празна!</strong></p>
		         			</div>';
	         	}else {
	         		echo '<div id="cart-message">
		         			<p><strong>За да добавяте продукти в количката трябва да се <span onclick="showLoginBar()">впишете</span>!</strong></p>
		         			</div>';
	         	}
	         	?> 	
         	</form>
        </div>
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
