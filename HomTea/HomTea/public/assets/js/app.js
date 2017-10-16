$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
})

var navHeight = $(".navbar").outerHeight()

$("section").css("padding-top", navHeight + 10 + "px")

$("body").scrollspy({
  target: ".navbar",
  offset: navHeight
})

$('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,"") == this.pathname.replace(/^\//,"") && location.hostname == this.hostname) {
      var target = $(this.hash)
      target = target.length ? target : $("[name=" + this.hash.slice(1) + "]")
      if (target.length) {
        $("html, body").animate({
          scrollTop: target.offset().top
        }, 1000)
        return false
      }
    }
})

$("#itemslider").carousel({ interval: 3000 })

$(".carousel-showmanymoveone .item").each(function(){
  var itemToClone = $(this)

  for (var i=1;i<6;i++) {
    itemToClone = itemToClone.next()
    if (!itemToClone.length) {
      itemToClone = $(this).siblings(":first")
    }
    itemToClone.children(":first-child").clone().addClass("cloneditem-"+(i)).appendTo($(this))
  }
})

$(".carousel-showmanymoveone .item:first").addClass("active")
$(".list-group-item:first").addClass("active")
getProducts($(".list-group-item:first").data("url"))

$(document).on("click", ".pagination a", function(e) {
  e.preventDefault()
  getProducts($(this).prop("href"))
})

function getProducts(url) {
  $("#shop-content").load(url)
}

$(document).on("click", ".list-group a", function(){
  $(".list-group .active").removeClass("active")
  $(this).closest("a").addClass("active")

  getProducts($(this).data("url"))
})

$(document).on("click", 'a[href="#"]', function(e){
  e.preventDefault()
})

/* User start */

$.getScript("assets/js/userHelper.js")

$(document).on("click", "#signup", function(){
  $("#signinForm").fadeOut(500)
  $("#signupForm").delay(500).fadeIn(500)
})

$(document).on("click", "#signin", function(){
  $("#signupForm").fadeOut(500)
  $("#signinForm").delay(500).fadeIn(500)
})

$(document).on("click", "#forgot", function(){
  $("#signinForm").fadeOut(500)
  $("#forgotForm").delay(500).fadeIn(500)
})

$(document).on("click", "#back", function(){
  $("#forgotForm").fadeOut(500)
  $("#signinForm").delay(500).fadeIn(500)
})

$(document).on("click", '.ajax[data-toggle="dropdown"]', function(){
  $($(this).data("targetId") + " li").html("Loading...")
  $($(this).data("targetId") + " li").load($(this).data("url"))
})

$(document).on("click", "#signout", function(){
  $.ajax({
    dataType: "json",
    type: "get",
    url: $(this).data("url"),
    success: function(data) {
      $("#refresh-nav").load(window.location.href + " #refresh-nav > *", function() {
        $.getScript("assets/js/userHelper.js")
      })
      $("#askboxForm #email").val("")
      toastr.success(data.msg, data.title)
    }
  })
})

/* User end */

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

// $("#languageSwitcher").change(function() {
//   $.ajax({
//     type: "post",
//     url: "changeLanguage",
//     data: {locale: $(this).val()},
//     success: function(data) {
//       window.location.reload(true)
//     }
//   })
// })
