@extends('frontend.layouts.master')

@section('title', 'New orders')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    New orders
    <small>Preview page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/frontend/dashboard" data-pjax><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">New orders</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Bordered Table</h3>

      <!-- <div class="box-tools">
        <div class="input-group input-group-sm" style="width:150px;">
          <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

          <div class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </div> -->
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="newOrdersTable" class="table table-hover table-condensed">
        <thead>
        <tr>
          <th>Order No.</th>
          <th>Name</th>
          <th>Address</th>
          <th>Mobile phone</th>
          <th>Price</th>
          <th class="text-center">Status</th>
          <th>Note</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $order)
        <tr data-toggle="modal" data-target="#order" data-url="/frontend/orderItems/{{ $order->id }}" style="cursor:pointer;">
          <td>{{ $order->id }}</td>
          <td>{{ $order->user->name }}</td>
          <td>{{ $order->user->address }}</td>
          <td>{{ $order->user->tel }}</td>
          <td>{{ number_format($order->price, 2) }}</td>
          <td class="text-center">{{ $order->orderStatus->name }}</td>
          <td>{{ $order->note }}</td>
        </tr>
        @endforeach
        </tbody>
      </table>

      <div class="box-footer clearfix">
        {{ $items->links('frontend.pagination') }}
      </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section>
@endsection
