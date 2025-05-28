<!-- <div>
    <nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #020f5e;">
        <div class="container">
            <a class="navbar-brand" href="#">SARUNG TENUN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end gap-4" id="navbarSupportedContent">
            <ul class="navbar-nav gap-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/product') }}">Product</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/categori/sarung">Sarung</a></li>
                    <li><a class="dropdown-item" href="#">Abaya</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Muslim</a></li>
                </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Search</a>
                </li>
            </ul>
            <form class="d-flex gap-4 align-items-center">
                <a href="{{ route('customer.login') }}" class="btn btn-success">Login</a>
                <a href="#">
                    <i class="fa-solid fa-bag-shopping" style="color: white;"></i>
                </a>
            </form>
            </div>
        </div>
    </nav>    
</div> -->


<div>
    <nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #020f5e;">
        <div class="container">
            <a class="navbar-brand" href="#">SARUNG TENUN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end gap-4" id="navbarSupportedContent">
                <ul class="navbar-nav gap-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/product') }}">Product</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/categori/sarung">Sarung</a></li>
                            <li><a class="dropdown-item" href="#">Abaya</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Muslim</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Search</a>
                    </li>
                </ul>

                <form class="d-flex gap-4 align-items-center">
                    @auth('customer')
                        <div class="dropdown">
                            <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::guard('customer')->user()->name }}
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Profil</a></li>
                                <li>
                                    <form method="POST" action="{{ route('customer.logout') }}">
                                        @csrf
                                        <button class="dropdown-item" type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('customer.login') }}" class="btn btn-success" type="button">Login</a>
                    @endauth

                    <a href="#">
                        <i class="fa-solid fa-bag-shopping" style="color: white;"></i>
                    </a>
                </form>
            </div>
        </div>
    </nav>    
</div>
