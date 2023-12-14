<div id="shop_cart" class="sidenav pt-0">
    <div class="d-flex flex-row pt-1" >
        <div class="cart-title">Shopping Cart</div>
        <div><a href="javascript:void(0)" class="closebtn" onclick="closeCart()">&times;</a></div>
        

    </div>
    <div class="cartBody">

    </div>
    <div class="cartFooter mt-auto" >
        <div>
            <span style="width: 450px; display: inline-block;" class="text-right font-weight-bold">Total</span>
            <span style="width: 100px; display: inline-block;" class="totalAmount font-weight-bold text-center"></span>
        </div>
        <div class="text-center">
            <button class="btn btn-block btn-warning ml-4 shadow-lg" id="cartCheckOut">Check Out</button>
        </div>

    </div>
    
  </div>
@push('cartScripts')
<script>

    $('body').on('click', '.cart_box1 a', function() {
      var qtyBox = $(this).closest('div').next();
      var qty = Number(qtyBox.text());
      var cart_id = Number($(this).closest('span').prev().prev().text());
      var amountBox = $(this).closest('span').next();
      $.ajax({
          type: "POST",
          url: "{{ route('cartqty.increment') }}",
          data: {
              cart_id: cart_id,
              qty: qty,
          },
          success: function(data) {
               $('.cart-item-count').text(data.grand_qty);


              qtyBox.text(data.qty);
              amountBox.text(data.amount);
              $('.cartFooter .totalAmount').text(data.grand_total);
  
          }
      });
      
  });
  
  $('body').on('click', '.cart_box3 a', function() {
      var qtyBox = $(this).closest('div').prev();
      var qty = Number(qtyBox.text());
      var cart_id = Number($(this).closest('span').prev().prev().text());
      var amountBox = $(this).closest('span').next();
  
      $.ajax({
          type: "POST",
          url: "{{ route('cartqty.decrement') }}",
          data: {
              cart_id: cart_id,
              qty: qty,
          },
          success: function(data) {
              if(data.status == 'updated') {
                console.log(data.grand_qty);
                $('.cart-item-count').text(data.grand_qty);

                  qtyBox.text(data.qty);
                  amountBox.text(data.amount);
                  $('.cartFooter .totalAmount').text(data.grand_total);
              }
  
  
          }
      });
      
  });

    $('#cartCheckOut').click(function() {
        var route = "{{ route('order.billing') }}";
        window.open(route, '_SELF');
    });
</script>

@endpush