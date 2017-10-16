<div class="row">
  <div class="col-md-12">
    <div class="pull-left">
      {{ $item->id }}
    </div>
    <div id="status" class="pull-right">
      Status: {{ $item->orderStatus->name }}
    </div>
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

<div id="note">
  @if($item->order_status_id === 1)
  <textarea class="form-control" name="note" placeholder="Note"></textarea>
  <small class="help-block">กรณีลูกค้าต้องการให้ส่ง ขั้นต่ำในการส่งอย่างน้อย 10แก้วขึ้นไป ส่งในบริเวณนิคมอุตสาหกรรมไฮเทค</small>
  <button type="button" class="btn btn-primary btn-sm orderUpdate" data-url="/orderUpdate/{{ $item->id }}/2">Confirm</button>
  <button type="button" class="btn btn-danger btn-sm orderUpdate" data-url="/orderUpdate/{{ $item->id }}/6">Cancel</button>
  @else
  Note: {{ $item->note }}
  @endif
</div>

<script type="text/javascript">
  $(".orderUpdate").click(function() {
    $.ajax({
      dataType: "json",
      type: "get",
      url: $(this).data("url"),
      data: { note: $('textarea[name="note"]').val() },
      success: function(data) {
        $("#status").text("Status: " + data.status)
        $("#note").text("Note: " + data.note)
        toastr.success(data.msg, data.title)
      }
    })
  })
</script>
