<div class="header clearfix">
  <nav>
    <ul class="nav nav-pills pull-right">
      <li role="presentation" class="{{ Helper::setActive(['/', 'home']) }}"><a href="{{ url('/') }}">Home</a></li>
      @if (Auth::guest())
      <li role="presentation" class="{{ Helper::setActive('auth/register') }}"><a href="{{ url('/auth/register') }}">Register</a></li>
      <li role="presentation" class="{{ Helper::setActive('auth/login') }}"><a href="{{ url('/auth/login') }}">Login</a></li>
      @else
      <li role="presentation" class="{{ Helper::setActive(['collections', 'notes']) }}">
        <a href="#" class="dropdown-toggle" data-toggle='dropdown' role='button' aria-expanded='false'>Notes <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="{{ url('/notes') }}"><i class="fa fa-fw fa-files-o"></i> My Notes</a></li>
          <li><a href="{{ url('/notes/create') }}"><i class="fa fa-fw fa-file-text-o"></i> Create Note</a></li>
          <li class="divider"></li>
          <li><a href="{{ url('/collections') }}"><i class="fa fa-fw fa-book"></i> My Collections</a></li>
        </ul>
      </li>

      <li role="presentation" class="{{ Helper::setActive('settings') }}">
        <a href="#" class="dropdown-toggle" data-toggle='dropdown' role='button' aria-expanded='false'>{{ Auth::User()->name }} <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="{{ url('/settings') }}"><i class="fa fa-fw fa-cogs"></i> Settings</a></li>
          <li class="divider"></li>
          <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-fw fa-sign-out"></i> Logout</a></li>
        </ul>
      </li>
      @endif
    </ul>
  </nav>
  <h3 class="text-muted">SimpleNote</h3>
</div>