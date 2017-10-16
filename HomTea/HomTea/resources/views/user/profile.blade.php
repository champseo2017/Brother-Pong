<ul class="nav nav-tabs">
  <li class="active"><a href="#menu1" data-toggle="tab">Profile</a></li>
  <li><a href="#menu2" data-toggle="tab">Password</a></li>
</ul>

<div class="tab-content">
  <div id="menu1" class="tab-pane fade in active">
    <form id="profileForm" data-url="/profile">
      <div class="form-group">
        <label>Email address</label>
        <p class="form-control-static">{{ $item->email }}</p>
      </div>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" class="form-control" name="name" value="{{ $item->name }}"
        data-msg-required="Please enter a name."
        data-rule-required="true">
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <textarea id="address" class="form-control" name="address"
        data-msg-required="Please enter an address."
        data-rule-required="true">{{ $item->address }}</textarea>
      </div>
      <div class="form-group">
        <label for="tel">Mobile phone</label>
        <input type="tel" id="tel" class="form-control" name="tel" value="{{ $item->tel }}"
        data-msg-required="Please enter a mobile phone."
        data-rule-required="true">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <div id="menu2" class="tab-pane fade">
    <form id="cpasswordForm" data-url="/passwordChecker">
      <div id="alert"></div>
      <div class="form-group">
        <label for="cpassword">Enter your password</label>
        <input type="password" id="cpassword" class="form-control" name="cpassword"
        data-msg-required="Please enter a password."
        data-rule-required="true">
      </div>
      <button type="submit" class="btn btn-primary">Next</button>
    </form>
    <form id="npasswordForm" data-url="/password" style="display:none;">
      <div class="form-group">
        <label for="npassword">Create a new password</label>
        <input type="password" id="npassword" class="form-control" name="npassword"
        data-msg-required="Please enter a new password."
        data-msg-regex="Please enter a <em>valid</em> password."
        data-rule-required="true"
        data-rule-regex="true">
      </div>
      <div class="form-group">
        <label for="npassword2">Confirm your new password</label>
        <input type="password" id="npassword2" class="form-control" name="npassword2"
        data-msg-required="Please re-enter a new password."
        data-msg-equalTo="Please enter the same value again."
        data-rule-required="true"
        data-rule-equalTo="#npasswordForm #npassword">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-primary">Cancel</button>
    </form>
  </div>
</div>

<script type="text/javascript">
  $("#profileForm").validate({
    submitHandler: function(form) {
      $.ajax({
        dataType: "json",
        type: "post",
        url: $(form).data("url"),
        data:new FormData(form),
        contentType: false,
        processData:false,
        success: function(data) {
          toastr.success(data.msg, data.title)
        }
      })
      return false
    }
  })

  $("#cpasswordForm").validate({
    submitHandler: function(form) {
      $.ajax({
        dataType: "json",
        type: "post",
        url: $(form).data("url"),
        data:new FormData(form),
        contentType: false,
        processData:false,
        success: function(data) {
          if (data.status === true) {
            $(form).find("#alert").html("")
            $(form).fadeOut(500).find("input").val("")
            $("#npasswordForm").delay(500).fadeIn(500)
          } else if (data.status === false) {
            $(form).find("#alert").html('<div class="alert alert-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;' + data.error + '</div>')
            $(form).find("input").val("").focus()
          }
        }
      })
      return false
    }
  })

  $("#npasswordForm").validate({
    submitHandler: function(form) {
      $.ajax({
        dataType: "json",
        type: "post",
        url: $(form).data("url"),
        data:new FormData(form),
        contentType: false,
        processData:false,
        success: function(data) {
          $(form).fadeOut(500).find("input").val("")
          $("#cpasswordForm").delay(500).fadeIn(500)
          toastr.success(data.msg, data.title)
        }
      })
      return false
    }
  })

  $('button[type="reset"]').click(function() {
    $(this).parent().fadeOut(500)
    $("#cpasswordForm").delay(500).fadeIn(500)
  })
</script>
