<div class="table-responsive">
  <table class="table table-hover table-condensed">
  	<thead>
  		<tr>
  			<th>Order No.</th>
  			<th>Status</th>
  		</tr>
  	</thead>
  	<tbody>
      @foreach($items as $order)
  		<tr data-toggle="modal" data-target="#order" data-url="/orderItems/{{ $order->id }}" style="cursor:pointer;">
  			<td>{{ $order->id }}</td>
  			<td>
          {{ $order->orderStatus->name }}
        </td>
  		</tr>
      @endforeach
  	</tbody>
  </table>
</div>
