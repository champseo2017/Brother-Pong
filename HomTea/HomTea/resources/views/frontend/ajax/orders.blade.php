<li class="header">You have {{ $count }} notifications</li>
@foreach($items2 as $order)
<li>
  <!-- Inner Menu: contains the notifications -->
  <ul class="menu">
    <li><!-- start notification -->
      <a href="#" data-toggle="modal" data-target="#order" data-url="/frontend/orderItems/{{ $order->id }}">
        <i class="fa fa-exclamation-triangle text-aqua"></i> {{ $order->id }}
      </a>
    </li>
    <!-- end notification -->
  </ul>
</li>
@endforeach
@if($count > 5)
<li class="footer"><a href="/frontend/newOrders" data-pjax>View all</a></li>
@endif
