<?php /** @var \app\models\Product $product */  ?>
<h1><?=$product->getName()?></h1>
<p><?=$product->getDescription()?></p>
<div>
    <input type="number" id="qty_input" name="qty"/>
    <button data-id="<?=$product->getId()?>" id="add_to_cart">Добавить в корзину</button>
</div>