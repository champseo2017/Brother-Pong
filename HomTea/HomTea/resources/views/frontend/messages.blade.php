@extends('frontend.layouts.master')

@section('title', 'Messages')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Messages
    <small>Preview page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/frontend/dashboard" data-pjax><i class="fa fa-dashboard"></i>Dashboard</a></li>
    <li class="active">Messages</li>
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
          <th>Email address</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Answer</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $askbox)
        <tr data-toggle="modal" data-target="#message" data-url="" style="cursor:pointer;">
          <td>{{ $askbox->email }}</td>
          <td>{{ $askbox->subject }}</td>
          <td>{{ $askbox->message }}</td>
          <td><a href="#" class="editable" data-type="textarea" data-url="/frontend/fieldUpdate/askbox" data-pk="{{ $askbox->id }}" data-name="answer">{{ $askbox->answer }}</a></td>
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
