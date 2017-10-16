<div class="table-responsive">
  <table class="table table-hover table-condensed">
  	<thead>
  		<tr>
  			<th>Product</th>
  			<th class="text-center" style="width:15%;">Price</th>
  			<th class="text-center" style="width:15%;">Quantity</th>
  			<th class="text-center" style="width:15%;">Subtotal</th>
        <th></th>
  		</tr>
  	</thead>
  	<tbody>
      @foreach(Cart::content() as $row)
  		<tr data-toggle="popover" data-trigger="hover" data-placement="left" data-html="true"
        data-content="
        @if($row->options->has('toppings'))
          @foreach($row->options->toppings as $topping)
            <p style=margin:0;>{{ App\Topping::find($topping)->name }}</p>
          @endforeach
        @else
          No Toppings
        @endif
        ">
  			<td>{{ $row->name }}</td>
  			<td class="text-center">{{ $row->price() }}</td>
  			<td>
  				<input type="number" class="text-center" value="{{ $row->qty }}" min="1" oninput="itemUpdate({{ $row->id }}, this.value)">
  			</td>
  			<td id="subTotal-{{ $row->id }}" class="text-center">{{ $row->subtotal() }}</td>
        <td><a href="#" class="itemDelete" data-url="/itemDelete/{{ $row->id }}"><i class="fa fa-trash-o"></i></a></td>
  		</tr>
      @endforeach
  	</tbody>
  	<tfoot>
  		<tr>
        <td colspan="3" class="text-right">Total</td>
  			<td id="cartSubTotal" class="text-center">{{ Cart::subtotal() }}</td>
        <td></td>
  		</tr>
  	</tfoot>
  </table>
  <button type="button" id="shopping" class="btn btn-default btn-xs pull-left"><i class="fa fa-angle-left"></i> Continue shopping</button>
  <button type="button" id="checkout" class="btn btn-default btn-xs pull-right" data-url="/checkout">Checkout <i class="fa fa-angle-right"></i></button>
  <div class="clearfix"></div>
  <div id="error"></div>
</div>

<script type="text/javascript">
  function itemUpdate(id, value) {
    if (value === "") { /* \o/ */
      $('#cart-dp input[type="number"]').val(1)
      value = 1
    }
    $.ajax({
      dataType: "json",
      type: "get",
      url: "/itemUpdate/" + id + "/" + value,
      success: function(data) {
        $("#subTotal-" + id).text(data.subTotal)
        $("#cartSubTotal").text(data.cartSubTotal)
      }
    })
  }

  $(".itemDelete").click(function(e){
    e.preventDefault()
    e.stopPropagation()
    $(this).closest("tr").popover("destroy")
    $(this).closest("tr").remove()
    $.ajax({
      dataType: "json",
      type: "get",
      url: $(this).data("url"),
      success: function(data) {
        $("#cartSubTotal").text(data.cartSubTotal)
        $("#cartCount").text(data.cartCount)
      }
    })
  })

  $("#checkout").click(function(e){
    e.stopPropagation()
    $.ajax({
      dataType: "json",
      type: "get",
      url: $(this).data("url"),
      success: function(data) {
        if (data.status === true) {
          $(".dropdown.open").removeClass("open")
          $("#cartCount").text(data.cartCount)
          toastr.success(data.msg, data.title)
        } else if (data.status === false) {
          $("#cart-dp #error").html('<div class="alert alert-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;' + data.error + '</div>')
        }
      }
    })
  })

  $("#shopping").click(function(){
    $("html, body").animate({
      scrollTop: $("#products").offset().top
    }, 1000)
  })

  $('[data-toggle="popover"]').popover()
</script>
