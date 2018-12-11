<?php /** @var \app\models\Product $product */  ?>
<?php foreach ($products as $product):?>
    <h1><?=$product->getName()?></h1>
    <p><?=$product->getDescription()?></p>
<?php endforeach;?>