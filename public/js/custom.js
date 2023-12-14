$('.svg-link svg path').hover(function() {
    $('.svg-link path').attr('fill', 'wheat');
});

$('.svg-link svg path').on('mouseout', function() {
    $('.svg-link path').attr('fill', 'white');

});

$('.cart-icon svg').click(function() {
    $.ajax({
        type: "GET",
        url: cart_items_route,
        data: {
            item_id: $('#item_id').val(),
            qty: $('.box2').text(),
        },
        success: function(data) {
            if (data.logged_in == true) {
                $('.cartBody').empty();
                var row = ``;
                var total = 0;
                for(var val of data.cart_items) {
                    row += `<div class="cartRow">`;
                    row += `<span class="cart_id" style="display: none;">${val.id}</span>`;
                    row += `<span class="cartcol1">${val.title}</span><span class="cartcol2">
                        <div class="d-flex flex-row">
                            <div class="cart_box1 shadow-lg"><a href="javascript:void(0)"><i class="fa fa-plus"></i></a></div>
                            <div class="cart_box2 shadow-lg">${val.qty}</div>
                            <div class="cart_box3 shadow-lg"><a href="javascript:void(0)"><i class="fa fa-minus"></i></a></div>
                        </div>
                        
                    </span><span class="cartcol3">${val.amount}</span>`;
                    row += `</div>`;

                    total += val.amount;
                }
                var sidenav = $('#shop_cart');
                
                sidenav.on('transitionend', function(event) {
                    // $('.cartBody').append(row);
                    if (event.originalEvent.propertyName === 'width' && sidenav.width() === 600) {
                        $(row)
                        .appendTo('.cartBody')
                        .hide().fadeIn(500);

                        $('.cartFooter .totalAmount').text(total);
                        sidenav.off('transitionend');
                    }
                    
                });

                sidenav.css('width', '600px');
                // document.getElementById("mySidenav").style.width = "600px";


                
            } else {
                Swal.fire({
                    title: "You have to sign in to place an order !",
                    // showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Click here to login",
                    denyButtonText: `Cancel`
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        window.open('login');
                    } else if (result.isDenied) {
                        Swal.fire("Changes are not saved", "", "info");
                    }
                });

            }
        },
        error: function(data) {
            var subdata = JSON.parse(data.responseText);
            jQuery.each(subdata.errors, function(key, value) {


            });


        }
    })
});


function closeCart() {
    document.getElementById("shop_cart").style.width = "0";
    }

