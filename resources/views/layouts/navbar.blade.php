<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('home') }}">The Library</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @auth
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('books.create') }}">Create Book <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('categories.create') }}">Create Category <span class="sr-only">(current)</span></a>
      </li>
      @endauth
    </ul>
    <ul class="navbar-nav ml-auto">
      @auth
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}" onClick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>

          <form id="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
          </form>
        </div>
      </li>
      @else
        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
      @endauth
    </ul>
  </div>
</nav>