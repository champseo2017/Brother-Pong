<div class="row">
  <div class="col-md-12">
    <div class="pull-left">
      Code: {{ $item->code }}
    </div>
    <div id="status" class="pull-right">
      Status: {{ $item->status ? 'Used' : 'Not used' }}
        @if(!$item->status)
        <button type="button" class="btn btn-primary btn-sm" data-url="/frontend/couponUpdate/{{ $item->code }}/1">Confirm</button>
        @endif
    </div>
  </div>
</div>
<p>{{ $item->user->name }}</p>
<p>{{ $item->promotion->name }}</p>
<p>{{ $item->promotion->description }}</p>
