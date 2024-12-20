<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="bi bi-list" id="hamburgerMenu"></i>
</button>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">


    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-bell-fill" style="font-size: 1.4rem;"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter"><?= mysqli_num_rows(getCountUnreadFeedback()) != 0? mysqli_num_rows(getCountUnreadFeedback()) : '' ?></span>
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Notifications
            </h6>
            <?php if(count($unreadNotif) != 0) : ?>
            <?php foreach($unreadNotif as $unread) : ?>
            <a class="dropdown-item d-flex align-items-center">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="bi bi-bell-fill text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500"><?= date_format(date_create($unread['created_at']), "F d, Y") ?></div>
                    <span class="font-weight-bold"><?= $unread['feed'] ?></span>
                </div>
            </a>
            <?php endforeach ?>
            <?php else : ?>
            <div class="text-center my-3">No Unread Feedback</div>
            <?php endif ?>
            <a class="dropdown-item text-center small text-gray-500" href="<?= BASEURL?>/notification/">Show All Notifications</a>
        </div>
    </li>

    <!-- Nav Item - Messages -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-envelope-fill" style="font-size: 1.4rem;"></i>
            <!-- Counter - Messages -->
             <?php if(count($reqs) != 0) : ?>
            <span class="badge badge-danger badge-counter"><?= count($reqs) > 20? '10+' : count($reqs) ?></span>
            <?php endif ?>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">
                TopUp Requests
            </h6>
            <?php if(count($reqs) != 0) : ?>
            <?php foreach($reqs as $req) : ?>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="font-weight-bold">
                    <div class="text-truncate">New TopUp Requests : <?= number_format($req['nominal'], 0, "", ".") ?></div>
                    <div class="small text-gray-500"><?= $req['fullname'] ?> · <?= date_format(date_create($req['created_at']), 'd F Y H:i') ?> </div>
                </div>
            </a>
            <?php endforeach ?>
            <?php else : ?>
            <div class="text-center my-3">No Requests</div>
            <?php endif ?>
            <a class="dropdown-item text-center small text-gray-500" href="<?= BASEURL?>/topup/">See More Requests</a>
        </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow" id="userDropdownWrapper">
        <a class="nav-link dropdown-toggle" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['fullname'] ?></span>
            <img class="img-profile rounded-circle"
                src="../../assets/av<?= mysqli_fetch_assoc(getUserByEncryptEmail($_SESSION['kanjsbdhiadbasndksandaiuwfajjsabdbasgdabasdj']))['avatar']?>.png">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" id="userDropdownItems"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?= BASEURL ?>/">
                <i class="bi bi-person-fill mr-2 text-gray-400"></i>
                <span class="h6"><?= $_SESSION['fullname'] ?></span>
            </a>
            <a class="dropdown-item" href="<?= BASEURL ?>/server">
                <i class="bi bi-gear-fill mr-2 text-gray-400"></i>
                Server Settings
            </a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="bi bi-door-closed-fill mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </li>

</ul>

</nav>
<!-- End of Topbar -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>