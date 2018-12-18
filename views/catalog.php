<?php /** @var \app\models\Product $product */  ?>
<?php foreach ($products as $product):?>
    <div class="good">
        <img src="http://place-hold.it/150" alt=""><br>
        <p><a href=""><?=$product->getName()?></a></p>
        <p><?=$product->getDescription()?></p>
        <p>Цена: <?=$product->getPrice()?> руб.</p>
        <a href="?page=index&action=addToCart&goodId={$row['id']}">Добавить в корзину</a>
    </div>
    <h1></h1>
    <p></p>
<?php endforeach;?>



