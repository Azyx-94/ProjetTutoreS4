<!DOCTYPE HTML>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <?php
        require_once "Connexion.php";
        require_once "Modules/ModHeader/ModHeader.php";
        Connexion::initConnexion();
        new ModHeader();
        ?>
    </header>

    <div class="main">
        <?php
        /*
        if (isset($_GET['module']))
            $module = $_GET['module'];
        else
            $module = "accueil";

        switch ($module) {
            case '[...]':
                include_once 'Modules/ModConnexion/ModConnexion.php';
                $mod = new ModConnexion();
                break;
            default:
                include_once 'Modules/ModAccueil/ModAccueil.php';
                $mod = new ModAccueil();
                break;
        }
        */

        ?>

    </div>
</body>

    <footer>

    </footer>

</html>