<header class="d-flex justify-content-center text-bg-dark  py-3">
    <ul class="nav nav-pills">
     
      @if(Auth::user()->role == "admin")
      <li class="nav-item"><a href="{{route('kategory_beasiswa')}}" class="nav-link text-white {{ Route::is('kategory_beasiswa') ? 'active' : ''}}">Pilihan Beasiswa</a></li>
      @else 
      <li class="nav-item"><a href="{{route('home')}}" class="nav-link text-white ">Pilihan Beasiswa</a></li>
      @endif
      <li class="nav-item"><a href="{{route('home')}}" class="nav-link text-white {{Route::is('home') ? 'active' : ''}}">Daftar</a></li>
      
      <li class="nav-item"><a href="{{route('show.beasiswa')}}" class="nav-link text-white {{Route::is('show.beasiswa') ? 'active' : ''}}">Hasil</a></li>
    
      <li class="nav-item">
        <form action="{{route('logout')}}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">Logout</button>
        </form>
      </li>
    </ul>
  </header>