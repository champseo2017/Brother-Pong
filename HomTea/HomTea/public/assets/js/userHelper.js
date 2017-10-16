$("#signinForm").validate({
  submitHandler: function(form) {
    $.ajax({
      dataType: "json",
      type: "post",
      url: $(form).data("url"),
      data:new FormData(form),
      contentType: false,
      processData:false,
      success: function(data) {
        if (data.response === true) {
          $(".dropdown.open").removeClass("open")
          $("#refresh-nav").load(window.location.href + " #refresh-nav > *", function() {
            $.getScript("assets/js/userHelper.js")
          })
          $("#askboxForm #email").val(data.email)
          toastr.success(data.msg, data.title)
        } else if (data.response === false) {
          $(form).find("#error").html('<div class="alert alert-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;' + data.error + '</div>')
          $("#password").val("")
          $("#email").focus()
        }
      }
    })
    return false
  }
})

$("#forgotForm").validate({
  submitHandler: function(form) {
    $.ajax({
      dataType: "json",
      type: "post",
      url: $(form).data("url"),
      data:new FormData(form),
      contentType: false,
      processData:false,
      success: function(data) {
        if (data.response === true) {
          $(form).find("#alert").html('<div class="alert alert-success"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;' + data.success + '</div>')
          toastr.success(data.msg, data.title)
        } else if (data.response === false) {
          $(form).find("#alert").html('<div class="alert alert-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;' + data.error + '</div>')
          $("#email").focus()
        }
      }
    })
    return false
  }
})

$("#signupForm").validate({
  submitHandler: function(form) {
    $.ajax({
      dataType: "json",
      type: "post",
      url: $(form).data("url"),
      data:new FormData(form),
      contentType: false,
      processData:false,
      success: function(data) {
        $(".dropdown.open").removeClass("open")
        $("#refresh-nav").load(window.location.href + " #refresh-nav > *", function() {
          $.getScript("assets/js/userHelper.js")
        })
        $("#askboxForm #email").val(data.email)
        toastr.success(data.msg, data.title)
      }
    })
    return false
  }
})

$('[data-toggle="tooltip"]').tooltip()

$('input[name="tel"]').inputmask("(99) 9999 9999")
