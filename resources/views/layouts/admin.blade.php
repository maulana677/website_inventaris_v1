<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('components.header')
</head>

<body class="bg-soft-blue">
    <nav class="navbar navbar-expand-lg bg-white py-3">
        <div class="container">
            <a href="." class="navbar-brand d-flex align-items-center gap-2 fw-bold">
                <img src="assets/images/logo.png" alt="">
                <div>
                    <p class="mb-0 fs-7" style="line-height: 15px;">
                        Ware <br> <span class="text-primary">House</span>
                    </p>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav mx-auto gap-3">
                    <li class="nav-item">
                        <a href="." class="nav-link active">
                            <i class="bx bxs-dashboard"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="bx bx-box"></i> Inventaris
                        </a>

                        <ul class="dropdown-menu mt-2">
                            <li>
                                <a href="kategori.html" class="dropdown-item">
                                    <i class="bx bx-objects-horizontal-right"></i> Kategori Produk
                                </a>
                            </li>
                            <li>
                                <a href="produk.html" class="dropdown-item">
                                    <i class="bx bx-box"></i> Produk
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="transaksi.html" class="nav-link">
                            <i class='bx bx-line-chart'></i> Transaksi
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
                            <img src="https://ui-avatars.com/api/?name=Muhammad Yunus" class="rounded-circle"
                                width="36" alt="Muhammad Yunus">
                            {{ auth()->user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end mt-2">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-5">
        <div class="container">
            {{ $slot }}
        </div>
    </main>

    @include('components.scripts')
</body>

</html>
