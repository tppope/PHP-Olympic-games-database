<?php
require_once "controllers/OlympicAthletesController.php";
$controller = new OlympicAthletesController();
$add = null;
if (isset($_POST["submit"])){
    $add = 0;
    $name = trim($_POST["name"]);
    $surname = trim($_POST["surname"]);
    $birthDayArray = explode('.',trim($_POST["birth-day"]));
    $birthDay = ltrim($birthDayArray[0],'0').".".ltrim($birthDayArray[1],'0').".".$birthDayArray[2];
    $birthPlace = trim($_POST["birth-place"]);
    $birthCountry = trim($_POST["birth-country"]);
    $deathDay = trim($_POST["death-day"]);
    if ($deathDay){
        $deathDayArray = explode('.',$deathDay);
        $deathDay = ltrim($deathDayArray[0],'0').".".ltrim($deathDayArray[1],'0').".".$deathDayArray[2];
    }
    $deathPlace = trim($_POST["death-place"]);
    $deathCountry = trim($_POST["death-country"]);
    $add = $controller->addAthlete($name,$surname,
        $birthDay,$birthPlace,$birthCountry,
        ($deathDay == '' ? null: $deathDay),($deathPlace == '' ? null: $deathPlace),($deathCountry == '' ? null: $deathCountry));

}
?>

<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Potvrdenie úpravy</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>
<body>
<header id="main-header">
    <h1 id="main-h1">
        <?php
        if ($add > 0)
            echo "Športovec <span>bol úspešne</span> pridaný";
        else
            echo "Športovec <span>nebol úspešne</span> pridaný";
        ?>
    </h1>
</header>
<section id="section-delete">
    <?php
    if ($add > 0)
        echo "<lottie-player src='https://assets2.lottiefiles.com/datafiles/bUKBVkxRYbkxkuB/data.json'  background='transparent'  speed='1'  style='width: 300px; height: 300px;' autoplay></lottie-player>";
    elseif($add == -1)
        echo "<lottie-player src='https://assets1.lottiefiles.com/packages/lf20_SrmRPo.json'  background='transparent'  speed='1'  style='width: 300px; height: 300px;' autoplay></lottie-player>
             <span id='edit-info'>Zadali ste údaje už existujúceho športovca</span>";
    elseif($add === 0)
        echo "<lottie-player src='https://assets1.lottiefiles.com/packages/lf20_SrmRPo.json'  background='transparent'  speed='1'  style='width: 300px; height: 300px;' autoplay></lottie-player>";
    else
        echo "<lottie-player src='https://assets1.lottiefiles.com/packages/lf20_SrmRPo.json'  background='transparent'  speed='1'  style='width: 300px; height: 300px;' autoplay></lottie-player>
                <span id='edit-info'>Nedoslali ste formulár</span>";
    ?>
    <span id="redirect">Za 10 sekúnd budete presmerovaný na <a id="href-index" href="index.php">hlavnú stránku</a></span>
    <script>
        setTimeout(function(){
            window.location.href = 'index.php';
        }, 10000);
    </script>
</section>

</body>
</html>
