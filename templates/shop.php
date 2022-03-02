	 
<h1 class="catLogo">Каталог товаров
<?php
	if (!isset($_GET['id_cat'])) {

	} else {
		$cat = $_GET['id_cat'];
		$sql_cat=$link->query("SELECT `name` FROM `categories` WHERE `id`= $cat");
		foreach ($sql_cat as $cat):
			echo " → ".$cat['name'];
		endforeach;
	}
?>
</h1> 
<div class="shop">


	<div class="shopCat">
		<ul>

			<?php
			$sql_cat=$link->query("SELECT * FROM `categories`");
			foreach ($sql_cat as $cat):
				?>
				<li class="catlileft"><a class="catleft" href="index.php?page=product_cat&id_cat=<?php echo $cat['id']?>" title="<?php echo $cat['name']?>"><?php echo $cat['name']?></a></li>

				<?php
			endforeach;
			?>
			<li><a class="catleft" href="index.php?page=product_cat&id_cat=0">Все</a></li>

		</ul>
	</div>


	<div class="rightBlockShop">
		<div class="right_nav">
			<div class="sort">
				<form action="">
					Сортировка
					<select onchange="location=value">
						<option value="" selected="selected">Сортировка по имени</option>
						<option value="index.php?page=sort&id_sort=1">A-Z</option>
						<option value="index.php?page=sort&id_sort=2">Z-A</option>
					</select>

					<select onchange="location=value">
						<option value="" selected="selected">Сортировка по цене</option>
						<option value="index.php?page=sort&id_sort=3">1-9</option>
						<option value="index.php?page=sort&id_sort=4">9-1</option>
					</select>
				</form>
			</div>
		</div>

		<div class="blockShop">
			<?php
			foreach ($sql as $good):    
				?>
				
				<div class="shopUnit">
					<div class="skidka">

						<?php  
						if(!isset($good['discount'])){

						} else {
							echo '<a class="Askidka">-'.$good['discount']."%</a>";
						}
						?>

					</div>
					<div class="imageProd">
						<?php  echo '<img src="data:image/png;base64,' .  base64_encode($good['image'])  . '" />'; ?>
					</div>
					<div class="chatacteristicsShop">
						<div class="name">
							<?php echo $good['name'] ?>
						</div>
						<div class="country">
							<?php echo $good['country'] ?>
						</div>
						<div class="manufacturer">
							<?php echo $good['Manufacturer'] ?>
						</div>

					</div>

					<div class="price">
						<?php
						if(!isset($good['discount'])){
							echo '<a class="nowPrice"> '.$good['price'].'₽ </a>';
						} else {
							$discount = $good['discount'];
							$price = $good['price'] - ($good['price']*$discount/100);

							echo '<a class="nowPrice"> '.$price.'₽ </a>';
							echo '<a class="oldPrice"> '.$good['price'].'₽ </a>';
						}

						?>
						<div class="actionShop">
							<a href="index.php?page=openProduct&id=<?php echo $good['id'] ?>" class="shopUnitMore">Подробнее</a> 

						</div>
					</div>
				</div>

				<?php
			endforeach;
			?>
		</div>
	</div>		
</div>