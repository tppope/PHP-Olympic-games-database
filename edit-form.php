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
    <title>Upraviť športovca</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="javascript/editAthleteScript.js"></script>
</head>
<body>
<header id="main-header">
    <h1 id="main-h1">
        Úprava športovca
    </h1>
</header>
<section id="main-section">
    <article id="main-article">
        <header id="form-article-header">
            <a id="undo" href="index.php" data-toggle="tooltip" title="Späť"><img src="resources/pictures/undo.svg" width="32" height="32" alt="undo"></a>
        </header>
        <div id="form-div">
            <form action='edit.php' method='post'>
                <?php
                echo "<input type='hidden' id='athleteId' name='athleteId' value='".$athlete->getId()."'>"
                ?>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Meno</label>
                        <?php
                        echo "<input type='text' class='form-control' id='name' name='name' value='".$athlete->getName()."' placeholder='Zadajte meno' pattern='^(?!\s*$).+' required>"
                        ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="surname">Priezvisko</label>
                        <?php
                        echo "<input type='text' class='form-control' id='surname' name='surname' value='".$athlete->getSurname()."' placeholder='Zadajte priezvisko' pattern='^(?!\s*$).+' required>"
                        ?>
                        </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="birth-day">Dátum narodenia</label>
                        <?php
                        echo "<input type='text' class='form-control' id='birth-day' name='birth-day' oninput='checkBirthDeathDay()' value='".$athlete->getBirthDay()."' placeholder='Zadajte dátum narodenia' required pattern='^(?:(?:31(\.)(?:0?[13578]|1[02]))\\1|(?:(?:29|30)(\.)(?:0?[1,3-9]|1[0-2])\\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\.)0?2\\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\.)(?:(?:0?[1-9])|(?:1[0-2]))\\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$'>"
                        ?>
                        <small id="birthDayHelpBlock" class="form-text text-muted">
                            Dátum musí byť v tvare dd.mm.yyyy
                        </small>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="birth-place">Miesto narodenia</label>
                        <?php
                        echo "<input type='text' class='form-control' id='birth-place' name='birth-place' value='".$athlete->getBirthPlace()."' placeholder='Zadajte miesto narodenia' required pattern='^(?!\s*$).+'>"
                        ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="birth-country">Krajina Narodenia</label>
                        <?php
                        echo "<input type='text' class='form-control' id='birth-country' name='birth-country' value='".$athlete->getBirthCountry()."' placeholder='Zadajte krajinu narodenia' required pattern='^(?!\s*$).+'>"
                        ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="death-check" name="death-check" value="isDeath" onclick="showDeathForm(this)">
                        <label class="form-check-label" for="death-check">Zomrel</label>
                    </div>
                </div>
                <div class="form-row" id="death-form">
                    <div class="form-group col-md-4">
                        <label for="death-day">Dátum úmrtia</label>
                        <?php
                        echo "<input type='text' class='form-control' id='death-day' name='death-day' oninput='checkBirthDeathDay()' value='".$athlete->getDeathDay()."' placeholder='Zadajte dátum úmrtia' pattern='^(?:(?:31(\.)(?:0?[13578]|1[02]))\\1|(?:(?:29|30)(\.)(?:0?[1,3-9]|1[0-2])\\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\.)0?2\\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\.)(?:(?:0?[1-9])|(?:1[0-2]))\\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$'>"
                        ?>
                        <small id="deathDayHelpBlock" class="form-text text-muted">
                            Dátum musí byť v tvare dd.mm.yyyy
                        </small>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="death-place">Miesto úmrtia</label>
                        <?php
                        echo "<input type='text' class='form-control' id='death-place' name='death-place' value='".$athlete->getDeathPlace()."' placeholder='Zadajte miesto úmrtia'>"
                        ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="death-country">Krajina úmrtia</label>
                        <?php
                        echo "<input type='text' class='form-control' id='death-country' name='death-country' value='".$athlete->getDeathCountry()."' placeholder='Zadajte krajinu úmrtia'>"
                        ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Odstrániť umiestnenie</label>
                        <div id="achievement-check-box">
                            <?php
                            $achievements = $athlete->getAchievements();
                            foreach ($achievements as $achievement)
                                echo $achievement->getAchievementSelect();
                            ?>
                            <img id="unchecked-radio" src="resources/pictures/cancel-button.svg" width="16" height="16" alt="cancel" onclick="unchecked()">
                        </div>
                    </div>
                </div>
                <div class="form-row" id="button-div">
                    <button type="submit" name="submit" class="btn btn-warning">Upraviť</button>
                </div>
            </form>
        </div>
    </article>
</section>

</body>
</html>

