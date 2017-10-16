@extends('layouts.master')

@section('title', 'index')

@section('styles')
<style media="screen">
	.timeline-centered {
    position: relative;
    margin-bottom: 30px;
	}

  .timeline-centered:before, .timeline-centered:after {
    content: " ";
    display: table;
  }

  .timeline-centered:after {
    clear: both;
  }

  .timeline-centered:before, .timeline-centered:after {
    content: " ";
    display: table;
  }

  .timeline-centered:after {
    clear: both;
  }

  .timeline-centered:before {
    content: '';
    position: absolute;
    display: block;
    width: 4px;
    background: #f5f5f6;
    left: 50%;
    top: 20px;
    bottom: 20px;
    margin-left: -4px;
  }

  .timeline-centered .timeline-entry {
    position: relative;
    width: 50%;
    float: right;
    margin-bottom: 70px;
    clear: both;
  }

  .timeline-centered .timeline-entry:before, .timeline-centered .timeline-entry:after {
    content: " ";
    display: table;
  }

  .timeline-centered .timeline-entry:after {
    clear: both;
  }

  .timeline-centered .timeline-entry:before, .timeline-centered .timeline-entry:after {
    content: " ";
    display: table;
  }

  .timeline-centered .timeline-entry:after {
    clear: both;
  }

  .timeline-centered .timeline-entry.begin {
    margin-bottom: 0;
  }

  .timeline-centered .timeline-entry.left-aligned {
    float: left;
  }

  .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner {
    margin-left: 0;
    margin-right: -18px;
  }

  .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner .timeline-time {
    left: auto;
    right: -100px;
    text-align: left;
  }

  .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner .timeline-icon {
    float: right;
  }

  .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner .timeline-label {
    margin-left: 0;
    margin-right: 70px;
  }

  .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner .timeline-label:after {
    left: auto;
    right: 0;
    margin-left: 0;
    margin-right: -9px;
    -moz-transform: rotate(180deg);
    -o-transform: rotate(180deg);
    -webkit-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    transform: rotate(180deg);
  }

  .timeline-centered .timeline-entry .timeline-entry-inner {
    position: relative;
    margin-left: -22px;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner:before, .timeline-centered .timeline-entry .timeline-entry-inner:after {
    content: " ";
    display: table;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner:after {
    clear: both;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner:before, .timeline-centered .timeline-entry .timeline-entry-inner:after {
    content: " ";
    display: table;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner:after {
    clear: both;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner .timeline-time {
    position: absolute;
    left: -100px;
    text-align: right;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner .timeline-time > span {
    display: block;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner .timeline-time > span:first-child {
    font-size: 15px;
    font-weight: bold;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner .timeline-time > span:last-child {
    font-size: 12px;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon {
    background: #fff;
    color: #737881;
    display: block;
    width: 40px;
    height: 40px;
    -webkit-background-clip: padding-box;
    -moz-background-clip: padding;
    background-clip: padding-box;
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;
    text-align: center;
    -moz-box-shadow: 0 0 0 5px #f5f5f6;
    -webkit-box-shadow: 0 0 0 5px #f5f5f6;
    box-shadow: 0 0 0 5px #f5f5f6;
    line-height: 40px;
    font-size: 15px;
    float: left;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-primary {
    background-color: #303641;
    color: #fff;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-secondary {
    background-color: #ee4749;
    color: #fff;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-success {
    background-color: #00a651;
    color: #fff;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-info {
    background-color: #21a9e1;
    color: #fff;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-warning {
    background-color: #fad839;
    color: #fff;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-danger {
    background-color: #cc2424;
    color: #fff;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label {
    position: relative;
    background: #f5f5f6;
    padding: 1.7em;
    margin-left: 70px;
    -webkit-background-clip: padding-box;
    -moz-background-clip: padding;
    background-clip: padding-box;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label:after {
    content: '';
    display: block;
    position: absolute;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 9px 9px 9px 0;
    border-color: transparent #f5f5f6 transparent transparent;
    left: 0;
    top: 10px;
    margin-left: -9px;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label h2, .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label p {
    color: #737881;
    font-family: "Noto Sans",sans-serif;
    font-size: 12px;
    margin: 0;
    line-height: 1.428571429;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label p + p {
    margin-top: 15px;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label h2 {
    font-size: 16px;
    margin-bottom: 10px;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label h2 a {
    color: #303641;
  }

  .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label h2 span {
    -webkit-opacity: .6;
    -moz-opacity: .6;
    opacity: .6;
    -ms-filter: alpha(opacity=60);
    filter: alpha(opacity=60);
  }
</style>
@endsection

@section('content')
<!-- <section id="home">
  <div class="row">
      <div class="col-md-8">
          <img class="img-responsive img-rounded" src="http://placehold.it/900x350" alt="">
      </div>
      <div class="col-md-4">
          <h1>Business Name or Tagline</h1>
          <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p>
          <a class="btn btn-primary btn-lg" href="#">Call to Action!</a>
      </div>
  </div>

  <hr>

  <div class="row">
      <div class="col-lg-12">
          <div class="well text-center">
              This is a well that is a great spot for a business tagline or phone number for easy access!
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-4">
          <h2>Heading 1</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
          <a class="btn btn-default" href="#">More Info</a>
      </div>
      <div class="col-md-4">
          <h2>Heading 2</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
          <a class="btn btn-default" href="#">More Info</a>
      </div>
      <div class="col-md-4">
          <h2>Heading 3</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
          <a class="btn btn-default" href="#">More Info</a>
      </div>
  </div>
</section> -->

<section id="products">
  <div class="row" style="margin-bottom:20px;">
    <div class="col-lg-12">
      <div id="itemslider" class="carousel carousel-showmanymoveone slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
          @foreach($items as $product)
          <div class="item">
            <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="{{ asset('assets/images/products/'.$product->image) }}" class="img-thumbnail img-responsive center-block" alt="Product Image"></a></div>
          </div>
          @endforeach
        </div>
        <div class="left carousel-control" data-target="#itemslider" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </div>
        <div class="right carousel-control" data-target="#itemslider" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2">
      <div class="list-group">
        <a href="#" class="list-group-item" data-url="/products">
          <span class="badge">{{ $count['all'] }}</span>
          เมนูทั้งหมด
        </a>
        @if($count['recommended'] > 0)
        <a href="#" class="list-group-item" data-url="/product/recommended/yes">
          <span class="badge">{{ $count['recommended'] }}</span>
          เมนูแนะนำ
        </a>
        @endif
        @if($count['new'] > 0)
        <a href="#" class="list-group-item" data-url="/product/new/yes">
          <span class="badge">{{ $count['new'] }}</span>
          เมนูใหม่
        </a>
        @endif
        @foreach($items2 as $category)
        <a href="#" class="list-group-item" data-url="/product/category_id/{{ $category->id }}">
          <span class="badge">{{ $count[$category->id] }}</span>
          {{ $category->name }}
        </a>
        @endforeach
      </div>
    </div>
    <div class="col-md-10">
      <div id="shop-content"></div>
    </div>
  </div>
</section>
<section id="aboutus">
  <div class="row">
  		<div class="timeline-centered">

  	<article class="timeline-entry">

  		<div class="timeline-entry-inner">
  			<!-- <time class="timeline-time" datetime="2014-01-10T03:45"><span>03:45 AM</span> <span>Today</span></time> -->

  			<div class="timeline-icon bg-success">
  				<i class="entypo-feather"></i>
  			</div>

  			<div class="timeline-label">
  				<!-- <h2>Test</h2> -->
  				<p>ชานมไข่มุกหอมที (Hom tea) ชานมสูตรเข้มข้น กลมกล่อม ใช้วิธีอบชาแทนการต้มชา ทำให้คงไว้ซึ่งความหอมที่เป็นเอกลักษณ์เฉพาะของเรา ชงสดทุกแก้ว ต้มใหม่ทุกวัน ไข่มุก ทำวันต่อวัน สดใหม่ เหนียว นุ่ม หนึบ ทุกเม็ด เปิดให้บริการ จันทร์-เสาร์ เวลา 7:30-18:00น. ข้อมูลเพิ่มเติม <a href="https://www.facebook.com/%E0%B8%8A%E0%B8%B2%E0%B8%99%E0%B8%A1%E0%B9%84%E0%B8%82%E0%B9%88%E0%B8%A1%E0%B8%B8%E0%B8%81-Hom-tea-Hi-tech-Ayutthaya-587799941325935/?fref=ts" target="_blank">Click!</a></p>
  			</div>
  		</div>

  	</article>


  	<article class="timeline-entry left-aligned">

  		<div class="timeline-entry-inner">
  			<!-- <time class="timeline-time" datetime="2014-01-10T03:45"><span>03:45 AM</span> <span>Today</span></time> -->

  			<div class="timeline-icon bg-secondary">
  				<i class="entypo-suitcase"></i>
  			</div>

  			<div class="timeline-label">
					<!-- <h2>Test</h2>

  				<blockquote>Test</blockquote> -->

  				<img src="{{ asset('assets/images/1.jpg') }}" class="img-responsive img-rounded full-width">
  			</div>
  		</div>

  	</article>


  	<article class="timeline-entry">

  		<div class="timeline-entry-inner">
  			<!-- <time class="timeline-time" datetime="2014-01-09T13:22"><span>03:45 AM</span> <span>Today</span></time> -->

  			<div class="timeline-icon bg-info">
  				<i class="entypo-location"></i>
  			</div>

  			<div class="timeline-label">
  				<!-- <h2>Test</h2>

  				<blockquote>Test</blockquote> -->

  				<img src="{{ asset('assets/images/2.jpg') }}" class="img-responsive img-rounded full-width">
  		</div>

  	</article>


  	<article class="timeline-entry begin">

  		<div class="timeline-entry-inner">

  			<div class="timeline-icon" style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
  				<i class="entypo-flight"></i>
  			</div>

  		</div>

  	</article>

  </div>
  	</div>
</section>
<section id="contractus">
  <div class="row">
    <div class="col-md-6">
      <div class="paper">
        <h2>Contact Us</h2>
        <div class="map-marker contact-info">
          <h3>{{ $item->name }}</h3>
          <p>{{ $item->description }}</p>
        </div>
        <div class="phone contact-info">
          <h3>Call Center</h3>
          <p>{{ $item->tel }}</p>
        </div>
        <div class="mail contact-info">
          <h3>Mail</h3>
          <p>{{ $item->email }}</p>
        </div>
        <div class="clock contact-info">
          <h3>Opening times</h3>
          <p>{{ $item->opening_times }}</p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="paper">
        <h2>Ask Box</h2>
        <form id="askboxForm" class="form-horizontal" data-url="/askbox">
          <div class="form-group">
            <label for="email" class="col-md-4 control-label">Email address</label>
            <div class="col-md-8">
              <input type="email" id="email" class="form-control" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}"
              data-msg-email="Please enter a <em>valid</em> email address."
              data-msg-required="Please enter an email address."
              data-rule-email="true"
              data-rule-required="true">
            </div>
          </div>
          <div class="form-group">
            <label for="subject" class="col-md-4 control-label">Subject</label>
            <div class="col-md-8">
              <input type="text" id="subject" class="form-control" name="subject"
              data-msg-required="Please enter a subject."
              data-rule-required="true">
            </div>
          </div>
          <div class="form-group">
            <label for="message" class="col-md-4 control-label">Message</label>
            <div class="col-md-8">
              <textarea id="message" class="form-control" name="message" rows="5"
              data-msg-required="Please enter a message."
              data-rule-required="true"></textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-default btn-sm pull-right">Send</button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')
<script type="text/javascript">
  $(document).on("click", '[data-toggle="modal"]', function() {
    $($(this).data("target") + " .modal-body").html("Loading...")
    $($(this).data("target") + " .modal-body").load($(this).data("url"))
  })

  $("#askboxForm").validate({
    submitHandler: function(form) {
      $.ajax({
        dataType: "json",
        type: "post",
        url: $(form).data("url"),
        data:new FormData(form),
        contentType: false,
        processData:false,
        success: function(data) {
          if (!data.auth) {
            $(form).find("#email").val("")
          }
          $(form).find("#subject, #message").val("")
          toastr.success(data.msg, data.title)
        }
      })
      return false
    }
  })
</script>
@endsection
