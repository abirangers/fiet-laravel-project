<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ABBY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs("products.index") ? "active" : "" }}" href="{{ route("products.index") }}">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs("categories.index") ? "active" : "" }}" href="{{ route("categories.index") }}">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs("users.index") ? "active" : "" }}" href="{{ route("users.index") }}">User</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
