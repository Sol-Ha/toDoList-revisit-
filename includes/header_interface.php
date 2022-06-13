<header id="header_interface">
    <?php echo "Bonjour " . get_current_user("") . "!" ?>
    <h2></h2>
    <img id="icon_sun" src="assets/images/sun.svg" width="50" height="50" alt="logo_sun"></img>
    <img id="icon_moon" src="assets/images/moon.svg" width="50" height="50" alt="logo_moon">
    <?php
    $fmt = datefmt_create(
        'fr_FR',
        IntlDateFormatter::FULL,
        IntlDateFormatter::GREGORIAN
    );
    echo "Aujourd'hui: " . datefmt_format($fmt, 0);
    ?>
</header>