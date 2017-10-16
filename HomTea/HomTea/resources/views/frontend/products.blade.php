@extends('frontend.layouts.master')

@section('title', 'Products')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Products
    <small>Preview page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/frontend/dashboard" data-pjax><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">Products</li>
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
      <table class="table table-hover table-condensed">
        <thead>
        <tr>
          <th style="width:20%;">Name</th>
          <th style="width:10%;">Category</th>
          <th class="text-center" style="width:10%;">Image</th>
          <th style="width:40%;">Description</th>
          <th class="text-center" style="width:5%;">Price</th>
          <th class="text-center" style="width:10%;">Recommended</th>
          <th class="text-center" style="width:5%;">New</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $product)
        <tr>
          <td><a href="#" class="editable" data-type="text" data-url="/frontend/fieldUpdate/product" data-pk="{{ $product->id }}" data-name="name">{{ $product->name }}</a></td>
          <td><a href="#" class="editable" data-type="select" data-url="/frontend/fieldUpdate/product" data-pk="{{ $product->id }}" data-name="category_id" data-source="{{ json_encode($items2) }}" data-value="{{ $product->category_id }}">{{ $product->category->name }}</a></td>
          <td>
            <a href="#" id="img-{{ $product->id }}" class="imgUpload">
              <img src="{{ asset('assets/images/products/'.$product->image) }}" class="img-responsive" alt="Product Image">
            </a>
            <input type="file" name="file" data-pk="{{ $product->id }}" data-url="/frontend/fieldUpdate/product" data-name="image" style="display:none;">
          </td>
          <td><a href="#" class="editable" data-type="textarea" data-url="/frontend/fieldUpdate/product" data-pk="{{ $product->id }}" data-name="description">{{ $product->description }}</td>
          <td class="text-center"><a href="#" class="editable price" data-type="text" data-url="/frontend/fieldUpdate/product" data-pk="{{ $product->id }}" data-name="price">{{ number_format($product->price, 2) }}</a></td>
          <td class="text-center"><a href="#" class="editable" data-type="select" data-url="/frontend/fieldUpdate/product" data-pk="{{ $product->id }}" data-name="recommended" data-source="{'Yes':'Yes','No':'No'}" data-value="{{ $product->recommended }}">{{ $product->recommended }}</a></td>
          <td class="text-center"><a href="#" class="editable" data-type="select" data-url="/frontend/fieldUpdate/product" data-pk="{{ $product->id }}" data-name="new" data-source="{'Yes':'Yes','No':'No'}" data-value="{{ $product->new }}">{{ $product->new }}</a></td>
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
