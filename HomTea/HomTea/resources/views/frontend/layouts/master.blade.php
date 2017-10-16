<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ config('app.locale') }}">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Admin | @yield('title')</title>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/AdminLTE/css/AdminLTE.min.css') }}" />
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="{{ asset('assets/AdminLTE/css/skins/skin-blue.min.css') }}" />
  <!-- Pace -->
  <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/pace/pace.min.css') }}" />
  <!-- X-editable -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" />
  <!-- Toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
  <!-- DateTimePicker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />

  {!! Charts::assets() !!}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/frontend/dashboard" class="logo" data-pjax>
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>H</b>T</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Hom</b>Tea</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle ajax" data-toggle="dropdown" data-url="/frontend/notifications" data-target-id="#message-dp">
              <i class="fa fa-envelope-o"></i>
              <span id="newMessages" class="label label-success"></span>
            </a>
            <ul id="message-dp" class="dropdown-menu"></ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle ajax" data-toggle="dropdown" data-url="/frontend/notifications2" data-target-id="#order-dp">
              <i class="fa fa-bell-o"></i>
              <span id="newOrders" class="label label-warning"></span>
            </a>
            <ul id="order-dp" class="dropdown-menu"></ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{ Auth::user()->avatar ? asset('assets/images/avatars/'.Auth::user()->avatar) : asset('assets/images/avatars/default.png') }}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{ Auth::user()->avatar ? asset('assets/images/avatars/'.Auth::user()->avatar) : asset('assets/images/avatars/default.png') }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }}
                  <small>Member since {{ Auth::user()->created_at->format('F. Y') }}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body text-center">
                @if(Auth::user()->is_admin === 2)
                Super Administrator
                @elseif(Auth::user()->is_admin === 1)
                Sub Administrator
                @endif
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="/frontend/profile" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="pull-right">
                  <a href="/frontend/signout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ Auth::user()->avatar ? asset('assets/images/avatars/'.Auth::user()->avatar) : asset('assets/images/avatars/default.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <!-- Optionally, you can add icons to the links -->
        <li>
          <a href="/frontend/dashboard" data-pjax>
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="/frontend/newOrders" data-pjax>
            <i class="fa fa-cart-plus"></i>
            <span>New orders</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="/frontend/orders" data-pjax>
            <i class="fa fa-shopping-cart"></i>
            <span>Orders</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="/frontend/products" data-pjax>
            <i class="fa fa-coffee"></i>
            <span>Products</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="/frontend/users" data-pjax>
            <i class="fa fa-user"></i>
            <span>Users</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="/frontend/messages" data-pjax>
            <i class="fa fa-envelope"></i>
            <span>Messages</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="/frontend/create" data-pjax>
            <i class="fa fa-pencil-square-o"></i>
            <span>Create a Data</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="/frontend/other" data-pjax>
            <i class="fa fa-gears"></i>
            <span>Other</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="pjax-container">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  @include('frontend.modal')

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Moment -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/AdminLTE/js/app.min.js') }}"></script>
<!-- Pace -->
<script data-pace-options='{ "restartOnPushState": false }' src="{{ asset('assets/AdminLTE/plugins/pace/pace.min.js') }}"></script>
<!-- slimScroll -->
<script src="{{ asset('assets/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- X-editable -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- InputMask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
<!-- Validate -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
<!-- DateTimePicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<!-- Pjax -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/1.9.6/jquery.pjax.min.js"></script>
<!-- Pusher -->
<script src="https://js.pusher.com/4.0/pusher.min.js"></script>
<script type="text/javascript">

  // Enable pusher logging - don't include this in production
  // Pusher.logToConsole = true

  var pusher = new Pusher("216e7a216b3e62957e13", {
    cluster: "ap1",
    encrypted: true
  })

  var channel = pusher.subscribe("orders")
  channel.bind("App\\Events\\NewOrders", function(data) {
    $("#newOrders").text(data.text.count)
    $(document).find("#newOrders2").text(data.text.count)
    var tr = '<tr data-toggle="modal" data-target="#order" data-url="/frontend/orderItems/' + data.text.item.id + '" style="cursor:pointer;"><td>' + data.text.item.id + '</td><td>' + data.text.item2.name + '</td><td>' + data.text.item2.address + '</td><td>' + data.text.item2.tel + '</td><td>' + data.text.item.price + '</td><td>' + data.text.status + '</td></tr>'
    $(tr).prependTo($(document).find("#newOrdersTable tbody"))
    toastr.warning(data.text.msg, data.text.title)
    var audio = new Audio("../assets/admin/sounds/alert.mp3")
    audio.play()
  })

  count()

  function count() {
    $.ajax({
      dataType: "json",
      type: "get",
      url: "/frontend/count",
      success: function(data) {
        if (data.count["newMessages"] > 0) {
          $("#newMessages").text(data.count["newMessages"])
        }
        if (data.count["newOrders"] > 0) {
          $("#newOrders").text(data.count["newOrders"])
        }
      }
    })
  }

  $(document).on("click", '.ajax[data-toggle="dropdown"]', function(){
    $($(this).data("targetId")).html("Loading...")
    $($(this).data("targetId")).load($(this).data("url"))
  })
