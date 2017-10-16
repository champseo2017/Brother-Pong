<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">HomTea</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="#home"><i class="fa fa-home" aria-hidden="true"></i> Home<span class="sr-only">(current)</span></a></li>
        <li><a href="#products"><i class="fa fa-coffee" aria-hidden="true"></i> Products</a></li>
        <li><a href="#aboutus"><i class="fa fa-info-circle" aria-hidden="true"></i> About Us</a></li>
        <li><a href="#contractus"><i class="fa fa-phone" aria-hidden="true"></i> Contact Us</a></li>
        <!-- <li><a href="#promotions"><i class="fa fa-tags" aria-hidden="true"></i> Promotions</a></li> -->
      </ul>
      <div class="navbar-right">
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle ajax" data-toggle="dropdown" data-url="/cart" data-target-id="#cart-dp" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span id="cartCount" class="badge">{{ $cartCount }}</span>
            </a>
            <ul id="cart-dp" class="dropdown-menu">
              <li></li>
            </ul>
          </li>
        </ul>
        <ul id="refresh-nav" class="nav navbar-nav">
          @if(Auth::check())
          <li class="dropdown">
            <a href="#" class="dropdown-toggle ajax" data-toggle="dropdown" data-url="/orders" data-target-id="#order-dp" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-file-text-o" aria-hidden="true"></i> Orders
            </a>
            <ul id="order-dp" class="dropdown-menu">
              <li></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle ajax" data-toggle="dropdown" data-url="/coupon" data-target-id="#coupon-dp" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-ticket" aria-hidden="true"></i> Coupons
            </a>
            <ul id="coupon-dp" class="dropdown-menu">
              <li></li>
            </ul>
          </li>
          @endif
          <li class="dropdown">
            @if(Auth::check())
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="position:relative;padding-left:50px;">
              <img src="{{ Auth::user()->avatar ? asset('assets/images/avatars/'.Auth::user()->avatar) : asset('assets/images/avatars/default.png') }}" class="img-circle" alt="User Image" style="width:32px;height:32px;position:absolute;top:10px;left:10px;">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#" data-toggle="modal" data-target="#profile" data-url="/user"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Profile</a></li>
              @if(Auth::user()->isAdmin())
                <li><a href="/frontend/dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Back Office</a></li>
              @endif
              <li role="separator" class="divider"></li>
              <li><a href="#" id="signout" data-url="/signout"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out</a></li>
            </ul>
            @else
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-sign-in" aria-hidden="true"></i> Sign In<span class="caret"></span>
            </a>
            <ul id="user-dp" class="dropdown-menu">
              <li>
                <div class="row">
    							<div class="col-md-12">
    								 <form id="signinForm" data-url="/signin">
                       <div id="error"></div>
    										<div class="form-group form-group-sm">
    											 <label for="email" class="sr-only">Email address</label>
    											 <input
                           data-msg-email="Please enter a <em>valid</em> email address."
                           data-msg-required="Please enter an email address."
                           data-rule-email="true"
                           data-rule-required="true"
                           type="email" id="email" class="form-control" name="email" placeholder="Email address">
    										</div>
    										<div class="form-group form-group-sm">
    											 <label for="password" class="sr-only">Password</label>
    											 <input
                           data-msg-required="Please enter a password."
                           data-rule-required="true"
                           type="password" id="password" class="form-control" name="password" placeholder="Password">
    										</div>
    										<button type="submit" class="btn btn-primary btn-xs btn-block">Sign in</button>
                        <div class="checkbox">
    											<label>
                            <input type="checkbox" name="remember"> Remember Me
    											</label>
    										</div>
                        <a href="#" id="signup" class="pull-right">Create account</a>
                        <a href="#" id="forgot" class="pull-left">Forgot password?</a>
    								 </form>
                     <form id="forgotForm" data-url="/forgot" style="display:none;">
                       <div id="alert"></div>
                       <div class="form-group form-group-sm">
                         <label for="email" class="sr-only">Email address</label>
                         <input type="email" id="email" class="form-control" name="email" placeholder="Email address">
                       </div>
                       <button type="submit" class="btn btn-primary btn-xs btn-block">Submit</button>
                       <a href="#" id="back" class="pull-right">Back</a>
                     </form>
                     <form id="signupForm" data-url="{{ route('user.store') }}" style="display:none;">
                       <div class="form-group form-group-sm">
                          <label for="name" class="sr-only">Name</label>
                          <input
                          data-msg-required="Please enter a name."
                          data-rule-required="true"
                          type="text" id="name" class="form-control" name="name" placeholder="Name">
                       </div>
    										<div class="form-group form-group-sm">
    											 <label for="email" class="sr-only">Your email address</label>
    											 <input
                           data-msg-required="Please enter an email address."
                           data-msg-email="Please enter a <em>valid</em> email address."
                           data-msg-remote="Email address is already exist."
                           data-rule-required="true"
                           data-rule-email="true"
                           data-rule-remote="/emailChecker"
                           type="email" id="email" class="form-control" name="email" placeholder="Your email address">
    										</div>
    										<div class="form-group form-group-sm">
    											 <label for="password" class="sr-only">Create a password</label>
    											 <input
                           data-msg-required="Please enter a password."
                           data-msg-regex="Please enter a <em>valid</em> password."
                           data-rule-required="true"
                           data-rule-regex="true"
                           type="password" id="password" class="form-control" name="password" placeholder="Create a password" data-toggle="tooltip" data-placement="left" title="Only a-z, A-Z, and 0-9 allowed. Minimum of 6 characters.">
    										</div>
                        <div class="form-group form-group-sm">
    											 <label for="password2" class="sr-only">Confirm your password</label>
    											 <input
                           data-msg-required="Please re-enter a password."
                           data-msg-equalTo="Please enter the same value again."
                           data-rule-required="true"
                           data-rule-equalTo="#signupForm #password"
                           type="password" id="password2" class="form-control" name="password2" placeholder="Confirm your password">
    										</div>
                        <div class="form-group form-group-sm">
    											 <label for="address" class="sr-only">Address</label>
    											 <textarea
                           data-msg-required="Please enter an address."
                           data-rule-required="true"
                           id="address" class="form-control" name="address" placeholder="Address"></textarea>
    										</div>
                        <div class="form-group form-group-sm">
    											 <label for="tel" class="sr-only">Mobile phone</label>
    											 <input
                           data-msg-required="Please enter a mobile phone."
                           data-rule-required="true"
                           type="tel" id="tel" class="form-control" name="tel" placeholder="Mobile phone">
    										</div>
    										<button type="submit" class="btn btn-primary btn-xs btn-block">Sign up</button>
                        <a href="#" id="signin" class="pull-right">Sign in</a>
    								 </form>
    							</div>
                </div>
              </li>
            </ul>
            @endif
          </li>
          <!-- <li>
            <a href="#">
              <select id="languageSwitcher" name="languageSwitcher">
               <option value="th" {{ Session::get('locale') === 'th' ? 'selected' : '' }}>Thailand</option>
               <option value="en" {{ Session::get('locale') === 'en' ? 'selected' : '' }}>English</option>
             </select>
            </a>
          </li> -->
        </ul>
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
