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

    <main>
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

    </main>
</body>

    <footer>
        <div class="titreSite1">
            <a href = "">
                <div id="titreImage">
                    <h1>TROUVE TON STAGE</h1>
                    <div class="image1">
                        <img src="./Images/Valise.png" alt="" />
                    </div>
                </div>
            </a>
        </div>

        <div class="RS">
            <img class="imgRS" src="./Images/Youtube.png" alt="" />
            <img class="imgRS" src ="./Images/Twitter.png" alt="" />
            <img class="imgRS" src="./Images/Instagram.png" alt="" />
        </div>

        <div class="Copyright">

        </div>

    </footer>

</html>