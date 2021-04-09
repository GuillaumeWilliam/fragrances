$(function(){
    const stripe = Stripe("pk_test_51IcbyxAHDrsAEQyVpeK7JHV3UPm3RUiDdyA5rCqrH2dqUEV8lQ1wo1ziI4Pm33X8ZcWRwOwq28ax1aABvsXXCXUq00Z6dNwdgw");
    const checkoutButton = $('#checkout-button');
    checkoutButton.on('click', function(e){
        e.preventDefault();
        // console.log($('#nb').val());
        $.ajax({
            url:'index.php?action=pay',
            method:'post',
            data:{
                id: $('#ref').val(),
                description: $('#description').val(),
                name: $('#name').val(),
                price: $('#price').val(),
                email: $('#email').val(),
                quantity: $('#quantity').val()
            },
            datatype: 'json',
            success:function(response){
                console.log(response);
                return stripe.redirectToCheckout({ sessionId: response.id });
            },
            error: function(){
                console.error("failed to send!");
            }
        });
    })
});