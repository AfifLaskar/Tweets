<ul class="list-group list-group-flush">
    <li class="list-group-item">
        <a class="text-decoration-none text-dark" href="{{ route('tweets.index') }}">
            Home
        </a>
    </li>
    <li class="list-group-item">
        <a class="text-decoration-none text-dark" href="{{ route('profile.show', auth()->user()->name) }}">
            Profile
        </a>
    </li>
    <li class="list-group-item">
        <a class="text-decoration-none text-dark" href="{{ route('explore.index') }}">
            Explore Users
        </a>
    </li>
    <li class="list-group-item">
        <a 
            class="text-decoration-none text-dark" 
            href="{{ route('logout') }}"
            onclick="event.preventDefault(); 
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>

