@extends('frontend.layouts.master')

@section('title', 'Create a Data')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Create a Data
    <small>Preview page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/frontend/dashboard" data-pjax><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">Create a Data</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
  <div class="col-md-6">
    <div class="box box-primary collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title">Product</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form id="productForm" enctype="multipart/form-data" action="/frontend/fieldCreate/product" method="post" data-pjax>
      {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <label for="category" class="sr-only">Category</label>
            <select id="category" class="form-control" name="category"
            data-msg-required="Please select a category."
            data-rule-required="true">
              <option value="">Choose a Category...</option>
              @foreach($items as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="name" class="sr-only">Name</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="Name"
            data-msg-required="Please enter a name."
            data-rule-required="true">
          </div>
          <div class="form-group">
            <label for="description" class="sr-only">Description</label>
            <textarea id="description" class="form-control" name="description" placeholder="Description"
            data-msg-required="Please enter a description."
            data-rule-required="true"></textarea>
          </div>
          <div class="form-group">
            <label for="price" class="sr-only">Price</label>
            <input type="text" id="price" class="form-control" name="price" placeholder="Price"
            data-msg-required="Please enter a price."
            data-rule-required="true">
          </div>
          <div class="form-group">
            <label for="image" class="sr-only">Image</label>
            <input type="file" id="image" name="image"
            data-msg-extension="Only JPG, JPEG and PNG files are allowed."
            data-rule-extension="jpe?g|png"
            data-msg-required="Please choose a file."
            data-rule-required="true">
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="recommended"> Recommended
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="new"> New
            </label>
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.box -->

    <div class="box box-primary collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title">User</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form id="userForm" action="/frontend/fieldCreate/user" method="post" data-pjax>
      {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <label for="name" class="sr-only">Name</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="Name"
            data-msg-required="Please enter a name."
            data-rule-required="true">
          </div>
          <div class="form-group">
            <label for="email" class="sr-only">Your email address</label>
            <input type="email" id="email" class="form-control" name="email" placeholder="Your email address"
            data-msg-required="Please enter an email address."
            data-msg-email="Please enter a <em>valid</em> email address."
            data-msg-remote="Email address is already exist."
            data-rule-required="true"
            data-rule-email="true"
            data-rule-remote="/emailChecker">
          </div>
          <div class="form-group">
            <label for="password" class="sr-only">Create a password</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Create a password" data-toggle="tooltip" data-placement="left" title="Only a-z, A-Z, and 0-9 allowed. Minimum of 6 characters."
            data-msg-required="Please enter a password."
            data-msg-regex="Please enter a <em>valid</em> password."
            data-rule-required="true"
            data-rule-regex="true">
          </div>
          <div class="form-group">
            <label for="password2" class="sr-only">Confirm your password</label>
            <input type="password" id="password2" class="form-control" name="password2" placeholder="Confirm your password"
            data-msg-required="Please re-enter a password."
            data-msg-equalTo="Please enter the same value again."
            data-rule-required="true"
            data-rule-equalTo="#userForm #password">
          </div>
          <div class="form-group">
            <label for="address" class="sr-only">Address</label>
            <textarea id="address" class="form-control" name="address" placeholder="Address"
            data-msg-required="Please enter an address."
            data-rule-required="true"></textarea>
          </div>
          <div class="form-group">
            <label for="tel" class="sr-only">Mobile phone</label>
            <input type="tel" id="tel" class="form-control" name="tel" placeholder="Mobile phone"
            data-msg-required="Please enter a mobile phone."
            data-rule-required="true">
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="status" checked> Active
            </label>
          </div>
          @if(Auth::user()->is_admin === 2)
          <div class="checkbox">
            <label>
              <input type="checkbox" name="admin"> Sub-admin
            </label>
          </div>
          @endif
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.box -->

    <div class="box box-primary collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title">Promotion</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form id="promotionForm" enctype="multipart/form-data" action="/frontend/fieldCreate/promotion" method="post" data-pjax>
      {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <label for="name" class="sr-only">Name</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="Name"
            data-msg-required="Please enter a name."
            data-rule-required="true">
          </div>
          <div class="form-group">
            <label for="description" class="sr-only">Description</label>
            <textarea id="description" class="form-control" name="description" placeholder="Description"
            data-msg-required="Please enter a description."
            data-rule-required="true"></textarea>
          </div>
          <!-- <div class="form-group">
            <label for="image" class="sr-only">Image</label>
            <input type="file" id="image" name="image"
            data-msg-extension="Only JPG, JPEG and PNG files are allowed."
            data-rule-extension="jpe?g|png"
            data-msg-required="Please choose a file."
            data-rule-required="true">
          </div> -->
          <div class="form-group">
            <label for="point" class="sr-only">Use points</label>
            <input type="number" id="point" class="form-control" name="point" min="1" placeholder="Use points"
            data-msg-required="Please enter a use points."
            data-rule-required="true">
          </div>
          <div class="form-group">
            <label for="start" class="sr-only">Started at</label>
            <input type="text" id="start" class="form-control" name="start" placeholder="Started at"
            data-msg-required="Please choose a start date and time."
            data-rule-required="true">
          </div>
          <div class="form-group">
            <label for="end" class="sr-only">Ended at</label>
            <input type="text" id="end" class="form-control" name="end" placeholder="Ended at"
            data-msg-required="Please choose a end date and time."
            data-rule-required="true">
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.box -->
  </div>
  <div class="col-md-6">
    <div class="box box-primary collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title">Contact us</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <p><a href="#" class="editable" data-type="text" data-url="/frontend/fieldUpdate/contactus" data-pk="{{ $item->id }}" data-name="name">{{ $item->name }}</a></p>
        <p><a href="#" class="editable" data-type="textarea" data-url="/frontend/fieldUpdate/contactus" data-pk="{{ $item->id }}" data-name="description">{{ $item->description }}</a></p>
        <p><a href="#" class="editable tel" data-type="tel" data-url="/frontend/fieldUpdate/contactus" data-pk="{{ $item->id }}" data-name="tel">{{ $item->tel }}</a></p>
        <p><a href="#" class="editable" data-type="text" data-url="/frontend/fieldUpdate/contactus" data-pk="{{ $item->id }}" data-name="email">{{ $item->email }}</a></p>
        <p><a href="#" class="editable" data-type="text" data-url="/frontend/fieldUpdate/contactus" data-pk="{{ $item->id }}" data-name="opening_times">{{ $item->opening_times }}</a></p>
      </div>
      <!-- /.box-body -->

    </div>
    <!-- /.box -->

    <div class="box box-primary collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title">Topping and Category</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form id="otherForm" action="/frontend/other/create" method="post" data-pjax>
      {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <label for="name" class="sr-only">Name</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="Name"
            data-msg-required="Please enter a name."
            data-rule-required="true">
          </div>
          <div class="form-group">
            <div class="radio">
              <label>
                <input type="radio" name="table" value="topping" checked>Topping
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="table" value="category">Category
              </label>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.box -->

  </div>
</div>
</section>
@endsection
