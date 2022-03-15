<div class="mainBlockContentOP">
    <div class="topBlockOP">
        <p id="openedProduct-name">
            <?php echo $good['name']; ?>
        </p>
    </div>
    <div class="blockTovar">
        <div class="blockTovarChild">
            <div class="topBlock">
                <div class="leftTopBlock">
                 <?php  echo '<img  src="data:image/png;base64,' .  base64_encode($good['image'])  . '" />'; ?>
             </div>
             <div class="rightTopBlock">
                <div class="<?php
                if (!isset($good['discount'])) {
                    echo 'priceBlock';
                    } else {
                        echo 'priceBlockDiscount';
                    }
                    ?>">
                    <?php  
                    if (!isset($good['discount'])) {
                        require ('templates/price/withoutDiscount.php');
                    } else {
                        require ('templates/price/withDiscount.php');
                    }
                    ?>
                </div>
                <div class="cuntMan">
                    <table class="tableCountMan">
                        <tr>
                            <td class="tabCoun">
                                Страна:  
                            </td>
                            <td>
                                <?php
                                echo $good['country'];
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="tabMan">
                                Производитель: 
                            </td>
                            <td>
                                <?php
                                echo $good['Manufacturer'];
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <form id="form1" name="form1" action="add_cart.php" method="post">

                    <div class="input-group quantity_goods">
                        <input type="button" value="-" id="button_minus">
                        <input onchange="location=value" type="number" step="1" min="1"
                        max="10" id="num_count" name="quantity" value="1"
                        title="Qty">
                        <input type="button" value="+" id="button_plus">
                    </div>
                    <!-- начало невидимой части формы -->
                    <input type="hidden" name="product_id"
                    value="<?php echo $good['id'] ?>"/>

                    <!-- конец невидимой части формы -->

                    <input class='add_to_cart' type="submit" value="В корзину"
                    name="submit">

                </form>
            </div>
        </div>  
    </div>  
</div>
<div class="blockTovar">
    <div class="blockTovarChild">
        <div class="bottomBlock">
            <div class="topBottomBlock">
                <h1>Описание</h1>
            </div>
            <div class="bottomBottomBlock">
                <?php
                $desc=nl2br($good['desc']);
                echo $desc;
                ?>
            </div>
        </div>
    </div>
</div>
</div>

    <script>
        const numCount = document.getElementById('num_count');
        const plusBtn = document.getElementById('button_plus');
        const minusBtn = document.getElementById('button_minus');
        plusBtn.onclick = function () {
            let qty = parseInt(numCount.value);
            qty = qty + 1;
            numCount.value = qty;
        }
        minusBtn.onclick = function () {
            let qty = parseInt(numCount.value);
            if (qty > 1) {
                qty = qty - 1;
            }
            numCount.value = qty;
        }
    </script>