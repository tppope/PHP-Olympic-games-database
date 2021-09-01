<?php
require_once "controllers/OlympicWinnersController.php";
$controller = new OlympicWinnersController();
?>
<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Olympijskí víťazi</title>

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
        Slovenskí olympijskí víťazi
    </h1>
</header>
<section id="main-section">
    <article id="main-article">
        <header id="main-article-header">
            <h2 id="main-h2">
                Všetci olympijskí víťazi
            </h2>
            <div id="switch">
                <input id="radio-a" type="radio" name="first-switch" checked="checked" onchange="changeView()">
                <label for="radio-a">Všetci</label>
                <input id="radio-b" type="radio" name="first-switch" onchange="changeView()">
                <label for="radio-b">Top 10</label>
                <span class="toggle-outside">
                    <span class="toggle-inside"></span>
                </span>
            </div>
        </header>
        <div id="all-winners-table" class="table-responsive">
            <table id="all-winners" class="table">
                <thead>
                <tr>
                    <th>Meno</th>
                    <th class="sort-th" onclick="sortTable(1)">
                        <div>
                            Priezvisko
                            <div class="sort-arrows">
                                <img src="resources/pictures/up-arrow.svg" width="9" height="9" alt="up-arrow">
                                <img src="resources/pictures/down-arrow.svg" width="9" height="9" alt="down-arrow">
                            </div>
                        </div>
                    </th>
                    <th class="sort-th" onclick="sortByYear()">
                        <div>
                            Rok
                            <div class="sort-arrows">
                                <img src="resources/pictures/up-arrow.svg" width="9" height="9" alt="up-arrow">
                                <img src="resources/pictures/down-arrow.svg" width="9" height="9" alt="down-arrow">
                            </div>
                        </div>
                    </th>
                    <th class="sort-th" onclick="sortTable(3)">
                        <div>
                            Typ olympiády
                            <div class="sort-arrows">
                                <img src="resources/pictures/up-arrow.svg" width="9" height="9" alt="up-arrow">
                                <img src="resources/pictures/down-arrow.svg" width="9" height="9" alt="down-arrow">
                            </div>
                        </div>
                    </th>
                    <th>Miesto</th>
                    <th>Disciplína</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $allWinners = $controller->getAllWinners();
                foreach ($allWinners as $winner)
                    echo $winner->getHtmlTableRow();
                ?>
                </tbody>
            </table>
        </div>
        <div id="top10-winners-table">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Meno</th>
                        <th>Priezvisko</th>
                        <th>Miesto narodenia</th>
                        <th>Zlaté medaile</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $top10Winners = $controller->getTop10Winners();
                    foreach ($top10Winners as $top10Winner)
                        echo $top10Winner->getHtmlTableRow();
                    ?>
                    </tbody>
                </table>
            </div>
            <div id="add-hrefs">
                <a href="add-athlete-form.php" id="add-athlete" class="add-something" data-toggle="tooltip" title="Pridať športovca"><img src="resources/pictures/add-user.svg" width="32" height="32" alt="add-user"></a>
                <a href="add-achievement-form.php" id="add-achievement" class="add-something" data-toggle="tooltip" title="Pridať umiestnenie"><img src="resources/pictures/medal.svg" width="32" height="32" alt="add-achievement"></a>
            </div>
        </div>
    </article>
</section>
<footer>
    <span>Designed by <a id="footer-href" href="http://147.175.121.202/~xpopikt/7243zadanie1/index.html">Tomáš Popík &copy; </a></span>
</footer>
</body>
</html>
