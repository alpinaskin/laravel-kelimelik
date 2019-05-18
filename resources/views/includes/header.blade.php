<nav>
    <div class="nav-wrapper container">
    <a href="{{route('anasayfa')}}" class="brand-logo">Kelimelik</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="{{url('kelime')}}">Kelimeler</a></li>
        <li><a href="badges.html">Menü2</a></li>
        <li><a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            {{ __('Çıkış') }}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          </a>
        </li>
      </ul>
    </div>
  </nav>