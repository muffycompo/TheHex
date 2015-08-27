$(document).ready(function(){
    function notifyUser(data, orderAmnt, orderCat){
        swal(
            {
                title: data.title,
                text: decodeHtml(data.message),
                type: data.type,
                showCancelButton: false,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ok!",
                closeOnConfirm: true
            },
            function(){
                orderAmnt.val(null);
                orderCat.val(1);
                if(data.amount_balance){
                    var nmb = numeral(data.amount_balance).format('0,0')
                    $('#account_balance').html('<strong>&#8358; ' + nmb + '</strong>');
                }
            }
        );
    }

    function decodeHtml(html) {
        var txt = document.createElement("textarea");
        txt.innerHTML = html;
        return txt.value;
    }

    $('#orderForm').validate({
        rules: {
            order_amount: {
                required: true,
                number: true
            }
        },
        messages: {
            order_amount: {
                require: "Order Amount is required!",
                number: "Order Amount must be a number!"
            },
        }
    });
    var orderAmount = $('#orderAmount');
    var orderCategory = $('#orderCategory');
    var customerId = $('#customerId');

    $('#orderBtn').on('click',function(e){
        e.preventDefault();

        $.ajax({
            url: '/admin/user/order',
            type: "get",
            data: {customer_id: customerId.val(), amount: orderAmount.val(), category: orderCategory.val()},
            success: function(data){
                console.log(data);
                //notifyUser(data.title, decodeHtml(data.message), data.type, orderAmount, orderCategory);
                notifyUser(data, orderAmount, orderCategory);
            },
            error: function(error){
                console.log(error);
                //notifyUser(error.title, decodeHtml(error.message), error.type, orderAmount, orderCategory);
                notifyUser(error, orderAmount, orderCategory);
            },
            dataType: 'json'
        });

    });
});