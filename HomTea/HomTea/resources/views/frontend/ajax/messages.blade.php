<li class="header">You have {{ $count }} messages</li>
@foreach($items2 as $askbox)
<li>
  <!-- inner menu: contains the messages -->
  <ul class="menu">
    <li><!-- start message -->
      <a href="#">
        <div class="pull-left">
          <!-- User Image -->
          @if($askbox->user_id)
          <img src="{{ $askbox->user->avatar ? asset('assets/images/avatars/'.$askbox->user->avatar) : asset('assets/images/avatars/default.png') }}" class="img-circle" alt="User Image">
          @else
          <img src="{{ asset('assets/images/avatars/guest.png') }}" alt="User Image">
          @endif
        </div>
        <!-- Message title and timestamp -->
        <h4>
          {{ $askbox->email }}
          <small><i class="fa fa-clock-o"></i> {{ $askbox->created_at->diffForHumans() }}</small>
        </h4>
        <!-- The message -->
        <p>{{ $askbox->subject }}</p>
      </a>
    </li>
    <!-- end message -->
  </ul>
  <!-- /.menu -->
</li>
@endforeach
@if($count > 5)
<li class="footer"><a href="/frontend/messages" data-pjax>See All Messages</a></li>
@endif
