<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column mt-3 pl-3">

            <li class="mb-3 text-uppercase text-muted">
                Vehicles
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link <?= ($page == 'index') ? 'active' : ''; ?> rounded" href="index.php">
                    <span data-feather="list"></span>
                    Vehicle List
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link <?= ($page == 'addvehicle') ? 'active' : ''; ?> rounded" href="addvehicle.php">
                    <span data-feather="plus-circle"></span>
                    Add Vehicle
                </a>
            </li>

            <hr class="my-3">
            <li class="mb-3 text-uppercase text-muted">
                Orders
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link <?= ($page == 'pendingorders') ? 'active' : ''; ?> rounded" href="pendingorders.php">
                    <span data-feather="shopping-bag"></span>
                    Pending Orders
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link <?= ($page == 'allorders') ? 'active' : ''; ?> rounded" href="allorders.php">
                    <span data-feather="rotate-ccw"></span>
                    All Orders
                </a>
            </li>

            <hr class="my-3">

            <li class="mb-3 text-uppercase text-muted">
                Users & Manufacturers
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link <?= ($page == 'allusers') ? 'active' : ''; ?> rounded" href="allusers.php">
                    <span data-feather="users"></span>
                    Users
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link <?= ($page == 'allmanufacturers') ? 'active' : ''; ?> rounded"
                    href="allmanufacturers.php">
                    <span data-feather="file-text"></span>
                    Manufacturers
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link <?= ($page == 'addmanufacturer') ? 'active' : ''; ?> rounded"
                    href="addmanufacturer.php">
                    <span data-feather="plus-circle"></span>
                    Add Manufacturer
                </a>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link <?= ($page == 'colours') ? 'active' : ''; ?> rounded" href="colours.php">
                    <span data-feather="droplet"></span>
                    Colours
                </a>
            </li>

            <hr class="my-3">

            <li class="mb-3 text-uppercase text-muted">
                Settings
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link <?= ($page == 'changesettings') ? 'active' : ''; ?> rounded"
                    href="changesettings.php">
                    <span data-feather="settings"></span>
                    App Settings
                </a>
            </li>
        </ul>
    </div>
</nav>