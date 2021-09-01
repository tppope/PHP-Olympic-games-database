<?php
require_once "controllers/OlympicAthletesController.php";
require_once "models/OlympicGame.php";
$controller = new OlympicAthletesController();
?>
<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pridať umiestnenie</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="javascript/addAchievementScript.js"></script>
</head>
<body>
<header id="main-header">
    <h1 id="main-h1">
        Pridať umiestnenie
    </h1>
</header>
<section id="main-section">
    <article id="main-article">
        <header id="form-article-header">
            <a id="undo" href="index.php" data-toggle="tooltip" title="Späť"><img src="resources/pictures/undo.svg" width="32" height="32" alt="undo"></a>
        </header>
        <div id="form-div">
            <form action='add-achievement.php' method='post' onload="checkYear()">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="discipline">Disciplína</label>
                        <input type='text' class='form-control' id='discipline' name='discipline' placeholder='Zadajte názov disciplíny' pattern='^(?!\s*$).+' required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="placing">Umiestnenie</label>
                        <input type='number' class='form-control' id='placing' name='placing' min="1" max="9999" placeholder='Zadajte umiestnenie' required>
                        <small id="placingHelpBlock" class="form-text text-muted">
                            Číslo väčšie ako 0 a menšie ako 10 000
                        </small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-7">
                        <label for="athlete-select">Športovec</label>
                        <select class="custom-select" id="athlete-select" name="athlete-select" oninput="checkYear()">
                            <?php
                            $athletes = $controller->getAllAthletes();
                            foreach ($athletes as $athlete)
                                echo $athlete->getAthleteOption();
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="olympics">Olympiáda</label>
                        <select class="custom-select" id="olympics" name="olympics" oninput="checkYear()">
                            <?php
                            $olympicGames = $controller->getAllOlympics();
                            foreach ($olympicGames as $olympics)
                                echo $olympics->getOlympicGameOption();
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row" id="button-div">
                    <button type="submit" name="submit" class="btn btn-success">Pridať</button>
                </div>
            </form>
        </div>
    </article>
</section>
</body>
</html>

