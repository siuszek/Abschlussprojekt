<nav class="navbar navbar-dark white">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php?site=home<?php echo !empty($_SESSION['username']) ? "&user=" . $_SESSION['username'] : ""; ?>">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?site=registrieren<?php echo !empty($_SESSION['username']) ? "&user=" . $_SESSION['username'] : ""; ?>">Registrierung</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?site=<?php echo !empty($_SESSION['username']) ? "&user=" . $_SESSION['username'] : ""; ?>">Profil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?site=<?php echo !empty($_SESSION['username']) ? "&user=" . $_SESSION['username'] : ""; ?>">Bilder</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="index.php?site=Impressum<?php echo !empty($_SESSION['username']) ? "&user=" . $_SESSION['username'] : ""; ?>">Impressum</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="index.php?site=Hilfe<?php echo !empty($_SESSION['username']) ? "&user=" . $_SESSION['username'] : ""; ?>">Hilfe</a>
        </li>
        <?php
        if (empty($_SESSION['username'])) //login 
        ;
        else { ?>
            <li class="nav-item">
                <form action="index.php" method="POST"><button class="nav-link btn btn-link" type="submit" name="logout">Logout</button>
                </form>
            </li>
        <?php } ?>
    </ul>
</nav>