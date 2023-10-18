<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
            <div class="search-inner d-flex align-items-center justify-content-center">
                <div class="close-btn">Close <i class="fa fa-close"></i></div>
                <form id="searchForm" action="../home/search.php">
                    <div class="form-group">
                        <input type="search" name="q" placeholder="What are you searching for...">
                        <button type="submit" class="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <div class="navbar-header">
                <!-- Navbar Header-->
                <a href="index.html" class="navbar-brand">
                    <div class="brand-text brand-big visible text-uppercase"><strong
                            class="text-primary">Elite</strong><strong>AutoEnclave</strong></div>
                    <div class="brand-text brand-sm"><strong class="text-primary">E</strong><strong>A</strong></div>
                </a>
                <!-- Sidebar Toggle Btn-->
                <button class="sidebar-toggle" title="Hide sidebar"><i class="fa fa-long-arrow-left"></i></button>
            </div>
            <div class="right-menu list-inline no-margin-bottom">
                <div class="list-inline-item"><a href="#" title="Search" class="search-open nav-link"><i
                            class="fa fa-search"></i></a></div>
                <div class="list-inline-item"> <a id="website" title="Go to website" href="../home/index.php"
                        class="nav-link">Home <i class="fa fa-home"></i></a></div>
                <div class="list-inline-item"> <a id="website" title="Go to website" href="../home/cart.php"
                        class="nav-link">Cart <i class="fa fa-shopping-cart"></i></a></div>
                <!-- Log out               -->
                <div class="list-inline-item logout"> <a id="logout" title="Logout" href="../logout.php?logout"
                        class="nav-link">Logout <i class="fa fa-sign-out"></i></a></div>
            </div>
        </div>
    </nav>
</header>