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

