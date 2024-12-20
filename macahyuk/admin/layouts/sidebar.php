        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./">
                <div class="sidebar-brand-icon rotate-n-15">
                    <span>MY</span>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $title == 'Dashboard' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= BASEURL?>/dashboard/">
                    <i class="bi bi-houses-fill"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item <?= $title == 'Users' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= BASEURL?>/users/">
                    <i class="bi bi-people-fill"></i>
                    <span>Users</span></a>
            </li>
            <li class="nav-item <?= $title == 'Books' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= BASEURL?>/books/">
                    <i class="bi bi-book-half"></i>
                    <span>Books</span></a>
            </li>
            <li class="nav-item <?= $title == 'Notifications' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= BASEURL?>/notification/">
                    <i class="bi bi-bell-fill"></i>
                    <span>Notifications</span></a>
            </li>
            <li class="nav-item <?= $title == 'TopUp' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= BASEURL?>/topup/">
                    <i class="bi bi-wallet-fill"></i>
                    <span>Top-Up Requests</span></a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item <?= ($title == 'Earnings Annual' || $title == 'Earnings Monthly') ? 'active' : '' ?>">
                <a class="nav-link">
                    <i class="bi bi-piggy-bank-fill"></i>
                    <span>Earnings</span></a>
            </li>
            <li class="nav-item <?= ($title == 'Earnings Monthly') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= BASEURL ?>/earnings/monthly.php">
                    <i class="bi bi-piggy-bank-fill"></i>
                    <span>Monthly</span></a>
            </li>
            <li class="nav-item <?= ($title == 'Earnings Annual') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= BASEURL ?>/earnings/annual.php">
                    <i class="bi bi-piggy-bank-fill"></i>
                    <span>Annual</span></a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item <?= $title == 'Server' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= BASEURL    ?>/server/">
                    <i class="bi bi-gear-fill"></i>
                    <span>Server Settings</span></a>
            </li>            

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
            </div>

        </ul>
        <!-- End of Sidebar -->