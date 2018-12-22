<?php /** @var \app\models\Product $product */  ?>
<?php foreach ($products as $product):?>
    <div class="good">
        <img src="http://place-hold.it/150" alt=""><br>
        <p><a href=""><?=$product->getName()?></a></p>
        <p><?=$product->getDescription()?></p>
        <p>Цена: <?=$product->getPrice()?> руб.</p>
        <a data-id="<?=$product->getId()?>" id="add_to_cart" href="#">Добавить в корзину</a>
    </div>
    <h1></h1>
    <p></p>
<?php endforeach;?>



