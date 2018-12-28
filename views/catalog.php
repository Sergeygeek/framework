<?php /** @var \app\models\Product $product */  ?>
<div class="goods">
    <?php foreach ($products as $product):?>
        <div class="good">
            <img src="http://place-hold.it/150" alt=""><br>
            <p><a href=""><?=$product->getName()?></a></p>
            <p><?=$product->getDescription()?></p>
            <p>Цена: <?=$product->getPrice()?> руб.</p>
            <a data-id="<?=$product->getId()?>" class="add_to_cart" href="#">Добавить в корзину</a>
        </div>
    <?php endforeach;?>
</div>




