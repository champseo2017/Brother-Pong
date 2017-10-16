Promotion points: <span id="pointsTotal">{{ $pointsTotal }}</span>
<form id="couponForm" data-url="/coupon">
  <div id="error"></div>
  <div class="form-group form-group-sm">
    <label for="promotion" class="sr-only">Promotion</label>
    <select id="promotion" class="form-control" name="promotion">
    @if(count($items2) > 0)
      @foreach($items2 as $promotion)
      <option value="{{ $promotion->id }},{{ $promotion->use_points }}">{{ $promotion->name }}</option>
      @endforeach
    @else
      <option value="">No promotions</option>
    @endif
    </select>
  </div>
  <button type="submit" class="btn btn-primary btn-xs btn-block" {{ count($items2) === 0 ? 'disabled' : '' }}>Redeem</button>
</form>

<div class="table-responsive">
  <table class="table table-condensed">
  	<thead>
  		<tr>
  			<th>Code</th>
  			<th>Promotion</th>
        <th>Status</th>
  		</tr>
  	</thead>
  	<tbody>
      @foreach($items3 as $coupon)
  		<tr>
  			<td>{{ $coupon->code }}</td>
  			<td>{{ $coupon->promotion->name }}</td>
        <td>{{ $coupon->status ? 'Used' : 'Not used' }}</td>
  		</tr>
      @endforeach
    </tbody>
  </table>
</div>

<script type="text/javascript">
  $("#couponForm").submit(function(e) {
    e.preventDefault()
    var form = $(this)
    $.ajax({
      dataType: "json",
      type: "post",
      url: form.data("url"),
      data:new FormData(this),
      contentType: false,
      processData:false,
      success: function(data) {
        if (data.status === true) {
          $("#pointsTotal").text(data.pointsTotal)
          $("<tr><td>" + data.code + "</td><td>" + data.promotion + "</td><td>Not used</td></tr>").prependTo("table tbody")
          toastr.success(data.msg, data.title)
        } else if (data.status === false) {
          form.find("#error").html('<div class="alert alert-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>&nbsp;' + data.error + '</div>')
        }
      }
    })
  })

  $("#coupon-dp tbody").click(function(e) {
    e.stopPropagation()
  })
</script>
