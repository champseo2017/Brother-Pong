@extends('frontend.layouts.master')

@section('title', 'Other')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Other
    <small>Preview page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/frontend/dashboard" data-pjax><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">Other</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-3">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Topping</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table class="table table-hover table-condensed">
            <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th class="text-center">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $key => $topping)
            <tr>
              <td>{{ ($items->currentPage()-1) * $items->perPage() + $key + 1 }}</td>
              <td><a href="#" class="editable" data-type="text" data-url="/frontend/otherUpdate/topping" data-pk="{{ $topping->id }}" data-name="name">{{ $topping->name }}</a></td>
              <td class="text-center"><button type="button" class="btn btn-primary btn-xs editable" data-type="select" data-url="/frontend/otherUpdate/topping" data-pk="{{ $topping->id }}" data-name="status" data-source="{'in-use':'in-use','not-use':'not-use'}" data-value="{{ $topping->status }}">{{ $topping->status }}</button></td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          {{ $items->links('frontend.pagination') }}
        </div>
      </div>
      <!-- /.box -->

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Order Status</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table class="table table-hover table-condensed">
            <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items3 as $key => $orderStatus)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td><a href="#" class="editable" data-type="text" data-url="/frontend/otherUpdate/status" data-pk="{{ $orderStatus->id }}" data-name="name">{{ $orderStatus->name }}</a></td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <div class="col-md-3">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Categories</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table class="table table-hover table-condensed">
            <thead>
            <tr>
              <th class="hidden-md">#</th>
              <th>Name</th>
              <th class="text-center">EA</th>
              <th class="text-center">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items2 as $key => $category)
            <tr>
              <td class="hidden-md">{{ ($items2->currentPage()-1) * $items2->perPage() + $key + 1 }}</td>
              <td><a href="#" class="editable" data-type="text" data-url="/frontend/otherUpdate/category" data-pk="{{ $category->id }}" data-name="name">{{ $category->name }}</a></td>
              <td class="text-center">{{ $count[$category->id] }}</td>
              <td class="text-center"><button type="button" class="btn btn-primary btn-xs editable" data-type="select" data-url="/frontend/otherUpdate/category" data-pk="{{ $category->id }}" data-name="status" data-source="{'in-use':'in-use','not-use':'not-use'}" data-value="{{ $category->status }}">{{ $category->status }}</button></td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          {{ $items2->links('frontend.pagination') }}
        </div>
      </div>
      <!-- /.box -->
    </div>

    <div class="col-md-3">
      <div class="box box-primary collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title">Use coupons</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form id="couponForm" data-url="/frontend/couponChecker">
            <div id="error"></div>
            <div class="form-group">
              <label for="code" class="sr-only">Code</label>
              <input type="text" id="code" class="form-control" name="code" placeholder="Code"
              data-msg-required="Please enter a code."
              data-rule-required="true">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
@endsection
