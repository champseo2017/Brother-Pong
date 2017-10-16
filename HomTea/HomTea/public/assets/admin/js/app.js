$(document).ready(function () {

  $.fn.editable.defaults.ajaxOptions = {/*type: "PUT", */dataType: "json"}
  $(".editable").editable({
    validate: function(value) {
      if ($.trim(value) === "") {
        return "This field is required."
      }
    },
    success: function(data) {
      if (data.status === false) {
        return data.error
      } else if (data.status === true) {
        toastr.success(data.msg, data.title)
      }
    }
  })

  $(".tel").on("shown", function(e, editable) {
    editable.input.$input.inputmask("(99) 9999 9999")
  })

  $(".price").on("shown", function(e, editable) {
    editable.input.$input.inputmask("decimal", {
      // alias : "decimal",
      groupSeparator: ",",
      autoGroup: true,
      digits: 2,
      digitsOptional: false,
      placeholder: "0"
    })
  })

  $('input[name="price"]').inputmask("decimal", {
    // alias : "decimal",
    rightAlign: false,
    groupSeparator: ",",
    autoGroup: true,
    digits: 2,
    digitsOptional: false,
    placeholder: "0"
  })

  $('input[name="tel"]').inputmask("(99) 9999 9999")

  $("#productForm").validate()
  $("#userForm").validate()
  $("#promotionForm").validate()

  $("#otherForm").validate()
  $("#couponForm").validate({
    submitHandler: function(form) {
      $.ajax({
        type:"post",
        url: $(form).data("url"),
        data:new FormData(form),
        contentType: false,
        processData:false
      }).done(function(data) {
        if (data.status === false) {
          $(form).find("#error").html('<div class="alert alert-danger" style="margin-bottom:5px;padding:5px;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;' + data.error + '</div>')
        } else {
          $("#coupon").modal("show")
          $("#coupon .modal-body").html(data)
        }
      })
      return false
    }
  })

  $("#start").datetimepicker({
    format: "YYYY-MM-DD HH:mm:ss",
    useCurrent: false
  })
  $("#end").datetimepicker({
    format: "YYYY-MM-DD HH:mm:ss",
    useCurrent: false
  })
  $("#start").on("dp.change", function (e) {
    $("#end").data("DateTimePicker").minDate(e.date)
  })
  $("#end").on("dp.change", function (e) {
    $("#start").data("DateTimePicker").maxDate(e.date)
  })

})
