@extends('frontend.layouts.master')

@section('title', 'Users')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Users
    <small>Preview page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/frontend/dashboard" data-pjax><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">Users</li>
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
          <th style="width:10%;">Name</th>
          <th class="text-center" style="width:10%;">Avatar</th>
          <th style="width:20%;">Email address</th>
          <th class="text-center" style="width:10%;">Password</th>
          <th style="width:20%;">Address</th>
          <th style="width:15%;">Mobile phone</th>
          <th class="text-center" style="width:5%;">Status</th>
          <th class="text-center" style="width:10%;">Role</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $user)
        <tr>
          <td><a href="#" class="editable" data-type="text" data-url="/frontend/fieldUpdate/user" data-pk="{{ $user->id }}" data-name="name">{{ $user->name }}</a></td>
          <td>
            <a href="#" id="img-{{ $user->id }}" class="imgUpload">
              <img src="{{ $user->avatar ? asset('assets/images/avatars/'.$user->avatar) : asset('assets/images/avatars/default.png') }}" class="img-circle img-responsive" alt="User Image">
            </a>
            <input type="file" name="file" data-pk="{{ $user->id }}" data-url="/frontend/fieldUpdate/user" data-name="avatar" style="display:none;">
          </td>
          <td><a href="#" class="editable" data-type="text" data-url="/frontend/fieldUpdate/user" data-pk="{{ $user->id }}" data-name="email">{{ $user->email }}</a></td>
          <td class="text-center">Reset</td>
          <td><a href="#" class="editable" data-type="textarea" data-url="/frontend/fieldUpdate/user" data-pk="{{ $user->id }}" data-name="address">{{ $user->address }}</a></td>
          <td><a href="#" class="editable tel" data-type="tel" data-url="/frontend/fieldUpdate/user" data-pk="{{ $user->id }}" data-name="tel">{{ $user->tel }}</a></td>
          <td class="text-center">{{ $user->status }}</td>
          <td class="text-center">
          @if(Auth::user()->is_admin === 2)
          <a href="#" class="editable" data-type="select" data-url="/frontend/fieldUpdate/user" data-pk="{{ $user->id }}" data-name="is_admin" data-source="{'0':'Member','1':'Sub-admin'}" data-value="{{ $user->is_admin }}">{{ $user->is_admin === 1 ? 'Sub-admin' : 'Member' }}</a>
          @else
            @if($user->is_admin === 1)
            Sub-admin
            @elseif($user->is_admin === 0)
            Member
            @endif
          @endif
          </td>
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
