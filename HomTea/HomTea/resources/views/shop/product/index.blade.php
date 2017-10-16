@foreach($items->chunk(3) as $chunk)
<div class="row">
  @foreach($chunk as $product)
  <div class="col-md-4 col-sm-6">
    <div class="media" style="margin-bottom:5px;">
      <div class="media-left">
          <img src="{{ asset('assets/images/products/'.$product->image) }}" class="media-object img-thumbnail" alt="Product Image" style="width:100px;">
      </div>
      <div class="media-body paper-bg">
        <h4 class="media-heading">{{ $product->name }}</h4>
        <span class="more" data-toggle="modal" data-target="#product" data-url="/itemDetails/{{ $product->id }}">MORE </span><span class="add" data-url="/itemAdd/{{ $product->id }}/{{ $product->name }}/{{ $product->price }}">ADD </span>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endforeach
{{ $items->links() }}

<script type="text/javascript">
  $(".add").click(function() {
    $.ajax({
      dataType: "json",
      type: "get",
      url: $(this).data("url"),
      success: function(data) {
        $("#cartCount").text(data.cartCount)
        toastr.success(data.msg, data.title)
      }
    })
  })
</script>
