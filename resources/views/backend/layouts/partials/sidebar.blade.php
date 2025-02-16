<div class="d-flex flex-column flex-shrink-0 p-3 bg-primary text-white" style="height: 92vh; width: 250px;">
    <h4 class="text-center mb-4">Admin Panel</h4>
    <ul class="nav nav-pills flex-column mb-auto">
        @role('Admin')
        <!-- Dashboard -->
        <li class="nav-item">
            <a href="{{ route('backend.dashboard.index') }}" class="nav-link text-white">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="dataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-shield-lock-fill"></i> Role dan Permission
            </a>
            <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                <li>
                    <a href="{{ route('backend.user.index') }}" class="dropdown-item">
                        <i class="bi bi-person-fill"></i> Data User
                    </a>
                </li>
                <li>
                    <a href="{{ route('backend.role.index') }}" class="dropdown-item">
                        <i class="bi bi-shield-lock"></i> Data Role
                    </a>
                </li>
                <li>
                    <a href="{{ route('backend.permission.index') }}" class="dropdown-item">
                        <i class="bi bi-key-fill"></i> Permissions
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="dataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-cash-stack"></i> Data Transaksi
            </a>
            <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                <li>
                    <a href="{{ route('backend.travel.transaksi') }}" class="dropdown-item">
                        <i class="bi bi-cash-stack"></i> List Transaksi
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="dataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-car-front-fill"></i> Data Travel
            </a>
            <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                <li>
                    <a href="{{ route('backend.jadwal-travel.index') }}" class="dropdown-item">
                        <i class="bi bi-car-front-fill"></i> List Travel
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="dataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-file-earmark-bar-graph-fill"></i> Laporan
            </a>
            <ul class="dropdown-menu" aria-labelledby="dataDropdown">
                <li>
                    <a href="{{ route('backend.travel.index') }}" class="dropdown-item">
                        <i class="bi bi-car-front-fill"></i> Penumpang Travel
                    </a>
                </li>
            </ul>
        </li>
        @endrole
    </ul>
    <hr class="bg-white">
    <div class="d-flex justify-content-between mt-auto">
        <!-- Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm w-100">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>
</div>