</script>

<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
  })

  $.getScript("../assets/admin/js/app.js")

  $(document).pjax("a[data-pjax]", "#pjax-container")
  $(document).on("submit", "form[data-pjax]", function(event) {
    $.pjax.submit(event, "#pjax-container")
  })
  $(document).on("pjax:send", function() {
    Pace.start()
  })
  $(document).on("pjax:complete", function() {
    $.getScript("../assets/admin/js/app.js")
    Pace.stop()
  })

  $(document).on("click", ".imgUpload", function(e) {
    e.preventDefault()
    $(this).closest("td").find(":file").trigger("click")
  })

  $(document).on("change", ':file[name="file"]', function() {
    var pk = $(this).data("pk")
    var file = this.files[0]
    var imagefile = file.type
    var match= ["image/jpeg", "image/png", "image/jpg"]
    if(!((imagefile === match[0]) || (imagefile === match[1]) || (imagefile === match[2]))) {
      toastr.error("Uploaded file is not a valid image. Only JPG and PNG files are allowed.", "Error alert")
      return false
    } else {
      var data = new FormData()
      data.append("pk", pk)
      data.append("image", file)
      data.append("name", $(this).data("name"))

      $.ajax({
        dataType: "json",
        url: $(this).data("url"),
        // headers: {"X-HTTP-Method-Override": "PUT"},
        type: "POST",
        data: data,
        contentType: false,
        processData:false,
        success: function(data) {
          $("#img-" + pk).load(window.location.href + " #img-" + pk + " > *")
          toastr.success(data.msg, data.title)
        }
      })
    }
  })

  $(document).on("click", '[data-target="#order"]', function() {
    $($(this).data("target") + " .modal-body").html("Loading...")
    $($(this).data("target") + " .modal-body").load($(this).data("url"))
  })

  $(document).on("click", "button[data-url]", function() { /* \o/ */
    $.ajax({
      dataType: "json",
      type: "get",
      url: $(this).data("url"),
      success: function(data) {
        $("#status").text("Status: " + data.status)
        toastr.success(data.msg, data.title)
      }
    })
  })

  $('[data-toggle="tooltip"]').tooltip()

  $.validator.addMethod("regex", function(value, element) {
    return this.optional(element) || /^[a-zA-Z0-9]{6,}$/.test(value)
  }, "Your password must be at least 6 characters long and contain a number or a char.")

  $.validator.setDefaults({
    errorClass: "help-block",
    highlight: function(element) {
      $(element)
        .closest(".form-group")
        .addClass("has-error")
    },
    unhighlight: function(element) {
      $(element)
        .closest(".form-group")
        .removeClass("has-error")
    },
    errorPlacement: function (error, element) {
      if (element.prop("type") === "checkbox") {
        error.insertAfter(element.parent())
      } else {
        error.insertAfter(element)
      }
    }
  })

  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

  @if(Session::has('notification'))
    var type = "{{ Session::get('notification.alert-type', 'info') }}"
    switch(type){
      case "info":
        toastr.info("{{ Session::get('notification.msg') }}", "{{ Session::get('notification.title') }}")
        break
      case "warning":
        toastr.warning("{{ Session::get('notification.msg') }}", "{{ Session::get('notification.title') }}")
        break
      case "success":
        toastr.success("{{ Session::get('notification.msg') }}", "{{ Session::get('notification.title') }}")
        break
      case "error":
        toastr.error("{{ Session::get('notification.msg') }}", "{{ Session::get('notification.title') }}")
        break
    }
    {{ Session::forget('notification') }}
  @endif
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
