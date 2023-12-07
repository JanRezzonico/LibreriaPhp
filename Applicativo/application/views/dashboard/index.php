<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Libreria</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto me-lg-2"> <!-- Added me-lg-2 for right margin on larger screens -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <?php if ($_SESSION['is_admin']): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="management">Gestione Libri</a>
                    </li>
                <?php endif; ?>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <span class="navbar-text me-2 me-lg-0">Welcome, <?php echo $_SESSION['username']; ?></span>
                    <a class="nav-link" href="<?php echo URL . 'login/logout' ?>">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
