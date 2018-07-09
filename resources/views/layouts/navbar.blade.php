<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#menu-toggle" id="menu-toggle">
  <img src="/img/logo.png" width="30" height="30" alt="">
</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('request') }}">{{__('Requests')}}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('task') }}">{{__('Tasks')}}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('process') }}">{{__('Processes')}}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin') }}">Admin</a>
      </li>
      <li>
        @if(Session::has('_alert'))
          @php
          $icons = [
            'danger' =>  'fa-times-circle',
            'info' =>  'fa-info-circle',
            'warning' =>  'fa-exclamation-triangle',
            'success' =>  'fa-check'
          ];

          list($type,$message) = json_decode(Session::get('_alert'));
          @endphp
          <div class="alert alert-{{$type}} alert-dismissible fade show" role="alert">
            <i class="fas fa-{{$icons[$type]}}"></i> {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link"><i class="fas fa-bell" aria-hidden="true" style="padding:10px"></i></a>
    </li>    
    <li class="dropdown">
      <img class="avatar dropdown-toggle" style="width:55px; padding:10px" id="topnav-avatar" src="/img/avatar.png" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
         <a class="dropdown-item drop-header"><img class="avatar-small" src="/img/avatar.png">{{\Auth::user()->firstname}} {{\Auth::user()->lastname}}</a>
         @foreach($dropdown_nav->items as $row)
            <a class="dropdown-item" href="{{ $row->url() }}"><i class="fas {{$row->attr('icon')}} fa-fw fa-lg"></i>{{$row->title}}</a>
         @endforeach
       </div>
    </li>
  </li>
  </ul>
  </div>
</nav>
