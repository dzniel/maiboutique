<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid m-2">
        <a class="navbar-brand" href="{{ route('welcome') }}">MAIBOUTIQUE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('search') }}">Search</a>
                    </li>
                    @if (Auth::user()->id != 1)
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('cart') }}">Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('history') }}">History</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('profile') }}">Profile</a>
                    </li>
                @endauth
            </ul>
            @auth
                @if (Auth::user()->id == 1)
                    <a href="{{ route('add.item') }}" class="btn btn-outline-primary mx-3">Add Item</a>
                @endif
                <form action="{{ route('logout.user') }}" method="post">
                    @csrf
                    <button class="btn btn-outline-primary" type="submit">Sign Out</button>
                </form>
            @else
                @if (URL::current() == route('welcome') or URL::current() == route('register'))
                    <form action="{{ route('login') }}">
                        @csrf
                        <button class="btn btn-outline-primary" type="submit">Sign In</button>
                    </form>
                @elseif (URL::current() == route('login'))
                    <form action="{{ route('register') }}">
                        @csrf
                        <button class="btn btn-outline-primary" type="submit">Sign Up</button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
</nav>
