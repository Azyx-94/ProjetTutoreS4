<!DOCTYPE HTML>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Trouve ton stage</title>
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

    <main>
        <?php
        if (isset($_GET['module']))
            $module = $_GET['module'];
        else
            $module = "accueil";

        switch ($module) {
            case 'ModConvention':
                include_once 'Modules/ModConventionStage/ModConventionStage.php';
                $mod = new ModConventionStage();
                break;
            default:
                include_once 'Modules/ModAccueil/ModAccueil.php';
                $mod = new ModAccueil();
                break;
        }

        ?>

    </main>
</body>

    <footer>
        <?php
        require_once "Modules/ModFooter/ModFooter.php";
        new ModFooter();
        ?>
    </footer>

</html>