@extends('frontend.layouts.master')

@section('title', 'Dashboard')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
    <small>Preview page</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3 id="newOrders2">{{ $count['newOrders'] }}</h3>

          <p>New Orders</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="/frontend/newOrders" class="small-box-footer" data-pjax>
          More info <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{ $count['orders'] }}</h3>

          <p>Orders</p>
        </div>
        <div class="icon">
          <i class="ion ion-clipboard"></i>
        </div>
        <a href="/frontend/orders" class="small-box-footer" data-pjax>
          More info <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{ $count['products'] }}</h3>

          <p>Products</p>
        </div>
        <div class="icon">
          <i class="ion ion-coffee"></i>
        </div>
        <a href="/frontend/products" class="small-box-footer" data-pjax>
          More info <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{ $count['newMessages'] }}</h3>

          <p>Messages</p>
        </div>
        <div class="icon">
          <i class="ion ion-email"></i>
        </div>
        <a href="/frontend/messages" class="small-box-footer" data-pjax>
          More info <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->

  {!! $chart->render() !!}
</section>
@endsection
