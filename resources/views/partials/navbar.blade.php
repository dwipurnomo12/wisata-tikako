<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="/" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>Tikako</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a id="home-link" href="/" class="nav-item nav-link">Home</a>
                <a id="fasilitas-link" href="/fasilitas" class="nav-item nav-link">Fasilitas</a>
                <a id="wisata-link" href="/wisata" class="nav-item nav-link">Wisata</a>
                <a id="penginapan-link" href="/penginapan" class="nav-item nav-link">Penginapan</a>
                <a id="kontak-link" href="/kontak" class="nav-item nav-link">Kontak</a>
            </div>
            @auth
                @if (auth()->user()->role->role == 'admin')
                    <a href="/dashboard" class="btn btn-primary rounded-pill py-2 px-4">Dashboard</a>
                @else
                    <div class="nav-item dropdown">
                        <a href="#" class="btn btn-primary rounded-pill py-2 px-4nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ auth()->user()->name }}</a>
                        <div class="dropdown-menu m-0">
                            <a href="/riwayat-booking" class="dropdown-item">Riwayat Booking</a>
                            <form method="POST" action="{{ route('logout') }}" class="mx-3 mt-2 d-block">
                                @csrf
                                <button type="submit" class="btn btn-custom" role="button">Logout</button>
                            </form>
                        </div>
                    </div>
                @endif
            @else
                <a href="/login" class="btn btn-primary rounded-pill py-2 px-4">Login</a>
            @endauth
        </div>
    </nav>
</div>
<!-- Navbar & Hero End -->