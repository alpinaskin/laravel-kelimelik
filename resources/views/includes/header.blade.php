<nav>
  <a href="{{route('anasayfa')}}" class="brand-logo" style="margin-left:7%">Kelimelik</a>
    <div class="nav-wrapper container">
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="{{url('kelime')}}">Kelimeler</a></li>
        <li><a href="#">Test</a></li>
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
      <form action="{{route('kelime.search')}}" method="POST" style="position:absolute;margin-left:10%; width:50%">
        @csrf
          <div class="input-field">
              <input id="search" type="search" name="search" placeholder="Kelime Ara">
              <label class="label-icon" for="search"><i class="material-icons">search</i></label>
              <i class="material-icons">close</i>
          </div>
      </form>
    </div>
  </nav>