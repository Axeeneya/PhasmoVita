<div class="priceRazd">
	<div class="discount">
		<p>
		<?php  
			echo "-".$good['discount']."%";
		?>
		</p>
	</div>
	<div>
		<?php  
			$discount = $good['discount'];
			$price = $good['price'] - ($good['price']*$discount/100);

			echo '<p class="nowPriceDisc"> '.$price.' руб./упак </p>';
			echo '<p class="oldPriceDisc"> '.$good['price'].' руб./упак </p>';
		?>
	</div>
</div>
<div class="infoDisc">
	<p>Цена действительна только при бронировании на сайте и может отличаться от цен в аптеках.</p>
</div>
<div class="raznica">
	<p>
		Вы экономите до <?php
			$discount = $good['discount'];
			$raz = $good['price']*$discount/100;
			echo "<a>".$raz." руб./упак</a>";
		?>
	</p>
</div>
<!--
<div class="priceOPWD">
	<?php  
		echo $good['price']." руб./упак";
	?>
</div>
<div class="infoOPWD">
	<p>Цена действительна только при бронировании на сайте и может отличаться от цен в аптеках.</p>
</div>
-->