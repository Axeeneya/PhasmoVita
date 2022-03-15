<?php

if ( ! isset($_SESSION)) {
    session_start();
}
?>
<div id="openModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Корзина</h3>
                <a href="#close" title="Close" class="close">×</a>
            </div>
            <div class="modal-body">

                <table>
                    <tr>
                        <td></td>
                        <td><b>Наименование</b></td>
                        <td><b>Количество</b></td>
                        <td><b>Цена за шт.</b></td>
                        <td><b>Итого</b></td>
                        <td><b></b></td>
                    </tr>
                    <?php
                    //подключаемся к БД и выбираем все данные о наших товарах
                    $sql_m       = $link->query("SELECT * FROM `products`");
                    $Sum         = 0;
                    $add_product = $_SESSION['add_product'];
                    //проверяем, что корзина не пуста иначе будет выходить ошибка
                    if (isset($add_product)) {
                        //пербераем массив с добавленными товарами и выбираем id товара
                        foreach ($add_product as $key => $value) {
                            $a      = $key;  //id товара
                            $kol    = $_SESSION['add_product'][$a];
                            $good_m = [];
                            foreach ($sql_m as $product_m) {
                                if ($product_m['id'] == $a) {
                                    $good_m = $product_m;
                                    break;
                                }
                            } ?>
                            <tr>
                                <td>
                                    <?php
                                         echo '<img style="width: 90% auto; height:60px" src="data:image/png;base64,'.base64_encode($good_m['image']).'" >'
                                    ?>
                                </td>
                                <td><?php echo $good_m['name']; ?></td>
                                
                                <td>
                                    <input type="number" step="1" min="1"
                                           max="10" id="num_count"
                                           name="quantity"
                                           value="<?php echo $kol; ?>"
                                           title="Qty">
                                </td>

                                <td><?php if (!isset($good_m['discount'])){
                                    echo $good_m['price'];
                                    $realPrice = $good_m['price'];
                                } else {
                                   $realPrice = $good_m['price'] - ($good_m['price'] * $good_m['discount'])/100;
                                   echo '<a class="oldPrice">'.$good_m['price']."</a>";
                                   echo $realPrice; 
                                }?></td>
                                <td><?php echo $kol * $realPrice
                                        . 'р'; ?></td>
                                <td><b><a href="rem_basket.php?remId=<?php echo $a;?>">удалить</a></b></td>
                            </tr>
                            <?php
                            $Sum += $kol * $realPrice;
                        }
                    }
                    ?>
                    <tr>
                        <td align="right" colspan="5"><b> <?php echo 'Всего: '
                                    . $Sum ?></b></td>
                    </tr>
                    <tr>
                        <td align="right" colspan="5"><b> <a
                                        href="add_basket.php">Оформить заказ</a></b>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
	<div class="l-footer">
		<h1>PhasmoVita</h1>
			<p>
			PhasmoVita.ru — интернет-аптека в Нижнем Новгороде, которая предоставляет множество возможностей для поиска и заказа нужных лекарств.</p>
		</div>
		<ul class="r-footer">
			<li class="footerInfo">
				<ul class="box">
					
					<li><a href="index.php?page=index">Главная</a></li>
					<li><a href="index.php?page=shop">Каталог</a></li>
					<li><a href="index.php?page=basket">Корзина</a></li>
					<li><a href="index.php?page=profile">Личный кабинет</a></li>
					<li> </li>
				</ul>
			</li>
			<li class="features">
				<ul class="box h-box">
					<li> <i class="iconNav fa-solid fa-at"></i> info@brandshop.ru</li>
					<li> <i class="iconNav fa-solid fa-phone"></i> 8 800 555 00 00</li>
					<li> <i class="iconNav fa-solid fa-location-dot"></i> г. Нижний Новгород, пр-т Ленина, д. 1 офис 304</li>
					
				</ul>
			</li>
			
		</ul>
		<div class="b-footer">
			<p>
			All rights reserved by ©PhasmoVita 2022 </p>
		</div>
	</footer>
</body>
</html>
