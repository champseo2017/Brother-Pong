<p>{{ $item->name }}</p>
<p>{{ $item->description }}</p>
<p>{{ $item->price }}</p>
<form id="itemAddForm" data-url="/itemAdd">
  <input type="hidden" name="id" value="{{ $item->id }}">
  <input type="hidden" name="name" value="{{ $item->name }}">
  <input type="hidden" name="price" value="{{ $item->price }}">
  @foreach($items as $topping)
  <input type="checkbox" name="toppings[]" value="{{ $topping->id }}">{{ $topping->name }}
  @endforeach
  <input type="number" name="qty" value="1" min="1" oninput="qtyCheck(this.value)">
  <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
</form>

<script type="text/javascript">
  $("#itemAddForm :checkbox").click(function() {
    var bol = $("#itemAddForm :checkbox:checked").length >= 3
    $("#itemAddForm :checkbox").not(":checked").prop("disabled", bol)
  })

  function qtyCheck(value) {
    if (value === "") {
      $('#itemAddForm input[type="number"]').val(1)
    }
  }

  $("#itemAddForm").submit(function(e) {
    e.preventDefault()
    $.ajax({
      dataType: "json",
      type: "post",
      url: $(this).data("url"),
      data:new FormData(this),
      contentType: false,
      processData:false,
      success: function(data) {
        $("#product").modal("hide")
        $("#cartCount").text(data.cartCount)
        toastr.success(data.msg, data.title)
      }
    })
  })
</script>
