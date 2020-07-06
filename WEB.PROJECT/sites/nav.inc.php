<nav class="navbar navbar-dark white">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php?site=home<?php echo !empty($_SESSION['username']) ? "&user=" . $_SESSION['username'] : ""; ?>">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?site=newpatient<?php echo !empty($_SESSION['username']) ? "&user=" . $_SESSION['username'] : ""; ?>">Create new User</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?site=datapatient<?php echo !empty($_SESSION['username']) ? "&user=" . $_SESSION['username'] : ""; ?>">Retrieve User Data</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="index.php?site=kontakt<?php echo !empty($_SESSION['username']) ? "&user=" . $_SESSION['username'] : ""; ?>">Contact</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="index.php?site=gallery<?php echo !empty($_SESSION['username']) ? "&user=" . $_SESSION['username'] : ""; ?>">Gallery</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="index.php?site=help<?php echo !empty($_SESSION['username']) ? "&user=" . $_SESSION['username'] : ""; ?>">Help</a>
        </li>
        <?php
        if (empty($_SESSION['username'])) //login , if youre logged in: logout is added to nav bar "Logout"
        ;
        else { ?>
            <li class="nav-item"> 
                <form action="index.php" method="POST"><button class="nav-link btn btn-link" type="submit" name="logout">Logout</button> 
                </form> 
            </li>
        <?php } ?>
    </ul>
</nav>