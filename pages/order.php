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
	       <div  id='form-basket'>
	        <h2>данни за поръчката:</h2>
	        	<table>
	        		<thead>
	        			<tr>
	        				<th>Продукт</th>
	        				<th>Продукт</th>
	        				<th>Модел</th>
	        				<th>Количество</th>
	        				<th>Цена</th>
	        			</tr>
	        		</thead>
	        		<tbody>
	         	<?php
	         	$street = '';
	         	$city = '';
	         	$postCode = '';
	         	if (isset($_SESSION['ID'])){
	         		$sum = 0;
	         		$resProductInBasket = getProductInBasket($_SESSION['ID'], 2);
	         		if ($resProductInBasket){
		         		for ($row=0;$row<count($resProductInBasket);$row++){ 
		         			$title = $resProductInBasket[$row]['manufacturers'];
		         			$model = $resProductInBasket[$row]['model'];
		         			$price = $resProductInBasket[$row]['price'];
		         			$quantite =  $resProductInBasket[$row]['quantity'];
		         			$productName = $resProductInBasket[$row]['name'];
			         		echo '<tr>
	         				<td>'.$productName.'</td>	
			         		<td>'.$title.'</td>	
	         				<td>'.$model.'</td>
	         				<td id="price">'.$quantite.' бр.</td>	
		         			<td id="price">'.$price.' лв.</tr>';			         	
		         		} 
	         		}
	         		
	         		$address = getAddress($_SESSION['ID']);
	         		if ($address){
	         			$street = $address['street_address'];
	         			$city = $address['city'];
	         			$postCode = $address['post_code'];
	         		}
	         	}
	         	if (isset($_POST['order']))	{
	         		$addressStreet = trim($_POST['street']);
	         		$addressCity = trim($_POST['city']);
	         		$addressPostCode = trim($_POST['post-code']);
	         		if (empty($addressStreet) && empty($addressCity) && empty($addressPostCode)){
	         			echo "Моля попълнете всички полета!";
	         		}else{
		         		$addressStreet = htmlentities($addressStreet);
		         		$addressCity = htmlentities($addressCity);
		         		$addressPostCode = htmlentities($addressPostCode);
		         		
		         		$result = addOrder($_SESSION['ID'], $addressStreet, $addressCity, $addressPostCode);
		         		
		         		if ($result){
		         			echo "Поръчката ви е направена!";
		         		}
	         		}
	         	}
	         	?> 	
	         		</tbody>
	         	</table>
	         	<form action="" method="post" id = 'orderForm'>
	         	<h2>Адрес</h2>
	         	<label>Улица</label>
	         	<input type="text" name='street' value='<?= $street ?>'/>
	         	
	         	<label>Град</label>
	         	<input type="text" name='city' value='<?= $city ?>'/>
	         	
	         	<label>Пощенски код</label>
	         	<input type="text" name='post-code' value='<?= $postCode ?>'/>
	         	
	         	<input type="submit" name='order' value = 'Поръчай'/>
         	</form>
         	</div> 
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
