<?php
require_once "controllers/OlympicAthletesController.php";
$controller = new OlympicAthletesController();
$athlete = null;
if (isset($_GET['id']))
    $athlete = $controller->getAthleteDetails($_GET['id']);
?>
<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detaily športovca</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="javascript/script.js"></script>
</head>
<body>
<header id="main-header">
    <h1 id="main-h1">
        Detaily športovca
    </h1>
</header>
<section id="main-section">
    <article id="main-article">
        <header id="main-article-header">
            <h2 id="main-h2">
                <?php
                echo $athlete->getFullName();
                ?>
            </h2>
            <a id="undo" href="index.php" data-toggle="tooltip" title="Späť"><img src="resources/pictures/undo.svg" width="32" height="32" alt="undo"></a>
        </header>
        <div id="personal-info" class="athlete-details">
            <?php
            echo $athlete->getPersonalInfo();
            ?>
        </div>
        <div class="athlete-details">
            <h3 id="achievements-h3">Umiestnenia</h3>
            <ul id='achievements-list'>
                <?php
                $achievements = $athlete->getAchievements();
                foreach ($achievements as $achievement)
                    echo $achievement->getAchievement();
                ?>
            </ul>
        </div>

    </article>
</section>
</body>
</html>
