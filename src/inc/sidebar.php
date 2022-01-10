<?php
    require_once('inc/regex.inc.php')

?>

<h1 class="visually-hidden">Sidebars examples</h1>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark nav-parent" style="width: 280px;">
    <a href="choosechar.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="https://cdn-icons-png.flaticon.com/512/3336/3336643.png" width="40" height="32">
        <span class="fs-4">DnD Spellbook</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="choosechar.php" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#home" /></svg>
                Characters
            </a>
        </li>
        <li>
            <a href="globalspells.php" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#speedometer2" /></svg>
                Global spells
            </a>
        </li>
        <li>
            <a href="createspell.php" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#table" /></svg>
                Create new spell
            </a>
        </li>
        <li>
            <a href="/src/inc/logout.inc.php" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" /></svg>
                Log out
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://image.freepik.com/vektoren-kostenlos/ein-suesser-drache-sitzt-und-laechelt-dich-an-karikatur_159446-720.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
            <?php
                echo '<strong>'.(isset($_SESSION['username']) ? e($_SESSION['username']) : '').'</strong>';
            ?>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="changepass.php">Change password</a></li>
            <li><a class="dropdown-item" href="deleteacc.php">Delete account</a></li>
        </ul>
    </div>
</div>