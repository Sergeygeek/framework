<?php /** @var \app\models\Product $product */  ?>
<h1><?=$product->getName()?></h1>
<p><?=$product->getDescription()?></p>
<div>
    <input type="number" id="qty_input" name="qty"/>
    <button data-id="<?=$product->getId()?>" id="add_to_cart">Добавить в корзину</button>
</div>
<script>
    $(function () {
        $("#add_to_cart").on('click', function () {
            let id = $(this).data('id');
            let qty = $("#qty_input").val();
            $.ajax({
                url : "/basket/add",
                type: "POST",
                data: {
                    id: id,
                    qty: qty
                },
                success : function (response) {
                    response = JSON.parse(response);
                    if(response.success == 'ok'){
                        alert(response.message)
                    }
                }
            })
        })
    });
</script>