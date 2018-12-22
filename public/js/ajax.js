$(function () {
    $("#add_to_cart").on('click', function () {
        let id = $(this).data('id');
        let qty = $("#qty_input").val();
        console.log(qty);
        if(!qty){
            qty = 1;
        }
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