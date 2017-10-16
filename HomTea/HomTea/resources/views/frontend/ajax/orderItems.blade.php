<div class="row">
  <div class="col-xs-6">
    {{ $item->user->name }}<br>
    {{ $item->user->address }}<br>
    {{ $item->user->tel }}
  </div>
  <div class="col-xs-6 text-right">
    {{ $item->id }}<br>
    Status: <a href="#" id="editable" data-type="select" data-url="/frontend/fieldUpdate/order" data-pk="{{ $item->id }}" data-name="order_status_id" data-source="{{ json_encode($items) }}" data-value="{{ $item->order_status_id }}">{{ $item->orderStatus->name }}</a>
  </div>
</div>

<div class="table-responsive">
  <table class="table table-condensed">
  	<thead>
  		<tr>
  			<th>Product</th>
  			<th>Price</th>
        <th>Quanlity</th>
        <th>Subtotal</th>
        <th>Toppings</th>
  		</tr>
  	</thead>
  	<tbody>
      @foreach($item->orderItems as $orderItem)
  		<tr>
  			<td>{{ $orderItem->product->name }}</td>
  			<td>{{ $orderItem->price }}</td>
        <td>{{ $orderItem->quanlity }}</td>
        <td>{{ $orderItem->subtotal }}</td>
        <td>
          @if($orderItem->options)
            @foreach($orderItem->options['toppings'] as $value)
              <p style="margin:0;">{{ App\Topping::find($value)->name }}</p>
            @endforeach
          @endif
        </td>
  		</tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3" class="text-right">Total</td>
        <td>{{ $item->price }}</td>
        <td></td>
      </tr>
    </tfoot>
  </table>
</div>

Note: {{ $item->note }}

<script type="text/javascript">
  $("#editable").editable({
    success: function(data) {
      if (data.status === true) {
        $("#order").modal("hide")
        $.pjax.reload("#pjax-container")
        toastr.success(data.msg, data.title)
      }
    }
  })
</script>
